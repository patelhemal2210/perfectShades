<?php
/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 22/10/2016
 * Time: 8:28 PM
 */

class WebResources
{
    private $glassesId;
    private $url;
    private $asin;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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

    /**
     * @return mixed
     */
    public function getASIN()
    {
        return $this->asin;
    }

    /**
     * @param mixed $ASIN
     */
    public function setASIN($asin)
    {
        $this->asin = $asin;
    }

}