<?php

class Manage{

    public function __construct()
    {
        $this->view = new View();
        $this->poke = new Pokemon();
        $this->session = new Session();
        $this->file = new File();
        $conf = parse_ini_file("./config/config.ini");
        $this->tipo_pok_folder = $conf['TIPO_FILE_FOLDER'];
    }

    public function init($param)
    {
        $param['pokemon'] = $this->poke->All();
        $param['upload_folder'] = $this->file->getUploadFolder();
        $param['tipo_folder'] = $this->tipo_pok_folder;
        $this->view->render('home', $param);
    }

    public function search()
    {
         //Capturamos el valor a buscar por POST
         $value = isset($_POST['toSearch']) ? $_POST['toSearch'] : '';
         
         $param['value'] = $value;
         $param['upload_folder'] = $this->file->getUploadFolder();
         $param['tipo_folder'] = $this->tipo_pok_folder;
      
         //si no se busco nada mostramos todo
         if (empty($value)){
             $param['pokemon'] = $this->poke->All();
         }else{
             //busca por numero
             $param['pokemon'] = $this->poke->searchByAll($value);
 
             if(!sizeof($param['pokemon'])){
                 
                 $param['message'] = [
                                        'type' => 'info',
                                        'msg'  => 'Pokemon no encontrado.',
                                        'from' => 'manage' ];
                 $param['pokemon'] = $this->poke->All();
              }
         }
         
         $this->view->render('home', $param);
    }

    public function get($id)
    {
        $param['pokemon'] = $this->poke->getById($id);
        $param['upload_folder'] = $this->file->getUploadFolder();
        $param['tipo_folder'] = $this->tipo_pok_folder;
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
                                        'msg'  => 'Registro eliminado con éxito',
                                        'from' => 'manage'
                                      ]
                         ];
            }
            else
            {
                $param = ['message' =>[
                                        'type' => 'error',
                                        'msg'  => 'No se pudo eliminar el registro',
                                        'from' => 'manage'
                                    ]
                        ];
                        $this->view->sendMessage($this, 'Hola munso', view::MSG_SUCCESS);
            }

            $this->init($param);
           
        }

    }

    public function add()
    {
        if($this->adminVerify()){
             $param['list-type'] = $this->poke->typeAll();
             $param['upload_folder'] = $this->file->getUploadFolder();
             $this->view->render('add', $param);
        }
           

    }

    public function modify($id)
    {
        if($this->adminVerify())
        {
            $param['pokemon'] = $this->poke->getById($id);
            $param['upload_folder'] = $this->file->getUploadFolder();
            $param['tipo_folder'] = $this->tipo_pok_folder;
            $param['list-type'] = $this->poke->typeAll();
            $this->view->render('update', $param);
        }
       
    }

    public function update($id)
    {
        if($this->adminVerify())
        {
            //verificamos el acceso desde url sin cargar formulario
            if(!isset($_POST['numero']))
                $this->view->error('no-access');  

            //recargamos valores viejos
            $this->poke->getById($id);

            //obtenemos los datos del formulario por POST y seteamos el objeto
            
            //seteamos el objeto
            $this->poke->setId($id);
            $this->poke->setNumber($_POST['numero']);
            $this->poke->setName($_POST['nombre']);
            $this->poke->setDescription($_POST['descripcion']);
            if (isset($_POST['tipo']))
                $this->poke->setType($_POST['tipo']);    
        
            //verificamos si se cambio la imagen, de ser asi se guarda
            //y seteamos el campo con la nueva imagen

            if ($this->file->verifyUpload()){
                echo "entra en verify";
                $this->file->upload();
                $this->poke->setFile_Image($this->file->getUploadedFileName());
            }
                

            $res = $this->poke->update();

            if($res)
                $param = ['message' =>['type' => 'succes', 'msg' => 'Pokemon guardado con éxito', 'from' => 'manage']];
            else
                $param = ['message' =>['type' => 'error', 'msg' => 'No se realizó modificaciones el Pokemon', 'from' => 'manage']];
           
            $param['pokemon'] = $this->poke;
            $param['upload_folder'] = $this->file->getUploadFolder();
            $param['tipo_folder'] = $this->tipo_pok_folder;
            $param['list-type'] = $this->poke->typeAll();

            $this->view->render('update', $param); 


        }

    }

    public function save(){
        if($this->adminVerify()){
            //obtenemos la imagen subida
            $res = $this->file->upload();

            if($res){
                
                $res['values'] = [
                                                'numero' => $_POST['numero'],
                                                'nombre' => $_POST['nombre'],
                                                'desc'   => $_POST['descripcion'],
                                                'tipo'   => $_POST['tipo'] 
                                ];
                        
                    
                $this->view->render('add', $res);
            }else{
                //obtenemos los datos del formulario por POST y seteamos el objeto
                
                $this->poke->setNumber($_POST['numero']);
                $this->poke->setName($_POST['nombre']);
                $this->poke->setDescription($_POST['descripcion']);
                $this->poke->setType($_POST['tipo']);
                $this->poke->setFile_Image($this->file->getUploadedFileName());

                $res = $this->poke->save();

                if($res){
                    $param = ['message' =>['type' => 'succes',
                                            'msg' => 'Pokemon guardado con éxito', 
                                            'from' => 'manage']];
                                        
                }else{
                    $param = ['message' =>['type' => 'error',
                                            'msg' => 'Ocurrió un error al intentar guardar el Pokemon', 
                                            'from' => 'manage'],
                            'values' => [
                                                'numero' => $_POST['numero'],
                                                'nombre' => $_POST['nombre'],
                                                'desc'   => $_POST['descripcion'],
                                                'tipo'   => $_POST['tipo'] 
                                            ]
                            ];
                }

                $this->view->render('add', $param);        

            }
        }
         
         
    }

    private function adminVerify(){
        if (!$this->session->getCurrentUser()) 
            $this->view->error('no-access');
        else
            return true;    
    }
}