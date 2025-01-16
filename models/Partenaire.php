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
    
    public function getPartenaireByUserId($utilisateur_id) {
        $query = "SELECT p.*, c.nom AS categorie_nom, c.description AS categorie_description
        FROM " . $this->table_name . " p
        LEFT JOIN Categories c ON p.categorie_id = c.categorie_id
        WHERE p.utilisateur_id = ? LIMIT 1";
                $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $utilisateur_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getPartenaires() {
        $query = "SELECT p.*, c.nom AS categorie_nom
                  FROM " . $this->table_name . " p
                  JOIN Categories c ON p.categorie_id = c.categorie_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createPartenaire($utilisateur_id, $nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $logo) {
        echo $utilisateur_id;
        $query = "INSERT INTO Partenaires (utilisateur_id, nom_etabisement, remise_percentage, categorie_id, details, ville, logo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$utilisateur_id, $nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $logo]);
    }
    
    public function updatePartenaire($partenaire_id, $nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $logo) {
        if ($logo) {
            $query = "UPDATE " . $this->table_name . " SET nom_etabisement = ?, remise_percentage = ?, categorie_id = ?, details = ?, ville = ?, logo = ? WHERE partenaire_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $logo, $partenaire_id]);
        } else {
            $query = "UPDATE " . $this->table_name . " SET nom_etabisement = ?, remise_percentage = ?, categorie_id = ?, details = ?, ville = ? WHERE partenaire_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $partenaire_id]);
        }
    }

    public function deletePartenaire($partenaire_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE partenaire_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$partenaire_id]);
    }
    
}
