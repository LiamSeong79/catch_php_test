<?php
    include_once 'utils.php';
    include_once './exception/internalException.php';

    class DBConfig {
        private const DBHOST = "postgres";
        private const DBUSERNAME = "postgres";
        private const DBUSERPASS= "postgres";
        private const DBNAME = "development";
        private const DBPORT = "5432";
        
        private $dsn = "pgsql:host=". self::DBHOST .";port=". self::DBPORT .";dbname=". self::DBNAME;
        protected $conn = null;

        public function __construct()
        {
            try {
                $this->conn = new PDO($this->dsn, self::DBUSERNAME, self::DBUSERPASS);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new InternalException();
            }

            return $this->conn;
        }
    } 
?>
