<?php
class AdminModel {
    private $conn;
    private $table = 'admins';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($username, $password) {
        // Prepare the query
        $query = "SELECT * FROM " . $this->table . " WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            return ["error" => "Failed to prepare SQL statement: " . $this->conn->error];
        }
        // Bind parameters
        $password_md5 = md5($password);
        $stmt->bind_param('ss', $username, $password_md5);
        $stmt->execute();

        if ($stmt->error) {
            return ["error" => "Failed to execute SQL statement: " . $stmt->error];
        }

        $result = $stmt->get_result();
        $user = $result->num_rows > 0 ? $result->fetch_assoc() : false;

        $stmt->close();

        return $user ? $user : ["error" => "Invalid credentials."];
    }
}
?>
