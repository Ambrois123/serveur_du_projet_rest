<?php
require_once 'pdoconfig.php';

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connexion réussie";
}catch(PDoException $e){
    die ("Connexion impossible à la BDD :" . $e->getMessage());
    $e->getMessage();
}