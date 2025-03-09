<?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        session_start();

        require_once '../../_config/autoload.php';
        require_once '../../_config/connexion.php';


        $station = new Station;
        $resultat = $station->getLibreStation($conn);

        $_SESSION ['station_libre'] ="";
        foreach ($resultat as $row) {
            $_SESSION ['station_libre'] .= '<option>'.$row['position'].'</option>';
           
        }