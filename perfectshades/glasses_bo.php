<?php

include_once "glasses.php";
include_once "business_object_base.php";

class GlassesBO extends BusinessObjectBase
{
    const ID = "id";
    const CATEGORY_ID = "category_id";
    const MANUFACTURER_ID = "manufacturer_id";
    const MODEL_NUMBER = "model_number";
    const COLOR_ID = "color_id";
    const GENDER = "gender";
    const DESCRIPTION = "description";
    const PRICE = "price";
    const TABLE_NAME = "glasses";

    private $glass;

    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function __construct($g)
    {
        $this->setGlass($g);
    }

    /**
     * @return mixed
     */
    public function getGlass()
    {
        return $this->glass;
    }

    /**
     * @param mixed $glass
     */
    public function setGlass($glass)
    {
        $this->glass = $glass;
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getGlass()->getId()))
        {
            $column_values[self::ID] = $this->getGlass()->getId();
        }

        if(!empty($this->getGlass()->getCategoryId()))
        {
            $column_values[self::CATEGORY_ID] = $this->getGlass()->getCategoryId();
        }

        if(!empty($this->getGlass()->getManufacturerId()))
        {
            $column_values[self::MANUFACTURER_ID] = $this->getGlass()->getManufacturerId();
        }

        if(!empty($this->getGlass()->getModelNumber()))
        {
            $column_values[self::MODEL_NUMBER] = $this->getGlass()->getModelNumber();
        }


        if(!empty($this->getGlass()->getColorId()))
        {
            $column_values[self::COLOR_ID] = $this->getGlass()->getColorId();
        }

        if(!empty($this->getGlass()->getGender()))
        {
            $column_values[self::GENDER] = $this->getGlass()->getGender();
        }

        if(!empty($this->getGlass()->getDescription()))
        {
            $column_values[self::DESCRIPTION] = $this->getGlass()->getDescription();
        }

        if(!empty($this->getGlass()->getPrice()))
        {
            $column_values[self::PRICE] = $this->getGlass()->getPrice();
        }

        return $column_values;
    }
}