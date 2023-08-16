<nav class="navbar navbar-expand-lg bg-body-tertiary d-none" id="navbar">
    <div class="container-fluid">
        <a href="/public/index.php"><img id="logo-patroñ" src="../../../assets/ressources/logocercle.png" alt="logo-patrón"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active text-white fs-4" id="accueil" aria-current="page" href="/index">ACCUEIL</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fs-4" id="menu" href="/menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">MENU</a>
                    <ul class="dropdown-menu orange">
                        <li><a class="dropdown-item text-white fs-5 " href="menu.php#snacks">Snacks</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="menu.php#entrees">Entrées</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="menu.php#plats">Plats</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="menu.php#boissons">Boissons</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="menu.php#desserts">Desserts</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4" id="contact" href="/contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4" id="contact" href="/inscription">CONNEXION</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="disclaimer text-center text-secondary fs-4 bg-secondary-subtle w-s100">Ce site n'a pas une vocation commerciale, il s'agit uniquement du site vitrine d'un restaurant fictif. Aucune commande ne pourra y être effectuée.</div>

<script src="../../../assets/composantJs/navbar.js"></script>