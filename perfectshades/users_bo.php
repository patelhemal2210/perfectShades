<?php

include_once "users.php";
include_once "business_object_base.php";

class UsersBO extends BusinessObjectBase
{
    const ID = "id";
    const EMAIL = "email";
    const NAME = "name";
    const FACE_SHAPE_ID = "face_shape_id";
    const PASSWORD = "password";
    const ADMIN_PRIVILEGE= "admin_privilege";
    const TABLE_NAME = "users";

    private $users;

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


    public function getTableName()
    {
        return self::TABLE_NAME;
    }

    public function __construct($c)
    {
        $this->setUsers($c);
    }

    public function getDataSet()
    {
        $column_values = array();

        if(!empty($this->getUsers()->getId()))
        {
            $column_values[self::ID] = $this->getUsers()->getId();
        }

        if(!empty($this->getUsers()->getEmail()))
        {
            $column_values[self::EMAIL] = $this->getUsers()->getEmail();
        }

        if(!empty($this->getUsers()->getName()))
        {
            $column_values[self::NAME] = $this->getUsers()->getName();
        }

        if(!empty($this->getUsers()->getFaceShapeId()))
        {
            $column_values[self::FACE_SHAPE_ID] = $this->getUsers()->getFaceShapeId();
        }

        if(!empty($this->getUsers()->getPassword()))
        {
            $column_values[self::PASSWORD] = $this->getUsers()->getPassword();
        }

        if(!empty($this->getUsers()->getAdminPrivilege()))
        {
            $column_values[self::ADMIN_PRIVILEGE] = $this->getUsers()->getAdminPrivilege();
        }

        return $column_values;
    }

    function isValidUser(){
        $status = false;
        if($this->users != null) {
            $email = $this->users->getEmail();
            $password = $this->users->getPassword();
            if (!empty($email)) {
                $constraintList = array();
                $constraint1 = array(self::EMAIL, BusinessObjectBase::EQUAL, $email);
                $constraintList[] = $constraint1;

                $userList = parent::getSelectedData($constraintList);
                if ($userList != null) {
                    $user = (object)$userList[0];
                    if (password_verify($password, $user->password)) {
                        $status = true;
                    }
                }
            }
        }
        return $status;
    }

    function isExistingUser(){
        $status = false;
        if($this->users != null) {
            $email = $this->users->getEmail();
            if (!empty($email)) {
                $constraintList = array();
                $constraint1 = array(self::EMAIL, BusinessObjectBase::EQUAL, $email);
                $constraintList[] = $constraint1;

                $userList = parent::getSelectedData($constraintList);
                if ($userList != null) {
                    $status = true;
                }
            }
        }

        return $status;
    }


}