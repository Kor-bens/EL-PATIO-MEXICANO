let switchEl = document.querySelector('#switch');
let loginEl = document.querySelector('#login');
let signUpEl = document.querySelector('#signup');
let signUpForm = document.querySelector('#signup-form');
let loginForm = document.querySelector('#login-form');

// document.cookie = "nomCookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"; // Suppression du cookie

// TODO: À l'aide d'un cookie, garder en mémoire la préférence d'affichage entre "inscription" et "connexion"

function createCookie(value) {
    const expirationDate = new Date();
    expirationDate.setFullYear(expirationDate.getFullYear() + 1);
    const expires = "expires=" + expirationDate.toUTCString();

    document.cookie = "login-signup=" + value + "; expires=" + expires + "; domain=elpatiomexicano";
}

function getCookie(name) {
    const cookieArray = document.cookie.split("; ");
    for (const cookie of cookieArray) {
        const [cookieName, cookieValue] = cookie.split("=");
        if (cookieName === name) {
            return decodeURIComponent(cookieValue);
        }
    }
    return null; // Retourne null si le cookie n'est pas trouvé
}

let checkCookie = getCookie("login-signup");

if (checkCookie == "login") {
    displayLogin();
} else if (checkCookie == "signup") {
    displaySignUp();
} else if (checkCookie == null) {
    createCookie("signup");
}

function displaySignUp() {
    // Si 'Inscription' est inactif :
    if (signUpEl.classList.contains('inactive')) {

        //On enlève "inactive" et on l'attribue à "connexion"
        signUpEl.classList.remove('inactive');
        loginEl.classList.add('inactive');

        // On efface le formulaire de connexion
        loginForm.classList.add('d-none');

        // Et on affiche celui d'inscription
        signUpForm.classList.remove('d-none');

        createCookie("signup");
    }
}

function displayLogin() {
    // Si 'Connexion' est inactif :
    if (loginEl.classList.contains('inactive')) {

        //On enlève "inactive" et on l'attribue à "inscription"
        loginEl.classList.remove('inactive');
        signUpEl.classList.add('inactive');

        // On efface le formulaire d'inscription
        signUpForm.classList.add('d-none');

        // Et on affiche celui de connexion
        loginForm.classList.remove('d-none');

        createCookie("login");
    }
}
// Réaction lors du clic sur le switch 'Connexion'
loginEl.addEventListener('click', () => {
    displayLogin();

});


signUpEl.addEventListener('click', () => {
    displaySignUp();
});

console.log(document.cookie);