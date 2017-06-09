<?php

include_once "face_shapes.php";
include_once "business_object_base.php";

class FaceShapesBO extends BusinessObjectBase
{
    const ID = "id";
    const SHAPE = "shape";
    const TABLE_NAME = "face_shapes";

    private $faceShapes;

    /**
     * @return mixed
     */
    public function getFaceShapes()
    {
        return $this->faceShapes;
    }

    /**
     * @param mixed $faceshapes
     */
    public function setFaceShapes($face_shapes)
    {
        $this->faceShapes = $face_shapes;
    }

    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @return mixed
     */


    public function __construct($c)
    {
        $this->setFaceShapes($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getFaceShapes()->getId()))
        {
            $column_values[self::ID] = $this->getFaceShapes()->getId();
        }

        if(!empty($this->getFaceShapes()->getShape()))
        {
            $column_values[self::SHAPE] = $this->getFaceShapes()->getShape();
        }

        return $column_values;
    }
}