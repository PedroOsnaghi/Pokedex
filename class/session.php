<?php

class Session{

    private $session_key = 'username';


    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
    }

    public function setCurrentUser($user){
        $_SESSION[$this->session_key] = $user;
    }

    public function getCurrentUser(){
        return isset($_SESSION[$this->session_key]) ? $_SESSION[$this->session_key] : false;
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
    
}