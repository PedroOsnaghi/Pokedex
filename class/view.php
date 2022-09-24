<?php

class view{

    private $data;
    

    public function __construct(){
        $this->session = new Session();
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
        $this->data['session'] = $this->session->getCurrentUser();  
     
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