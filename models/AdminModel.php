<?php
class AdminModel {
    private $conn;
    private $table = 'admins';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $username, md5($password));
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0 ? $result->fetch_assoc() : false;
    }
}
?>
