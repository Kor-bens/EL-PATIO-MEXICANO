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

    <div class="container-img-description">
        <div id="container-bloc" class="mtb-4">
            <div class="bloc-image"></div>
            <div class="bloc-formulaire un orange">
                <h2 id="titre-formulaire" class="fst-2">Formulaire de demande</h2>
                <form id="formulaire" action="/contact" method="post">
                    <label for="demande" class="fsp-3">Demande :</label>
                    <select id="demande" class="vert mb-2" name="demande">
                        <?php foreach($demandes as $demande) { ?>
                         <option class="option" value="<?= $demande->getId() ?>"><?= $demande->getNom() ?></option>
                      <?php  } ?>
                        <!-- <option class="option" value="postuler">Je postule</option>
                        <option class="option" value="avis">Avis</option>
                        <option class="option" value="remarque">Remarque</option>
                        <option class="option" value="reservation">Je réserve la salle</option> -->
                    </select>

                    <label class="fsp-3" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" data-sb-validations="required" class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" data-sb-validations="required" class="vert mb-2 fsp-3">


                    <label class="fsp-3" for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" data-sb-validations="required" class="vert mb-2 fsp-3">


                    <label class="fsp-3" for="telephone">Numéro de téléphone :</label>
                    <input type="number" id="telephone" name="telephone" placeholder="Entrez votre numéro de téléphone" data-sb-validations="required" class="vert mb-2 fsp-3">


                    <label class="fsp-3" for="message">Message :</label>
                    <textarea id="message" name="message" data-sb-validations="required" class="vert mb-2 fsp-4"></textarea>


                    <input id="btn" type="submit" value="Envoyer" class="vert btn mb-1 fsb-3">
                </form>
            </div>
        </div>
    </div>
<?php
print_r($messageErr);
    if (isset($messageErr)) {
        foreach ($messageErr as $err) {
    ?>
            <div class="alert alert-danger" role="alert"><?= $err ?></div>
    <?php }
    } ?>

    <div class="contain-img deux mtb-4">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
    <?php require("common/footer.php") ?>
    <script src="../../assets/composantJs/contact.js"></script>

</body>

</html>