<?php
class Avantage {
    private $conn;
    private $table_name = "Avantages";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAvantagesMembres($page, $limit) {
        $offset = ($page - 1) * $limit;
        $query = "SELECT a.*, p.nom_etabisement, p.ville, tc.nom AS type_carte_nom
                  FROM " . $this->table_name . " a
                  JOIN Partenaires p ON a.partenaire_id = p.partenaire_id
                  JOIN TypesCarte tc ON a.type_carte_id = tc.type_carte_id
                  LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function getTotalAvantages() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    public function getAllAvantages() {
        $query = "SELECT a.*, p.nom_etabisement, p.ville, tc.nom AS type_carte_nom
                  FROM " . $this->table_name . " a
                  JOIN Partenaires p ON a.partenaire_id = p.partenaire_id
                  JOIN TypesCarte tc ON a.type_carte_id = tc.type_carte_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRemise($avantage_id, $valeur_remise) {
        $query = "UPDATE " . $this->table_name . " SET valeur_remise = :valeur_remise WHERE avantage_id = :avantage_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':valeur_remise', $valeur_remise, PDO::PARAM_STR);
        $stmt->bindParam(':avantage_id', $avantage_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    
    public function getAvantagesMembre($membre_id) {
        // Récupérer le type de carte du membre
        $query = "SELECT c.type_carte_id
                  FROM Cartes c
                  JOIN Membres m ON c.membre_id = m.membre_id
                  WHERE m.membre_id = :membre_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':membre_id', $membre_id, PDO::PARAM_INT);
        $stmt->execute();
        $type_carte_id = $stmt->fetchColumn();
    
        // Récupérer les avantages pour le type de carte spécifié
        $query = "SELECT a.*, a.date_fin, p.nom_etabisement, p.ville, tc.nom AS type_carte_nom
                  FROM " . $this->table_name . " a
                  JOIN Partenaires p ON a.partenaire_id = p.partenaire_id
                  JOIN TypesCarte tc ON a.type_carte_id = tc.type_carte_id
                  WHERE a.type_carte_id = :type_carte_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type_carte_id', $type_carte_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getSpecialRemisesForAllCards() {
        $query = "SELECT a.*, p.nom_etabisement, p.ville, tc.nom AS type_carte_nom
                  FROM " . $this->table_name . " a
                  JOIN Partenaires p ON a.partenaire_id = p.partenaire_id
                  JOIN TypesCarte tc ON a.type_carte_id = tc.type_carte_id
                  WHERE a.type_avantage = 'remise' AND a.date_fin IS NOT NULL";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addRemise($nom_avantage, $description, $type_carte_id, $partenaire_id, $conditions, $date_debut, $date_fin, $valeur_remise) {
        $query = "INSERT INTO " . $this->table_name . " (nom_avantage, description, type_carte_id, partenaire_id, type_avantage, conditions, date_debut, date_fin, valeur_remise, statut)
                  VALUES (:nom_avantage, :description, :type_carte_id, :partenaire_id, 'remise', :conditions, :date_debut, :date_fin, :valeur_remise, 'actif')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nom_avantage', $nom_avantage);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type_carte_id', $type_carte_id);
        $stmt->bindParam(':partenaire_id', $partenaire_id);
        $stmt->bindParam(':conditions', $conditions);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);
        $stmt->bindParam(':valeur_remise', $valeur_remise);
        return $stmt->execute();
    }


    public function getAllPartenaires() {
        $query = "SELECT partenaire_id, nom_etabisement FROM Partenaires";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTypesCarte() {
        $query = "SELECT type_carte_id, nom FROM TypesCarte";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
