 <?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once '../../_config/autoload.php';
    require_once '../../_config/connexion.php';


    

    $auto = new Auto('', '', '', '', $_POST['matr-dest'], '');
    $result = $auto->destationAuto($conn);

    if($result) {
        $sql = "UPDATE autos SET statut = 'Déstationnée' WHERE matricule = ?";
        $stmt =  $conn->prepare($sql);
        $stmt->execute([$auto->getMatricule()]);

        // mise à jour
        $auto->listAuto($conn,  $_SESSION['nbre_satatinées']);
        $_SESSION['nbre_librePlace'] = 23 - count($result);
        
        header('Location: ../../views/index.php'); 

    }

