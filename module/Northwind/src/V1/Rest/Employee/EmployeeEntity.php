<?php
namespace Northwind\V1\Rest\Employee;

class EmployeeEntity
{

    public $Id;
    public $LastName;
    public $FirstName;
    public $Title;
    public $TitleOfCourtesy;
    public $BirthDate;
    public $HireDate;
    public $Address;
    public $City;
    public $Region;
    public $PostalCode;
    public $Country;
    public $HomePhone;
    public $Extension;
    public $Photo;
    public $Notes;
    public $ReportsTo;
    public $PhotoPath;

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
