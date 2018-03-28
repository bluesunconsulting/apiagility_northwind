<?php
namespace Northwind\V1\Rest\Supplier;

class SupplierResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new SupplierMapper($services->get('NorthwindDB'));
        return new SupplierResource($mapper);
    }
}
