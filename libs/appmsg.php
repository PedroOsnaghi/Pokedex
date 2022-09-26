<?php

/**
 * AppMsg class
 * 
 * clase para la mensageria entre objetos que luego seran presentados
 * en pantalla por la clase View
 */

class AppMsg{

    //constantes para $msg_type
    const MSG_DANGER = 0;
    const MSG_SUCCESS = 1;
    const MSG_INFO = 2;
    const MSG_NONE = null;

    //guarda el texto del mensaje
    private $message;
    //guarda el nombre de la clase que lo envia
    private $msg_from;
    //guarda el tipo de mensaje: MSG_DANGER|MSG_SUCCESS|MSG_INFO|MSG_NONE
    private $msg_type;

    public function __construct($from, $message, $type)
    {
        $this->msg_from = get_class($from);
        $this->message = $message;
        $this->msg_type = $type;
    }

    public function getFrom(){
        return $this->msg_from;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getType(){
        return $this->msg_type;
    }


}