<?php

class AppMsg{

    const MSG_DANGER = 0;
    const MSG_SUCCESS = 1;
    const MSG_INFO = 2;
    const MSG_NONE = null;

    private $message;
    private $msg_from;
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