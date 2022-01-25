<?php
    //DB Class - PDO
    // Connect and perform operations on DB


    class Database{
        private $host = DBHOST;
        private $username = DBUSER;
        private $password = DBPASS;
        private $dbname = DBNAME;


        private $dbh;
        private $stmt;
        private $error;
        
        public function __construct(){
            $dsn = 'mysql:host='. $this->host. ';dbname=' . $this->dbname;

            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];

            try {
                $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
    }