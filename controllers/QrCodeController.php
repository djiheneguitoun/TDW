<?php
require_once 'models/Carte.php';

class QrCodeController {
    private $carteModel;
    private $membre;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->carteModel = new Carte($db);
        $this->membre = new Membre($db);
    }

    public function scanQrCode() {
        include 'views/scan_qr_code.php';
    }

    public function getMembreInfo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $membre_id = $data['membre_id'];

            $membre = $this->membre->getMembreInfoByMembreId($membre_id);
            if ($membre) {
                echo json_encode(['success' => true, 'membre' => $membre]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Membre not found']);
            }
        }
    }
}
?>
