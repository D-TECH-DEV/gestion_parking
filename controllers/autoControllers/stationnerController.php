<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require_once '../../_config/autoload.php';
    require_once '../../_config/connexion.php';


    

    $auto = new Auto($_POST['propriétaire'], $_POST['marque'], $_POST['serie'],  $_POST['color'],  $_POST['matricule'], $_POST['position']);
    $stmt = $auto->insertAuto($conn);

    if ($stmt) {            
        $auto->listAuto ($conn, $_SESSION['nbre_satatinées']);
        header('Location: ../../views/index.php');        
    } else {
        header('Location: ../../views/index.php');            
    }








