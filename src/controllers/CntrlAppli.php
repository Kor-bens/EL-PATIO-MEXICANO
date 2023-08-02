<?php
require_once 'src/controllers/Message.php';
require_once 'src/dao/DaoAppli.php';
require_once 'src/dao/Requete.php';
require_once 'src/model/Demande.php';
class CntrlAppli {
    public function affAccueil() {
        require_once 'src/views/index.php';
    }

    public function affMenu() {
        require_once 'src/views/menu.php';
    }

    public function affContact() {
        require_once 'src/dao/DaoAppli.php';
        $dao = new DaoAppli();
        $demandes = $dao->recupDemandes();
        require_once 'src/views/contact.php';
    }

    public function formDemande(){

      $dao = new DaoAppli();
      $demandes = $dao->recupDemandes();

     $messageErr = [];
     $demande   =htmlspecialchars($_POST['demande']);
     $nom       =htmlspecialchars($_POST['nom']);
     $prenom    =htmlspecialchars($_POST['prenom']);
     $email     = htmlspecialchars($_POST['email']);
     $telephone = htmlspecialchars($_POST['telephone']);
     $message   = htmlspecialchars($_POST['message']);

     $i =-1;

     if (!isset($demande)){
        $messageErr[$i++] = Message::INP_ERR_DEMANDE;
     }
     if(!isset($nom)){
       $messageErr[$i++] = Message::INP_ERR_NOM;
     }
     if(!isset($prenom)){
       $messageErr[$i++] = Message::INP_ERR_PRENOM;
     }
     if(!isset($email)){
       $messageErr[$i++] = Message::INP_ERR_EMAIL;
     }
     if(!isset($telephone)){
       $messageErr[$i++] = Message::INP_ERR_TELEPHONE;
     }
     if(!isset($message)){
       $messageErr[$i++] = Message::INP_ERR_MESSAGE;
     }
     
    //  function tailleMessage($message){
    //     if(strlen($message) < 10){
    //          $messageErr[$i++] =  Message::INP_ERR_MESSAGE_CHAR;
    //     };
    //  }

    // if(count($messageErr) === 0){
    //     $dao = new DaoAppli();
    //     $dao = 
    // }

    require_once 'src/views/contact.php';
}


}
