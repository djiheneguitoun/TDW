<?php
require_once 'models/Abonnement.php';

class AbonnementController {
    private $abonnement;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->abonnement = new Abonnement($db);
    }

    public function showAllAbonnements() {
        $abonnements = $this->abonnement->getAllAbonnements();
        
        include 'views/all_abonnements.php';
    }

    public function showMemberAbonnements($membre_id) {
        $abonnements = $this->abonnement->getAbonnementByMembreId($membre_id);
        include 'views/member_payment_history.php';
    }
    public function showReceipt($abonnement_id) {
        $this->abonnement->showReceipt($abonnement_id);
    }
    public function getReceiptPath($abonnement_id) {
        $receiptPath = $this->abonnement->getReceiptPath($abonnement_id);
        if ($receiptPath) {
            echo $receiptPath;
        } else {
            echo "Receipt not found.";
        }
    }
    
    
}
