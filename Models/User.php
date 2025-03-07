<?php 

    declare (strict_types=1);
    //require_once '../_config/config.php';
    class User {

        private $name;
        private $email;
        private $numero;
        private $password;

        public function __construct($name, $email, $numero, $password) {
            $this->setName($name);
            $this->email = $email;
            $this->setNumero($numero);
            $this->password = $password;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }


        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getEmail() {
            return $this->email;
        }

     
        public function insertUser($conn) {
            
            $sql = "INSERT INTO user(name, contact, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->name, $this->numero, $this->email, $this->password]);
        
            if ($stmt) {
                header('Location: ../../views/login.html');
            }
        }

        public function selectUser($conn) {
            $sql = 'SELECT * FROM user WHERE contact = ?';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->numero]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           return $result; 
            
        }

        public function editeUser($conn) {
            $sql = "UPDATE user SET name=?, contact=?, email=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->name, $this->numero, $this->email, $_SESSION['user_id']]);
            if($stmt) {
                $_SESSION['user_name'] = $this->name;
                $_SESSION['user_contact'] = $this->numero;
                $_SESSION['user_email'] = $this->email;
                header('Location: ../views/index.php');
            }
        }

        public function logoutUser() {
            session_unset();
            session_destroy();
            header('Location: ../../views/login.html');
            exit();        
        }
    }
?>
 