<?php
class Don {
    private $conn;
    private $table_name = "Dons";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createDon($utilisateur_id, $montant, $recu_paiement) {
        $query = "INSERT INTO " . $this->table_name . " (utilisateur_id, montant, date_don, recu_paiement) VALUES (?, ?, CURDATE(), ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $utilisateur_id);
        $stmt->bindParam(2, $montant);
        $stmt->bindParam(3, $recu_paiement);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getDonReceipt($don_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE don_id = :don_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':don_id', $don_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getDonsByMembre($utilisateur_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE utilisateur_id = :utilisateur_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllDons() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validateDon($don_id) {
        $query = "UPDATE " . $this->table_name . " SET valide = 'approuve' WHERE don_id = :don_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':don_id', $don_id);
        return $stmt->execute();
    }
}
