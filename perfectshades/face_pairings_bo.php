<?php

include_once "face_pairings.php";
include_once "business_object_base.php";

class FacePairingsBO extends BusinessObjectBase
{
    const CATEGORY_ID = "category_id";
    const FACE_SHAPE_ID = "face_shape_id";
    const TABLE_NAME = "face_pairings";

    private $facePairings;

    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @return mixed
     */
    public function getFacePairings()
    {
        return $this->facePairings;
    }

    /**
     * @param mixed $facePairings
     */
    public function setFacePairings($facePairings)
    {
        $this->facePairings = $facePairings;
    }

    public function __construct($c)
    {
        $this->setFacePairings($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getFacePairings()->getCategoryId()))
        {
            $column_values[self::CATEGORY_ID] = $this->getFacePairings()->getCategoryId();
        }

        if(!empty($this->getFacePairings()->getFaceShapeId()))
        {
            $column_values[self::FACE_SHAPE_ID] = $this->getFacePairings()->getFaceShapeId();
        }

        return $column_values;
    }
}