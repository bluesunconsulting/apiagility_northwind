<?php
return [
    'router' => [
        'routes' => [
            'northwind.rpc.get-employee-territory' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/getemployeeterritory',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rpc\\GetEmployeeTerritory\\Controller',
                        'action' => 'getEmployeeTerritory',
                    ],
                ],
            ],
            'northwind.rest.supplier' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/supplier[/:supplier_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\Supplier\\Controller',
                    ],
                ],
            ],
            'northwind.rest.employee' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/employee[/:employee_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\Employee\\Controller',
                    ],
                ],
            ],
            'northwind.rest.customer' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/customer[/:customer_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\Customer\\Controller',
                    ],
                ],
            ],
            'northwind.rest.order-detail' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/order-detail[/:order_detail_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\OrderDetail\\Controller',
                    ],
                ],
            ],
            'northwind.rest.order' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/order[/:order_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\Order\\Controller',
                    ],
                ],
            ],
            'northwind.rest.product' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/product[/:product_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\Product\\Controller',
                    ],
                ],
            ],
            'northwind.rest.order-detail-product' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/order-detail-product[/:order_detail_product_id]',
                    'defaults' => [
                        'controller' => 'Northwind\\V1\\Rest\\OrderDetailProduct\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            2 => 'northwind.rpc.get-employee-territory',
            4 => 'northwind.rest.supplier',
            0 => 'northwind.rest.employee',
            6 => 'northwind.rest.customer',
            8 => 'northwind.rest.order-detail',
            9 => 'northwind.rest.order',
            10 => 'northwind.rest.product',
            11 => 'northwind.rest.order-detail-product',
        ],
    ],
    'zf-rest' => [
        'Northwind\\V1\\Rest\\Supplier\\Controller' => [
            'listener' => \Northwind\V1\Rest\Supplier\SupplierResource::class,
            'route_name' => 'northwind.rest.supplier',
            'route_identifier_name' => 'supplier_id',
            'collection_name' => 'supplier',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\Supplier\SupplierEntity::class,
            'collection_class' => \Northwind\V1\Rest\Supplier\SupplierCollection::class,
            'service_name' => 'Supplier',
        ],
        'Northwind\\V1\\Rest\\Employee\\Controller' => [
            'listener' => \Northwind\V1\Rest\Employee\EmployeeResource::class,
            'route_name' => 'northwind.rest.employee',
            'route_identifier_name' => 'employee_id',
            'collection_name' => 'employee',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\Employee\EmployeeEntity::class,
            'collection_class' => \Northwind\V1\Rest\Employee\EmployeeCollection::class,
            'service_name' => 'Employee',
        ],
        'Northwind\\V1\\Rest\\Customer\\Controller' => [
            'listener' => \Northwind\V1\Rest\Customer\CustomerResource::class,
            'route_name' => 'northwind.rest.customer',
            'route_identifier_name' => 'customer_id',
            'collection_name' => 'customer',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\Customer\CustomerEntity::class,
            'collection_class' => \Northwind\V1\Rest\Customer\CustomerCollection::class,
            'service_name' => 'Customer',
        ],
        'Northwind\\V1\\Rest\\OrderDetail\\Controller' => [
            'listener' => \Northwind\V1\Rest\OrderDetail\OrderDetailResource::class,
            'route_name' => 'northwind.rest.order-detail',
            'route_identifier_name' => 'order_detail_id',
            'collection_name' => 'order_detail',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'OrderId',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\OrderDetail\OrderDetailEntity::class,
            'collection_class' => \Northwind\V1\Rest\OrderDetail\OrderDetailCollection::class,
            'service_name' => 'OrderDetail',
        ],
        'Northwind\\V1\\Rest\\Order\\Controller' => [
            'listener' => \Northwind\V1\Rest\Order\OrderResource::class,
            'route_name' => 'northwind.rest.order',
            'route_identifier_name' => 'order_id',
            'collection_name' => 'order',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\Order\OrderEntity::class,
            'collection_class' => \Northwind\V1\Rest\Order\OrderCollection::class,
            'service_name' => 'Order',
        ],
        'Northwind\\V1\\Rest\\Product\\Controller' => [
            'listener' => \Northwind\V1\Rest\Product\ProductResource::class,
            'route_name' => 'northwind.rest.product',
            'route_identifier_name' => 'product_id',
            'collection_name' => 'product',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\Product\ProductEntity::class,
            'collection_class' => \Northwind\V1\Rest\Product\ProductCollection::class,
            'service_name' => 'Product',
        ],
        'Northwind\\V1\\Rest\\OrderDetailProduct\\Controller' => [
            'listener' => \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductResource::class,
            'route_name' => 'northwind.rest.order-detail-product',
            'route_identifier_name' => 'order_detail_product_id',
            'collection_name' => 'order_detail_product',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductEntity::class,
            'collection_class' => \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductCollection::class,
            'service_name' => 'OrderDetailProduct',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Northwind\\V1\\Rpc\\GetEmployeeTerritory\\Controller' => 'Json',
            'Northwind\\V1\\Rest\\Supplier\\Controller' => 'HalJson',
            'Northwind\\V1\\Rest\\Employee\\Controller' => 'HalJson',
            'Northwind\\V1\\Rest\\Customer\\Controller' => 'HalJson',
            'Northwind\\V1\\Rest\\OrderDetail\\Controller' => 'HalJson',
            'Northwind\\V1\\Rest\\Order\\Controller' => 'HalJson',
            'Northwind\\V1\\Rest\\Product\\Controller' => 'HalJson',
            'Northwind\\V1\\Rest\\OrderDetailProduct\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Northwind\\V1\\Rpc\\GetEmployeeTerritory\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Northwind\\V1\\Rest\\Supplier\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Employee\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Customer\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\OrderDetail\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Order\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\OrderDetailProduct\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Northwind\\V1\\Rpc\\GetEmployeeTerritory\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Supplier\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Employee\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Customer\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\OrderDetail\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Order\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
            'Northwind\\V1\\Rest\\OrderDetailProduct\\Controller' => [
                0 => 'application/vnd.northwind.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Northwind\V1\Rest\Supplier\SupplierEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.supplier',
                'route_identifier_name' => 'supplier_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\Supplier\SupplierCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.supplier',
                'route_identifier_name' => 'supplier_id',
                'is_collection' => true,
            ],
            \Northwind\V1\Rest\Employee\EmployeeEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.employee',
                'route_identifier_name' => 'employee_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\Employee\EmployeeCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.employee',
                'route_identifier_name' => 'employee_id',
                'is_collection' => true,
            ],
            'Northwind\\V1\\Rest\\Customer2\\CustomerCollection' => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.customer2',
                'route_identifier_name' => 'customer_id',
                'is_collection' => true,
            ],
            \Northwind\V1\Rest\Customer\CustomerEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.customer',
                'route_identifier_name' => 'customer_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\Customer\CustomerCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.customer',
                'route_identifier_name' => 'customer_id',
                'is_collection' => true,
            ],
            \Northwind\V1\Rest\OrderDetail\OrderDetailEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.order-detail',
                'route_identifier_name' => 'order_detail_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\OrderDetail\OrderDetailCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.order-detail',
                'route_identifier_name' => 'order_detail_id',
                'is_collection' => true,
            ],
            \Northwind\V1\Rest\Order\OrderEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.order',
                'route_identifier_name' => 'order_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\Order\OrderCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.order',
                'route_identifier_name' => 'order_id',
                'is_collection' => true,
            ],
            \Northwind\V1\Rest\Product\ProductEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.product',
                'route_identifier_name' => 'product_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\Product\ProductCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.product',
                'route_identifier_name' => 'product_id',
                'is_collection' => true,
            ],
            \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductEntity::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.order-detail-product',
                'route_identifier_name' => 'order_detail_product_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductCollection::class => [
                'entity_identifier_name' => 'Id',
                'route_name' => 'northwind.rest.order-detail-product',
                'route_identifier_name' => 'order_detail_product_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [],
    ],
    'zf-content-validation' => [],
    'input_filter_specs' => [
        'Northwind\\V1\\Rest\\Employee\\Validator' => [
            0 => [
                'name' => 'Id',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'LastName',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'FirstName',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'Title',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'TitleOfCourtesy',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'BirthDate',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            6 => [
                'name' => 'HireDate',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            7 => [
                'name' => 'Address',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            8 => [
                'name' => 'City',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            9 => [
                'name' => 'Region',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            10 => [
                'name' => 'PostalCode',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            11 => [
                'name' => 'Country',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            12 => [
                'name' => 'HomePhone',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            13 => [
                'name' => 'Extension',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            14 => [
                'name' => 'Photo',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            15 => [
                'name' => 'Notes',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            16 => [
                'name' => 'ReportsTo',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            17 => [
                'name' => 'PhotoPath',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'Northwind\\V1\\Rest\\EmployeeTerritory\\Validator' => [
            0 => [
                'name' => 'Id',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'EmployeeId',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'TerritoryId',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Northwind\\V1\\Rpc\\GetEmployeeTerritory\\Controller' => \Northwind\V1\Rpc\GetEmployeeTerritory\GetEmployeeTerritoryControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'Northwind\\V1\\Rpc\\GetEmployeeTerritory\\Controller' => [
            'service_name' => 'getEmployeeTerritory',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'northwind.rpc.get-employee-territory',
        ],
    ],
    'service_manager' => [
        'factories' => [
            \Northwind\V1\Rest\Supplier\SupplierResource::class => \Northwind\V1\Rest\Supplier\SupplierResourceFactory::class,
            \Northwind\V1\Rest\Employee\EmployeeResource::class => \Northwind\V1\Rest\Employee\EmployeeResourceFactory::class,
            \Northwind\V1\Rest\Customer\CustomerResource::class => \Northwind\V1\Rest\Customer\CustomerResourceFactory::class,
            \Northwind\V1\Rest\OrderDetail\OrderDetailResource::class => \Northwind\V1\Rest\OrderDetail\OrderDetailResourceFactory::class,
            \Northwind\V1\Rest\Order\OrderResource::class => \Northwind\V1\Rest\Order\OrderResourceFactory::class,
            \Northwind\V1\Rest\Product\ProductResource::class => \Northwind\V1\Rest\Product\ProductResourceFactory::class,
            \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductResource::class => \Northwind\V1\Rest\OrderDetailProduct\OrderDetailProductResourceFactory::class,
        ],
    ],
];
