<?php
    include_once 'dbConfig.php';

    class DBCustomers extends DBConfig {
        public function fetchAll() {
            $sql = "SELECT id, first_name, last_name, email, gender, ip_address, company, city, title, website FROM customers";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll();
            return $records;
        }

        public function fetchPage($limit, $offset) {
            $sql = "SELECT id, first_name, last_name, email, gender, ip_address, company, city, title, website FROM customers";
            $sql .= " Order by id ASC LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['limit'=>$limit, 'offset'=>$offset]);
            $records = $stmt->fetchAll();
            return $records;
        }

        public function fetchCount() {
            $sql = "SELECT count(id) FROM customers";
            $stmt = $this->conn->query($sql);
            $totalRows = $stmt->fetchColumn();
            return $totalRows;
        }
    }

?>