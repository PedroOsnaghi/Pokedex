<?php

require_once("class/session.php");
require_once("class/pokemon.php");

/**
 * Manage class
 * 
 * clase que gestiona la logica y validacion del CRUD de Pokemones
 * posee metodos protegidos para no ser accedidos directamente desde
 * la url.
 * 
 * se comunica con la clase Pokemon para la gestion de datos
 * 
 * se comunica con la clase Session para la verificacion de permisos 
 */

class Manage{

    public function __construct()
    {
        $this->view = new View();
        $this->poke = new Pokemon();
        $this->session = new Session();
        $this->file = new File();
       
    }

    /**
     * Funcion que establece el estado inicial de la App
     * de haber un mensaje se lo pasa a la vista
     * 
     * @param AppMsg $app_msg Variable de tipo AppMsg 
     * @return Vista Home
     */
    public function init($app_msg)
    {
        $this->view->setList($this->poke->All());
        $this->view->sendMessage($app_msg);
       $this->view->render('home');
    }

    /**
     * Funcion que valida y ejecuta las busquedas
     */
    public function search()
    {
         //Capturamos el valor a buscar por POST
         $value = isset($_POST['toSearch']) ? $_POST['toSearch'] : '';
         
         //si no se busco nada mostramos todo
         if (empty($value)){
             $list = $this->poke->All();
         }else{
             //busca por numero
             $list = $this->poke->searchByAll($value);
 
             if(!sizeof($list)){
                 
                //envia mensaje y lista todos
                $this->view->sendMessage(new AppMsg($this, 'Pokemon no encontrado', AppMsg::MSG_INFO));
                $list = $this->poke->All();

              }
         }

         //envia a la vista el valor buscado para mostrarlo en el input
         $this->view->setInputValues(['toSearch' => $value]);
         //envia lista
         $this->view->setList($list);
         //muestra
         $this->view->render('home');
    }

    /**
     * Funcion que solicita un objeto Pokemon y lo envia
     * a la vista Details
     */
    public function get($id)
    {
        $this->view->setObject($this->poke->getById($id));
        $this->view->render('details');
        
    }

    /**
     * Funcion que solicita la eliminacion de un Pokemon
     * 
     * * Protegida con adminVerify
     * 
     * @param string $id Variable que almacene el id del pokemon a eliminar
     * @return vista home Luego de eliminar retorna al home y actualiza las listas
     */
    public function delete($id)
    {
        if($this->adminVerify())
        {
           
            $res = $this->poke->delete($id);
            
            if($res)
            {
                $this->view->sendMessage(new AppMsg($this, 'Registro eliminado con éxito', AppMsg::MSG_INFO));
            }
            else
            {
                $this->view->sendMessage(new AppMsg($this, 'No se pudo eliminar el registro', AppMsg::MSG_DANGER));
            }

            $this->view->setList($this->poke->All());
            $this->view->render('home');
           
        }

    }

    /**
     * Funcion que solicita la vista de Agregar Pokemon
     * 
     * * Protegida con adminVerify
     */
    public function add()
    {
        if($this->adminVerify()){
            //seteamos la lista de tipos 
             $this->view->setList($this->poke->typeAll());
             $this->view->render('add');
        }
      
    }

    /**
     * Funcion que solicita la vista de Modificar Pokemon
     * 
     * * Protegida con adminVerify
     * 
     * @param string $id Variable que almacene el id del pokemon a eliminar
     * @return vista update
     */

    public function modify($id)
    {
        if($this->adminVerify())
        {
            $this->view->setObject($this->poke->getById($id));
            $this->view->setList($this->poke->typeAll());
            $this->view->render('update');
        }
       
    }

