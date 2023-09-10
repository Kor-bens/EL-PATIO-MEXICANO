<?php 
require_once 'src/model/Message_contact.php';
 require_once 'common/header.php';
require_once 'common/navbar_admin.php';
?>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
       <th>E-mail</th>
         <th>Message</th>
        <th>Catégorie Message</th>
        <th>Date</th>
        <th>Supprimer</th>
        <th>Lu/Non lu</th>
    </tr>
    <?php foreach ($messages as $message) { ?>
        <tr>
            <td><?php echo $message->getPersonne()->getNom(); ?></td>
            <td><?php echo $message->getPersonne()->getPrenom(); ?></td>
            <td><?php echo $message->getPersonne()->getEmail(); ?></td>
            <td><?php echo $message->getTexte(); ?></td>
            <td><?php echo $message->getCategorieMsg()->getNomCategorie(); ?></td>
            <td><?php echo $message->getDateEnvoi(); ?></td>
            <td>
         <img src="../../../assets/ressources/corbeille.png"
              style="cursor: pointer;"
              onclick="supprimerMessage(<?php echo $message->getIdMsg(); ?>);">
     </td>
     <td><button class="isRead" onclick="messageStatut(<?php echo $message->getIdMsg(); ?>);">Marquer comme lu</button></td>
        </tr>
    <?php } ?>
</table>

<script src="../../assets/composantJs/messageAdmin.js"></script>