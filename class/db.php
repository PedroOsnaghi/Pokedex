<?php




class DB{

    private $host;
    private $dbname;
    private $user;
    private $pwd;
    private $port;

    protected $connection;


    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        //abrimos archivo de configuracion
        $config = parse_ini_file("./config/config.ini");

        //seteamos valores
        $this->host = $config['HOST'];
        $this->dbname = $config['DATABASE'];
        $this->user = $config['USERNAME'];
        $this->pwd = $config['PASS'];
        $this->port = $config['PORT'];

        try {
            //code...
            $this->connection = new mysqli($this->host, $this->user, $this->pwd, $this->dbname, $this->port);
        } catch (mysqli_sql_exception $err) {
             
            view::error('connect-error', $err->getCode());
        }
        

        //if($this->connection->connect_errno > 0)
           
      
        return $this->connection;
        

        

    }

    public function query($sql_query){
        $result = $this->connection->query($sql_query);
        return $result;
    }

}