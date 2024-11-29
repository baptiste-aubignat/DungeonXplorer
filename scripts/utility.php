<?php
// Récupérer les données JSON
$input = file_get_contents("php://input");
$data = json_decode($input, true);

if ($data) {
    echo "donnée reçue";
} else {
    echo "Aucune donnée reçue.";
}
?>