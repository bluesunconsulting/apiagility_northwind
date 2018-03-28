<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/27/2018
 * Time: 7:43 AM
 */

namespace Northwind\V1\Rest\Supplier;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbTableGateway;
//use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
//use Zend\Db\Sql\Sql;
//use Northwind\V1\Rest\Supplier\SupplierEntity;
//use Northwind\V1\Rest\Supplier\SupplierCollection;
//use Zend\Hydrator\ArraySerializable;


class SupplierMapper
{
    protected $adapter;
    protected $fieldList;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'CompanyName',
            'ContactName',
            'ContactTitle',
            'Address',
            'City',
            'Region',
            'PostalCode',
            'Country',
            'Phone',
            'Fax',
            'HomePage',
        ];

        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new SupplierEntity());
        $this->table = new TableGateway('Supplier', $adapter, null, $resultSet);
    }

    public function getAllSupplier()
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->table);
        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function getSupplier($SupplierId)
    {
        $rowset = $this->table->select(array('Id' => $SupplierId));
        $Supplier = $rowset->current();
        return $Supplier;
    }

    public function addSupplier($Supplier)
    {
        $data = $this->getArray($Supplier);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    public function updateSupplier($Id, $Supplier)
    {
        $data = $this->getArray($Supplier);
        try {
            $this->table->update($data, array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $Id));
        return $rowset->current();
    }

    public function deleteSupplier($Id)
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