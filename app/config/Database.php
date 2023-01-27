<?php

class Database{
    private $host = "localhost";
    private $dbname = "restaurant_server";
    private $username = "projet_restr";
    private $password = "Dev_Projet_Restaurant";
    private $connexion;

    public function getConnexion(){
        $this->connexion = null;
        try{
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie";
            
        }catch(PDOException $e){
            echo "Erreur de connexion : " . $e->getMessage();
        }
        return $this->connexion;
    }
}

