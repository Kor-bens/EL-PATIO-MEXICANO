<?php
session_start();

if(isset($_SESSION['user'])) {
    echo 'Utilisateur : ';
    print_r($_SESSION['user']);
    echo '<br>';
}

require_once 'src/controllers/CntrlAppli.php';
require_once "src/dao/Requete.php";
require_once 'src/model/Demande.php';
require_once 'src/controllers/Message.php';

$route = htmlspecialchars(explode("?", $_SERVER['REQUEST_URI'])[0]);
$method = $_SERVER['REQUEST_METHOD'];

$cntrlAppli = new CntrlAppli();

// $db = new PDO('mysql:host=localhost;dbname=elpatiomexicano;charset=utf8','elpatio', 'mexicano1234*');

// $query = "SELECT * FROM sous_cat_plat";
// $statement = $db->prepare($query);
// $result = $statement->execute();

// while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['lib_sous_cat'];
//     echo '<br>';
// }


if ($method == 'GET'   && $route == '/index')                       $cntrlAppli->affAccueil();
else if ($method == 'GET'   && $route == '/')                       $cntrlAppli->affAccueil();
else if ($method == 'GET'   && $route == '/contact')                $cntrlAppli->affContact();
else if ($method == 'POST'  && $route == '/contact')                $cntrlAppli -> formDemande();
// else if ($method == 'POST'  && $route == '/contact')    $cntrlAppli->addInvite();
// else if ($method == 'POST' && $route == '/contact')     $cntrlAppli -> envoyerMsg();
else if ($method == 'GET'   && $route == '/menu')                   $cntrlAppli -> affMenu();
else if ($method == 'GET'   && $route == '/requireData')            $cntrlAppli -> getData($_SERVER['REQUEST_URI']);
else if ($method == 'GET'   && $route == '/connexion-inscription')  $cntrlAppli -> affInscription();
else if ($method == 'POST'  && $route == '/post-inscription')       $cntrlAppli -> postInscription();
else if ($method == 'POST'  && $route == '/post-connexion')         $cntrlAppli -> postConnexion();
else if ($method == 'GET'   && $route == '/deconnexion')            $cntrlAppli -> deconnexion();
else                                                                {
                                                                        header("Location: /index");
                                                                        exit;
                                                                    }