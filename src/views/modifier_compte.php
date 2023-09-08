<?php require_once("common/header.php") ;
    require_once 'src/controllers/Message.php';
?>
<link rel="stylesheet" href="../../assets/css/inscription.css">
</head>

<body>
    <?php require_once("common/navbar.php") ?>

    <div class="contain-img">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
<?php

    if (isset($messageErr)) {
        foreach ($messageErr as $err) {
    ?>
            <div class="alert alert-danger" role="alert"><?= $err ?></div>
    <?php }
    } 
    
    // TODO: Rajouter un fichier pour gestion des erreurs de formulaire
    // require_once 'src/views/err_inscription.php';
    ?>



    <div class="bloc-formulaire un orange w-50 mt-5" id="modifier-compte">
        

        <form id="modify-form" action="/post-modifier" method="post">

            <?php
                if(isset($_SESSION['user'])) {
                    $inscrit = $_SESSION['user'];

                    $id_pers    = $inscrit->getIdPers();
                    $nom        = $inscrit->getNom();
                    $prenom     = $inscrit->getPrenom();
                    $email      = $inscrit->getEmail();
                    $adresse    = $inscrit->getAdresse();
                    if($inscrit->getPhone() != null) {
                        $telephone  = $inscrit->getPhone();
                    } else {
                        $telephone = "";
                    }
                } else {
                    header('location: /index');
                }
            ?>

            <label class="fsp-3 text-center text-center" for="nom">Nom :</label>
            <input value ="<?=$nom?>" type="text" id="last-name" name="nom" placeholder="Entrez votre nom" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3 text-center" for="prenom">Prénom :</label>
            <input value ="<?=$prenom?>" type="text" id="first-name" name="prenom" placeholder="Entrez votre prénom" data-sb-validations="required" class="vert mb-2 fsp-3">
            

            <label class="fsp-3" for="email">Email :</label>
            <input value ="<?=$email?>" type="email" id="email" name="email" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="new-email">Nouvel email :</label>
            <input type="email" id="new-email" name="new-email" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="last-mdp">Ancien mot de passe : </label>
            <input type="password" id="last-mdp" name="last-mdp" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3 text-center" for="new-mdp">Nouveau mot de passe : </label>
            <input type="password" id="new-mdp" name="new-mdp" data-sb-validations="required" class="vert mb-2 fsp-3">
            
            <label class="fsp-3 text-center" for="new-mdp-confirm">Confirmez votre mot de passe :</label>
            <input type="password" id="new-mdp-confirm" name="new-mdp-confirm" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="telephone">Numéro de téléphone :</label>
            <input value ="<?=$telephone?>" type="tel" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="adresse">Adresse :</label>
            <input value ="<?=$adresse?>" type="text" id="adresse" name="adresse" placeholder="Entrez votre adresse" data-sb-validations="required" class="vert mb-2 fsp-3">

            <input id="btn" type="submit" value="Envoyer" class="vert btn mb-1 fsb-3">
        </form>
    </div>



    

    <div class="contain-img deux mtb-4">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
    <?php require("common/footer.php") ?>
    <script src="../../assets/composantJs/inscription.js"></script>

</body>

</html>