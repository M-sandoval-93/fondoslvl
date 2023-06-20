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

            if ($user = $statement->fetch()) {
                if ($user['fecha_ingreso'] != null) {
                    $this->setUserName($user['nombre_usuario']);
                    $this->setUserPrivilege($user['id_privilegio']);
                    $this->setUserId($user['id_usuario']);
                    $this->json['privilege'] = $this->getUserPrivilege();

                    // query SQL
                    $query = "UPDATE controlfondo.usuario set controlfondo.fecha_ingreso = CURRENT_TIMESTAMP WHERE controlfondo.id_usuario = ?;";
                    $statment = $this->preConsult($query);
                    $statment->execute();

                }
            }

            // ------------------------------------------------------------------------
            if ($usuario = $sentencia->fetch()) {
                if ($usuario['fecha_ingreso'] != null) {
                    $this->setUsser($usuario['nombre_usuario']);
                    $this->setPrivilege($usuario['id_privilegio']);
                    $this->setId($usuario['id_usuario']);
                    $this->json['privilege'] = $this->getPrivilege();
                }
                $this->json['status'] = $usuario['id_estado'];
                $this->json['id_usuario'] = $usuario['id_usuario'];
                $this->json['fecha_ingreso'] = $usuario['fecha_ingreso'];
                $this->res = true;
            }

            if ($this->json['fecha_ingreso'] != null) {
                $query = "UPDATE controlfondo.usuario SET controlfondo.fecha_ingreso = CURRENT_TIMESTAMP WHERE controlfondo.id_usuario = ?;";
                $sentencia = $this->preConsult($query);
                $sentencia->execute([intval($this->getId())]);
            }

            $this->json['data'] = $this->res;
            $this->closeConnection(); 
            return json_encode($this->json);
            // ------------------------------------------------------------------------

            // keep working on login
            // seguir trabajando en inicio de sesión

        }

        public function newPassword($password) {
            if ($password->onePassword === $password->twoPassword) {
                $md5Password = md5($password->onePassword);
                $query = "";

                $statement = $this->preConsult($query);
                
            }
        }




    }



?>