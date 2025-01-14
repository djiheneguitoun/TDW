<?php
class TypesCarte {
    private $conn;
    private $table_name = "TypesCarte";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllTypesCarte() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    
}
