<?php
/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 22/10/2016
 * Time: 8:17 PM
 */
class FacePairings
{
    private $categoryId;
    private $faceShapeId;

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->categoryId = $category_id;
    }

    /**
     * @return mixed
     */
    public function getFaceShapeId()
    {
        return $this->faceShapeId;
    }

    /**
     * @param mixed $face_shape_id
     */
    public function setFaceShapeId($face_shape_id)
    {
        $this->faceShapeId = $face_shape_id;
    }

}