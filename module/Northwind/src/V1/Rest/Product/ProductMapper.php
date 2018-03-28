<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/27/2018
 * Time: 1:41 PM
 */

namespace Northwind\V1\Rest\Product;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbTableGateway;
//use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
//use Zend\Db\Sql\Sql;
//use Northwind\V1\Rest\Product\ProductEntity;
//use Northwind\V1\Rest\Product\ProductCollection;
//use Zend\Hydrator\ArraySerializable;
class ProductMapper
{
    protected $adapter;
    protected $fieldList;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'ProductName',
            'SupplierId',
            'CategoryId',
            'QuanityPerUnit',
            'UnitPrice',
            'UnitsInStock',
            'UnitsOnOrder',
            'ReorderLevel',
            'Discontinued',
        ];

        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new ProductEntity());
        $this->table = new TableGateway('Product', $adapter, null, $resultSet);
    }

    public function getAllProduct()
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->table);
        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function getProduct($ProductId)
    {
        $rowset = $this->table->select(array('Id' => $ProductId));
        $Product = $rowset->current();
        return $Product;
    }

    public function addProduct($Product)
    {
        $data = $this->getArray($Product);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    public function updateProduct($Id, $Product)
    {
        $data = $this->getArray($Product);
        try {
            $this->table->update($data, array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $Id));
        return $rowset->current();
    }

    public function deleteProduct($Id)
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