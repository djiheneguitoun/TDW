<?php
require_once 'models/Utilisateur.php';
require_once 'models/Membre.php';
require_once 'models/Partenaire.php';
require_once 'config/database.php';
require_once 'models/TypesCarte.php';
require_once 'models/Abonnement.php';
require_once 'models/Carte.php';

class PartenaireController {
    private $utilisateur;
    private $membre;
    private $partenaire;
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
        $this->partenaire = new Partenaire($db);
        $this->typesCarte = new TypesCarte($db);
        $this->abonnement = new Abonnement($db);
        $this->carte = new Carte($db);
    }

    public function showPartenaireInfo() {
        if (!isset($_SESSION['utilisateur_id'])) {
            header('Location: /elmuntada/login');
            exit();
        }
        $utilisateur_id = $_SESSION['utilisateur_id'];

        $partenaire = $this->partenaire->getPartenaireByUserId($utilisateur_id);
        include 'views/partenaire_info.php';
    }

    public function showPartenaires() {
        $partenairesData = $this->partenaire->getPartenaires();
        $categoriess = $this->partenaire->getAllCategories();
        
        include 'views/partenaires.php';
        
    }
    
    public function showPartenaires2() {
        $partenairesData = $this->partenaire->getPartenaires();
        $categoriess = $this->partenaire->getAllCategories();
        
        include 'views/gestion_partenaire.php';
        
    }
    public function addPartenaire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "am in add partenaire";
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
            $nom_etabisement = $_POST['nom_etabisement'];
            $remise_percentage = $_POST['remise_percentage'];
            $categorie_id = $_POST['categorie_id'];
            $details = $_POST['details'];
            $ville = $_POST['ville'];
echo "am in add partenaire2";
            $logo = $_FILES['logo']['name'];
            $logo_tmp = $_FILES['logo']['tmp_name'];
            $logo_path = 'uploads/' . $logo;
            move_uploaded_file($logo_tmp, $logo_path);
echo "am in add partenaire3";
            $utilisateur_id = $this->utilisateur->createUtilisateur($nom, $prenom, $email, $mot_de_passe);
echo "am in add partenaire4";
            $this->partenaire->createPartenaire($utilisateur_id, $nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $logo);
echo "am in add partenaire5";
           
        }
    }
    public function getPartenaire() {
        if (isset($_GET['id'])) {
            $partenaire_id = $_GET['id'];
            $partenaire = $this->partenaire->getPartenaireById($partenaire_id);
            echo json_encode($partenaire);
        }
    }

    public function updatePartenaire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partenaire_id = $_POST['partenaire_id'];
            $nom_etabisement = $_POST['nom_etabisement'];
            $remise_percentage = $_POST['remise_percentage'];
            $categorie_id = $_POST['categorie_id'];
            $details = $_POST['details'];
            $ville = $_POST['ville'];

            // Upload du logo
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
                $logo = $_FILES['logo']['name'];
                $logo_tmp = $_FILES['logo']['tmp_name'];
                $logo_path = 'uploads/' . $logo;
                move_uploaded_file($logo_tmp, $logo_path);
            } else {
                $logo = null; // No new logo uploaded
            }

            $this->partenaire->updatePartenaire($partenaire_id, $nom_etabisement, $remise_percentage, $categorie_id, $details, $ville, $logo);

            // Rediriger vers la page des partenaires
            header('Location: /elmuntada/admin-dashboard');
        }
    }

    public function deletePartenaire() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $partenaire_id = $data['partenaire_id'];
            $this->partenaire->deletePartenaire($partenaire_id);

            // Rediriger vers la page des partenaires
            header('Location: /elmuntada/admin-dashboard');
        }
    }
}
?>
