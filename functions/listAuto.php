<?php
       $result = Auto::listAuto($conn);
        $i=1;
        $table ='';
        foreach ($result as $row) {
            if($row['statut']=='Stationnée') {
                $statut = '<td class="text-success">'.$row['statut'].'</td>';
            } else {
                $statut = '<td class="text-danger">'.$row['statut'].'</td>';
            }
            $table .= '<tr>
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
        $_SESSION['table'] = $table;
        $_SESSION['nbre_satatinées'] = count($result);
        $_SESSION['nbre_librePlace'] = 23 - count($result);
   

    