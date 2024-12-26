<?php

class Ajax {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST["type"])) {
            switch ($_POST["type"]) {
                case "selection":
                    $_SESSION["hero"] = $_POST["hero"];
                    break;
            }
        }
    }
}
?>