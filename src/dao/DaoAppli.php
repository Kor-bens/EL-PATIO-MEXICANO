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

    //METHODE POUR RECUPERER LES ID ET NOM_CATEGORIE DANS LA TABLE CATEGORIE_MSG
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

    //METHODE POUR INSERER UNE PERSONNE DANS LA TABLE PERSONNE ET LUI AFFECTER ROLE:INVITE
    public function insertPersonne($nom, $prenom, $mail, $telephone)
    {
        $requete = Requete::REQ_INS_PERS;
        $stmt = $this->db->prepare($requete);
        $id_role = 2;
        $stmt->execute(['id_role' => $id_role, 'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'telephone' => $telephone]);
        // print_r($stmt);
        return $this->db->lastInsertId();
    }

    //METHODE POUR RECUPERER LE DERNIER ID DE LA TABLE PERSONNE
    public function recupDernierePersonneId()
    {
    $stmt = $this->db->prepare(requete::REQ_LAST_PERS);
    $stmt->execute();
    return $stmt->fetchColumn();  
    }

    //METHODE POUR AJOUTER UNE PERSONNE INVITE DANS LA TABLE INVITE
    public function insertInvite()
    {
        $id_personne = $this->recupDernierePersonneId();
        $requete = Requete::REQ_INS_INV;
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id_pers', $id_personne, PDO::PARAM_INT);
        $stmt->bindValue(':id_role', 2, PDO::PARAM_INT);
        $stmt->execute();
    }
  
    //METHODE POUR VERIFIER SI UN EMAIL EXISTE DANS LA TABLE PERSONNE
    public function verifMail($mail)
    {
        $requete = Requete::REQ_EXIST_EMAIL;
        $preparation = $this->db->prepare($requete);
        $preparation->execute(["mail" => $mail]);
        $row = $preparation->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        if ($row) {
            return $row["id"];
        } else {
            // echo 'personne';
        }
    }

    //METHODE POUR RECUPERER LE ROLE D'UNE PERSONNE
    public function recupRolePers($id_pers)
    {
        $requete = Requete::REQ_ROLE_PERS;
        $stmt = $this->db->prepare($requete);
        $stmt->bindValue(':id_pers', $id_pers, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    //METHODE POUR INSERER LE MESSAGE DU FORMULAIRE DANS LA DB
    public function insertMessage($id_pers, $message)
    {
        $requete = Requete::REQ_INS_MESS;
        $stmt = $this->db->prepare($requete);

        $date_envoi = date('Y-m-d');
        $texte = $message;
        $id_role = $this->recupRolePers($id_pers); 
        $id_categorie = $_POST['demande'];

        $stmt->execute(['date_envoi' => $date_envoi, 'texte' => $texte, 'id_categorie' => $id_categorie, 'id_role' => $id_role, 'id_pers' => $id_pers]);
    }


    public function getData($sous_cat, $min, $max)
    {
        // TODO: Vérifier la validité de la variable $categorie

        // if(!is_int($min)) {$min = (int) $min;}
        // if(!is_int($max)) {$max = (int) $max;}
        $min = (int) $min;
        $max = (int) $max;
        $min--;

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
