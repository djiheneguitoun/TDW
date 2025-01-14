<?php
// models/Partenaire.php
class Partenaire {
    private $conn;
    private $table_name = "Partenaires";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPartenairesByCategory($categoryId) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE categorie_id = ? ORDER BY nom_etabisement ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function getAllCategories() {
        $query = "SELECT * FROM Categories ORDER BY nom ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getAllPartenaires() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getPartenairesByVille($ville) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ville = ? ORDER BY nom_etabisement ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $ville, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
    public function getPartenaireById($partenaire_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE partenaire_id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $partenaire_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
