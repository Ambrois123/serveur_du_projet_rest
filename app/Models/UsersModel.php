<?php


class UsersModel 
{
    //propriétés de la BDD
    private $connexion;


    //propeiétés de la table users
    protected $user_id;
    protected $user_email;
    protected $user_role;
    protected $user_password;
    protected $user_phone;
    protected $user_gender;

    public function __construct($db,$user_id, $user_email, $user_role, $user_password, $user_phone, $user_gender)
    {
        $this->connexion = $db;
        $this->user_id = $user_id;
        $this->user_email = $user_email;
        $this->user_role = $user_role;
        $this->user_password = $user_password;
        $this->user_phone = $user_phone;
        $this->user_gender = $user_gender;
    }

    public function _get($name){
        return match($name){
            "user_id" => $this->user_id,
            "user_email" => $this->user_email,
            "user_role" => $this->user_role,
            "user_password" => "********",
            "user_phone" => $this->user_phone,
            "user_gender"   =>$this->user_gender,
            default=>null
        };
    }

    public function __set($name, $value)
    {
        return match($name){
            "user_id" => $this->user_id = $value,
            "user_email" => $this->user_email = $value,
            "user_role" => $this->user_role = $value,
            "user_password" => $this->user_password = password_hash($value, PASSWORD_BCRYPT),
            "user_phone" => $this->user_phone = $value,
            "user_gender" => $this->user_gender = $value,
            default => $this->$name = $value
        };
    }


    public function readUsers()
    {
        $req = "SELECT * FROM users";
        $stmt = $this->connexion->prepare($req);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}