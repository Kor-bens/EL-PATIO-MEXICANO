<?php
require_once 'src/controllers/CntrlAppli.php';

$route  = explode("?", $_SERVER['REQUEST_URI'])[0];
$method = $_SERVER['REQUEST_METHOD'];

$cntrlAppli = new CntrlAppli();

if      ($method == 'GET' && $route = '/menu')      {$cntrlAppli -> affMenu();}
else if ($method == 'GET' && $route = '/contact')   {$cntrlAppli -> affContact();}
else if ($method == 'POST' && $route = '/contact')  {$cntrlAppli -> envoyerMsg();}
else                                                {$cntrlAppli -> affAccueil();}

?>