<?php

class Account
{
    public $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getUserByNameOrEmail($pseudo) {
        $query = "SELECT name, email, password FROM Account WHERE name = :pseudo OR email = :pseudo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['pseudo' => $pseudo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
