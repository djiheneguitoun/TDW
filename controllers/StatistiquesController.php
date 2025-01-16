<?php
require_once 'models/StatistiquesModel.php';

class StatistiquesController {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new StatistiquesModel($db);
      
    }

    public function index() {
        $statistiques = $this->model->getStatistiques();
        $dons = $this->model->getDons();
        $benevolats = $this->model->getBenevolats();

        include 'views/statistiques.php';
    }
}
?>
