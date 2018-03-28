<?php
namespace Northwind\V1\Rest\Customer;

class CustomerResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new CustomerMapper($services->get('NorthwindDB'));
        return new CustomerResource($mapper);
    }
}
