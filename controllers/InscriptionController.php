<?php
require_once 'models/Utilisateur.php';
require_once 'models/Membre.php';
require_once 'models/TypesCarte.php';
require_once 'config/database.php';
require_once 'models/Abonnement.php';
require_once 'models/Carte.php';

class InscriptionController {
    private $utilisateur;
    private $membre;
    private $typesCarte;
    private $abonnement;
    private $carte;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->utilisateur = new Utilisateur($db);
        $this->membre = new Membre($db);
        $this->typesCarte = new TypesCarte($db);
        $this->abonnement = new Abonnement($db);
        $this->carte = new Carte($db);
    }

    public function showForm() {
        include 'views/inscription.php';
    }

    public function handleUserInscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

            // Create user
            $utilisateur_id = $this->utilisateur->createUser($nom, $prenom, $email, $mot_de_passe);

            header('Location: /elmuntada/inscription-success');
        } 
    }

       public function handleMembershipApplication() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $utilisateur_id = $_SESSION['utilisateur_id'];
            $telephone = $_POST['telephone'];
            $ville = $_POST['ville'];
            $photo = $_FILES['photo']['name'];
            $piece_identite = $_FILES['piece_identite']['name'];
            $recu_paiement = $_FILES['recu_paiement']['name'];
            $type_carte_id = $_POST['type_carte'];

            $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
            if (!in_array($_FILES['photo']['type'], $allowed_types) ||
                !in_array($_FILES['piece_identite']['type'], $allowed_types) ||
                !in_array($_FILES['recu_paiement']['type'], $allowed_types)) {
                echo "Invalid file type.";
                return;
            }

            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $photo);
            move_uploaded_file($_FILES['piece_identite']['tmp_name'], $upload_dir . $piece_identite);
            move_uploaded_file($_FILES['recu_paiement']['tmp_name'], $upload_dir . $recu_paiement);

            $this->membre->createMembre($utilisateur_id, $telephone,  $ville, $photo, $piece_identite, $recu_paiement);

            $membre=$this->membre->getMembreByUtilisateurId($utilisateur_id) ;
            $carte_id =$this->carte->generateMembershipCard($membre['membre_id'], $type_carte_id);
            $this->abonnement->createAbonnement($membre['membre_id'],$carte_id, $recu_paiement);


            header('Location: /elmuntada/demande-en-traitement');
        }
    }

}
