<?php

include_once "webresources.php";
include_once "business_object_base.php";

class WebResourcesBO extends BusinessObjectBase
{
    const GLASSES_ID = "glasses_id";
    const URL = "url";
    const ASIN = "ASIN";
    const TABLE_NAME = "web_resources";

    private $webResources;

    /**
     * @return mixed
     */
    public function getWebResources()
    {
        return $this->webResources;
    }

    /**
     * @param mixed $webResources
     */
    public function setWebResources($web_resources)
    {
        $this->webResources = $web_resources;
    }

    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function __construct($c)
    {
        $this->setWebResources($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getWebResources()->getGlassesId()))
        {
            $column_values[self::GLASSES_ID] = $this->getWebResources()->getGlassesId();
        }

        if(!empty($this->getWebResources()->getUrl()))
        {
            $column_values[self::URL] = $this->getWebResources()->getUrl();
        }

        if(!empty($this->getWebResources()->getASIN()))
        {
            $column_values[self::ASIN] = $this->getWebResources()->getASIN();
        }

        return $column_values;
    }
}