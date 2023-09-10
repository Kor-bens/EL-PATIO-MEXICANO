<nav class="navbar navbar-expand-lg bg-body-tertiary d-none" id="navbar">
    <div class="container-fluid">
        <a href="/public/index.php"><img id="logo-patroñ" src="../../../assets/ressources/logocercle.png" alt="logo-patrón"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active text-white fs-4" id="accueil" aria-current="page" href="/admin">ACCUEIL</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white fs-4" id="menu" href="/menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">MENU</a>
                    <ul class="dropdown-menu orange">
                        <li><a class="dropdown-item text-white fs-5 " href="/menu#snacks">Snacks</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="/menu#entrees">Entrées</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="/menu#plats">Plats</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="/menu#boissons">Boissons</a></li>
                        <li><a class="dropdown-item text-white fs-5" href="/menu#desserts">Desserts</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4" id="contact" href="/contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-4" id="message" href="/admin/messagerie">MESSAGE</a>
                </li>
                <li class="nav-item">
                    <a><img id="panier" src="../../../assets/ressources/panier.png" alt="panier"></a>
                    <ul class="orange" id="dropdown-panier">
                        
                        
                        </ul>
                    </li>                    
                        <?php if(!isset($_SESSION['user'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-white fs-4" 
                                    id="connexion" 
                                    href="/connexion-inscription" >
                                    CONNEXION
                                </a>
                            </li><?php
                        } else {
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white fs-4" id="compte" href="/compte" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon compte</a>
                                <ul class="dropdown-menu orange">
                                    <li><p class="dropdown-item text-white fs-5 ">Bienvenue <?=$_SESSION['user']->getPrenom();?></p></li>
                                    <li><a class="dropdown-item text-white fs-5 " href="/compte/modifier">Paramètres</a></li>
                                    <li><a class="dropdown-item text-white fs-5" href="/compte/commandes">Mes commandes</a></li>
                                    <li><a class="dropdown-item text-white fs-5" href="/compte/panier">Panier</a></li>
                                    <li><a class="dropdown-item text-white fs-5" href="/deconnexion">Déconnexion</a></li>
                                </ul>
                            </li><?php 
                        } ?>
                </li>
               
            </ul>
        </div>
    </div>
</nav>
<div class="disclaimer text-center text-secondary fs-4 bg-secondary-subtle w-s100">Ce site n'a pas une vocation commerciale, il s'agit uniquement du site vitrine d'un restaurant fictif. Aucune commande ne pourra y être effectuée.</div>

<script type="module" src="../../../assets/composantJs/navbar.js"></script>
<script type="module" src="../../../assets/composantJs/panier.js"></script>