<?php
require_once 'src/dao/Db.php';
require_once 'src/dao/Requete.php';
// require_once 'src/model/Demande.php';
class DaoAppli
{
    private PDO $db;

    public function __construct()
    {
        $dbObjet = new Db();
        $this->db = $dbObjet->getDb();
    }

    public function recupDemandes()
    {
        $requete = Requete::LISTE_DEMANDES;
        $statement = $this->db->query($requete);
        $liste = [];
        while ($row = $statement->fetch()) {
            $id = $row['id'];
            $nom = $row['nom_categorie'];
            $demande = new Demande($id, $nom);
            array_push($liste, $demande);
        }
        return $liste;
    }

    // public function addFormDemande($message){
    //     $requete = $this->db->prepare(Requete::REQ_INS_MESS);
    //     $value   = $requete->execute(array($message));
    // }

    public function rolePersonne()
    {
        $requete = Requete::REQ_ROLE_USER;
        $statement = $this->db->query($requete);
        print_r($statement);
        // $liste = [];
        // while ($row = $statement->fetch()) {
        //     $id        = $row['id'];
        //     $nom       = $row['nom'];
        //     $prenom    = $row['prenom'];
        //     $mail      = $row['mail'];
        //     $telephone = $row['telephone'];
        //     $adresse   = $row['adresse'];
        //     $id_role   = $row['id_role'];
        //     $personne  = new Personne($id, $nom, $prenom, $mail, $telephone, $adresse, $id_role);
        //     array_push($liste, $personne);
        // }
    }
}
