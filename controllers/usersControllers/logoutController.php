<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require_once '../../_config/autoload.php';


    $user = new User('', '', '', '');
    $user->logoutUser();      