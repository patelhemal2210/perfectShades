<?php
/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 22/10/2016
 * Time: 8:21 PM
 */
class FavouriteProducts
{
    private $userId;
    private $glassesId;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->userId = $user_id;
    }

    /**
     * @return mixed
     */
    public function getGlassesId()
    {
        return $this->glassesId;
    }

    /**
     * @param mixed $glasses_id
     */
    public function setGlassesId($glasses_id)
    {
        $this->glassesId = $glasses_id;
    }

}