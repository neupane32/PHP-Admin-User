<?php
session_start();
require_once '../models/AdminModel.php';
require_once '../config/Database.php';

class AdminController {
    private $db;
    private $adminModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->adminModel = new AdminModel($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //Authenticate User
            $result = $this->adminModel->login($username, $password);

            if (isset($result['error'])) {
                echo $result['error'];
            } elseif ($result) {
                $_SESSION['admin'] = $result;
                header("Location: /views/dashboard.php");
            } else {
                echo "Invalid credentials.";
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /views/login.php");
    }
}

$adminController = new AdminController();
if (isset($_POST['login'])) {
    $adminController->login();
} elseif (isset($_GET['logout'])) {
    $adminController->logout();
}
?>
