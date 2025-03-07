<?php


    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require_once '../../_config/autoload.php';
    require_once '../../_config/connexion.php';


    
     

    $sql = "SELECT contact FROM user WHERE contact = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['contact']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        header('Location: ../views/register.html?error:contactalreadyexists');
        exit();
    }

    $user = new User($_POST['name'], $_POST['email'], $_POST['contact'], password_hash($_POST['password'], PASSWORD_DEFAULT));
    $result = $user->insertUser($conn);
       