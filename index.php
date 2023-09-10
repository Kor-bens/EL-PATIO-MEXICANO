<?php

// On fait en sorte que toutes les erreurs soient affichées
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// On appelle les fichiers de classe avant l'ouverture de la session pour être sûr
// de l'affichage correct des éléments et méthodes des instances.
require_once 'src/model/Personne.php';
require_once 'src/model/Inscrit.php';
require_once 'src/controllers/CntrlAppli.php';
require_once "src/dao/Requete.php";
require_once 'src/model/Demande.php';
require_once 'src/controllers/Message.php';
require_once 'src/model/Categorie_msg.php';

session_start();

$route = htmlspecialchars(explode("?", $_SERVER['REQUEST_URI'])[0]);
$method = $_SERVER['REQUEST_METHOD'];

$cntrlAppli = new CntrlAppli();

if ($method == 'GET'   && $route == '/index')                       $cntrlAppli->affAccueil();
else if ($method == 'GET'   && $route == '/')                       $cntrlAppli->affAccueil();
else if ($method == 'GET'   && $route == '/contact')                $cntrlAppli->affContact();
else if ($method == 'POST'  && $route == '/contact')                $cntrlAppli->formDemande();
else if ($method == 'GET'   && $route == '/menu')                   $cntrlAppli->affMenu();
else if ($method == 'GET'   && $route == '/requireData')            $cntrlAppli->getData($_SERVER['REQUEST_URI']);
else if ($method == 'GET'   && $route == '/connexion-inscription')  $cntrlAppli->affInscription();
else if ($method == 'POST'  && $route == '/post-inscription')       $cntrlAppli->postInscription();
else if ($method == 'POST'  && $route == '/post-connexion')         $cntrlAppli->postConnexion();
else if ($method == 'GET'   && $route == '/deconnexion')            $cntrlAppli->deconnexion();
else if ($method == 'GET'   && $route == '/compte/modifier')        $cntrlAppli->modifierCompte();
else if ($method == 'POST'  && $route == '/post-modifier')          $cntrlAppli->postModifier();
else if ($method == "GET"   && $route == '/admin')                  $cntrlAppli->pageAdmin();
else if ($method == 'GET'   && $route == '/admin/messagerie')        $cntrlAppli->affmessagePersonne();
else if ($method == 'DELETE'   && $route == '/admin/messagerie')     $cntrlAppli->supprimerMessage();
else if ($method == 'PATCH'    && $route == '/statut_message')       $cntrlAppli->modifStatutMessage(); 

else {
    header("Location: /index");
    exit;
}
