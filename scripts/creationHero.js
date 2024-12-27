//verification création personnage
document.getElementById("creationHero").addEventListener('submit', function(event) {
    // Appeler la fonction de validation
    if (!validerCreationPerso()) {
        event.preventDefault(); // Empêcher l'envoi si validation échoue
    }
});

function validerCreationPerso() {
    const nom = document.getElementById("nom").value.trim();
    const classe = document.querySelector('input[name="classe"]:checked'); // Vérifie si une radio est sélectionnée

    if (nom === "") {
        alert("Le nom du personnage doit être renseigné.");
        return false;
    }

    if (!classe) {
        alert("Une classe doit être sélectionnée.");
        return false;
    }

    return true;
}
