export function afficher(categorie, min, max) { // 3 paramètres : la catégorie qu'on veut afficher, le numéro du premier élément et le numéro du dernier (on peut ne pas vouloir commencer par le premier)


  const divAffichage = document.getElementById(`affichage-${categorie}`);
  divAffichage.innerHTML = '';

  // On crée un nombre de lignes égal au nombre d'éléments qu'on veut afficher
  divAffichage.style.setProperty('grid-template-rows', `repeat(${max - min + 1}, auto)`);

  $.ajax({
    type: "GET",
    url: "../../back/listofFood.json",
    dataType: "json",
    success: function (response) {
      // On récupère la liste des plats de la catégorie
      let listeCategorie = [];
      let listeComplete = [];
      response.foodList.forEach((element) => {
        if (element.categorie === categorie) {
          listeComplete.push(element);
        }

        if (min <= max) {
          if (element.categorie === categorie) {
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
        divARemplir.setAttribute("id", `${categorie}${index}`);
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
        prixPlat.textContent = `${element.prix} €`;
        divARemplir.appendChild(prixPlat);

        // Une description
        const dsption = document.createElement("p");
        dsption.classList.add("description-plat", "fsp-3");
        dsption.textContent = element.description;
        divARemplir.appendChild(dsption);

        // Les éléments spoilés...
        const div = document.createElement("div");
        div.classList.add("d-none", "infos-div", "fsp-4");
        div.setAttribute("id", `spoiler-content-${categorie}${index}`);

        // ...À savoir les ingrédients...
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
        imageSpoilee.src = element.image;
        imageSpoilee.alt = element.title;
        imageSpoilee.title = element.title;
        imageSpoilee.style.display = "none";
        div.appendChild(imageSpoilee);
        console.log(imageSpoilee);

        // ... Et les logos sur les restrictions :
        let typeRestriction = element.restrictions[0];
        let logoRestriction = document.createElement("img");
        logoRestriction.src = `../Ressources/logo-${typeRestriction}.png`;
        logoRestriction.alt = `logo alimentation ${typeRestriction}`;
        logoRestriction.title = typeRestriction;
        logoRestriction.classList.add('logo-restriction');
        div.appendChild(logoRestriction);

        divARemplir.appendChild(div);

        // Un bouton "plus d'infos" pour les afficher
        const bouton = document.createElement("button");
        bouton.classList.add("btn", "vert", "text-white", "spoiler-btn", "fsb-3");
        bouton.setAttribute("target", `#spoiler-content-${categorie}${index}`);
        bouton.textContent = "Plus d'infos";
        divARemplir.appendChild(bouton);

        // Et on remplit l'image :
        const divImage = document.createElement('div');
        divImage.setAttribute('id', `image-${categorie}${index}`);
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
        imageAremplir.setAttribute('id', `#image-${categorie}${index}`);
        imageAremplir.src = element.image;
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
        nouveauBouton.setAttribute('id', `afficher${moinsOuTous}${categorie}`);
        nouveauBouton.innerText = `Afficher ${moinsOuTous}`;

        // On rajoute ligne au tableau des plats
        divAffichage.style.gridTemplateRows += '1fr';
        // Et on place le bouton tout en bas
        nouveauBouton.style.gridArea = `${max + 1} / 1 / ${max + 2} / 3`;
        divAffichage.append(nouveauBouton);

        // On crée un écouteur d'évènements, on appelle la fonction afficher avec les paramètres
        nouveauBouton.addEventListener('click', () => {
          afficher(categorie, 1, nombre);
        });
      }
    },
  });
}

// Problèmes à régler :
// - Les fonctionnalités dynamiques de la navbar ne sont pas actives sur la page menu
// - Le menu déroulant de la navbar ne s'affiche que quand on est en haut de la page
