<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/28/2018
 * Time: 7:40 AM
 */

namespace Northwind\V1\Rest\OrderDetailProduct;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\Sql\Sql;

class OrderDetailProductMapper
{
    protected $adapter;
    protected $fieldList;
    protected $sql;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'OrderId',
            'ProductId',
            'ProductName',
            'UnitPrice',
            'Quantity',
            'Discount',
        ];

        $this->adapter = $adapter;
    }

    public function getAllOrderDetailProduct()
    {
        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new OrderDetailProductEntity());

        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('OrderDetail')
            ->join('Product','OrderDetail.ProductId = Product.Id',array('ProductName'));

        $paginatorAdapter = new DbSelect($select, $this->adapter, $resultSet);
        $OrderDetails = new OrderDetailProductCollection($paginatorAdapter);


        return $OrderDetails;
    }

    public function getOrderDetailProduct($OrderDetailId)
    {

        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('OrderDetail')
            ->join('Product','OrderDetail.ProductId = Product.Id',array('ProductName'))
            ->where("OrderDetail.Id = '$OrderDetailId'");

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        return   $results->current();

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