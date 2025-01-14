<?php
require_once 'models/Membre.php';
require_once 'config/database.php';
require_once 'models/TypesCarte.php';
require_once 'models/Carte.php';
require_once 'models/Abonnement.php';


class CarteController {
    private $membre;
    private $typesCarte;
    private $carte;
    private $abonnement;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->membre = new Membre($db);
        $this->carte = new Carte($db);
        $this->typesCarte = new TypesCarte($db);
        $this->abonnement = new Abonnement($db);
    }

   
    
    public function showCarte($membre_id) {
        $carte = $this->carte->getCarteByMembreId($membre_id);
        $typesCarte = $this->typesCarte->getAllTypesCarte();
        include 'views/carte.php';
    }

    public function handleRenewal() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $membre_id = $_POST['membre_id'];
            $type_carte_id = $_POST['type_carte_id'];
            $recu_paiement = $_FILES['recu_paiement']['name'];
    
            $allowed_types = ['image/png', 'image/jpeg', 'application/pdf'];
            $file_type = mime_content_type($_FILES['recu_paiement']['tmp_name']);
    
            if (!in_array($file_type, $allowed_types)) {
                echo "Invalid file type.";
                return;
            }
    
            $upload_dir = 'uploads/';
            move_uploaded_file($_FILES['recu_paiement']['tmp_name'], $upload_dir . $recu_paiement);
    

            $carte = $this->carte->getCarteByMembreId($membre_id);
            $this->carte->updateCarte($carte['carte_id'], $type_carte_id);
            $this->abonnement->createAbonnement($membre_id, $carte['carte_id'], $recu_paiement);
            $this->membre->updateMembreReceipt($membre_id, $recu_paiement);
            header('Location: /elmuntada/membre-dashboard');
        }
    }

    public function handlePendingAbonnements() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $pendingAbonnements = $this->abonnement->getPendingAbonnements();
            foreach ($pendingAbonnements as &$abonnement) {
                $abonnement['receipt_path'] = $this->abonnement->getReceiptPath($abonnement['abonnement_id']);
            }
            include 'views/pending_abonnements.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];
            $abonnement_id = $_POST['abonnement_id'];
    
            if ($action === 'validate') {
                $this->abonnement->validateAbonnement($abonnement_id);
                header('Location: /elmuntada/membre-dashboard');
            } elseif ($action === 'show_receipt') {
                $receipt_path = $this->abonnement->getReceiptPath($abonnement_id);
                if ($receipt_path) {
                    echo json_encode(['path' => $receipt_path]);
                } else {
                    echo json_encode(['error' => 'Receipt not found']);
                }
            }
        }
    }
    
    public function showReceipt($abonnement_id) {
        $this->abonnement->showReceipt($abonnement_id);
    }
    
    
}
