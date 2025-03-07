<?php

spl_autoload_register(function($class) {
    

    $path = dirname(__DIR__) . DIRECTORY_SEPARATOR .'Models'. DIRECTORY_SEPARATOR.$class . ".php";
    // var_dump ($path);
    // die();
    require_once $path;
});


