<?php
namespace Northwind\V1\Rest\Employee;

class EmployeeResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new EmployeeMapper($services->get('NorthwindDB'));
        return new EmployeeResource($mapper);
    }
}
