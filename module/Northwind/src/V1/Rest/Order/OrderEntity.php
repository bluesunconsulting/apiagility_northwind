<?php
namespace Northwind\V1\Rest\Order;

class OrderEntity
{
    public $Id;
    public $CustomerId;
    public $EmployeeId;
    public $OrderDate;
    public $RequiredDate;
    public $ShippedDate;
    public $ShipVia;
    public $Freight;
    public $ShipName;
    public $ShipAddress;
    public $ShipCity;
    public $ShipRegion;
    public $ShipPostalCode;
    public $ShipCountry;

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
