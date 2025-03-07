<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once '../../_config/autoload.php';
    require_once '../../_config/connexion.php';

    $sql = "SELECT * FROM user WHERE id != {$_SESSION['user_id']}";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($result as $row) {
        if($row['contact'] === $user->numero) {
            header('Location: ../views/editerUser.php?error:contactalredyexit');
            exit();
        }

        if($row['email'] === $user->email) {
            header('Location: ../views/editerUser.php?error:emailredyexit');
            exit();
        }
    }

    $user =  new User ($_POST['name'], $_POST['email'], $_POST['contact'], '');
    $user->editeUser($conn);