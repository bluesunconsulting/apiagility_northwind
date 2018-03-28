<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/27/2018
 * Time: 10:51 AM
 */

namespace Northwind\V1\Rest\Customer;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Sql;
use Northwind\V1\Rest\Order\OrderEntity;
use Northwind\V1\Rest\Order\OrderCollection;
use Zend\Hydrator\ArraySerializable;

class CustomerMapper
{
    protected $adapter;
    protected $fieldList;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'CustomerName',
            'CustomerTitle',
            'Address',
            'City',
            'Region',
            'PostalCode',
            'Country',
            'Phone',
            'Fax',
        ];

        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new CustomerEntity());
        $this->table = new TableGateway('Customer', $adapter, null, $resultSet);
    }

    public function getAllCustomer()
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->table);
        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function getCustomer($CustomerId)
    {
        $rowset = $this->table->select(array('Id' => $CustomerId));
        $Customer = $rowset->current();


        $sql = new Sql($this->table->adapter);
        $select = $sql->select();
        $select->from('Order')
            ->where(array('CustomerId' => $CustomerId));

        // build the SpeakerCollection based on $select
        $resultSet = new HydratingResultSet(
            new ArraySerializable(),
            new OrderEntity()
        );
        $paginatorAdapter = new DbSelect($select, $this->table->adapter, $resultSet);
        $Customer->Order = new OrderCollection($paginatorAdapter);



        return $Customer;
    }

    public function addCustomer($Customer)
    {
        $data = $this->getArray($Customer);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    public function updateCustomer($Id, $Customer)
    {
        $data = $this->getArray($Customer);
        try {
            $this->table->update($data, array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $Id));
        return $rowset->current();
    }

    public function deleteCustomer($Id)
    {
        try {
            $result = $this->table->delete(array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        return ($result > 0);
    }

    protected function getArray($object)
    {
        $data = array();

        foreach($this->fieldList as $fieldname) {

            if (isset($object->{$fieldname})) {
                $data[$fieldname] = $object->{$fieldname};
            }
        }
        return $data;
    }
}