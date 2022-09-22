<?php



class User extends DB{

    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }

    //SETTERS

    public function setUserName($value){
        $this->username = $value;
    }

    public function setPassword($value){
        $this->password = $value;
    }


    public function Authenticate(){

        $query_result = $this->query("SELECT * FROM usuario WHERE nombre = '" . $this->username . "' AND pwd = '" . $this->password . "'");

        $auth = $query_result->fetch_assoc();

        return $auth ? true : false;
    }

}
