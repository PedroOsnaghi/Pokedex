<?php

require_once('autoload.php');

class DB{

    private $host;
    private $dbname;
    private $user;
    private $pwd;
    private $port;

    protected $connection;


    public function __construct()
    {
        //abrimos archivo de configuracion
        $config = parse_ini_file("./config/config.ini");

        //seteamos valores
        $this->host = $config['HOST'];
        $this->dbname = $config['DATABASE'];
        $this->user = $config['USERNAME'];
        $this->pwd = $config['PASS'];
        $this->port = $config['PORT'];

        
        $this->connection = new mysqli($this->host, $this->user, $this->pwd, $this->dbname, $this->port);
      
        return $this->connection;
        

        

    }

    public function query($sql_query){
        $result = $this->connection->query($sql_query);
        return $result;
    }

}