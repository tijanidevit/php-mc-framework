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
        private $query = '';
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

        public function query($query = '')
        {
            if ($query == '') {
                $this->stmt = $this->dbh->prepare($this->query);
            }
            else{
                $this->stmt = $this->dbh->prepare($query);
            }
            
        }

        public function bind($param, $value, $type = null)
        {
            if (is_null($type)) {
                switch ($type) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;     
                    
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute()
        {
            if ($this->query != '') {
                $this->query();
            }
            return $this->stmt->execute();
        }

        public function fetchAll()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function fetchOne()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount()
        {
            $this->execute();
            return $this->stmt->rowCount(PDO::FETCH_OBJ);
        }

        public function select($column)
        {
            $this->query = 'SELECT '. $column . ' ';
        }

        public function from($tableName)
        {
            $this->query .= ' FROM '. $tableName . ' ';
        }

        public function where($data)
        {
            $array_count = count($data);
            if ($array_count == 1) {
                $column = array_keys($data)[0];
                $value = $data[$column];
                $value = '"'.$value.'"';
                var_dump($value);
                $this->query .= 'WHERE '. $column . ' = ' . $value;

                echo $this->query;
            }
            else{
                
            }
        }


    }