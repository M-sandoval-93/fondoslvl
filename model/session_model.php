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
            $query = "SELECT (funcionario.nombres_funcionario || ' ' || funcionario.ap_funcionario || ' ' || funcionario.am_funcionario) AS nombre_usuario, 
                controlfondo.usuario.id_privilegio, controlfondo.usuario.id_usuario, controlfondo.usuario.fecha_ingreso, controlfondo.usuario.id_estado
                FROM controlfondo.usuario 
                INNER JOIN funcionario ON funcionario.id_funcionario = controlfondo.usuario.id_funcionario
                WHERE nombre_usuario = ? AND clave_usuario = ?;";

            $statement = $this->preConsult($query);
            $statement->execute([$userAccount->userName, $md5Pass]);

            if ($user = $statement->fetchObject()) {
                // condition to verify that the account has already been initialized with a new passwprd (condición para verificar que la cuenta ya ha sido inicializada con una nueva contraseña)
                if ($user->fecha_ingreso != null) {
                    $this->setUserName($user->nombre_usuario);
                    $this->setUserPrivilege($user->id_privilegio);
                    $this->setUserId($user->id_usuario);
                    $this->json['privilege'] = $this->getUserPrivilege();

                    // sql query to update login date (consulta sql para actualizar la fecha de ingreso al sistema)
                    $query = "UPDATE controlfondo.usuario set fecha_ingreso = CURRENT_TIMESTAMP WHERE id_usuario = ?;";
                    $statment = $this->preConsult($query);
                    $statment->execute([intval($this->getUserId())]);
                }
                // variables obtained to be able to create a new password (variables obtenidas para poder crear nueva contraseña)
                $this->json = array_merge($this->json, 
                    [
                        'status' => $user->id_estado,
                        'id_usuario' => $user->id_usuario,
                        'fecha_ingreso' => $user->fecha_ingreso
                    ]);
                $this->result = true;
            }

            $this->json['data'] = $this->result;
            $this->closeConnection();
            return json_encode($this->json);
        }

        // finnish method and check operation (finalizar metodo y comprobar funcionamiento)
        public function newPassword($password) {
            // if ($password->onePassword === $password->twoPassword) {
            //     $md5Password = md5($password->onePassword);
            //     $query = "";

            //     $statement = $this->preConsult($query);
            //     if ($statement->execute([$md5Password, intval($password->id_usuario)])) {
            //         $this->result = true;
            //     }
            // }
            
            // check operation
            $this->closeConnection();
            return json_encode($this->result);
        }




    }



?>