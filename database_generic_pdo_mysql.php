<?php

class Database {

        private $SERVIDOR = "" //ip o localhost;
        private $BASE_DE_DATOS = ""//nombre base de datos;
        private $USUARIO= ""//usuario base de datos;
        private $PASSWORD= "" // password;
        public $conn;

        public function getConnection(){
            try {
                $this->conn = new PDO ("mysql:host=".$this->SERVIDOR.";dbname=".$this->BASE_DE_DATOS, $this->USUARIO, $this->PASSWORD);
            }
            catch(PDOException $e){
                echo 'ERROR:de conexión ' . $e->getMessage() .'-CODIGO: ' .$e->getCode()   ;
            }
            return $this->conn;
        }

}


