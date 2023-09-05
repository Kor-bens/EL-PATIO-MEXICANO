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
    
    require_once 'src/views/err_inscription.php';
    ?>



    <div class="bloc-formulaire un orange w-50 mt-5" id="connexion-inscription">
        
        <div id="switch" class="row fsp-3 w-100 m-0 p-0">
            <div id="login" class="col-6 p-3">Connexion</div>
            <div id="signup" class="col-6 p-3 inactive">Inscription</div>
        </div>

        <form id="signup-form" action="/post-inscription" method="post" class="d-none">

            <label class="fsp-3 text-center text-center" for="nom">Nom :</label>
            <input type="text" id="last-name" name="nom" placeholder="Entrez votre nom" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3 text-center" for="prenom">Prénom :</label>
            <input type="text" id="first-name" name="prenom" placeholder="Entrez votre prénom" data-sb-validations="required" class="vert mb-2 fsp-3">
            

            <label class="fsp-3" for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="email-confirm">Confirmez votre email :</label>
            <input type="email" id="email-confirm" name="email-confirm" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="mdp-confirm">Confirmez votre mot de passe :</label>
            <input type="password" id="mdp-confirm" name="mdp-confirm" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="telephone">Numéro de téléphone :</label>
            <input type="tel" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" placeholder="Entrez votre adresse" data-sb-validations="required" class="vert mb-2 fsp-3">

            <input id="btn" type="submit" value="Envoyer" class="vert btn mb-1 fsb-3">
        </form>

        <form id="login-form">
            <label class="fsp-3" for="email">Email :</label>
            <input type="email" id="login-email" name="email" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">

            <label class="fsp-3" for="mdp">Mot de passe :</label>
            <input type="password" id="login-mdp" name="mdp" data-sb-validations="required" class="vert mb-2 fsp-3">

            <input id="login-btn" type="submit" value="Envoyer" class="vert btn mb-1 fsb-3">
        </form>
    </div>



    

    <div class="contain-img deux mtb-4">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
    <?php require("common/footer.php") ?>
    <script src="../../assets/composantJs/inscription.js"></script>

</body>

</html>