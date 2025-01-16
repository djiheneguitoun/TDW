<?php
class StatistiquesModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getStatistiques() {
        $query = "SELECT * FROM statistiques" ;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDons() {
        $query = "SELECT * FROM dons";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBenevolats() {
        $query = "SELECT * FROM benevolats";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
