
let navPanier = document.querySelector("#panier");
// navPanier.style.position = "relative";
let dropdownPanier = document.querySelector("#dropdown-panier");
// dropdownPanier.style.position = "absolute";
// dropdownPanier.style.display = "none";

// let dropdownItemPanierLi = document.createElement('li');
// let dropdownItemPanierA = document.createElement('a');
let textPanier = document.createElement('p');
// textPanier.classList.add('p-panier');
let btnCommander = document.createElement("button");

TODOAJOUT DES ARTICLES DANS LA DB DEPUIS LE PANIER
TODOMODIFIER LA WIDTH DROPDOWN 
TODORELIER LA CORBEILLE A LA DB QUAND ON SUPPRIME UN ARTICLE

TODOCREATION SELECTION NBRE ARTICLE 


let panier = [];


dropdownPanier.style.top = "80%"; // ajustez la valeur si nécessaire
    // ajustez la valeur si nécessaire



function PanierVide(){
    if(panier.length === 0){
              navPanier.addEventListener("mouseenter", () => {
            dropdownPanier.classList.add("shown");
            textPanier.textContent = "Panier vide !";
            dropdownPanier.style.display = "block";
           dropdownPanier.appendChild(textPanier);
         })
         navPanier.addEventListener("mouseleave", () => {
            textPanier.style.display="none";
            textPanier.textContent ="";
             dropdownPanier.classList.add("hidden");
             
          }) 
    }
}

export { panier, affichagePanier };

function affichagePanier() {


    // Effacez les plats du panier existants
    dropdownPanier.innerHTML = "";

    // Itérez sur les plats du tableau panier
    for (const produit of panier) {
      // Créez un nouvel élément de liste pour chaque plat
let dropdownItemPanierLi = document.createElement('li');
// dropdownItemPanierLi.textContent = `${produit.nom} - ${produit.prix}`;
dropdownItemPanierLi.style.display = "block";
dropdownItemPanierLi.style.textDecoration = "none";
dropdownPanier.appendChild(dropdownItemPanierLi);
dropdownPanier.style.paddingLeft="0";
dropdownItemPanierLi.style.paddingRight="0";
dropdownItemPanierLi.style.paddingLeft="0";


let dropdownItemPanierA = document.createElement('a');
dropdownItemPanierA.style.textDecoration = "none";
dropdownItemPanierA.style.color = "white";
dropdownItemPanierA.textContent =`* ${produit.nom} - ${produit.prix}`;
dropdownItemPanierLi.appendChild(dropdownItemPanierA);

let dropdownItemDelete = document.createElement("img");
dropdownItemDelete.src="../../../assets/ressources/corbeille.png";
dropdownItemDelete.style.marginLeft ="1%";
dropdownItemPanierA.appendChild(dropdownItemDelete);
 
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
dropdownItemPanierLi.style.display = "block";
dropdownItemPanierA.style.display = "block";
btnCommander.style.display="block";  
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

 















