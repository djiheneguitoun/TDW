<?php
require_once 'models/Utilisateur.php';
require_once 'models/Membre.php';
require_once 'config/database.php';
require_once 'models/TypesCarte.php';
require_once 'models/Abonnement.php';
require_once 'models/Carte.php';


class MembreController {
    private $utilisateur;
    private $membre;
    private $typesCarte;
    private $abonnement;
    private $carte;



    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $database = new Database();
        $db = $database->getConnection();
        $this->utilisateur = new Utilisateur($db);
        $this->membre = new Membre($db);
        $this->typesCarte = new TypesCarte($db);
        $this->abonnement = new Abonnement($db);
        $this->carte = new Carte($db);
    }

    public function showUpdateForm() {
        if (!isset($_SESSION['utilisateur_id'])) {
            header('Location: /elmuntada/login');
            exit();
        }
        $utilisateur_id = $_SESSION['utilisateur_id'];
       
        $user = $this->utilisateur->getUserByEmail($_SESSION['email']);
        $membre = $this->membre->getMembreByUtilisateurId($utilisateur_id);
        include 'views/update_membre.php';
    }

    public function handleUpdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $utilisateur_id = $_SESSION['utilisateur_id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
    
            error_log("Updating user: $utilisateur_id, $nom, $prenom, $email, $mot_de_passe");
            error_log("Updating membre: $telephone, $adresse");
    
            $this->utilisateur->updateUser($utilisateur_id, $nom, $prenom, $email, $mot_de_passe);
    
            $this->membre->updateMembre($utilisateur_id, $telephone, $adresse);
    
            header('Location: /elmuntada/membre-dashboard');
        } else {
            header('Location: /elmuntada/membre-dashboard');
        }
    }
    
    public function showMembershipApplicationForm() {
        if (!isset($_SESSION['utilisateur_id'])) {
            header('Location: /elmuntada/login');
            exit();
        }
        $typesCarteData = $this->typesCarte->getAllTypesCarte();

        include 'views/membership_application.php';
    }


    public function showValidateMembres() {
        $membres = $this->membre->getNonValidatedMembres();
        include 'views/validate_membres.php';
    }

    public function validateMembre() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $membre_id = $_POST['membre_id'];
            $this->membre->validateMembre($membre_id);
            $this->carte->updateCarte($carte['carte_id'], $type_carte_id);

            header('Location: /elmuntada/validate-membres');
        }
    }
    public function showMembreDetails($membre_id) {
        echo $membre_id;
        $membre = $this->membre->getMembreInfoByMembreId($membre_id);
        include 'views/view_membre_details.php';
    }

    public function showValidatedMembres() {
        $membres = $this->membre->getAllValidatedMembres();
        include 'views/validated_membres.php';
    }
    
}
