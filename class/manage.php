<?php

class Manage{

    public function __construct()
    {
        $this->view = new View();
        $this->poke = new Pokemon();
        $this->session = new Session();
        $this->file = new File();
    }

    public function init($param)
    {
        $param['imagen'] = $this->file->getUploadedFileName();
        $param['pokemon'] = $this->poke->All();
        $this->view->render('home', $param);
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
                         $param = ['message' =>[
                                                'type' => 'info',
                                                'msg'  => 'Pokemon no encontrado.'
                                                ],
                                   'pokemon' => $this->poke->All()];
                     }  
                 } 
              }
         }
 
         $this->view->render('home', $param);
    }

    public function get($id)
    {
        $param['pokemon'] = $this->poke->getById($id);
        $this->view->render('details', $param);
        
    }

    public function delete($id)
    {
        if($this->adminVerify())
        {
            $res = $this->poke->delete($id);
            
            if($res)
            {
                $param = ['message' =>[
                                        'type' => 'success',
                                        'msg'  => 'Registro eliminado con éxito'
                                      ]
                         ];
            }
            else
            {
                $param = ['message' =>[
                                        'type' => 'error',
                                        'msg'  => 'No se pudo eliminar el registro'
                                    ]
                        ];
            }

            $this->init($param);
           
        }

    }

    public function add()
    {

       $this->view->render('add');

    }

    public function modify()
    {

    }

    public function update()
    {

    }

    public function save(){
         //obtenemos la imagen subida
         $res = $this->file->upload();
         
         echo var_dump($res);

         if($res){
            $param = [$res, 'values' => [
                                            'numero' => $_POST['numero'],
                                            'nombre' => $_POST['nombre'],
                                            'desc'   => $_POST['descripcion'],
                                            'tipo'   => $_POST['tipo'] 
                                        ]
                     ];
                     echo var_dump($param);
                     
            $this->view->render('add', $param);
         }
        
         return false;
         //obtenemos los datos del formulario por POST y seteamos el objeto
         $this->poke->setNumber($_POST['numero']);
         $this->poke->setName($_POST['nombre']);
         $this->poke->setDescription($_POST['descripcion']);
         $this->poke->setType($_POST['tipo']);
         $this->poke->setFile_Image($this->file->getUploadFileName());
    }

    private function adminVerify(){
        if (!$this->session->getCurrentUser()) 
            $this->view->render('acces-error');
        else
            return true;    
    }
}