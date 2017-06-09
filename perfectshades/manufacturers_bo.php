<?php

include_once "manufacturers.php";
include_once "business_object_base.php";

class ManufacturersBO extends BusinessObjectBase
{
    const ID = "id";
    const NAME = "name";
    const WEBSITE = "website";
    const TABLE_NAME = "manufacturers";

    private $manufacturers;

    /**
     * @return mixed
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    /**
     * @param mixed $manufacturers
     */
    public function setManufacturers($manufacturers)
    {
        $this->manufacturers = $manufacturers;
    }


    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function __construct($c)
    {
        $this->setManufacturers($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getManufacturers()->getId()))
        {
            $column_values[self::ID] = $this->getManufacturers()->getId();
        }

        if(!empty($this->getManufacturers()->getName()))
        {
            $column_values[self::NAME] = $this->getManufacturers()->getName();
        }

        if(!empty($this->getManufacturers()->getWebsite()))
        {
            $column_values[self::WEBSITE] = $this->getManufacturers()->getWebsite();
        }

        return $column_values;
    }
}