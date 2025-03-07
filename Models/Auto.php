<?php
    declare (strict_types=1);
    require_once '../_config/config.php';
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


        public function creatAuto ($conn) {
            $statut = 'Stationnée';
            $sql = 'INSERT INTO autos (proprio, marque, serie, couleur, matricule, statut) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $conn->prepare($sql); 
           
            if ($stmt) {            
                $stmt->execute([$this->proprietaire, $this->marque, $this->serie, $this->color, $this->matricule, $statut]); 
                $table = listStation ($conn);
                header('Location: ../views/index.php');        
            } else {
                header('Location: ../views/index.php');            
            }
        }

        public function destationAuto ($conn) {
            $sql = "SELECT * FROM autos WHERE 	matricule=?;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->matricule]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result) {
                $sql = "UPDATE autos SET statut = 'Déstationnée' WHERE matricule = ?";
                $stmt =  $conn->prepare($sql);
                $stmt->execute([$this->matricule]);
                $table = listStation ($conn);
            }
            header('Location: ../views/index.php');        
        }




    }