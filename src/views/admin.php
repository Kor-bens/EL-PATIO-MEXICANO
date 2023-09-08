<?php 
 require_once 'src/controllers/CntrlAppli.php';

?>
 <table>
 <tr>
     <th>ID Personne</th>
     <th>Date</th>
     <th>Message</th>
     <th>Catégorie Message</th>
 </tr>
 <?php foreach ($messages as $message) { ?>
 <tr>
     <td><?php echo $message->getPersonne()->getIdPers(); ?></td>
     <td><?php echo $message->getDateEnvoi(); ?></td>
     <td><?php echo $message->getTexte(); ?></td>
     <td><?php echo $message->getCategorieMsg()->getNom(); ?></td> <!-- Supposons que vous ayez une méthode getNom() dans la classe Categorie_msg pour obtenir le nom de la catégorie -->
 </tr>
 <?php } ?>
</table>