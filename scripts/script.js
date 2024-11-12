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

/**
 * simule le lancé d'un dée de 6 (entre 1 et 6)
 * @returns valeur du dée
 */
function dee () {
  return Math.floor(Math.random()*6+1)%7;
}

/**
 * calcule l'initiative de l'action
 * @param {int} initiative initiative du joueur
 * @returns initiative finale
 */
function initiative (initiative) {
  return dee() + initiative;
}

/**
 * calcule les dégâts d'une attaque
 * @param {int} force force du héro
 * @param {int} bonus bonus d'arme
 * @returns dégâts
 */
function attaque (force, bonus) {
  return dee() + force + bonus;
}

/**
 * calcule la défense d'un héro
 * @param {int} player force ou initiative suivant la classe
 * @param {int} bonus bonus d'amure
 * @returns défense
 */
function defense (player, bonus) {
  return dee(1, 6) + Math.round(player / 2) + bonus;
}