<?php require_once("common/header.php") ;
    require_once 'src/controllers/Message.php';
?>
<link rel="stylesheet" href="../../assets/css/contact.css">
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
    } ?>
    <div class="container-img-description">
        <div id="container-bloc" class="mtb-4">
            <div class="bloc-image"></div>
            <div class="bloc-formulaire un orange" id="connexion-inscription">
                <h2 id="titre-formulaire" class="fst-2">Connexion</h2>
                <form id="formulaire" action="/inscription" method="post">

                    <label class="fsp-3 text-center text-center" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3 text-center" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" data-sb-validations="required" class="vert mb-2 fsp-3">                    

                    <label class="fsp-3" for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="email-confirm">Confirmez votre email :</label>
                    <input type="email" id="email-confirm" name="email-confirm" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="mdp-confirm">Confirmez votre mot de passe :</label>
                    <input type="password" id="mdp-confirm" name="mdp-confirm" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="telephone">Numéro de téléphone :</label>
                    <input type="phone" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="adresse">Adresse :</label>
                    <input type="adress" id="adresse" name="adresse" placeholder="Entrez votre adresse" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <input id="btn" type="submit" value="Envoyer" class="vert btn mb-1 fsb-3">
                </form>
            </div>
        </div>
    </div>



    

    <div class="contain-img deux mtb-4">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
    <?php require("common/footer.php") ?>
    <script src="../../assets/composantJs/contact.js"></script>

</body>

</html>