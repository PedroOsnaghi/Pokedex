<?php

class view{

    

    private $data;
    private $msg;
    private $object;
    private $list = [];
    private $value_list = [];
   
    private $session_admin;
    
    

    public function __construct(){
        $this->session = new Session();
       
        $this->session_admin = false;
    }

    public function setObject($obj){
        $this->object = $obj;
    }

    public function setList($list){
        $this->list = $list;
    }

    public function setSessionAdmin($session){
        $this->session_admin = $session;
    }

    public function showAlertFrom($from){
        if($this->msg && $this->msg->getFrom() == $from) include('./views/alert/alert.php');
    }

    public function sendMessage($app_msg){
        
        if ($app_msg == AppMsg::MSG_NONE) return true;

        //setea el mensaje
        $this->msg = $app_msg;
    }

    public function setInputValues($values){
      
        $this->value_list['values'] = $values;
    }



    /**
     * @param string $nombreVista Nombre del Archivo Vista sin extension.
     * @param Array $dato Arreglo de envio de datos a vista.
     * @return void
     */
    public function render($nombreVista){
        
        
        //Si hay Session activa de administrador => $session_admin = username para que 
        //la vista presente controles de administrador
        //si no hay session activa se establece en false
        $this->session_admin = $this->session->getCurrentUser();  
     
        include_once('./views/' . $nombreVista . '.php');
    
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