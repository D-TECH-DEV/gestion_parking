<?php 
    declare (strict_types=1);

    class Station {
        public $id;
        public $postion;
        private $statut;

        public static function changeStatut($statut) {
            if ($statut== 'Occupée') {
                $statut= 'Libre';
            } else {
                $statut='Occupée';
            }
        }

        public static function updateStatutStation($conn, $position) {
            $sql = "UPDATE station SET statut = ? WHERE position = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['Occupée', $position]);
        }
        
        public function getStatut() {
            return $this->statut;
        }

        public static function getLibreStation ($conn) {
            $sql = "SELECT * FROM station WHERE statut = 'Libre'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }   
    }