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
        $this->view->setList($this->poke->All());
        $param['upload_folder'] = $this->file->getUploadFolder();
        $param['tipo_folder'] = $this->tipo_pok_folder;
        $this->view->index($param);
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
             $list = $this->poke->All();
         }else{
             //busca por numero
             $list = $this->poke->searchByAll($value);
 
             if(!sizeof($list)){
                 
                $this->view->senMessage($this, 'Pokemon no encontrado', view::MSG_INFO);
                $list = $this->poke->All();

              }
         }
         $this->view->setList($list);
         $this->view->index($param);
    }

    public function get($id)
    {
        $this->view->setObject($this->poke->getById($id));
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
                $this->view->sendMessage($this, 'Registro eliminado con éxito', view::MSG_INFO);
            }
            else
            {
                $this->view->sendMessage($this, 'No se pudo eliminar el registro', view::MSG_DANGER);
            }

            $this->view->index();
           
        }

    }

    public function add()
    {
        if($this->adminVerify()){
             $this->view->setList($this->poke->typeAll());
             $param['upload_folder'] = $this->file->getUploadFolder();
             $this->view->render('add', $param);
        }
           

    }

    public function modify($id)
    {
        if($this->adminVerify())
        {
            $this->view->setObject($this->poke->getById($id));
            $this->view->setList($this->poke->typeAll());
            $param['upload_folder'] = $this->file->getUploadFolder();
            $param['tipo_folder'] = $this->tipo_pok_folder;
            
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
                $this->file->upload();
                $this->poke->setFile_Image($this->file->getUploadedFileName());
            }
                

            $res = $this->poke->update();

            if($res)
                $this->view->sendMessage($this, 'Pokemon guardado con éxito', view::MSG_INFO);              
            else
                $this->view->sendMessage($this, 'No se realizó modificaciones el Pokemon', view::MSG_DANGER);  
            
           
            $this->view->setObject($this->poke);
            $this->view->setList($this->poke->typeAll());
            $param['upload_folder'] = $this->file->getUploadFolder();
            $param['tipo_folder'] = $this->tipo_pok_folder;
            $this->view->render('update', $param); 


        }

    }

    public function save(){
        if($this->adminVerify()){
            //obtenemos la imagen subida
            $res = $this->file->upload();

            if($res){
                
                $param['values'] = [
                                                'numero' => $_POST['numero'],
                                                'nombre' => $_POST['nombre'],
                                                'desc'   => $_POST['descripcion'],
                                                'tipo'   => $_POST['tipo'] 
                                ];
                        
                $this->view->sendMessage($this, $res, view::MSG_DANGER);    
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
                    $this->view->sendMessage($this, 'Pokemon guardado con éxito', view::MSG_SUCCESS);                       
                }else{
                    $this->view->sendMessage($this, 'Ocurrió un error al intentar guardar el Pokemon', view::MSG_DANGER);   
                    $param['values'] = [
                                            'numero' => $_POST['numero'],
                                            'nombre' => $_POST['nombre'],
                                            'desc'   => $_POST['descripcion'],
                                            'tipo'   => $_POST['tipo'] 
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