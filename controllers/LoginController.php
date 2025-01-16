<?php
require_once 'models/Utilisateur.php';
require_once 'config/database.php';
require_once 'models/Membre.php';

class LoginController {
    private $utilisateur;
    private $membre;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->utilisateur = new Utilisateur($db);
        $this->membre = new Membre($db); 
    }

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->utilisateur->getUserByEmail($email);

            if ($user && password_verify($password, $user['mot_de_passe'])) {
                session_start();
                $_SESSION['utilisateur_id'] = $user['utilisateur_id'];
                $_SESSION['role'] = $this->getUserRole($user['utilisateur_id']);
                $_SESSION['email'] = $_POST['email'];

                if ($_SESSION['role'] === 'admin') {
                    header('Location: /elmuntada/admin-dashboard');
                } elseif ($_SESSION['role'] === 'partenaire') {
                    header('Location: /elmuntada/partenaire-dashboard');
                } elseif ($_SESSION['role'] === 'membre') {
                    $membre = $this->membre->getMembreByUtilisateurId($_SESSION['utilisateur_id']);
                    $_SESSION['membre_id'] = $membre['membre_id'];
                    header('Location: /elmuntada/membre-dashboard');
                } else {
                    header('Location: /elmuntada/user-dashboard');                }
            } else {
                header('Location: /elmuntada/login?error=invalid_credentials');
            }
        } else {
            header('Location: /elmuntada/login');
        }
    }

    private function getUserRole($utilisateur_id) {
        if ($this->utilisateur->isAdmin($utilisateur_id)) {
            return 'admin';
        } elseif ($this->utilisateur->isPartenaire($utilisateur_id)) {
            return 'partenaire';
        } elseif ($this->utilisateur->isMembre($utilisateur_id)) {
            return 'membre';
        } else {
            return 'user';
        }
    }
}
