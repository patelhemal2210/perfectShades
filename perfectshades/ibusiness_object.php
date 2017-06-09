<?php

/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 25/10/2016
 * Time: 11:35 PM
 */
interface iBusinessObject
{
    public function updateTable($constraint);
    public function getAllData();
    public function deleteFromTable($constraint);
    public function insertIntoTable();
    public function getSelectedData($constraint);
}