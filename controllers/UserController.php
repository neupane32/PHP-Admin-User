<?php

require_once 'models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function index() {
        $users = $this->userModel->getAll(); 
        include 'views/dashboard.php';
    }

    public function create() {
        include 'views/create.php';
    }

    public function store() {
        /*Trim to remove the whitespace
         */
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);

        if (strlen($name)<3 || strlen($email)<5){
            die ("Validation error: Name or Email is too short");
        }

        $this->userModel->create($name, $email);
        header('Location: /PHP-ADMIN-USER/');
    }

    public function edit($id) {
        $user = $this->userModel->getById($id);
        include 'views/edit.php';
    }

    public function update($id) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $this->userModel->update($id, $name, $email);
        header('Location: /PHP-ADMIN-USER/');
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header('Location: /PHP-ADMIN-USER/');
    }
}
?>
