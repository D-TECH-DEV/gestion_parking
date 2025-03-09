<?php
    declare (strict_types=1);

    //require_once '../function.php';
    //require_once '../_config/autoload.php';
    class Auto {
        //public Proprietaire $proprio;
        private string $proprietaire;
        private string $marque; 
        private string $serie; 
        private string $color;
        private string $matricule;
        private string $station;
        //public Station $station;
 
        public function __construct ($proprietaire, $marque, $serie, $color, $matricule, $station) {
            $this->proprietaire = $proprietaire;
            $this->marque = $marque;
            $this->serie = $serie;
            $this->color = $color;
            $this->matricule = $matricule;
            $this->station = $station;
        }

        public function getMatricule () {
            return $this->matricule;
        }


        public function insertAuto ($conn) {
            $statut = 'Stationnée';
            $sql = 'INSERT INTO autos (proprio, marque, serie, couleur, matricule, statut) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->proprietaire, $this->marque, $this->serie, $this->color, $this->matricule, $statut]);
            return $stmt;       
        }

        public function destationAuto ($conn) {
            $sql = "SELECT * FROM autos WHERE 	matricule=?;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->matricule]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;         
        }

        public static function selectAuto($conn) {
            $sql = "SELECT * FROM autos ORDER BY id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function listAuto($conn, &$nbre) {
                $result = self::selectAuto($conn);
                $i=1;
                $nbre = 0;
                $table ='';
                foreach ($result as $row) {
                    if($row['statut']=='Stationnée') {
                        $statut = '<td class="text-success">'.$row['statut'].'</td>';
                        $nbre += 1;
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
                        $_SESSION['table_portion'] = $table;
                    }
                    $i++;
                }
                $_SESSION['table']= $table;
                  
        }
    }