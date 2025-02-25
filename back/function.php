<?php
    session_start();

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require 'config.php';


   $table = listStation ($conn);
   $nbre = getNbre($conn);
   $tableTri = listStationAll($conn);
   

    if (isset($_POST['submit-staionnement'])) {
        $prop = $_POST['propriétaire'];
        $marq = $_POST['marque'];
        $serie = $_POST['serie'];
        $color = $_POST['color'];
        $matri = $_POST['matricule'];
        $posit = $_POST['position'];
        $statut = 'stationné';
        $sql = 'INSERT INTO autos (proprio, marque, serie, couleur, matricule, statut) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql); 
       
        if ($stmt) {            
            $stmt->execute([$prop, $marq, $serie, $color, $matri, $statut]); 
            $table = listStation ($conn);
            header('Location: ../front/index.php');        
        } else {
            header('Location: ../front/index.php');            
        }

    }
    
    if(isset($_POST['submit-déstation'])){
        $matri = $_POST['matr-dest'];

        $sql = "SELECT * FROM autos WHERE 	matricule=?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$matri]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $sql = "UPDATE autos SET statut = 'Déstationnée' WHERE matricule = ?";
            $stmt =  $conn->prepare($sql);
            $stmt->execute([$matri]);
            $table = listStation ($conn);
        }
        
        header('Location: ../front/index.php');        

    }

    if (isset($_POST['connexion-submit'])) {
        $num = $_POST['contact'];
        $pwd = $_POST['password'];
        $sql = 'SELECT * FROM user WHERE contact = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$num]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        // var_dump ($result);
        // die();
        if ($result ) {
            if ( password_verify($pwd, $result['password'])){

                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['name'];
        
                header('Location: ../front/index.php');
                exit();
            }else {
                header('Location: ../front/connexion.html?error:passordinvalid');

            }          
        } else {
            header('Location: ../front/connexion.html?error=invalid');
            exit();
        }
    }

    if (isset($_POST['deconnexion-submit'])) {
        session_unset();
        session_destroy();
        header('Location: ../front/connexion.html');
    }
    
    if(isset($_POST['register-submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $num = $_POST['contact'];
        $pwd = $_POST['password'];
        $pwdConfirm = $_POST['password_confirmation'];

        if ($pwd !== $pwdConfirm) {
            header('Location: ../front/regiter.html?error:pwdconfirm');
            exit();
        }

        $sql = "SELECT contact FROM user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($result === $num) {
            header('Location: ../front/regiter.html?error:contactalredyexit');
            exit();
        }

        $sql = "INSERT INTO user(name, contact, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $num, $email, password_hash($pwd, PASSWORD_DEFAULT)]);

        if($stmt) {
            header('Location: ../front/connexion.html');
        }

    }

    if(isset($_POST['editerUser-submit'])) {
       
        $name = $_POST['name'];
        $email = $_POST['email'];
        $num = $_POST['contact'];
        $pwd = $_POST['password'];
        $pwdConfirm = $_POST['password_confirmation'];

        if ($pwd !== $pwdConfirm) {
            header('Location: ../front/regiter.html?error:pwdconfirm');
            exit();
        }
 
        $sql = "SELECT contact FROM user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($result === $num) {
            header('Location: ../front/regiter.html?error:contactalredyexit');
            exit();
        }

        $sql = "UPDATE user SET name=?, contact=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $num, $email, $_SESSION['user_id']]);
        if($stmt) {
            $_SESSION['user_name'] = $name;
            header('Location: ../front/index.php');
        }

    }

    if (isset($_POST['modifyUser']) ) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $num = $_POST['contact'];

        $sql = "SELECT * FROM user WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
       
        if ($result) {
            
            $_SESSION['edit_name'] = $result['name'];
            $_SESSION['edit_email'] = $result['email'];
            $_SESSION['edit_contact'] = $result['contact'];

        }
        header('Location: ../front/editerUser.php');
    }
    
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
    }

    // if (isset($_POST['triDéstationnée'])) {
    //     $tableTri = triByStatut($conn, 'Déstationnée');
    //     // var_dump($table);
    //     // die();
    //     header('location: ../front/listAll.php');
    //     exit();
    // }

    // if (isset($_POST['triStationnée'])) {
    //     $tableTri = triByStatut($conn, 'Stationnée');
    //     // var_dump($table);
    //     // die();
    //     header('location: ../front/listAll.php');
    // }

    // if (isset($_POST['triTous'])) {
    //     $table = listStation($conn);
    //     header('location: ../front/listAll.php');
    // }
    
    
    
    // if (isset($_POST['submit-listAll'])){

    //     $oldpwd = $_POST['newpassconfirm'];
    //     $oldpwd = $_POST['newpassword'];
    //     $oldpwd = $_POST['newpassconfirm'];
        
    //     $sql = "SELECT * FROM autos";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $i=1;
    //     $table ='';
    //     foreach ($result as $row) {
    //         if($row['statut']=='Stationnée') {
    //             $statut = '<td class="text-success">'.$row['statut'].'</td>';
    //         } else {
    //             $statut = '<td class="text-danger">'.$row['statut'].'</td>';
    //         }
    //         $table .= '
    //                 <tr>
    //                     <th scope="row">'.$i.'</th>
    //                     <td>'.$row['proprio'].'</td>
    //                     <td>'.$row['marque'].'</td>
    //                     <td>'.$row['serie'].'</td>
    //                     <td>'.$row['couleur'].'</td>
    //                     <td>'.$row['matricule'].'</td>
    //                     <td>'.$row['proprio'].'</td>'.
    //                     $statut.
    //                 '</tr>';
            
    //         if ($i===5){
    //             break;
    //         }
    //         $i++;
    //     }
        
    //     return $table;

    // } 
    
    

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
        $i = 1;
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
            
            if ($i===5){
                break;
            }
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
