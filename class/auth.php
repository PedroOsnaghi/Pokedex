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
            $err = ['message' => ['type' => 'error', 
                                   'msg' => 'Debe especificar usuario y contraseña',
                                   'from'=> 'login']
                    ];
            App::index($err);      
        }else{

            $this->user = new User();
            $this->user->setUserName($this->nombre_usuario);
            $this->user->setPassword($this->password);

            if($this->user->Authenticate()){
                $this->session->setCurrentUser($this->nombre_usuario);
                App::index();
            }else{
                $err = ['message' =>['type' => 'error', 
                                      'msg' => 'Usuario o contraseña inválidos',
                                      'from'=> 'login']
                       ];
            App::index($err);
        }

        }  
    }

    public function logout(){
        $this->session->closeSession();
        App::index();
    }

}