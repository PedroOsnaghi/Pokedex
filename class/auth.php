<?php

/**
 * class Auth
 * 
 * Se encarga de gestionar el login y logout
 * 
 */


class Auth{

    public function __construct()
    {
            $this->view = new View();
            $this->session = new Session();
            $this->nombre_usuario = isset($_POST['user']) ? $_POST['user'] : false;
            $this->password = isset($_POST['pass']) ? $_POST['pass'] : false;    
              
    
    }

    public function login(){
        if(!$this->nombre_usuario && !$this->password){

            $this->view->sendMessage($this,'Debe especificar usuario y contraseña',view::MSG_DANGER);
            $this->view->index();

        }else{

            $this->user = new User();
            $this->user->setUserName($this->nombre_usuario);
            $this->user->setPassword($this->password);

            if($this->user->Authenticate()){
                $this->session->setCurrentUser($this->nombre_usuario);
                $this->view->index();
            }else{
                $this->view->sendMessage($this,'Usuario o contraseña inválidos',view::MSG_DANGER);
                $this->view->index();
        }

        }  
    }

    public function logout(){
        $this->session->closeSession();
        $this->view->index();
    }

}