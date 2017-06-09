<?php
/**
 * Created by PhpStorm.
 * User: Hemal Patel
 * Date: 22/10/2016
 * Time: 8:27 PM
 */
class Users
{
    private $id;
    private $email;
    private $name;
    private $faceShapeId;
    private $password;
    private $adminPrivilege;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password, $generateHash = true)
    {
        if($generateHash)
            $this->password = password_hash($password,PASSWORD_DEFAULT);
        else
            $this->password = $password;

    }

    /**
     * @return mixed
     */
    public function getAdminPrivilege()
    {
        return $this->adminPrivilege;
    }

    /**
     * @param mixed $admin_privilege
     */
    public function setAdminPrivilege($admin_privilege)
    {
        $this->adminPrivilege = $admin_privilege;
    }

}