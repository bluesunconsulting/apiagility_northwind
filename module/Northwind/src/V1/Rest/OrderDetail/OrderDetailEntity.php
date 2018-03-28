<?php
namespace Northwind\V1\Rest\OrderDetail;

class OrderDetailEntity
{
    public $Id;
    public $OrderId;
    public $ProductId;
    public $UnitPrice;
    public $Quanity;
    public $Discount;

    public function getArrayCopy()
    {
        return get_object_vars($this);

    }

    public function populate($data)
    {
        foreach ( $data as  $key =>  $value) {
             $this->{ $key} =  $value;
        }
    }


}
