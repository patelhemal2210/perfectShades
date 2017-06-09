<?php

include_once "favourite_products.php";
include_once "business_object_base.php";

class FavouriteProductBO extends BusinessObjectBase
{
    const USER_ID = "user_id";
    const GLASSES_ID = "glasses_id";
    const TABLE_NAME = "favourite_products";

    private $favouriteProduct;

    /**
     * @return mixed
     */
    public function getFavouriteProduct()
    {
        return $this->favouriteProduct;
    }

    /**
     * @param mixed $favourite_product
     */
    public function setFavouriteProduct($favourite_product)
    {
        $this->favouriteProduct = $favourite_product;
    }


    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function __construct($c)
    {
        $this->setFavouriteProduct($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getFavouriteProduct()->getUserId()))
        {
            $column_values[self::USER_ID] = $this->getFavouriteProduct()->getUserId();
        }

        if(!empty($this->getFavouriteProduct()->getGlassesId()))
        {
            $column_values[self::GLASSES_ID] = $this->getFavouriteProduct()->getGlassesId();
        }

        return $column_values;
    }
}