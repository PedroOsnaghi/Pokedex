<?php

require_once('./autoload.php');


class User extends DB{

    private $nombre_usuario;
    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }

    public function exist(){
        echo "entraste al metodo Exist()";
    }

    public function getUserName($id){

        $query_result = $this->query("SELECT name FROM user WHERE id =" . $this->connection->real_escape_string($id));
        
        $rows = $query_result->fetch_assoc();

        echo $rows['name'];
    }

    public function Validate(){
        
    }

}
