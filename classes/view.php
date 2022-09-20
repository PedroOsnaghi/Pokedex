<?php

class view{

    private $data;

    public function __construct(){

    }

    public function render($nombreVista, $dato = []){
        
        $this->data = $dato;

        include_once('./views/' . $nombreVista . '.php');
    
    }


}