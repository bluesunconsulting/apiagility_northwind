<?php
namespace Northwind\V1\Rest\Supplier;

class SupplierEntity
{
    public $Id;
    public $CompanyName;
    public $ContactName;
    public $ContactTitle;
    public $Address;
    public $City;
    public $Region;
    public $PostalCode;
    public $Country;
    public $Phone;
    public $Fax;
    public $HomePage;

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
