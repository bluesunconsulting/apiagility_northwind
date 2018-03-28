<?php
namespace Northwind\V1\Rest\OrderDetailProduct;

class OrderDetailProductResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new OrderDetailProductMapper($services->get('NorthwindDB'));
        return new OrderDetailProductResource($mapper);
    }
}
