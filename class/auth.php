<?php

/**
 * class Auth
 * 
 * Se encarga de gestionar el login y logout
 * 
 */


class Auth{

    
    private $err;
    

    public function __construct()
    {
            
            $this->session = new Session();
            $this->nombre_usuario = isset($_POST['user']) ? $_POST['user'] : false;
            $this->password = isset($_POST['pass']) ? $_POST['pass'] : false;    
              
    
    }

    public function login(){

        //verificacion que se se envio usuario y pass
        if(!$this->nombre_usuario && !$this->password){

            //responde con objeto AppMsg
            $resp = new AppMsg($this, 'Debe especificar usuario y contraseña', AppMsg::MSG_DANGER);
   
        }else{

            $this->user = new User();
            $this->user->setUserName($this->nombre_usuario);
            $this->user->setPassword($this->password);

            if($this->user->Authenticate()){
                
                //setea session y envia respuesta
                $this->session->setCurrentUser($this->nombre_usuario);
                $resp = AppMsg::MSG_NONE;

            }else{
                
                //no pasa autenticacion responde con objeto AppMsg
                $resp = new AppMsg($this, 'Usuario o contraseña inválidos', AppMsg::MSG_DANGER);
                
            }

        }

        return app::index($resp);
    }

    public function logout(){
        //cierre de session y vuelve a index
        $this->session->closeSession();
        app::index();
    }

}