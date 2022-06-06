<?php
class User {
    private $conn;

    public $user_id;
    public $username;
    public $password;
    public $class;
    public $name;
    public $avatar;

    public function __construct($db) {
        $this->conn = $db;
    }

    //read db
    public function read() {
        $query = "SELECT * FROM users ORDER BY user_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>