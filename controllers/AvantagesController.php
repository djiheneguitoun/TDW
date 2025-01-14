<?php
require_once 'models/Avantage.php';
require_once 'config/database.php';

class AvantagesController {
    private $avantage;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->avantage = new Avantage($db);
    }

    public function showAvantages() {
        $membre_id = $_SESSION['membre_id']; 

        $avantagesData = $this->avantage->getAvantagesMembre($membre_id);

        include 'views/avantages_membre.php';

    }
    public function remiseSpeciale() {
        $membre_id = $_SESSION['membre_id'];
        $avantagesData = $this->avantage->getAvantagesMembre($membre_id);

        include 'views/remise_speciale.php';

    }
}
?>
