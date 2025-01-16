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
    public function showAllAvantages() {
        $avantagesData = $this->avantage->getAllAvantages();
        include 'views/avantage_admin.php';
    }

    public function updateRemise() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $avantage_id = $_POST['avantage_id'];
            $valeur_remise = $_POST['valeur_remise'];
            $this->avantage->updateRemise($avantage_id, $valeur_remise);
            header('Location: /elmuntada/admin-dashboard');
        }
    }


    
    
    public function showSpecialRemisesForAllMembers() {
        $avantagesData = $this->avantage->getSpecialRemisesForAllCards();
        $partenaires = $this->avantage->getAllPartenaires();
        $typesCarte = $this->avantage->getAllTypesCarte();
        include 'views/remise_speciale_tous_membres.php';
    }

    public function addRemise() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_avantage = $_POST['nom_avantage'];
            $description = $_POST['description'];
            $type_carte_id = $_POST['type_carte_id'];
            $partenaire_id = $_POST['partenaire_id'];
            $conditions = $_POST['conditions'];
            $date_debut = $_POST['date_debut'];
            $date_fin = $_POST['date_fin'];
            $valeur_remise = $_POST['valeur_remise'];
    
            if ($this->avantage->addRemise($nom_avantage, $description, $type_carte_id, $partenaire_id, $conditions, $date_debut, $date_fin, $valeur_remise)) {
                echo('hello am in ');
                header('Location:/elmuntada/admin-dashboard');
            } else {
                echo "Erreur lors de l'ajout de l'avantage.";
            }
        }
    }
    
}
?>
