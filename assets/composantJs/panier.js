

let navPanier = document.querySelector("#panier");
let dropdownPanier = document.querySelector(".dropdown-panier");
let dropdownItemPanierLi = document.createElement('li');
let dropdownItemPanierA = document.createElement('a');
let textPanier = document.createElement('p');
textPanier.classList.add('p-panier');
let btnCommander = document.createElement("button");


let panier = [];




function PanierVide(){
   
    
    if(panier.length === 0){
              navPanier.addEventListener("mouseenter", () => {
            dropdownPanier.classList.add("shown");
            textPanier.textContent = "Vide, faut commander !! money money!!!!";
           dropdownPanier.appendChild(textPanier);
         })
         navPanier.addEventListener("mouseleave", () => {
            // textPanier.style.display="none";
             textPanier.textContent ="a";
             dropdownPanier.classList.add("hidden");
             
           
          }) 
    }else {
        navPanier.addEventListener("mouseleave", () => {
            textPanier.textContent = "bbbbb";
           dropdownPanier.classList.add("hidden");
          
         }) 
    }
    
}
export { panier, affichagePanier };

function affichagePanier() {
    // Obtenez l'élément du panier
    const cartElement = document.querySelector("#panier");
  
    // Effacez les plats du panier existants
    dropdownItemPanierA.innerHTML = "";

    // Itérez sur les plats du tableau panier
    for (const produit of panier) {
      // Créez un nouvel élément de liste pour chaque plat
let dropdownItemPanierLi = document.createElement('li');
// dropdownItemPanierLi.textContent = `${produit.nom} - ${produit.prix}`;
dropdownItemPanierLi.style.display = "none";
dropdownItemPanierLi.style.textDecoration = "none";
dropdownPanier.appendChild(dropdownItemPanierLi);


let dropdownItemPanierA = document.createElement('a');
dropdownItemPanierA.style.textDecoration = "none";
dropdownItemPanierA.style.color = "white";
dropdownItemPanierA.classList.add("dropdown-item-panier");
dropdownItemPanierA.textContent =`* ${produit.nom} - ${produit.prix}`;
dropdownItemPanierLi.appendChild(dropdownItemPanierA);
 
//creation bouton commander
    btnCommander.style.display="none";
    btnCommander.textContent = "Commander";
    dropdownPanier.appendChild(btnCommander); 


    navPanier.addEventListener("mouseenter", () => {
dropdownPanier.classList.add("shown");
dropdownItemPanierLi.style.display = "block";
dropdownItemPanierA.style.display = "block";
btnCommander.style.display="block";    
    // alert("aaaaaaa");
    PanierVide();
})

navPanier.addEventListener("mouseleave", () =>{
    dropdownPanier.classList.add("hidden");
dropdownItemPanierLi.style.display = "none";
dropdownItemPanierA.style.display = "none";
btnCommander.style.display="none";  
    // alert("bbbbbb");
    PanierVide(); 
})

dropdownPanier.addEventListener("mouseenter", () => {
    dropdownPanier.classList.add("shown");
dropdownItemPanierLi.style.display = "block";
dropdownItemPanierA.style.display = "block";
btnCommander.style.display="block";
 
})

dropdownPanier.addEventListener("mouseleave", () => {
    dropdownPanier.classList.add("hidden");
dropdownItemPanierLi.style.display = "none";
dropdownItemPanierA.style.display = "none";
btnCommander.style.display="none";  
})

  }
  
  }

  PanierVide();

 















