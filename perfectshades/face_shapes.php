<?php
/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 22/10/2016
 * Time: 8:20 PM
 */
class FaceShapes
{
    private $id;
    private $shape;

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
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * @param mixed $shape
     */
    public function setShape($shape)
    {
        $this->shape = $shape;
    }

}