<?php 
    declare (strict_types=1);
    require_once '../_config/config.php';
    class Station {
        public $id;
        public $postion;
        private $statut;

        function changeStatut() {
            if ($this->statut== 'O') {
                $this->statut= 'L';
            } else {
                $this->statut='O';
            }
        }

        public function getStatut() {
            return $this->statut;
        }
    }