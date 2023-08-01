
// -- FONCTION SUPPLEMENTAIRE : rendre les images Lazy

let toutesLesImages = document.querySelectorAll('img');

toutesLesImages.forEach(image => {
    image.setAttribute('loading', 'lazy');
});