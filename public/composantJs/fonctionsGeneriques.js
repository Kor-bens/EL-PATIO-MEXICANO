
// -- FONCTION SUPPLEMENTAIRE : rendre les images Lazy

let toutesLesImages = document.querySelectorAll('img');

toutesLesImages.forEach(image => {
    image.setAttribute('loading', 'lazy');
});

// --- SOULIGNER UN ITEM DU MENU LORS DU SURVOL

let navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(navLink => {
    if (navLink.name != "menu") {
        navLink.addEventListener('mouseover', () => {
            navLink.classList.add('underline');

            navLink.addEventListener('mouseout', () => {
                navLink.classList.remove('underline');
            });
        });
    } else {
        console.log(navLink);
    }
});