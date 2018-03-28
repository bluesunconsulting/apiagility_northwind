<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Brissette
 * Date: 3/27/2018
 * Time: 10:09 AM
 */

namespace Northwind\V1\Rest\Employee;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Paginator\Adapter\DbTableGateway;
//use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
//use Zend\Db\Sql\Sql;
//use Northwind\V1\Rest\Employee\EmployeeEntity;
//use Northwind\V1\Rest\Employee\EmployeeCollection;
//use Zend\Hydrator\ArraySerializable;

class EmployeeMapper
{
    protected $adapter;
    protected $fieldList;

    public function __construct(AdapterInterface $adapter)
    {
        $this->fieldList = [
            'Id',
            'LastName',
            'FirstName',
            'Title',
            'TitleOfCourtesy',
            'BirthDate',
            'HireDate',
            'Address',
            'City',
            'Region',
            'PostalCode',
            'Country',
            'HomePhone',
            'Extension',
            'Photo',
            'Notes',
            'ReportsTo',
            'PhotoPath',
        ];

        $resultSet = new HydratingResultSet();
        $resultSet->setObjectPrototype(new EmployeeEntity());
        $this->table = new TableGateway('Employee', $adapter, null, $resultSet);
    }

    public function getAllEmployee()
    {
        $dbTableGatewayAdapter = new DbTableGateway($this->table);
        $paginator = new Paginator($dbTableGatewayAdapter);
        return $paginator;
    }

    public function getEmployee($EmployeeId)
    {
        $rowset = $this->table->select(array('Id' => $EmployeeId));
        $Employee = $rowset->current();
        return $Employee;
    }

    public function addEmployee($Employee)
    {
        $data = $this->getArray($Employee);
        try {
            $this->table->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $this->table->lastInsertValue));
        return $rowset->current();
    }

    public function updateEmployee($Id, $Employee)
    {
        $data = $this->getArray($Employee);
        try {
            $this->table->update($data, array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        $rowset = $this->table->select(array('Id' => $Id));
        return $rowset->current();
    }

    public function deleteEmployee($Id)
    {
        try {
            $result = $this->table->delete(array('Id' => $Id));
        } catch (\Exception $e) {
            return false;
        }
        return ($result > 0);
    }

    protected function getArray($object)
    {
        $data = array();

        foreach($this->fieldList as $fieldname) {

            if (isset($object->{$fieldname})) {
                $data[$fieldname] = $object->{$fieldname};
            }
        }
        return $data;
    }
}