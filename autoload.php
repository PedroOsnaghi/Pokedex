<?php

//Carga automatica de clases de ./libs/

function autoload($classname){
    include("./libs/" . $classname . ".php");
}

spl_autoload_register('autoload');