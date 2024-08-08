<?php
require_once './config/Database.php';
require_once 'controllers/UserController.php';

// Create a new instance of the Database class
$database = new Database();
$conn = $database->getConnection(); // Get the mysqli connection

// Create a new instance of UserController with the database connection
$controller = new UserController($conn);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'update':
        $controller->update($id);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>

