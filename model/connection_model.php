<?php

    // inclusion of the configuration data for the connection to the database (inclusión de los datos de configuración para la conexión con la base de datos)
    require_once "../setting/connection_setting.php";

    // class to handle the connection to the database (clase para manejar la coneción con la base de datos)
    class Connection {
        private $connection_db;
        protected $json = array();
        protected $result = false;

        public function __construct() {
            $dns = 'pgsql:host='.DB_HOST.'; port='.DB_PORT.'; dbname='.DB_DATA;

            try {
                $this->connection_db = new PDO($dns, DB_USER, DB_PASSWORD);
                $this-> connection_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $this->connection_db;

            } catch(Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        // method to prepare a query to the database (método para preparar una consulta a la base de datos)
        protected function preConsult($query) {
            return $this->connection_db->prepare($query);
        }

        // method to close the connection to the database (método para cerrar la conexión con la base de datos)
        protected function closeConnection() {
            $this->connection_db = null;
        }
    }



?>