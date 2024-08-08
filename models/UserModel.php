<?php
class User {
    private $conn;

    public function __construct($db){

        $this->conn=$db;
    }

    public function create($name,$email){
        #prepares an SQL statement to inser name,email into 'users' table
        $stmt=$this->conn->prepare("INSERT INTO users (name,email) VALUES(?,?)");
        $stmt->bind_param("ss",$name,$email);

        return $stmt->execute();
    }

    public function getALL(){
        $result=$this->conn->query("SELECT * FROM users");
        #fetches all result as an associative array and returns them
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id){
        $stmt=$this->conn->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        // Get the result set from the executed statement
        $result = $stmt->get_result();
        
        // Fetch the single row from the result set as an associative array
        return $result->fetch_assoc();
    }

    public function update($id,$name,$email){
        $stmt=$this->conn->prepare("UPDATE users SET name= ? , email= ? WHERE id= ?");
        $stmt->bind_param("ssi",$name,$email,$id);
        return $stmt->execute();
    }

    public function delete($id){
        $stmt=$this->conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}

?>