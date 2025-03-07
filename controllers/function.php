<?php
    session_start();

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require '../_config/autoload.php';
    require '../_config/connexion.php';
    // require_once '../classes/User.php';
   

    $_SESSION['table'] = listStation ($conn);
    $nbre = getNbre($conn);
    

    if (isset($_POST['submit-listAll'])){
        $_SESSION['table'] = 'fkqsdjkfjklfjqdlfjdlfkj';//listStationAll($conn);
        header('location: ..//listAll.php');
    } 
   
   
    if (isset($_POST['submit-staionnement'])) {

        $auto = new Auto($_POST['propriétaire'], $_POST['marque'], $_POST['serie'],  $_POST['color'],  $_POST['matricule'], $_POST['position']);
        $auto->creatAuto($conn);

    } //ok
    
    if(isset($_POST['submit-déstation'])){
        $auto = new Auto('', '' ,'', '', $_POST['matr-dest'], '');      
        $auto->destationAuto($conn);
    }

    
    

    // if (isset($_POST['connexion-submit'])) {

    //     $user =  new User ('', '', $_POST['contact'], $_POST['password']);
    //     $user->loginUser ($conn);
        
    // } //ok

   
    
    if (isset($_POST['register-submit'])) {
        if ($_POST['password'] !== $_POST['password_confirmation']) {
            header('Location: ..//register.html?error:pwdconfirm');
            exit();
        }

        $user = new User ($_POST['name'], $_POST['email'], $_POST['contact'], password_hash($pwd, PASSWORD_DEFAULT));
        $user->creatUser($conn);
    } //Ok
    

    if(isset($_POST['editerUser-submit'])) {
        $user =  new User ($_POST['name'], $_POST['email'], $_POST['contact'], '');
        $user->editeUser($conn);

    } //ok
    
    if (false){
        $oldpwd = $_POST[''];
        $oldpwdconfir = $_POST[''];
        $newpwd = $_POST[''];

        $sql = 'SELECT password FROM user WHERE id=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newpwd, $_SESSION["user_id"]]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if($oldpwd===$result['password'] && $oldpwdconfir = $oldpwd) {
            $sql = 'UPDATE autos SET password=? WHERE id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$newpwd, $_SESSION["user_id"]]);
        }
    } // not ok

    if (isset($_POST['triDéstationnée'])) {
        $tableTri = triByStatut($conn, 'Déstationnée');
        var_dump($tableTri);
        die();
        header('location: ..//listAll.php');
        exit();
    }

    

    if (isset($_POST['triStationnée'])) {
        die ('salutttttttt');
        $tableTri = triByStatut($conn, 'Stationnée');
        // var_dump($table);
        // die();
        header('location: ..//listAll.php');
    }

    if (isset($_POST['triTous'])) {
        die ('salut');
        $table = listStation($conn);
        header('location: ..//listAll.php');
    }
    
 
   
    
    
    

    function listStation ($conn) {
        $result = getList($conn);
        $i=1;
        $table ='';
        foreach ($result as $row) {
            if($row['statut']=='Stationnée') {
                $statut = '<td class="text-success">'.$row['statut'].'</td>';
            } else {
                $statut = '<td class="text-danger">'.$row['statut'].'</td>';
            }
            $table .= '
                    <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$row['proprio'].'</td>
                        <td>'.$row['marque'].'</td>
                        <td>'.$row['serie'].'</td>
                        <td>'.$row['couleur'].'</td>
                        <td>'.$row['matricule'].'</td>
                        <td>'.$row['proprio'].'</td>'.
                        $statut.
                    '</tr>';
            
            if ($i===5){
                break;
            }
            $i++;
        }
        
        return $table;

    } 

    function listStationAll ($conn) {
        $result = getList($conn);
        $i=1;
        $table ='';
        foreach ($result as $row) {
            if($row['statut']=='Stationnée') {
                $statut = '<td class="text-success">'.$row['statut'].'</td>';
            } else {
                $statut = '<td class="text-danger">'.$row['statut'].'</td>';
            }
            $table .= '
                    <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$row['proprio'].'</td>
                        <td>'.$row['marque'].'</td>
                        <td>'.$row['serie'].'</td>
                        <td>'.$row['couleur'].'</td>
                        <td>'.$row['matricule'].'</td>
                        <td>'.$row['proprio'].'</td>'.
                        $statut.
                    '</tr>';
            $i++;
        }
        
        return $table;

    } 

    function triByStatut ($conn, $statut) {
        $sql = "SELECT * FROM autos WHERE statut=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$statut]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table='';
        $i =1;
        foreach ($result as $row) {
            if($row['statut']=='Stationnée') {
                $statut = '<td class="text-success">'.$row['statut'].'</td>';
            } else {
                $statut = '<td class="text-danger">'.$row['statut'].'</td>';
            }
            $table .= '
                    <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$row['proprio'].'</td>
                        <td>'.$row['marque'].'</td>
                        <td>'.$row['serie'].'</td>
                        <td>'.$row['couleur'].'</td>
                        <td>'.$row['matricule'].'</td>'.   
                        $statut.
                    '</tr>';
            $i++;
        }
        return $table;
    }

    function getList ($conn) {
        $sql = "SELECT * FROM autos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getNbre ($conn) {
        

        return count(getList($conn));
    }


    

?>
