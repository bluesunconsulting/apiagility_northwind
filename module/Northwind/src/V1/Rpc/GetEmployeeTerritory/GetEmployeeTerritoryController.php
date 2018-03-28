<?php
namespace Northwind\V1\Rpc\GetEmployeeTerritory;

use Zend\Mvc\Controller\AbstractActionController;

class GetEmployeeTerritoryController extends AbstractActionController
{
    protected $_adapter;

    public function __construct($adapter)
    {
        $this->_adapter = $adapter;
    }

    public function getEmployeeTerritoryAction()
    {

        $sql = "select * from employee";
        $statement = $this->_adapter->query($sql);
        $result = $statement->execute();

        $row = [];
        foreach ($result as $key => $value):
            $row[$key] = $value;
        endforeach;

        return $row;


    }
}
