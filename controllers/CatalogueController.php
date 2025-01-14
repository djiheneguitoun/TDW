<?php
// controllers/CatalogueController.php
require_once 'models/Partenaire.php';
require_once 'config/database.php';

class CatalogueController {
    private $partenaire;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->partenaire = new Partenaire($db);
    }

    public function index() {
        $categories = $this->partenaire->getAllCategories();
        $categoriesData = [];
        while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
            $categoriesData[] = $row;
        }

        $partenairesData = [];
        foreach ($categoriesData as $category) {
            $partenaires = $this->partenaire->getPartenairesByCategory($category['categorie_id']);
            $partenairesData[$category['categorie_id']] = [];
            while ($row = $partenaires->fetch(PDO::FETCH_ASSOC)) {
                $partenairesData[$category['categorie_id']][] = $row;
            }
        }

        include 'views/catalogue.php';
    }

    public function filterByVille() {
        $ville = $_GET['ville'] ?? '';
        if ($ville) {
            $partenaires = $this->partenaire->getPartenairesByVille($ville);
        } else {
            $partenaires = $this->partenaire->getAllPartenaires();
        }

        $partenairesData = [];
        while ($row = $partenaires->fetch(PDO::FETCH_ASSOC)) {
            $partenairesData[] = $row;
        }

        $categoriesData = $this->partenaire->getAllCategories();
        $categories = [];
        while ($row = $categoriesData->fetch(PDO::FETCH_ASSOC)) {
            $categories[$row['categorie_id']] = $row;
        }

        $filteredData = [];
        foreach ($partenairesData as $partenaire) {
            $categorie_id = $partenaire['categorie_id'];
            if (!isset($filteredData[$categorie_id])) {
                $filteredData[$categorie_id] = [
                    'category' => $categories[$categorie_id],
                    'partenaires' => []
                ];
            }
            $filteredData[$categorie_id]['partenaires'][] = $partenaire;
        }

        echo json_encode(array_values($filteredData));
    }
    public function showDetails($partenaire_id) {
        $partenaire = $this->partenaire->getPartenaireById($partenaire_id);
        include 'views/details.php';
    }
}
