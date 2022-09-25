<?php

/**
 * class App 
 * 
 * Se encarga de gestionar las peticiones get y generar los objetos y ejecutar metodos
 * solicitados a traves de la url.
 * 
 * interpreta -> http://localhost/index.php?c=class&a=action&id
 * 
 * c=class => nombre de la clase
 * a=action => nombre del metodo
 * id (opcional) parametro
 * 
 *  
 * 
 */


class App{

    public function __construct()
    {
        //Verificamos si recibimos una clase por url
        $class = isset($_REQUEST['c']) ? $_REQUEST['c'] : false;
        //Verificamos si recibimos un  action a ejecutar
        $method = isset($_REQUEST['a']) ? $_REQUEST['a'] : false;

        if(!$class){
            //no hay clase -> vamos a Home
            $this->index();
        }else{
            //hay clase para instanciar
            if(class_exists($class))
                $this->c = new $class();
            else
                $this->Error(); 
            
                 
            if($method){
                    //llamamos su metodo
                if(method_exists($this->c, $method))
                    isset($_REQUEST['id']) ? $this->c->{$method}($_REQUEST['id']) : $this->c->{$method}();
                else
                    $this->Error();
            }
                
        }



    }

    private function index(){
        
        (new view())->index();

    }

    public static function Error(){
        view::error('404');
    }
}