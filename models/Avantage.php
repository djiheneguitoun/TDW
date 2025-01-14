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
    
}
