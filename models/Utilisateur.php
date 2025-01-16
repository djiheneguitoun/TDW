<?php
class Utilisateur {
    private $conn;
    private $table_name = "Utilisateurs";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createUser($nom, $prenom, $email, $mot_de_passe) {
        $query = "INSERT INTO " . $this->table_name . " (nom, prenom, email, mot_de_passe, date_creation) VALUES (?, ?, ?, ?, CURDATE())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $mot_de_passe);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isAdmin($utilisateur_id) {
        $query = "SELECT * FROM Administrateurs WHERE utilisateur_id = :utilisateur_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isPartenaire($utilisateur_id) {
        $query = "SELECT * FROM Partenaires WHERE utilisateur_id = :utilisateur_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isMembre($utilisateur_id) {
        $query = "SELECT * FROM Membres WHERE utilisateur_id = :utilisateur_id AND valide = TRUE";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUser($utilisateur_id, $nom, $prenom, $email, $mot_de_passe) {
        $query = "UPDATE " . $this->table_name . " SET nom = ?, prenom = ?, email = ?, mot_de_passe = ? WHERE utilisateur_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $mot_de_passe);
        $stmt->bindParam(5, $utilisateur_id);
        return $stmt->execute();
    }
    public function createUtilisateur($nom, $prenom, $email, $mot_de_passe) {
        echo "createUtilisateur";
        $query = "INSERT INTO Utilisateurs (nom, prenom, email, mot_de_passe, date_creation) VALUES (?, ?, ?, ?, CURDATE())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $mot_de_passe]);
        return $this->conn->lastInsertId();
    }
    
}