    /**
     * Funcion que solicita el guardado de modificaciones
     * 
     * * Protegida con adminVerify
     * 
     * @param string $id Variable que almacene el id del pokemon a guardar
     * @return vista update con mensaje
     */
    public function update($id)
    {
        if($this->adminVerify())
        {
            
            //verificamos el acceso desde url sin cargar formulario
            if(!isset($_POST['submit']))
                return $this->view->error('no-access');  

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
                $this->view->sendMessage(new AppMsg($this, 'Pokemon guardado con éxito', AppMsg::MSG_SUCCESS));              
            else
                $this->view->sendMessage(new AppMsg($this, 'No se realizó modificaciones el Pokemon', AppMsg::MSG_DANGER));  
            
           
            $this->view->setObject($this->poke);
            $this->view->setList($this->poke->typeAll());
            $this->view->render('update'); 


        }

    }

    /**
     * Funcion que solicita el guardado de datos
     * 
     * Protegida con adminVerify
     */

    public function save(){
        if($this->adminVerify()){

            //validaciones necesarias
            if(!$this->Validate()) return $this->add();

            //obtenemos la imagen subida
            $res = $this->file->upload();

            //si ocurre algun problema en la subida de imagen
            if($res){
                //retornamos los valores obtenidos
                $this->view->setInputValues(['numero' => $_POST['numero'],
                                             'nombre' => $_POST['nombre'],
                                             'desc'   => $_POST['descripcion'],
                                             'tipo'   => $_POST['tipo']]);
                //enviamos mensaje de error        
                $this->view->sendMessage(new AppMsg($this, $res, AppMsg::MSG_DANGER));    
                
            }else{
                
                //obtenemos los datos del formulario por POST y seteamos el objeto
                
                $this->poke->setNumber($_POST['numero']);
                $this->poke->setName($_POST['nombre']);
                $this->poke->setDescription($_POST['descripcion']);
                $this->poke->setType($_POST['tipo']);
                $this->poke->setFile_Image($this->file->getUploadedFileName());

                $res = $this->poke->save();

                if($res){
                    $this->view->sendMessage(new AppMsg($this, 'Pokemon guardado con éxito', AppMsg::MSG_SUCCESS));                       
                }else{
                    //retornamos los valores obtenidos
                    $this->view->setInputValues(['numero' => $_POST['numero'],
                                                 'nombre' => $_POST['nombre'],
                                                 'desc'   => $_POST['descripcion'],
                                                 'tipo'   => $_POST['tipo']]);
                    //enviamos mensaje de error
                    $this->view->sendMessage(new AppMsg($this, 'Ocurrió un error al intentar guardar el Pokemon', AppMsg::MSG_DANGER));                                
                }
                
                //volvemos a la vista
                return $this->view->render('add');
                  

            }
        }
         
         
    }

    private function Validate(){
         if(!isset($_POST['tipo'])){

            //enviamos mensaje de error        
            $this->view->sendMessage(new AppMsg($this,'Debe seleccionar un Tipo de Pokemon', AppMsg::MSG_DANGER)); 

         }elseif($this->poke->exist($_POST['numero'])){
            
            //enviamos mensaje de error        
            $this->view->sendMessage(new AppMsg($this,'Ya existe un Pokemon con el numero que intenta asignar', AppMsg::MSG_DANGER)); 
          
        }else{
            return true;
        }
        
        //retornamos los valores obtenidos
        $this->view->setInputValues(['numero' => $_POST['numero'],
        'nombre' => $_POST['nombre'],
        'desc'   => $_POST['descripcion'],
        'tipo' => isset($_POST['tipo']) ? $_POST['tipo'] : '0',
        'img_src' => isset($_FILES['archivo']) ? $_FILES['archivo']['tmp_name'] : false ]);
            echo $_FILES['archivo']['tmp_name'];
         //volvemos a la vista
         return false;
    }

    /**
     * Funcion que se encarga de verificar la ssesion de administrador
     * 
     * @return true | error: no-access
     */
    private function adminVerify(){
        if (!$this->session->getCurrentUser()) 
            $this->view->error('no-access');
        else
            return true;    
    }
}