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

    function listStation  ($conn, $result) {
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





    function listStationAll ($conn, $result) {
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


