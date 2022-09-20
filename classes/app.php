<?php
//require_once('autoload.php');


class App{

    public function __construct()
    {
        //Verificamos si recibimos una clase por url
        $class = isset($_REQUEST['c']) ? $_REQUEST['c'] : null;
        //Verificamos si recibimos un  action a ejecutar
        $method = isset($_REQUEST['a']) ? $_REQUEST['a'] : null;

        if(!$class){
            //no hay clase -> vamos a pantalla principal
            $this->index();
        }else{
            //hay clase para instanciar
            if(class_exists($class))
                $this->c = new $class();
            else
                $this->Error();    
    
            //llamamos su metodo
            if(method_exists($this->c, $method))
                isset($_REQUEST['id']) ? $this->c->{$method}($_REQUEST['id']) : $this->c->{$method}();
            else
                $this->Error();    

            
        }



    }

    public function index(){
        $session = new Session();
        $view = new View();
        $params = [];
       
        if($session->getCurrentUser())
            $params = ['session' => true];  //session admin
        else
            $params = ['session' => false];   //session publica
        
        $view->render('home', $params);
    }

    private function Error(){
        echo "Pagina Inexistente";
    }
}