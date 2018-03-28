<?php
namespace Northwind\V1\Rest\OrderDetail;

class OrderDetailResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new OrderDetailMapper($services->get('NorthwindDB'));
        return new OrderDetailResource($mapper);
    }
}
