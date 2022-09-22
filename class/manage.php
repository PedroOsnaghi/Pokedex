<?php

class Manage{

    public function __construct()
    {
        $this->view = new View();
        $this->poke = new Pokemon();
    }

    public function search()
    {
         //Capturamos el valor a buscar por POST
         $value = isset($_POST['toSearch']) ? $_POST['toSearch'] : '';

         //si no se busco nada mostramos todo
         if (empty($value)){
             $param['pokemon'] = $this->poke->All();
         }else{
             //busca por numero
             $param['pokemon'] = $this->poke->searchByNumber($value);
 
             if(!sizeof($param['pokemon'])){
                  //busca por nombre
                  $param['pokemon'] = $this->poke->searchByName($value);
                  if(!sizeof($param['pokemon'])){
                     //busca por tipo
                     $param['pokemon'] = $this->poke->searchByType($value);
                     
                     if(!sizeof($param['pokemon'])){
                         $param = ['notFound' => true,
                                   'pokemon' => $this->poke->All()];
                     }  
                 } 
              }
         }
 
 
 
         
         $this->view->render('home', $param);
    }
}