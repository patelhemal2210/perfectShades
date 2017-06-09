<?php

/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 26/10/2016
 * Time: 2:24 AM
 */
include_once "data_access.php";
include_once "ibusiness_object.php";

class BusinessObjectBase extends DataAccess implements iBusinessObject
{
    const EQUAL = "=";
    const GREATERTHAN = ">";
    const GREATERTHANEQUALTO = ">=";
    const LESSTHAN = "<";
    const LESSTHANEQUALTO = "<=";

    const ANDOPERATOR = "AND";
    const OROPERATOR = "OR";


    public function updateTable($constraint)
    {
        return parent::update($this->getTableName(), $this->getDataSet(), $constraint);
    }

    public function getAllData()
    {
        return parent::getAll($this->getTableName());
    }

    public function deleteFromTable($constraint)
    {
        return parent::delete($this->getTableName(), $constraint);
    }

    public function insertIntoTable()
    {
        return parent::insert($this->getTableName(), $this->getDataSet());
    }

    public function getSelectedData($constraint)
    {
        return parent::getSelected($this->getTableName(), $constraint);
    }
}