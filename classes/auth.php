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
            
            $this->session = new Session();
            $this->nombre_usuario = isset($_POST['user']) ? $_POST['user'] : false;
            $this->password = isset($_POST['pass']) ? $_POST['pass'] : false;    
              
    
    }

    public function login(){
        if(!$this->nombre_usuario && !$this->password){
            $err = ['error' => true, 
                    'err_msg' => 'Debe especificar usuario y contraseña'];
            App::index($err);      
        }else{

            $this->user = new User();
            $this->user->setUserName($this->nombre_usuario);
            $this->user->setPassword($this->password);

            if($this->user->Authenticate()){
                $this->session->setCurrentUser($this->nombre_usuario);
                App::index();
            }else{
                $err = ['error' => true, 
                        'err_msg' => 'Usuario o contraseña inválidos'];
                App::index($err);
            }

        }  
    }

    public function logout(){
        $this->session->closeSession();
        App::index();
    }

}