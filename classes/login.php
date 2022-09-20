<?php

require_once('./autoload.php');

class Login{

    public function __construct()
    {
            $this->view = new View();
            $this->user = new User();
            $this->session = new Session();
        
            $this->nombre_usuario = isset($_POST['user']) ?: false;
            $this->password = isset($_POST['pass']) ?: false;
    
            if(!$this->nombre_usuario || !$this->password){
                $err = ['error' => true, 
                        'err_msg' => 'Debe especificar usuario y contraseña'];
                        echo "erroe";
                $this->view->render('home', $err);        
            }else{
    
                if($this->user->Validate()){
                    $this->session->setCurrentUser($this->nombre_usuario);
                    $params = ['session' => true];
                    $this->view->render('home', $params);
                }
    
            }
            
            
        
    
    }

}