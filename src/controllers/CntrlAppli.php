<?php
require_once 'src/controllers/Message.php';
require_once 'src/dao/DaoAppli.php';
require_once 'src/dao/Requete.php';
require_once 'src/model/Demande.php';
class CntrlAppli

{
  public function affAccueil()
  {
    require_once 'src/views/index.php';
  }

  public function affMenu()
  {
    require_once 'src/views/menu.php';
  }

  public function affContact()
  {
    require_once 'src/dao/DaoAppli.php';
    $dao = new DaoAppli();
    $demandes = $dao->recupDemandes();
    require_once 'src/views/contact.php';
  }

  public function formDemande()
  {



    $dao = new DaoAppli();
    $demandes = $dao->recupDemandes();

    $messageErr = [];
    $demande   = htmlspecialchars($_POST['demande']);
    $nom       = htmlspecialchars($_POST['nom']);
    $prenom    = htmlspecialchars($_POST['prenom']);
    $email     = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $message   = htmlspecialchars($_POST['message']);

    

    $i = -1;

    if (empty($demande)) {
      $messageErr[$i++] = Message::INP_ERR_DEMANDE;
    }
    if (empty($nom)) {
      $messageErr[$i++] = Message::INP_ERR_NOM;
    }
    if (empty($prenom)) {
      $messageErr[$i++] = Message::INP_ERR_PRENOM;
    }
    if (empty($email)) {
      $messageErr[$i++] = Message::INP_ERR_EMAIL;
    }
    if (empty($telephone)) {
      $messageErr[$i++] = Message::INP_ERR_TELEPHONE;
    }
    if (empty($message)) {
      $messageErr[$i++] = Message::INP_ERR_MESSAGE;
    }

    
    //  function tailleMessage($message){
    //     if(strlen($message) < 10){
    //          $messageErr[$i++] =  Message::INP_ERR_MESSAGE_CHAR;
    //     };
    //  }

    

    if (count($messageErr) === 0) {
      // $dao = new DaoAppli();
      // $dao->addFormDemande($message);
      require_once 'src/views/index.php';
    }



    require_once 'src/views/contact.php';
}

  public function getData($route) {
    $params = explode("?", $route)[1];
    $params = explode("&", $params);
    $sous_cat = explode("=", $params[0])[1];
    $min = explode("=", $params[1])[1];
    $max = explode("=", $params[2])[1];
    
    $dao = new DaoAppli();

    $json = $dao -> getData($sous_cat, $min, $max);

    print_r($json);
  }
}