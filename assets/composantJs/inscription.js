let switchEl = document.querySelector('#switch');
let loginEl = document.querySelector('#login');
let signUpEl = document.querySelector('#signup');
let signUpForm = document.querySelector('#signup-form');
let loginForm = document.querySelector('#login-form');

// Réaction lors du clic sur le switch 'Connexion'
loginEl.addEventListener('click', () => {

    // Si 'Connexion' est inactif :
    if (loginEl.classList.contains('inactive')) {

        //On enlève "inactive" et on l'attribue à "inscription"
        loginEl.classList.remove('inactive');
        signUpEl.classList.add('inactive');

        // On efface le formulaire d'inscription
        signUpForm.classList.add('d-none');

        // Et on affiche celui de connexion
        loginForm.classList.remove('d-none');
    }

});


signUpEl.addEventListener('click', () => {

    // Si 'Inscription' est inactif :
    if (signUpEl.classList.contains('inactive')) {

        //On enlève "inactive" et on l'attribue à "connexion"
        signUpEl.classList.remove('inactive');
        loginEl.classList.add('inactive');

        // On efface le formulaire de connexion
        loginForm.classList.add('d-none');

        // Et on affiche celui d'inscription
        signUpForm.classList.remove('d-none');
    }

});