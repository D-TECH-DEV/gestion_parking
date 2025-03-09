<?php


    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require_once '../../_config/autoload.php';
    require_once '../../_config/connexion.php';



    $user = new User('', '', $_POST['contact'], $_POST['password']);
    $result = $user->selectUser($conn); 

    if ($result) {
        if ( password_verify($user->getPassword(), $result['password'])){
            session_start();
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_name'] = $result['name'];
            $_SESSION['user_contact'] = $result['contact'];
            $_SESSION['user_email'] = $result['email'];

            Auto::listAuto($conn,  $_SESSION['nbre_satatinées']);
           $_SESSION['nbre_librePlace'] = 23 - count($result);

            header('Location: ../../views/index.php');
            exit();
        }else {
            header('Location: ../../views/login.html?error:passordinvalid');
        }          
    } else {
        header('Location: ../../views/login.html?error=invalid');
        exit();
    }        