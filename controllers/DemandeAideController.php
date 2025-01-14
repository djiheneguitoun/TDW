<?php
require_once 'models/DemandeAideModel.php';
require_once 'config/database.php';

class DemandeAideController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new DemandeAideModel($db);
    }

    public function showaide() {
        $typesAide = $this->model->getTypesAide();
        include 'views/demande_aide_view.php';
    }

    public function handleFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $type_aide = $_POST['type_aide'];
            $description = $_POST['description'];

            // Télécharger et enregistrer le fichier ZIP
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fichier"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($fileType != "zip") {
                echo "Désolé, seuls les fichiers ZIP sont autorisés.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Désolé, votre fichier n'a pas été téléchargé.";
            } else {
                if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {
                    echo "Le fichier ". htmlspecialchars(basename($_FILES["fichier"]["name"])) . " a été téléchargé.";
                } else {
                    echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
                }
            }

            // Insérer les données dans la table DemandesAide
            if ($this->model->insertDemandeAide($nom, $prenom, $date_naissance, $type_aide, $description, $target_file)) {
                $_SESSION['success_message'] = "Demande d'aide soumise avec succès.";
                header('Location: /elmuntada/show-demande-aide');
                exit();
            } else {
                echo "Erreur lors de la soumission de la demande d'aide.";
            }
        }
    }
}
?>
