<?php
require_once 'models/Annonce.php';
require_once 'config/database.php';

class AnnonceController {
    private $annonce;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->annonce = new Annonce($db);
    }

    public function showAll() {
        $annonces = $this->annonce->getAllAnnonces();
        $annoncesData = [];
        while ($row = $annonces->fetch(PDO::FETCH_ASSOC)) {
            $annoncesData[] = $row;
        }
        include 'views/all_annonces.php';
    }
}
