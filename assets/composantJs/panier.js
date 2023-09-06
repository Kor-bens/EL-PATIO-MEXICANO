
let navPanier = document.querySelector("#panier");
navPanier.style.borderRadius = "50%";
navPanier.style.backgroundImage = "url(../../../assets/ressources/tissu-orange-2.jpg)";

// navPanier.style.position = "relative";
let dropdownPanier = document.querySelector("#dropdown-panier");
dropdownPanier.style.position = "absolute";
dropdownPanier.style.borderRadius = "2%";
// dropdownPanier.style.display = "none";

// let dropdownItemPanierLi = document.createElement('li');
// let dropdownItemPanierA = document.createElement('a');
let textPanier = document.createElement('p');
// textPanier.classList.add('p-panier');
let btnCommander = document.createElement("button");
let panierTotal = document.createElement("p");


// TODO AJOUT DES ARTICLES DANS LA DB DEPUIS LE PANIER

// TODORELIER LA CORBEILLE A LA DB QUAND ON SUPPRIME UN ARTICLE




let panier = [];




dropdownPanier.style.top = "80%"; // ajustez la valeur si nécessaire
    // ajustez la valeur si nécessaire



// function PanierVide(){
//     if(panier.length === 0){
//               navPanier.addEventListener("mouseenter", () => {
//             dropdownPanier.classList.add("shown");
//             textPanier.textContent = "Panier vide !";
//             dropdownPanier.style.display = "block";
//            dropdownPanier.appendChild(textPanier);
//            alert("fzfrez");
//          })
//          navPanier.addEventListener("mouseleave", () => {
//             textPanier.style.display="none";
//             textPanier.textContent ="";
//              dropdownPanier.classList.add("hidden");
//           }) 
//     }else {
//         let cercleRouge = document.createElement("div");
//         cercleRouge.style.borderRadius = "50%";
//         cercleRouge.style.backgroundColor = "red";
//         navPanier.appendChild(cercleRouge);
//     }
// }




  

export { panier, affichagePanier};

