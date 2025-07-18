<?php
require_once 'models/Don.php';
require_once 'config/database.php';

class DonController {
    private $don;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->don = new Don($db);
    }

    public function makeDonation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $utilisateur_id = $_POST['utilisateur_id'];
            $montant = $_POST['montant'];
    
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["recu_paiement"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $error_message = "";
    
            $check = getimagesize($_FILES["recu_paiement"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                $error_message = "Le fichier n'est pas une image.";
            }
    
            if ($_FILES["recu_paiement"]["size"] > 500000) {
                $uploadOk = 0;
                $error_message = "Désolé, votre fichier est trop volumineux.";
            }
    
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "pdf") {
                $uploadOk = 0;
                $error_message = "Désolé, seuls les fichiers JPG, JPEG, PNG, GIF et PDF sont autorisés.";
            }
    
            if ($uploadOk == 0) {
                echo $error_message;
            } else {
                if (move_uploaded_file($_FILES["recu_paiement"]["tmp_name"], $target_file)) {
                    $don_id = $this->don->createDon($utilisateur_id, $montant, $target_file);
                    if ($don_id) {
                        $_SESSION['success_message'] = "Don effectué avec succès!";
                        header('Location: /elmuntada/membre-dashboard');
                        exit();
                    } else {
                        $_SESSION['success_message'];
                    }
                } else {
                    echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
                }
            }
        } else {
            include 'views/make_donation.php';
        }
    }
    

    public function viewDonsByMembre($utilisateur_id) {
        $dons = $this->don->getDonsByMembre($utilisateur_id);
        include 'views/view_dons_by_membre.php';
    }
    public function viewAllDons() {
        $dons = $this->don->getAllDons();
        include 'views/view_all_dons.php';
    }

    public function validateDon($don_id) {
        if ($this->don->validateDon($don_id)) {
            $_SESSION['success_message'] = "Don validé avec succès!";
        } else {
            $_SESSION['error_message'] = "Erreur lors de la validation du don.";
        }
        header('Location: /elmuntada/admin-dashboard');
        exit();
    }
}
