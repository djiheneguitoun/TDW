<?php
require_once __DIR__ . '/../vendor/autoload.php'; 
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class Abonnement {
    private $conn;
    private $table_name = "Abonnements";

    public function __construct($db) {
        $this->conn = $db;
    }


    public function createAbonnement($membre_id,$carte_id, $recu_paiement) {
        $query = "INSERT INTO Abonnements (membre_id, carte_id, recu_paiement) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $membre_id);
        $stmt->bindParam(2, $carte_id);
        $stmt->bindParam(3, $recu_paiement);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
   

    public function getAbonnementByMembreId($membre_id) {
        $query = "SELECT a.*, c.code_qr, tc.nom as type_carte, a.status, u.nom, u.prenom
                  FROM Abonnements a
                  JOIN Cartes c ON a.carte_id = c.carte_id
                  JOIN TypesCarte tc ON c.type_carte_id = tc.type_carte_id
                  JOIN Membres m ON a.membre_id = m.membre_id
                  JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id
                  WHERE a.membre_id = :membre_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':membre_id', $membre_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAbonnements() {
        $query = "SELECT a.*, c.code_qr, tc.nom as type_carte, a.status, u.nom, u.prenom
                  FROM Abonnements a
                  JOIN Cartes c ON a.carte_id = c.carte_id
                  JOIN TypesCarte tc ON c.type_carte_id = tc.type_carte_id
                  JOIN Membres m ON a.membre_id = m.membre_id
                  JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getPendingAbonnements() {
        $query = "SELECT a.*, u.nom, u.prenom, u.email, c.code_qr
                  FROM Abonnements a
                  JOIN Membres m ON a.membre_id = m.membre_id
                  JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id
                  JOIN Cartes c ON a.carte_id = c.carte_id
                  WHERE a.status = 'pending'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function validateAbonnement($abonnement_id) {
        $query = "SELECT membre_id, carte_id FROM Abonnements WHERE abonnement_id = :abonnement_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':abonnement_id', $abonnement_id);
        $stmt->execute();
        $abonnement = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($abonnement) {
            $carte_id = $abonnement['carte_id'];
    
            // Update the card dates
            $queryCarte = "UPDATE Cartes
                           SET date_creation = CURDATE(),
                               date_expiration = DATE_ADD(CURDATE(), INTERVAL 1 YEAR)
                           WHERE carte_id = :carte_id";
            $stmtCarte = $this->conn->prepare($queryCarte);
            $stmtCarte->bindParam(':carte_id', $carte_id);
            $stmtCarte->execute();
    
            // Update the subscription status
            $queryAbonnement = "UPDATE Abonnements
                               SET status = 'approuve'
                               WHERE abonnement_id = :abonnement_id";
            $stmtAbonnement = $this->conn->prepare($queryAbonnement);
            $stmtAbonnement->bindParam(':abonnement_id', $abonnement_id);
            $stmtAbonnement->execute();
    
        }
    }

    public function showReceipt($abonnement_id) {
        $query = "SELECT recu_paiement FROM Abonnements WHERE abonnement_id = :abonnement_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':abonnement_id', $abonnement_id);
        $stmt->execute();
        $receipt = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($receipt) {
            $receipt_path = 'uploads/' . $receipt['recu_paiement'];
            if (file_exists($receipt_path)) {
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . $receipt['recu_paiement'] . '"');
                readfile($receipt_path);
            } else {
                echo "Receipt not found.";
            }
        } else {
            echo "Abonnement not found.";
        }
    }
    
    public function getReceiptPath($abonnement_id) {
        $query = "SELECT recu_paiement FROM Abonnements WHERE abonnement_id = :abonnement_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':abonnement_id', $abonnement_id);
        $stmt->execute();
        $receipt = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($receipt) {
            return 'uploads/' . $receipt['recu_paiement'];
        } else {
            return null;
        }
    }
    
    
}
