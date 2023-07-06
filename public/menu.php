<?php require("common/header.php") ?>
<link rel="stylesheet" href="../css/menu.css">
</head>

<body>
    <?php require('common/navbar.php'); ?>
    <div class="bloc-plat d-none d-md-block">
        <a href="index.php" class="link-logo">
            <img src="../Ressources/logocercle.png" alt="El patio mexicano's logo" class="logo-big">
        </a>

        <div id="fleche">></div>
    </div>
    <main>
        <div id="menu-titre-div">
            <h1 class="texte-vert m-5 text-center menu-titre">MENU</h1>
            
        </div>

        <div id="description" class="orange text-center text-white">Les réservations se font uniquement par téléphone.<br>
            Nos meilleurs développeurs travaillent sur des outils de réservation en ligne...
        </div>

        <div id="liens-ancres">
            <div class="ancre vert" id="snacks-ancre">
                <a href="#snacks" id="snacks-link" class="text-white text-decoration-none ancre-link">Snacks
                    <!-- <div class="bloc-img"> -->
                        <img class="img-plat snacks d-none" src="" alt="">
                    <!-- </div> -->
                </a>
            </div>

            <div class="ancre vert" id="entrees-ancre">
                <a href="#entrées" id="entrées-link" class="text-white text-decoration-none ancre-link">Entrées
                <!-- <div class="bloc-img entree"> -->
                        <img class="img-plat entrées d-none" src="" alt="">
                    <!-- </div> -->
                </a>
            </div>
            <div class="ancre vert" id="plats-ancre">
                <a href="#plats" id="plats-link" class="text-white text-decoration-none ancre-link">Plats
                <!-- <div class="bloc-img plat"> -->
                        <img class="img-plat plats d-none" src="" alt="">
                    <!-- </div> -->
                </a>
            </div>
            <div class="ancre vert" id="desserts-ancre">
                <a href="#desserts" id="desserts-link" class="text-white text-decoration-none ancre-link">Desserts
                <!-- <div class="bloc-img dessert"> -->
                        <img class="img-plat desserts d-none" src="" alt="">
                    <!-- </div> -->
                </a>
            </div>
            <div class="ancre vert" id="boissons-ancre">
                <a href="#boissons" id="boissons-link" class="text-white text-decoration-none ancre-link">Boissons
                <!-- <div class="bloc-img boisson"> -->
                    <img class="img-plat boissons d-none" src="" alt="">
                <!-- </div> -->
                </a>
            </div>
        </div>


        <?php include('composantsMenu/snacks.php'); ?>
        <?php include('composantsMenu/entrées.php'); ?>
        <?php include('composantsMenu/plats.php'); ?>
        <?php include('composantsMenu/desserts.php'); ?>
        <?php include('composantsMenu/boissons.php'); ?>

    </main>


    <?php require('common/footer.php') ?>

    <script defer src="composantJs/menu.js" type="module"></script>
</body>

</html>