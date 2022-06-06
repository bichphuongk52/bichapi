<?php
class Notify {
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
    public function readInClass($id) {
        $query = "SELECT notify.*, users.class
FROM notify INNER JOIN users ON notify.class_id = users.id AND notify.class_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readInHome() {
        $query = "SELECT * FROM notify WHERE class_id is NULL ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>