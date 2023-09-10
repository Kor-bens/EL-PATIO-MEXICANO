const buttonsIsRead = document.querySelectorAll('.isRead');

buttonsIsRead.forEach(button => {
    button.addEventListener("mouseenter", () => {
        button.style.backgroundColor = "lightgreen";
    });

    button.addEventListener("mouseleave", () => {
        button.style.backgroundColor = "white";
    });

    button.addEventListener("click", () => {
        const id = button.dataset.messageId; //l'ID à partir des données de l'attribut HTML
        messageStatut(id, button); // Passer le bouton comme argument
    });
});

function messageStatut(id, button) {
    console.log("STATUT MSG ID:", id);

    
    $.ajax({
        url: '/statut_message?id=' + id,
        type: 'PATCH',
        success: function (response) {
            console.log("Réponse:", response);

            // Trouvez le parent <tr> de ce bouton
            const tr = button.closest('tr');

            // Vérifiez si l'élément <tr> existe avant de modifier sa couleur de fond
            if (tr) {
                tr.querySelectorAll('td:not(:last-child)').forEach(td => {
                    td.style.backgroundColor = "lightgreen"; 
                });
            }

            button.textContent = "Lu"; // Modifier le texte du bouton
        },
        error: function (xhr, status, error) {
            console.error(error);
            console.log("Erreur lors de la modification du statut du message.");
        }
    });
}

// function messageStatutGet(){
//      // Envoie une requête AJAX pour marquer le message comme lu
//      $.ajax({
//         url: '/statut_message_get?id=' + id,
//         type: 'PATCH',
//         success: function (response) {
//             console.log("Réponse:", response);

//             // Trouvez le parent <tr> de ce bouton
//             const tr = button.closest('tr');

//             // Vérifiez si l'élément <tr> existe avant de modifier sa couleur de fond
//             if (tr) {
                
//                 tr.querySelectorAll('td:not(:last-child)').forEach(td => {
//                     td.style.backgroundColor = "lightgreen";
//                 });
//             }

//             button.textContent = "Lu";
//         },
//         error: function (xhr, status, error) {
//             console.error(error);
//             console.log("Erreur lors de la modification du statut du message.");
//         }
//     });
// }

 

function supprimerMessage(id){
    
    console.log("message id", id);

    // Envoie une requête AJAX pour supprimer le message avec l'ID idMessage
    $.ajax({
        url: '/admin/messagerie?id=' +id, // l'url doit correspondre a l'url dans le routeur 
        type: 'DELETE', // Utilisez POST ou DELETE selon votre configuration côté serveur
        success: function(response) {
            // Suppression réussie, vous pouvez mettre à jour la liste des messages ou recharger la page
            console.log("response", response);
            window.location.reload(); // Rechargez la page pour refléter les changements
        },
        error: function(xhr, status, error) {
            // Gestion des erreurs
            console.error(error);
            console.log("Erreur lors de la suppression du message.");
        }
    });
}

