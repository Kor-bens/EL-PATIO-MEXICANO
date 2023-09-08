<?php 
require_once 'src/model/Message_contact.php';
 

?>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>E-mail</th>
        <th>Message</th>
        <th>Catégorie Message</th>
        <th>Date</th>
    </tr>
    <?php foreach ($messages as $message) { ?>
        <tr>
            <td><?php echo $message->getPersonne()->getNom(); ?></td>
            <td><?php echo $message->getPersonne()->getPrenom(); ?></td>
            <td><?php echo $message->getPersonne()->getEmail(); ?></td>
            <td><?php echo $message->getTexte(); ?></td>
            <td><?php echo $message->getCategorieMsg()->getNomCategorie(); ?></td>
            <td><?php echo $message->getDateEnvoi(); ?></td>
        </tr>
    <?php } ?>
</table>