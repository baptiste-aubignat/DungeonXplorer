<?php

class Ajax {

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST["type"])) {
            switch ($_POST["type"]) {
                case "selection":
                    $_SESSION["hero"] = $_POST["hero"];
                    break;
                case "query":
                    $this->query($_POST["query"]);
                    break;
            }
        }
    }

    public function query($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}
?>