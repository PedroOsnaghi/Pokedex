<?php

//Carga automatica de clases

function autoload($classname){
    include("./classes/" . $classname . ".php");
}

spl_autoload_register('autoload');