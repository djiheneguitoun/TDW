<?php
require_once 'models/Evenement.php';
require_once 'config/database.php';

class EvenementController {
    private $evenement;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->evenement = new Evenement($db);
    }

    public function listUpcomingEvents() {
        $events = $this->evenement->getUpcomingEvents();
        include 'views/list_upcoming_events.php';
    }

    public function registerForEvent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $membre_id = $_POST['membre_id'];
            $evenement_id = $_POST['evenement_id'];

            $result = $this->evenement->registerBenevole($membre_id, $evenement_id);
            if ($result) {
                $_SESSION['success_message'] = "Inscription réussie!";
            } else {
                $_SESSION['error_message'] = "Inscription échouée. Vous êtes déjà inscrit ou le nombre maximum de bénévoles a été atteint.";
            }
            header('Location: /elmuntada/membre-dashboard');
            exit();
        }
    }

    public function listBenevolats() {
        $benevolats = $this->evenement->getBenevolatsWithDetails();
        include 'views/list_benevolats.php';
    }
}
