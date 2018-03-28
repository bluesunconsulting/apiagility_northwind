<?php
namespace Northwind\V1\Rest\Product;

class ProductEntity
{
        public $Id;
        public $ProductName;
        public $SupplierId;
        public $CategoryId;
        public $QuanityPerUnit;
        public $UnitPrice;
        public $UnitsInStock;
        public $UnitsOnOrder;
        public $ReorderLevel;
        public $Discontinued;

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
