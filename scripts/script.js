document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

        });
    });

    });

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