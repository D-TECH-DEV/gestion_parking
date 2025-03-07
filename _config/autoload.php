<?php

spl_autoload_register(function($class) {
    // $path = dirname(_DIR_) . DIRECTORY_SEPARATOR . $class . ".php";

    // require_once $path;
    //require_once '../class/'.$class.'.php';
    // require_once __DIR__ . '/../../_config/autoload.php';

    $path = dirname(__DIR__) . DIRECTORY_SEPARATOR .'Models'. DIRECTORY_SEPARATOR.$class . ".php";
    // var_dump ($path);
    // die();
    require_once $path;
});


