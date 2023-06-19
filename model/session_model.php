<?php
    // the connection file is included (se incluye el archivo de conexión)
    require_once "../model/connection_model.php";

    // class to handle user account and session data (clase para manejar cuenta de usuario y datos de sesión)
    class Session extends Connection {
        public function __construct() {
            parent:: __construct();
            session_start();
        }

        public function getUserName() {
            return $_SESSION['user']['name'];
        }

        private function setUserName($name) {
            $_SESSION['user']['name'] = $name;
        }

        public function getUserPrivilege() {
            return $_SESSION['user']['privilege'];
        }

        private function setUserPrivilege($privilege) {
           $_SESSION['user']['privilege'] = $privilege; 
        }

        public function getUserId() {
            return $_SESSION['user']['id'];
        }

        private function setUserId($id) {
            $_SESSION['user']['id'] = $id;
        }

        // method to verify user account (método para verificar cuenta de usuario)
        public function checkUserAccount($userAccount) {
            $md5Pass = md5($userAccount->password);
            $query = "";

        }


    }



?>