<?php
require_once 'src/controllers/CntrlAppli.php';
require_once "src/dao/Requete.php";
require_once 'src/model/Demande.php';
require_once 'src/controllers/Message.php';

$route = explode("?", $_SERVER['REQUEST_URI'])[0];
$method = $_SERVER['REQUEST_METHOD'];

$cntrlAppli = new CntrlAppli();

if      ($method == 'GET'   && $route == '/index')      $cntrlAppli -> affAccueil();
else if ($method == 'GET'   && $route == '/')           $cntrlAppli -> affAccueil();
else if ($method == 'GET'   && $route == '/contact')    $cntrlAppli -> affContact();
else if ($method == 'POST'  && $route == '/contact')    $cntrlAppli -> formDemande();
// else if ($method == 'POST' && $route == '/contact')     $cntrlAppli -> envoyerMsg();
else if ($method == 'GET'   && $route == '/menu')       $cntrlAppli -> affMenu();
else if ($method == 'GET'   && $route == '/requireData')$cntrlAppli -> getData($_SERVER['REQUEST_URI']);

?>