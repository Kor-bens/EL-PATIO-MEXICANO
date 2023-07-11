// ************* VÉRIFICATION DE FORMULAIRE *************
let boutonValider = document.querySelector('input[value="Envoyer"]');
let formulaire = document.querySelector('form');

// ----- Échapper le code HTML

// On sélectionne toutes les input
let allInput = document.querySelectorAll('input');

allInput.forEach(element => {
    // Pour chacune, on vérifie si on a rentré du code HTML sur clic sur un autre champ
    formulaire.addEventListener('submit', (e) => {
        if (element.value !== escapeHtml(element.value)) {
            // Si c'est le cas, on alerte et on vide le champ
            e.preventDefault();
            alert("Ne tentez pas d'insérer du code dans ce formulaire.");
            element.value = "";
        }
    });
});

// Fonction pour vérifier le texte :
function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;',
        "{": '&accouvr',
        "}": '&accferm'
    };
    return text.replace(/[&<>"'{}]/g, function (m) { return map[m]; });
}


// ----- Échapper les chiffres pour nom et prénom

// Sélection des input "nom" et "prenom" uniquement :
let nomEtPrenom = document.querySelectorAll('input[name*="nom"]');

nomEtPrenom.forEach(element => {
    formulaire.addEventListener('submit', (e) => {
        // Dès qu'on clique sur un autre champ, on vérifie :

        // On convertit le texte en array
        let array = element.value.split("");

        let chiffreDansChamp = false;
        // On vérifie que chaque caractère n'est pas un chiffre
        array.forEach(letter => {
            if (parseInt(letter) == letter) {
                chiffreDansChamp = true;
            }
        });
        if (chiffreDansChamp === true) {
            e.preventDefault();
            alert('Vous ne pouvez pas taper de chiffre dans ce champ.');
            element.value = "";
            element.style.border = "5px solid red";
        }
    });
});

// ----- Tester le numéro de téléphone

// Liste des caractères acceptés :
const regex = /^(\+\d{1,3}\s?)?(\(\d{1,3}\)\s?)?\d{1,4}(\s?-?\d{1,4}){1,3}$/;
const telephone = document.querySelector('input[name="telephone"]');

// Dès qu'on clique sur un autre champ, on vérifie le téléphone par rapport au regex :
formulaire.addEventListener('submit', () => {
    const isValid = regex.test(telephone.value);
    if (!isValid) {
        e.preventDefault();
        alert('Veuillez taper une numéro de téléphone valide, sans espaces.');
        telephone.value = "";
    }
});