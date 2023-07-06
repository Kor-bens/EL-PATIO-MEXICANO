<?php require("common/header.php") ?>    
    <link rel="stylesheet" href="/css/style-contact-contain-img.css">
</head>

<body>
    <?php require("common/navbar.php") ?>

    <div class="contain-img">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>

    <div class="container-img-description">
        <div id="container-bloc">
            <div class="bloc-image"></div>
            <div class="bloc-formulaire un orange">
                <h2 id="titre-formulaire">Formulaire de demande</h2>
                <form id="formulaire" action="contact.php" method="post">
                    <label for="demande">Demande :</label>
                    <select id="demande" class="vert mb-2" name="demande">
                        <option class="option" value="postuler">Je postule</option>
                        <option class="option" value="avis">Avis</option>
                        <option class="option" value="remarque">Remarque</option>
                        <option class="option" value="reservation">Je réserve la salle</option>
                    </select>

                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required class="vert mb-2">

                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required class="vert mb-2">
                    

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required class="vert mb-2">
                    

                    <label for="telephone">Numéro de téléphone :</label>
                    <input type="tel" id="telephone" name="telephone" required class="vert mb-2">
                    

                    <label for="message">Message :</label>
                    <textarea id="message" name="message" required class="vert mb-2"></textarea>
                    

                    <input id="btn" type="submit" value="Envoyer" class="vert btn mb-1">
                </form>
            </div>
        </div>
    </div>

    <div class="contain-img deux">
        <!-- <img id="plats-table" src="../Ressources/plats-table.jpg" alt="plats-table"> -->
    </div>
        <?php require("common/footer.php") ?>

</body>

</html>