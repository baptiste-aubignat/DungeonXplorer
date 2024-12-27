<?php
class AdministrationController
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function index()
    {
        if (!defined('BASE_URL')) {
            define('BASE_URL', '/DungeonXplorer');
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Suppression de l'utilisateur si bouton supprimer valider
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['account_id'])) {
            $account_id = intval($_POST['account_id']);
            $this->deleteUser($account_id);
        }

        $users = $this->getAllUsers();

        require 'views/administration.php';
    }

    private function getAllUsers()
    {
        $stmt = $this->conn->prepare("SELECT account_id, name, email FROM Account WHERE isAdmin IS NULL");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function deleteUser($account_id)
    {
        $stmt = $this->conn->prepare("DELETE FROM Account WHERE account_id = :account_id");
        $stmt->execute(['account_id' => $account_id]);
    }
}
