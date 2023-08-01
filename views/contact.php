
<?php require("common/header.php") ?>    
    <link rel="stylesheet" href="/css/contact.css">
</head>

<body>
    <?php require("common/navbar.php") ?>

    <div class="contain-img">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>

    <div class="container-img-description">
        <div id="container-bloc" class="mtb-4">
            <div class="bloc-image"></div>
            <div class="bloc-formulaire un orange">
                <h2 id="titre-formulaire" class="fst-2">Formulaire de demande</h2>
                <form id="formulaire" action="contact.php" method="post">
                    <label for="demande" class="fsp-3">Demande :</label>
                    <select id="demande" class="vert mb-2" name="demande">
                        <option class="option" value="postuler">Je postule</option>
                        <option class="option" value="avis">Avis</option>
                        <option class="option" value="remarque">Remarque</option>
                        <option class="option" value="reservation">Je réserve la salle</option>
                    </select>

                    <label class="fsp-3" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required class="vert mb-2 fsp-3">

                    <label class="fsp-3" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required class="vert mb-2 fsp-3">
                    

                    <label class="fsp-3" for="email">Email :</label>
                    <input type="email" id="email" name="email" required class="vert mb-2 fsp-3">
                    

                    <label class="fsp-3" for="telephone">Numéro de téléphone :</label>
                    <input type="tel" id="telephone" name="telephone" required class="vert mb-2 fsp-3">
                    

                    <label class="fsp-3" for="message">Message :</label>
                    <textarea id="message" name="message" required class="vert mb-2 fsp-4"></textarea>
                    

                    <input id="btn" type="submit" value="Envoyer" class="vert btn mb-1 fsb-3">
                </form>
            </div>
        </div>
    </div>

    <div class="contain-img deux mtb-4">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
        <?php require("common/footer.php") ?>
        <script src = "composantJs/contact.js"></script>

</body>

</html>