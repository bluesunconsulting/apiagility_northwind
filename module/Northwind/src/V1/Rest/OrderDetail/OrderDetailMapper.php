<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/27/2018
 * Time: 12:41 PM
 */

namespace Northwind\V1\Rest\OrderDetail;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Sql;
use Northwind\V1\Rest\Product\ProductEntity;
use Northwind\V1\Rest\Product\ProductCollection;
use Zend\Hydrator\ArraySerializable;

class OrderDetailMapper
{
    protected $adapter;
    protected $fieldList;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'OrderId',
            'ProductId',
            'UnitPrice',
            'Quantity',
            'Discount',
        ];

        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new OrderDetailEntity());
        $this->table = new TableGateway('OrderDetail', $adapter, null, $resultSet);
    }

    public function getAllOrderDetail($params = [])
    {
        $where = [];
        if(isset($params['OrderId'])) { $where = array('OrderId' => $params['OrderId']); }

        if(count($where)){
            $dbTableGatewayAdapter = new DbTableGateway($this->table, $where, array('Quantity' => 'asc'));
        }
        else
        {
            $dbTableGatewayAdapter = new DbTableGateway($this->table);
        }

        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function getOrderDetail($OrderDetailId)
    {

        $rowset = $this->table->select(array('Id' => $OrderDetailId));
        $OrderDetail = $rowset->current();

        $sql = new Sql($this->table->adapter);
        $select = $sql->select();
        $select->from('Product')
            ->where(array('Id' => $OrderDetail->ProductId));

        // build the SpeakerCollection based on $select
        $resultSet = new HydratingResultSet(
            new ArraySerializable(),
            new ProductEntity()
        );
        $paginatorAdapter = new DbSelect($select, $this->table->adapter, $resultSet);
        $OrderDetail->Product = new ProductCollection($paginatorAdapter);




        return $OrderDetail;
    }

    public function addOrderDetail($OrderDetail)
    {
        $data = $this->getArray($OrderDetail);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    public function updateOrderDetail($Id, $OrderDetail)
    {
        $data = $this->getArray($OrderDetail);
        try {
            $this->table->update($data, array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $Id));
        return $rowset->current();
    }

    public function deleteOrderDetail($Id)
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