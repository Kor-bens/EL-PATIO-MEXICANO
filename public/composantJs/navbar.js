// ----- GÉRER L'ANIMATION DE LA NAVBAR SUIVANT LA MONTÉE OU LA DESCENTE DU SCROLL -----

// -- On récupère les variables
let prevScrollPos = window.scrollY;
const navbar = document.querySelector('#navbar');

let screenWidth = parseInt(window.outerWidth);

// -- Toutes les 100ms, on vérifie la valeur du scroll
setInterval(() => {
  screenWidth = parseInt(window.outerWidth);
}, 100);

// -- Lors du chargement de la page, si on est en haut de la page, la navbar s'affiche
window.addEventListener('load', () => {
  if (window.scrollY < 5) {
    navbar.classList.remove('d-none');
  }
});

// À chaque mouvement de scroll, on vérifie si on monte ou on descend :
window.onscroll = function () {

  let currentScrollPos = window.scrollY;

  // Si on monte, on affiche la navbar
  if (prevScrollPos > currentScrollPos) {
    // console.log(`prevPos : ${prevScrollPos}, currentPos : ${currentScrollPos}`);
    navbar.classList.remove('d-none');
    navbar.classList.remove('hidden');
    navbar.classList.add('shown');

    // Si on descend, on la cache
  } else {
    // console.log(`prevPos : ${prevScrollPos}, currentPos : ${currentScrollPos}`);
    navbar.classList.add('hidden');
    navbar.classList.remove('shown');
  }
  prevScrollPos = currentScrollPos;
};


// ----- GÉRER L'ANIMATION D'APPARITION DU MENU DÉROULANT LORS DU SURVOL

let menu = document.querySelector('#menu');
let dropdown = document.querySelector('.dropdown-menu');
var body = document.body;

// On change le comportement lors du clic directement sur "menu"

menu.addEventListener('click', (e) => {
  if (screenWidth > 1000) {
    window.location.href = 'menu.php';
  }
});


// -- Action réalisée lorsque les conditions du dropdown sont valides
const action = () => {
  dropdown.classList.add('show', 'shown');
};

// -- Récupérer la position du curseur et la comparer à celle du dropdown pour le cacher si on en sort
function getPosition(e) {
  if (dropdown.classList.contains('show')) {

    // On soustrait le scrollY car la position du curseur change en fonction du scroll, mais pas celle du menu.
    // Si on omet de soustraire le scrollY, la règle de "curseur hors dropdown" sera considérée comme toujours vraie.
    var x = e.pageX;
    var y = e.pageY - window.scrollY;

    // On récupère les coordonnées du menu dropdown pour les comparer
    let ddCoordonnees = dropdown.getBoundingClientRect();
    // Ainsi que celles du menu pour en soustraire la height et ne pas fausser la mesure
    let menuCoordonnees = menu.getBoundingClientRect();

    // Condition pour comparer la position du curseur à celle du menu dropdown - Si en dehors, on cache le dropdown
    if (x < ddCoordonnees.left || x > ddCoordonnees.right || y < ddCoordonnees.top - menuCoordonnees.height || y > ddCoordonnees.bottom) {
      dropdown.classList.remove('show', 'shown');
      dropdown.classList.add('hidden');
    }
  }
}


// -- Toutes les fonctionnalités du dropdown doivent être annulées si on n'est pas sur format desktop
window.addEventListener('resize', () => {
  if (screenWidth > 1000) {
    gererMenu();
  } else {
    menu.removeEventListener('mouseover', action);
    body.removeEventListener("mousemove", getPosition);

    if (dropdown.classList.contains('show')) {
      dropdown.classList.remove('show');
    }
    if (dropdown.classList.contains('shown')) {
      dropdown.classList.remove('shown');
    }
  }
});


if (screenWidth > 1000) {
  gererMenu();
}

function gererMenu() {
  menu.addEventListener('mouseover', action);
  body.addEventListener("mousemove", getPosition);
}
