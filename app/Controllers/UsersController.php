<?php

include ('./app/models/UsersModel.php');

class UsersController
{
    private $UsersModel;
    
    public function _construct()
    {
        $this->UsersModel = new UsersModel(null, null, null, null, null, null, null);
    }
    
    public function getUsers()
    {
        $result = $this->UsersModel->readUsers();
        return $result;
    }
}

// Path: app\Controllers\UsersController.php
