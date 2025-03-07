 <?php
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
        $_SESSION['table'] = listStation ($conn, $auto->listAuto);
        // var_dump($_SESSION['table']);
        // die();
    }
    header('Location: ../../views/index.php'); 





    //return count(getList($conn));






        

    } 


