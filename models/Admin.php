<?php
class Admin {
    private $conn;
    private $table_name = "Administrateurs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT a.*, u.nom, u.prenom, u.email 
                 FROM " . $this->table_name . " a
                 JOIN Utilisateurs u ON a.utilisateur_id = u.utilisateur_id
                 ORDER BY a.admin_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}