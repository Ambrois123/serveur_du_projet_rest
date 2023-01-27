<?php

include ('./app/models/UsersModel.php');
include ('./app/config/Database.php');

$database = new Database();
$db = $database->getConnexion();

$users = new UsersModel($db, null, null, null, null, null, null);
$UsersModels->readUsers();