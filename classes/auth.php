<?php


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
            $err = ['error' => true, 
                    'err_msg' => 'Debe especificar usuario y contraseña'];
            $this->view->render('home', $err);        
        }else{

            $this->user = new User();
            $this->user->setUserName($this->nombre_usuario);
            $this->user->setPassword($this->password);

            if($this->user->Authenticate()){
                $this->session->setCurrentUser($this->nombre_usuario);
                $this->view->render('home');
            }else{
                $err = ['error' => true, 
                        'err_msg' => 'Usuario o contraseña inválidos'];
                $this->view->render('home', $err);
            }

        }  
    }

    public function logout(){
        $this->session->closeSession();
        $this->view->render('home');
    }

}