function affichagePanier() {


    // Effacez les plats du panier existants
    dropdownPanier.innerHTML = "";

    // Itérez sur les plats du tableau panier
    for (const produit of panier) {

        let item = document.createElement("div");
        item.classList.add("item-panier");
        item.style.display="none";
        dropdownPanier.appendChild(item);
        
      // Créez un nouvel élément de liste pour chaque plat
        let dropdownItemPanierLi = document.createElement('li');
        // dropdownItemPanierLi.textContent = `${produit.nom} - ${produit.prix}`;
        dropdownItemPanierLi.style.display = "block";
        dropdownItemPanierLi.style.textDecoration = "none";

        dropdownPanier.style.paddingLeft="0";
        dropdownItemPanierLi.style.paddingRight="0";
        dropdownItemPanierLi.style.paddingLeft="0";
        item.appendChild(dropdownItemPanierLi);

        let dropdownItemPanierA = document.createElement('a');
        dropdownItemPanierA.classList.add("item")
        dropdownItemPanierA.style.textDecoration = "none";
        dropdownItemPanierA.style.color = "white";
        dropdownItemPanierA.setAttribute("data-index", panier.indexOf(produit));
        dropdownItemPanierA.textContent =`* ${produit.nom} - ${produit.prix}`;
        dropdownItemPanierLi.appendChild(dropdownItemPanierA);

        

        const dropdownItemQuantite = document.createElement("input");
        dropdownItemQuantite.type = "number";
        dropdownItemQuantite.classList.add("dropdown-item-quantite");
        dropdownItemQuantite.style.marginLeft = "10px";
        dropdownItemQuantite.style.width = "45px";
        dropdownItemQuantite.style.backgroundImage = "url(../../../assets/ressources/tissu-orange-2.jpg)";
        dropdownItemQuantite.style.color = "white";
        dropdownItemQuantite.value = 1;
        dropdownItemQuantite.min = 1;
        dropdownItemQuantite.max = 20;

        // Récupérer l'index du produit dans le panier à partir de l'attribut data-index
        const productIndex = parseInt(dropdownItemPanierA.getAttribute("data-index")); 
        // Mettre à jour la valeur de dropdownItemQuantite avec la quantité du produit      
        dropdownItemQuantite.value = panier[productIndex].quantite;
        console.log(`index:${productIndex}`);
        console.log(`quantité:${dropdownItemQuantite.value}`);
        dropdownItemPanierA.appendChild(dropdownItemQuantite);

        dropdownItemQuantite.addEventListener("input", function () {
            const newQuantity = parseInt(this.value); // Obtenez la nouvelle quantité à partir de l'input
            const productIndex = parseInt(dropdownItemPanierA.getAttribute("data-index"));
          console.log(productIndex);
            //  la nouvelle quantité est valide (entre 1 et 20, par exemple)
            if ( newQuantity <= 20) {
              // Mettez à jour la quantité du produit dans le panier
              panier[productIndex].quantite = newQuantity;
          
              // Recalculez le total du panier
              const totalPanier = calculerTotal();
          
              // Mettez à jour l'affichage du total
              panierTotal.textContent = `Total: ${totalPanier}€`;
            } else {
              // Affichez un message d'erreur ou faites quelque chose pour gérer les quantités invalides
              alert("La quantité doit être comprise entre 1 et 20.");
              // Réinitialisez la valeur de l'input pour la ramener à une valeur valide (par exemple, 1)
              this.value = panier[productIndex].quantite;
            }
          });



        let dropdownItemDelete = document.createElement("img");
        dropdownItemDelete.src="../../../assets/ressources/corbeille.png";
        // dropdownItemDelete.style.marginLeft ="1%";
        dropdownItemPanierA.appendChild(dropdownItemDelete);
        
        console.log(panier);
        
        panierTotal.style.color ="white";
        panierTotal.style.fontSize = "20px";
        panierTotal.style.display = "none";
        item.appendChild(panierTotal);
        const totalPanier = calculerTotal();
        panierTotal.textContent = `Total: ${totalPanier}€`;
        
        //creation bouton commander
            btnCommander.style.display="none";
            btnCommander.textContent = "Commander";
            btnCommander.style.color="white";
            btnCommander.classList.add("btn");
            // btnCommander.style.borderRadius = "10%";
            btnCommander.style.backgroundImage ="url(../../../assets/ressources/bg-image.jpg)";
            item.appendChild(btnCommander); 


    

        navPanier.addEventListener("mouseenter", () => {
        dropdownPanier.classList.add("shown");
        item.style.display ="block";
        dropdownItemPanierLi.style.display = "block";
        dropdownItemPanierA.style.display = "block";
        panierTotal.style.display = "block";
        btnCommander.style.display="block";    
            // alert("aaaaaaa");
            // PanierVide();
        })

        navPanier.addEventListener("mouseleave", () =>{
        dropdownPanier.classList.add("hidden");
        dropdownItemPanierLi.style.display = "none";
        dropdownItemPanierA.style.display = "none";
        panierTotal.style.display = "none";
        btnCommander.style.display="none";  
            // alert("bbbbbb");
            // PanierVide(); 
        })

        dropdownPanier.addEventListener("mouseenter", () => {
        dropdownPanier.classList.add("shown");
        dropdownItemPanierLi.style.display = "block";
        dropdownItemPanierA.style.display = "block";
        panierTotal.style.display = "block";
        btnCommander.style.display="block";
        
        })

        dropdownPanier.addEventListener("mouseleave", () => {
        dropdownPanier.classList.add("hidden");
        dropdownItemPanierLi.style.display = "none";
        dropdownItemPanierA.style.display = "none";
        panierTotal.style.display = "none";
        btnCommander.style.display="none";  
        })

    }

    
    
}

function calculerTotal() {
        let total = 0;
      
        for (const produit of panier) {
            total += produit.prix * produit.quantite;
        }
      
        return total;
      }
//   PanierVide();

 















