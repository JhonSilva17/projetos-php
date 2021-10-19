<?php 

    class Banco {
        private $host;
        private $dbname;
        private $pass;
        private $username;

        // Métodos
        public function conectar() {
            $mysqli = new mysqli($this -> getHost(), $this -> getUsername(), $this -> getPass(), $this -> getDbname());
            return $mysqli;
        }

        public function querySQL($sql_code) {
            $edit = $sql_code;
            $query_edit = $this -> conectar() -> query($sql_code);
            return $query_edit;
        }

        // Métodos especiais
        public function __construct($host, $username, $pass, $db) {
            $this -> setHost($host);
            $this -> setUsername($username);
            $this -> setHost($pass);
            $this -> setDbname($db);
        }

        public function getHost(){
            return $this->host;
        }
        public function setHost($host){
            $this->host = $host;
        }
    
        public function getDbname(){
            return $this->dbname;
        }
        public function setDbname($dbname){
            $this->dbname = $dbname;
        }
    
        public function getPass(){
            return $this->pass;
        }
        public function setPass($pass){
            $this->pass = $pass;
        }
    
        public function getUsername(){
            return $this->username;
        }
        public function setUsername($username){
            $this->username = $username;
        }
    }