<?php
namespace Northwind\V1\Rpc\GetEmployeeTerritory;

class GetEmployeeTerritoryControllerFactory
{
    public function __invoke($controllers)
    {
        $adapter = $controllers->get('NorthwindDB');

        return new GetEmployeeTerritoryController($adapter);
    }
}
