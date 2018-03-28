<?php
namespace Northwind\V1\Rest\Product;

class ProductResourceFactory
{
    public function __invoke($services)
    {
        $mapper = new ProductMapper($services->get('NorthwindDB'));
        return new ProductResource($mapper);
    }
}
