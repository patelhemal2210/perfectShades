<?php
/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 22/10/2016
 * Time: 8:23 PM
 */


class Glasses
{
    private $id;
    private $categoryId;
    private $manufacturerId;
    private $modelNumber;
    private $colorId;
    private $gender;
    private $description;
    private $price;

    function __construct() {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
    public function getManufacturerId()
    {
        return $this->manufacturerId;
    }

    /**
     * @param mixed $manufacturer_id
     */
    public function setManufacturerId($manufacturer_id)
    {
        $this->manufacturerId = $manufacturer_id;
    }

    /**
     * @return mixed
     */
    public function getModelNumber()
    {
        return $this->modelNumber;
    }

    /**
     * @param mixed $model_number
     */
    public function setModelNumber($model_number)
    {
        $this->modelNumber = $model_number;
    }

    /**
     * @return mixed
     */
    public function getColorId()
    {
        return $this->colorId;
    }

    /**
     * @param mixed $color_id
     */
    public function setColorId($color_id)
    {
        $this->colorId = $color_id;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}
