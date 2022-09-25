<?php

class view{

    const MSG_INFO = 0;
    const MSG_DANGER = 1;
    const MSG_SUCCESS = 2

    private $data;

    private $object;
    private $list;
    private $message;
    private $msg_from;
    private $msg_type;
    private $session_admin;
    
    

    public function __construct(){
        $this->session = new Session();
        $this->msg_from = null;
        $this->message = '';
        $this->msg_from = '';
        $this->session_admin = false;
    }

    public function setObject($obj){
        $this->object = $obj;
    }

    public function setList($list){
        $this->list = $list;
    }

    public function showAlertFrom($from){
        if($this->msg_from == $from) include('./views/alert/alert.php');
    }

    public function sendMessage($from, $message, $type = view::MSG_INFO){
        $this->msg_from = get_class($from);
        $this->msg_type = $type;
        $this->message = $message;
    }





    /**
     * @param string $nombreVista Nombre del Archivo Vista sin extension.
     * @param Array $dato Arreglo de envio de datos a vista.
     * @return void
     */
    public function render($nombreVista, $dato = []){
        
        $this->data = $dato;
        //Si hay Session activa de administrador => $data['session'] = username para que 
        //la vista presente controles de administrador
        //si no hay session activa se establece en false
        $this->session_admin = $this->session->getCurrentUser();  
     
        include_once('./views/' . $nombreVista . '.php');
    
    }

    public function index($dato = []){
        $this->render('home', $dato);
    }

    public static function error($type, $err_code = 0)
    {
        if ($err_code)
            header("location: " . DIR_ROOT . "views/error/" . $type . ".php?code=" . $err_code
        );
        else
            header("location: " . DIR_ROOT . "views/error/" . $type . ".php");  
    }


}