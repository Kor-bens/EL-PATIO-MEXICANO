import { panier, affichagePanier } from './panier.js';

export function afficher(sous_cat, min, max) { // 3 paramètres : la catégorie qu'on veut afficher, le numéro du premier élément et le numéro du dernier (on peut ne pas vouloir commencer par le premier)

  const divAffichage = document.getElementById(`affichage-${sous_cat}`);
  divAffichage.innerHTML = '';


  // On crée un nombre de lignes égal au nombre d'éléments qu'on veut afficher
  divAffichage.style.setProperty('grid-template-rows', `repeat(${max - min + 1}, auto)`);

  $.ajax({
    type: "GET",
    url: "/requireData",
    data: {
      "sous_categorie": sous_cat,
      "min": min,
      "max": max
    },
    dataType: "json",
    success: function (response) {
      let listeCategorie = [];
      let listeComplete = [];

      response.forEach(element => {
        // Code en cas de succès ici :
        // On récupère la liste des plats de la catégorie

        if (element.sous_cat_nom === sous_cat) {
          listeComplete.push(element);
        }

        if (min <= max) {
          if (element.sous_cat_nom === sous_cat) {
            listeCategorie.push(element);

            min++;
          }
        }
      });

      // On initialise la variable qui va nous permettre d'alterner l'affichage des éléments et les mettre en quinquonce
      let toggleVar = 0;

      // On va chercher les divs qui nous intéressent, en fonction du min et du max
      for (let index = 0; index < listeCategorie.length; index++) {

        const element = listeCategorie[index];

        let divARemplir = document.createElement("div");
        divARemplir.setAttribute("id", `${sous_cat}${index}`);
        divARemplir.classList.add('bloc-texte-plat', 'orange', 'text-white');

        if (toggleVar == 0) {
          divARemplir.style.setProperty('grid-area', `${index + 1} / 1 / ${index + 2} / 2`);
        }
        else if (toggleVar == 1) {
          divARemplir.style.setProperty('grid-area', `${index + 1} / 2 / ${index + 2} / 3`);
        }

        divAffichage.appendChild(divARemplir);

        // Dans chaque div, on va créer :
        // Un titre

        const nomPlat = document.createElement("h1");
        nomPlat.classList.add("nom-plat", "fst-3");
        nomPlat.textContent = element.title;
        divARemplir.appendChild(nomPlat);


        // Un prix

        const prixPlat = document.createElement("p");
        prixPlat.classList.add("prix-plat", "fsp-3");
        let prix = element.prix / 100;
        prixPlat.textContent = `${prix} €`;
        divARemplir.appendChild(prixPlat);

        // Une description
        const dsption = document.createElement("p");
        dsption.classList.add("description-plat", "fsp-3");
        dsption.textContent = element.desc_plat;
        divARemplir.appendChild(dsption);

        // Les éléments spoilés...
        const div = document.createElement("div");
        div.classList.add("d-none", "infos-div", "fsp-4");
        div.setAttribute("id", `spoiler-content-${sous_cat}${index}`);

        // ...À savoir les ingrédients...
        // ... Qu'il faut d'abord transformer en array :
        element.ingredients = element.ingredients.split(", ");
        div.innerHTML = "<p>Ingrédients : </p>";
        let listeIngredients = document.createElement('ul');
        element.ingredients.forEach((ingredient) => {
          listeIngredients.innerHTML += `<li>${ingredient}</li>`;
        });
        div.appendChild(listeIngredients);

        // ... L'image du plat ...
        const imageSpoilee = document.createElement('img');
        imageSpoilee.classList.add('image-spoilee');
        imageSpoilee.setAttribute('id', `image-spoilee-${element.id}`);
        imageSpoilee.src = element.img_plat;
        imageSpoilee.alt = element.title;
        imageSpoilee.title = element.title;
        imageSpoilee.style.display = "none";
        div.appendChild(imageSpoilee);

        // ... Et les logos sur les restrictions :
        let typeRestriction = element.regime;
        let logoRestriction = document.createElement("img");
        logoRestriction.src = `assets/ressources/logo-${typeRestriction}.png`;
        logoRestriction.alt = `logo alimentation ${typeRestriction}`;
        logoRestriction.title = typeRestriction;
        logoRestriction.classList.add('logo-restriction');
        div.appendChild(logoRestriction);

        divARemplir.appendChild(div);

        // Un bouton "plus d'infos" pour les afficher
        const bouton = document.createElement("button");
        bouton.classList.add("btn", "vert", "text-white", "spoiler-btn", "fsb-3");
        bouton.setAttribute("target", `#spoiler-content-${sous_cat}${index}`);
        bouton.textContent = "Plus d'infos";
        divARemplir.appendChild(bouton);

        // Un bouton pour ajouter au panier :
        function ajouterAuPanier() {
          const produitNom = nomPlat.textContent;
          const produitPrix = parseFloat(prixPlat.textContent);
          
                // Enregistrez le panier dans localStorage
            localStorage.setItem('panier', JSON.stringify(panier));
            console.log(localStorage)
          // Création d'un objet représentant le plat
          const produit = {
            nom: produitNom,
            prix: produitPrix,
            quantite: 1,

      
          };
          
          
       

          // Vérification si le plat est déjà dans le panier
          const platExistant = panier.find(plat => plat.nom === produit.nom);

          if (platExistant) {
            // Le plat est déjà dans le panier, augmenter la quantité par exemple
            if (platExistant.quantite < 20) { // Vérification de la quantité maximale
              platExistant.quantite++; // Augmentation de la quantité existante
            } else {
              // Vous pouvez afficher un message d'alerte ou une notification indiquant la limite atteinte
            }
          } else {
            // Le plat n'est pas dans le panier, ajouter avec une quantité de 1
            panier.push(produit);
          }

          // Appel d'une fonction pour mettre à jour l'interface utilisateur du panier
          
          affichagePanier();

        }
       

        // Un bouton "Ajouter au panier" pour ajouter le plat dans le panier
        const boutonPanier = document.createElement("button");
        boutonPanier.classList.add("btn", "vert", "panier", "text-white", "fsb-3");
        boutonPanier.textContent = "Ajouter au panier";
        divARemplir.appendChild(boutonPanier);

        boutonPanier.addEventListener("click", ajouterAuPanier);

        // Et on remplit l'image :
        const divImage = document.createElement('div');
        divImage.setAttribute('id', `image-${sous_cat}${index}`);
        divImage.classList.add('bloc-image-plat');

        // On adapte la hauteur du bloc image en fonction du bloc texte
        function actualiserImages() {
          divImage.style.height = getComputedStyle(divARemplir).height;
        }
        actualiserImages();

        // En cas de changement de taille de fenêtre, on réactualise les tailles des images
        window.addEventListener('resize', () => {
          actualiserImages();
        });

        // Idem en cas d'actualisation de page
        window.addEventListener('load', () => {
          actualiserImages();
        });


        // toggleVar va nous servir à afficher les plats en quiquonce :

        // -- On alterne les valeurs de 0 et 1,
        // -- donc chaque condition sera vraie 1 tour sur 2
        if (toggleVar == 0) {
          // Dans un cas on place la divImage à droite
          divImage.style.setProperty('grid-area', `${index + 1} / 2 / ${index + 2} / 3`);
          toggleVar++;
        }
        else if (toggleVar == 1) {
          // Dans l'autre cas on la place à gauche
          divImage.style.setProperty('grid-area', `${index + 1} / 1 / ${index + 2} / 2`);
          toggleVar--;
        }
        divAffichage.appendChild(divImage);

        // On remplit la divImage avec l'image, dont on règle les attributs au préalable :
        const imageAremplir = document.createElement('img');
        imageAremplir.setAttribute('id', `#image-${sous_cat}${index}`);
        imageAremplir.src = element.img_plat;
        imageAremplir.alt = element.title;
        imageAremplir.title = element.title;
        imageAremplir.classList.add('image-plat');
        divImage.appendChild(imageAremplir);
      }


      // Si on n'a pas affiché tous les éléments de la catégorie de plat, on rajoute un bouton pour le faire :
      if (max < listeComplete.length) {
        boutonGestionNombre("Tous", listeComplete.length);
      }
      // S'ils sont tous affichés, on rajoute un bouton pour en afficher seulement 3
      else if (max != 3) {
        boutonGestionNombre("Moins", 3);
      }

      function boutonGestionNombre(moinsOuTous, nombre) {

        // On vérifie les paramètres de la fonction, et on renvoie un message d'erreur le cas échéant
        if (moinsOuTous != "Moins" && moinsOuTous != "Tous" && parseInt(nombre) !== nombre) {
          console.error("Il y a eu une erreur avec l'affichage du bouton 'tous les / moins d'éléments.",
            "Les valeurs acceptées pour le premier argument sont :",
            "'Moins' et 'Tous'",
            "et pour le deuxième :",
            "un chiffre.");
          return;
        }

        // On crée un bouton dans le DOM, on lui met les attributs pour qu'il ait un style
        // Attention à ne pas lui mettre "spoiler-btn", ou il aura le même comportement que les autres.
        let nouveauBouton = document.createElement('button');
        nouveauBouton.classList.add("vert", "text-white", `afficher-${moinsOuTous}`, "btn-menu", "mtb-24", "fsb-3");
        nouveauBouton.setAttribute('id', `afficher${moinsOuTous}${sous_cat}`);
        nouveauBouton.innerText = `Afficher ${moinsOuTous}`;

        // On rajoute ligne au tableau des plats
        divAffichage.style.gridTemplateRows += '1fr';
        // Et on place le bouton tout en bas
        nouveauBouton.style.gridArea = `${max + 1} / 1 / ${max + 2} / 3`;
        divAffichage.append(nouveauBouton);

        // On crée un écouteur d'évènements, on appelle la fonction afficher avec les paramètres
        nouveauBouton.addEventListener('click', () => {
          afficher(sous_cat, 1, nombre);
        });
      }

    },
    error: function (err) {
      console.error(err);
      alert('Il y a eu une erreur lors du chargement de la liste des plats (afficherCategorie.js).', err);
    }
  });
}

// Problèmes à régler :
// - Les fonctionnalités dynamiques de la navbar ne sont pas actives sur la page menu
// - Le menu déroulant de la navbar ne s'affiche que quand on est en haut de la page
