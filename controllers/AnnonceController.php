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

     public function createAnnonce() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $type_annonce = $_POST['type_annonce'];
            $image = $_POST['image'];
            $date_publication = $_POST['date_publication'];
            $date_expiration = $_POST['date_expiration'];
            $priorite = $_POST['priorite'];
            $statut = $_POST['statut'];

            $result = $this->annonce->createAnnonce($titre, $description, $type_annonce, $image, $date_publication, $date_expiration, $priorite, $statut);
            if ($result) {
                $_SESSION['success_message'] = "Annonce créée avec succès!";
            } else {
                $_SESSION['error_message'] = "Échec de la création de l'annonce.";
            }
            header('Location: /elmuntada/annonces');
            exit();
        }
    }
}
