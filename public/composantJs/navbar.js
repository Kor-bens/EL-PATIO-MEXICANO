// ----- SOULIGNER UN ITEM DU MENU LORS DU SURVOL

let navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(navLink => {
  if (navLink.id != "menu") {
    navLink.addEventListener('mouseover', () => {
      navLink.classList.add('underline');

      navLink.addEventListener('mouseout', () => {
        navLink.classList.remove('underline');
      });
    });
  } else {
  }
});

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
function gererAnimation() {

  let menu = document.querySelector('#menu');
  let dropdown = document.querySelector('.dropdown-menu');
  var body = document.body;

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

  if (screenWidth > 991) {
    menu.addEventListener('mouseover', action);
    body.addEventListener("mousemove", getPosition);
    menu.addEventListener('click', (e) => {
      window.location.href = 'menu.php';
    });
  } else {
    console.log(`screenWidth : ${screenWidth}`);
    menu.removeEventListener('mouseover', action);
    body.removeEventListener("mousemove", getPosition);
    if (dropdown.classList.contains('show')) {
      dropdown.classList.remove('show');
    }
    if (dropdown.classList.contains('shown')) {
      dropdown.classList.remove('shown');
    }
  }
}
window.addEventListener('load', gererAnimation);
// window.addEventListener('resize', gererAnimation); -- N'est pas utilisé car lorsqu'on ajoute les eventListeners sur un resize supérieur à 991px, ça en ajoute beaucoup d'un coup, alors que lorsque le resize est inférieur ) 991px, ça n'en enlève qu'un seul à la fois, c'est donc inefficace.