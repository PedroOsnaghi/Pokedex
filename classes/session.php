<?php

class Session{

    private $session_name = 'user';


    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($user){
        $_SESSION[$this->session_name] = $user;
    }

    public function getCurrentUser(){
        return isset($_SESSION[$this->session_name]) ?: false;
    }

    public function CloseSession(){
        session_unset();
        session_destroy();
    }
    
}