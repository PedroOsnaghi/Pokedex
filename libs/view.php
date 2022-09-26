<?php

/**
 * View class
 * 
 * Clase que se encarga del renderizado de las vistas y gestion de mensages de tipo AppMsg
 */

class view{

    //almacena un AppMsg o AppMsg::MSG_NONE
    private $msg;
    //almacena un objeto
    private $object;
    //almacena una lista
    private $list = [];
    //almacena una lista de valores ingresados por el usuario en las vistas
    //y a recargar poder persistirlos en los input de los formularios
    private $value_list = [];
    //almacena false o el aministrador
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

    /**
     * funcion que se encarga de renderizar un mensaje en pantalla
     * discriminados por el objeto que lo envia.
     */
    public function showAlertFrom($from){
        if($this->msg && $this->msg->getFrom() == $from) include('./views/alert/alert.php');
    }

    /**
     * Funcion que setea el mensaje recibido para que luego
     * la funcion showAlertFrom la muestre por pantalla
     * 
     * @param AppMsg $app_msg Variable de tipo AppMsg
     * @return true si $app_msg = AppMsg::MSG_NONE
     */
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
     * 
     * @return void
     */
    public function render($nombreVista){
        
        
        //Si hay Session activa de administrador => $session_admin = username para que 
        //la vista presente controles de administrador
        //si no hay session activa se establece en false
        $this->session_admin = $this->session->getCurrentUser();  
     
        include_once('./views/' . $nombreVista . '.php');
    
    }

    
    /**
     * Funcion que renderiza las pantallas de error pudiendo enviar
     * el codigo de error por la url (para el caso de respuestas del servidor MySql)
     */
    public static function error($type, $err_code = 0)
    {
        if ($err_code)
            header("location: " . DIR_ROOT . "views/error/" . $type . ".php?code=" . $err_code
        );
        else
            header("location: " . DIR_ROOT . "views/error/" . $type . ".php");  
    }


}