<?php
class Annonce {
    private $conn;
    private $table_name = "Annonces";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDerniersAnnonces() {
        $query = "SELECT * FROM " . $this->table_name ." ORDER BY date_expiration DESC LIMIT 3" ;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getAllAnnonces() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY date_expiration DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
}