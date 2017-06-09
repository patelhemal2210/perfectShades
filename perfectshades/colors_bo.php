<?php

include_once "colors.php";
include_once "business_object_base.php";

class ColorsBO extends BusinessObjectBase
{

    const ID = "id";
    const DESCRIPTION = "description";
    const TABLE_NAME = "colors";

    private $color;

    /**
     * @return mixed
     */

    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    public function __construct($c)
    {
        $this->setColor($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getColor()->getId()))
        {
            $column_values[self::ID] = $this->getColor()->getId();
        }

        if(!empty($this->getColor()->getDescription()))
        {
            $column_values[self::DESCRIPTION] = $this->getColor()->getDescription();
        }

        return $column_values;
    }

}