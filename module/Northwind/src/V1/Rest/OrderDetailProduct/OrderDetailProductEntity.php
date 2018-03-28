<?php
namespace Northwind\V1\Rest\OrderDetailProduct;

class OrderDetailProductEntity
{

    public $Id;
    public $OrderId;
    public $ProductId;
    public $ProductName;
    public $UnitPrice;
    public $Quantity;
    public $Discount;

    public function getArrayCopy()
    {
        return get_object_vars($this);

    }

    public function populate($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }



}
