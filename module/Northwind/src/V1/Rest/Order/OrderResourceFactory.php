<?php
namespace Northwind\V1\Rest\Order;

class OrderResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new OrderMapper($services->get('NorthwindDB'));
        return new OrderResource($mapper);
    }
}
