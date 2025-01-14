<?php
require_once __DIR__ . '/../vendor/autoload.php'; 
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class Membre {
    private $conn;
    private $table_name = "Membres";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createMembre($utilisateur_id, $telephone,  $ville, $photo, $piece_identite, $recu_paiement) {
        $query = "INSERT INTO " . $this->table_name . " (utilisateur_id, telephone, adresse, date_inscription, photo, piece_identite, recu_paiement) 
        VALUES (?, ?, ?,  NULL, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $utilisateur_id);
        $stmt->bindParam(2, $telephone);
        $stmt->bindParam(3, $ville);
        $stmt->bindParam(4, $photo);
        $stmt->bindParam(5, $piece_identite);
        $stmt->bindParam(6, $recu_paiement);
        $stmt->execute();
        $membre_id=$this->conn->lastInsertId();
        return $this->conn->lastInsertId();
    }
    
   
 

    public function updateMembre($utilisateur_id, $telephone, $adresse) {
        $query = "UPDATE " . $this->table_name . " SET telephone = ?, adresse = ? WHERE utilisateur_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $telephone);
        $stmt->bindParam(2, $adresse);
        $stmt->bindParam(3, $utilisateur_id);
        return $stmt->execute();
    }
    
    public function getMembreByUtilisateurId($utilisateur_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE utilisateur_id = :utilisateur_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getMembreInfoByMembreId($membre_id) {
        $query = "SELECT m.telephone, m.adresse, m.date_inscription,
                         m.photo, m.piece_identite, m.recu_paiement, m.valide,
                         u.nom, u.prenom, u.email,
                         c.type_carte_id, c.code_qr,
                         tc.nom AS type_carte_nom
                  FROM " . $this->table_name . " m
                  JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id
                  LEFT JOIN Cartes c ON m.membre_id = c.membre_id
                  LEFT JOIN TypesCarte tc ON c.type_carte_id = tc.type_carte_id
                  WHERE m.membre_id = :membre_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':membre_id', $membre_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllValidatedMembres() {
        $query = "SELECT m.*, u.nom, u.prenom, u.email,
                         c.type_carte_id, c.code_qr,
                         tc.nom AS type_carte_nom
                  FROM " . $this->table_name . " m
                  JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id
                  LEFT JOIN Cartes c ON m.membre_id = c.membre_id
                  LEFT JOIN TypesCarte tc ON c.type_carte_id = tc.type_carte_id
                  WHERE m.valide = TRUE";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        

    public function updateMembreReceipt($membre_id, $recu_paiement) {
        $query = "UPDATE " . $this->table_name . " SET recu_paiement = ? WHERE membre_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $recu_paiement);
        $stmt->bindParam(2, $membre_id);
        return $stmt->execute();
    }
    

    public function getNonValidatedMembres() {
        $query = "SELECT m.*, u.nom, u.prenom, u.email
                  FROM " . $this->table_name . " m
                  JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id
                  WHERE m.valide = FALSE";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function validateMembre($membre_id) {
        $query = "UPDATE " . $this->table_name . " SET valide = TRUE,date_inscription = CURDATE()
         WHERE membre_id = :membre_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':membre_id', $membre_id);
        $stmt->execute();

        $queryCarte = "UPDATE Cartes 
        SET date_creation = CURDATE(), 
            date_expiration = DATE_ADD(CURDATE(), INTERVAL 1 YEAR) 
        WHERE membre_id = :membre_id";
        $stmtCarte = $this->conn->prepare($queryCarte);
        $stmtCarte->bindParam(':membre_id', $membre_id);
        $stmtCarte->execute();

        $queryAbonnement = "UPDATE Abonnements 
        SET status = 'approuve' 
        WHERE membre_id = :membre_id AND status = 'pending'";
        $stmtAbonnement = $this->conn->prepare($queryAbonnement);
        $stmtAbonnement->bindParam(':membre_id', $membre_id);
        $stmtAbonnement->execute();
    }


    
    
}
