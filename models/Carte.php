<?php
require_once __DIR__ . '/../vendor/autoload.php'; 
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class Carte {
    private $conn;
    private $table_name = "Cartes";

    public function __construct($db) {
        $this->conn = $db;
    }



    //
    public function createCarte($membre_id, $type_carte_id, $code_qr) {
        $query = "INSERT INTO Cartes (membre_id, type_carte_id, date_creation, date_expiration, code_qr) VALUES (?, ?, NULL,NULL, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $membre_id);
        $stmt->bindParam(2, $type_carte_id);
        $stmt->bindParam(3, $code_qr);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    //
    public function generateMembershipCard($membre_id ,$type_carte_id) {
        $qr_code = 'qr_code_' . $membre_id . '.png';
        $qrCode = new QrCode('Member ID: ' . $membre_id);
        $writer = new PngWriter();
        $result = $writer->writeDataUri($qrCode);
        file_put_contents('uploads/' . $qr_code, base64_decode(explode(',', $result)[1]));
        $carte_id=  $this->createCarte($membre_id, $type_carte_id, $qr_code);
        return $carte_id;
    }

    public function updateCarte($carte_id, $type_carte_id) {
        $query = "UPDATE Cartes SET type_carte_id = ? WHERE carte_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $type_carte_id);
        $stmt->bindParam(2, $carte_id);
        return $stmt->execute();
    }

    public function getCarteByMembreId($membre_id) {
        $query = "SELECT c.*, u.nom, u.prenom, m.adresse, m.adresse, m.photo FROM Cartes c JOIN Membres m ON c.membre_id = m.membre_id JOIN Utilisateurs u ON m.utilisateur_id = u.utilisateur_id WHERE c.membre_id = :membre_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':membre_id', $membre_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
}
