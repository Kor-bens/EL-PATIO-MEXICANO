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

    public function verifMail(){
        
    }

    public function getData($sous_cat, $min, $max) {
        // TODO: Vérifier la validité de la variable $categorie

        // if(!is_int($min)) {$min = (int) $min;}
        // if(!is_int($max)) {$max = (int) $max;}
        $min = (int) $min;
        $max = (int) $max;
        $min --;

        $query = "SELECT plats.id, plats.nom AS title, sous_categories.id AS sous_cat_id, sous_categories.nom AS sous_cat_nom,
        plats.nom, plats.desc_plat, plats.prix, plats.img_plat, plats.ingredients, plats.restrictions_alimentaires, plats.id_sc, sous_categories.nom 
FROM plats 
INNER JOIN sous_categories 
ON plats.id_sc = sous_categories.id 
WHERE sous_categories.nom = :sous_cat";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':sous_cat', $sous_cat, PDO::PARAM_STR);
        // $statement->bindParam(':limit', $max, PDO::PARAM_INT);
        // $statement->bindParam(':offset', $min, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($result);

        return $json;

    }
}

?>

