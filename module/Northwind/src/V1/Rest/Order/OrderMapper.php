<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/27/2018
 * Time: 12:40 PM
 */

namespace Northwind\V1\Rest\Order;

use Northwind\V1\Rest\OrderDetail\OrderDetailCollection;
use Northwind\V1\Rest\OrderDetail\OrderDetailEntity;
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
class OrderMapper
{
    protected $adapter;
    protected $fieldList;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'CustomerId',
            'EmployeeId',
            'OrderDate',
            'RequiredDate',
            'ShippedDate',
            'ShipVia',
            'Freight',
            'ShipName',
            'ShipAddress',
            'ShipCity',
            'ShipRegion',
            'ShipPostalCode',
            'ShipCountry',
        ];

        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new OrderEntity());
        $this->table = new TableGateway('Order', $adapter, null, $resultSet);
    }

    public function getAllOrder()
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->table);
        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function getOrder($OrderId)
    {
        $rowset = $this->table->select(array('Id' => $OrderId));
        $Order = $rowset->current();


        $sql = new Sql($this->table->adapter);
        $select = $sql->select();
        $select->from('OrderDetail')
              ->where(array('OrderId' => $OrderId));

        // build the SpeakerCollection based on $select
        $resultSet = new HydratingResultSet(
            new ArraySerializable(),
            new OrderDetailEntity()
        );
        $paginatorAdapter = new DbSelect($select, $this->table->adapter, $resultSet);
        $Order->Details = new OrderDetailCollection($paginatorAdapter);



        return $Order;
    }

    public function addOrder($Order)
    {
        $data = $this->getArray($Order);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    public function updateOrder($Id, $Order)
    {
        $data = $this->getArray($Order);
        try {
            $this->table->update($data, array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $Id));
        return $rowset->current();
    }

    public function deleteOrder($Id)
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