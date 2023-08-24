import { afficher } from './afficherCategorie.js';

// ********** FONCTION PRINCIPALE : appel des fonctions pour afficher les plats **********
async function chargerMenu() {
  afficher('snacks', 1, 3);
  afficher('entrees', 1, 3);
  afficher('tacos', 1, 3);
  afficher('burritos', 1, 3);
  afficher('fajitas', 1, 3);
  afficher('desserts', 1, 3);
  afficher('boissons', 1, 3);

  // Pour éviter les erreurs, on appelle le reste des fonctions qu'une fois que les plats sont affichés
  await chargerFonctions();


}

// ----- Fonction pour charger toutes les fonctionnalités de la page
function chargerElements() {

  console.log('fonction chargée');

  // ***********************************************************************
  // GERER LE TOGGLE DES BOUTONS SPOILER (plus d'infos)
  // ***********************************************************************

  let spoilers = document.querySelectorAll('.spoiler-btn');

  spoilers.forEach(bouton => {

    // Récupération de l'élément à afficher sur clic
    let idAAfficher = bouton.attributes.target.textContent;
    let elementAAfficher = document.querySelector(`${idAAfficher}`);

    bouton.addEventListener('click', () => {

      // En cas de clic, on va changer les propriétés de l'élément parent
      let blocPlat = bouton.parentNode;

      // Selon la taille de l'écran (qui définit la configuration du bloc),
      // on ne répartira pas le tableau de la même manière :
      let tailleDivInfos;
      if (window.outerWidth < 426) {
        tailleDivInfos = 7;
      } else {
        tailleDivInfos = 3;
      }


      // Si c'est pour afficher les infos, on va répartir les éléments comme suit :
      if (elementAAfficher.classList.contains('d-none')) {
        elementAAfficher.classList.remove('d-none');
        elementAAfficher.classList.add('d-block');
        bouton.innerHTML = "Moins d'infos";

        blocPlat.style.setProperty('grid-template-rows', `1fr 0.35fr 1fr ${tailleDivInfos}fr 0.7fr`);
        blocPlat.style.setProperty('grid-template-areas',
          `'titre titre titre'
                    'prix prix prix'
                    'desc desc desc'
                    'ingr ingr ingr'
                    'btn btn btn'`);
      }

      // Si c'est pour cacher les infos, on va répartir les éléments comme ceci :
      else {
        elementAAfficher.classList.add('d-none');
        elementAAfficher.classList.remove('d-block');
        bouton.innerHTML = "Plus d'infos";

        blocPlat.style.setProperty('grid-template-rows', '0.85fr 0.7fr 1fr 1fr 0.5fr 1fr');
        blocPlat.style.setProperty('grid-template-areas',
          `'titre titre titre'
            'titre titre titre'
            'prix prix prix'
            'desc desc desc'
            'desc desc desc'
            'btn btn btn'`);
      }
    });
  });
}

async function chargerFonctions() {
  // On n'effectue ces fonctions qu'une fois que la page est chargée
  // afin que le code puisse attraper tous les boutons spoiler
  window.addEventListener('load', () => {
    chargerElements();
    chargerBoutons();
  });
}

function chargerBoutons() {
  let boutonsAfficherTous = document.querySelectorAll('.btn-menu');
  // Comment boucler sur boutonsAfficherTous (type: HTML Collection) ?
  boutonsAfficherTous.forEach(bouton => {
    bouton.addEventListener('click', () => {
      setTimeout(() => {
        chargerElements();
        setTimeout(() => {
          chargerBoutons();
        }, 1000);
      }, 1000);
    });
  });

}

chargerMenu();

// ********** ANIMATION LORS DU SURVOL DES ANCRES SUR LA PAGE MENU **********
// Note : cette fonctionnalité peut être chargée avant celles ci-dessus car elle dépend
// directement du contenu de la page 'menu.php';

// Valable uniquement sur les grands écrans :
if (window.outerWidth > 1023) {

  // On récupère toutes les ancres grâce à leur classe :
  var toutesAncres = document.querySelectorAll('.ancre-link');
  toutesAncres.forEach(element => {

    // On génère l'animation sur survol du bloc
    element.addEventListener('mouseenter', () => {
      let image = element.querySelector('img');
      // La variable suivante contiendra le type de plat concerné ('snacks' si c'est les snacks) :
      let typeDImage = element.id.split('-')[0].toLowerCase().trim();

      // On va boucler sur le contenu du fichier JSON :
      $.ajax({
        type: 'GET',
        url: '../../back/listOfFood.json',
        dataType: 'json',
        success: function (response) {

          // On récupère la liste des plats de la catégorie
          let listeComplete = [];
          response.foodList.forEach((plat) => {
            if (plat.type === typeDImage) {
              listeComplete.push(plat);
            }
          });
          // 'listeComplete' contient maintenant tous les types du plat concerné

          // Génération d'un nombre compris entre 0 et le nombre d'éléments - 1
          // (car si l'array contient 5 éléménts, ce sera le n°4)
          const idImage = Math.round(Math.random() * (listeComplete.length - 1));

          // On attribue à l'image la src et l'alt correspondants
          image.src = listeComplete[idImage].image;
          image.alt = listeComplete[idImage].title;

          // On affiche l'image et on lui attribue la bonne classe pour l'animation
          image.classList.remove('d-none');
          image.classList.add('tombe-image');
          console.log(image);

          // On rajoute un écouteur pour le cas où le curseur quitte le carré
          element.addEventListener('mouseleave', () => {
            image.classList.add('d-none');
          });
        },
        error: () => {
          alert('Il y a eu une erreur lors du chargement de la liste des plats.');
        }
      });
    });
  });
}