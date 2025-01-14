<?php
require_once 'models/Admin.php';
require_once 'config/database.php';

class AdminController {
    private $admin;
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->admin = new Admin($db);
    }
    public function index() {
        $result = $this->admin->getAll();
        $admins = $result->fetchAll(PDO::FETCH_ASSOC);
        require 'views/admin/list.html';
    }
}