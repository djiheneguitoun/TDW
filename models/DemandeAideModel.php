<?php
class DemandeAideModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTypesAide() {
        $query = "SELECT type_aide_id, nom FROM TypesAide";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertDemandeAide($nom, $prenom, $date_naissance, $type_aide, $description, $fichier) {
        $query = "INSERT INTO DemandesAide (nom, prenom, date_naissance, type_aide_id, description, chemin_fichier, statut) VALUES (?, ?, ?, ?, ?, ?, 'en_attente')";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nom, $prenom, $date_naissance, $type_aide, $description, $fichier]);
    }
}
?>
