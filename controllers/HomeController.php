<?php
require_once 'models/Partenaire.php';
require_once 'models/Annonce.php';
require_once 'models/Avantage.php';
require_once 'config/database.php';

class HomeController {
    private $partenaire;
    private $annonce;
    private $avantages;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->partenaire=new Partenaire($db);
        $this->annonce = new Annonce($db);
        $this->avantage = new Avantage($db);

    }

    public function index() {
        $annonces = $this->annonce->getDerniersAnnonces();
        $annoncesData = [];
        while ($row = $annonces->fetch(PDO::FETCH_ASSOC)) {
            $annoncesData[] = $row;
        }
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10;
        $totalAvantages = $this->avantage->getTotalAvantages();
        $totalPages = ceil($totalAvantages / $limit);

        $avantages = $this->avantage->getAvantagesMembres($page, $limit);
        $avantagesData = [];
        while ($row = $avantages->fetch(PDO::FETCH_ASSOC)) {
            $avantagesData[] = $row;
        }

        $partenaires = $this->partenaire->getAllPartenaires();
        $partenairesData = [];
        while ($row = $partenaires->fetch(PDO::FETCH_ASSOC)) {
            $partenairesData[] = $row;
        }


        include 'views/home.php';
    }

 
}