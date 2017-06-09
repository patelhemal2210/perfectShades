<?php

/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 25/10/2016
 * Time: 11:45 PM
 */

include_once "categories.php";
include_once "business_object_base.php";

class CategoriesBO extends BusinessObjectBase
{

    const ID = "id";
    const NAME = "name";
    const TABLE_NAME = "categories";
    private $categories;

    public function getTableName()
    {
        return self::TABLE_NAME;
    }
    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function __construct($c)
    {
        $this->setCategories($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getCategories()->getId()))
        {
            $column_values[self::ID] = $this->getCategories()->getId();
        }

        if(!empty($this->getCategories()->getName()))
        {
            $column_values[self::NAME] = $this->getCategories()->getName();
        }
        return $column_values;
    }
}
