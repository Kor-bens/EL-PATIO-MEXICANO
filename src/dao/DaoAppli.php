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
            $id = $row['id_cat_msg'];
            $nom = $row['lib_cat_msg'];
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

        $query = "SELECT p.id_plat, 
            p.nom_plat AS title, 
            sc.id_sous_cat AS sous_cat_id, 
            sc.lib_sous_cat AS sous_cat_nom,
            p.description AS desc_plat, 
            p.prix, 
            p.img_plat, 
            p.ingredients, 
            p.regime, 
            p.id_sc
FROM plat p
INNER JOIN sous_cat_plat sc 
    ON p.id_sc = sc.id_sous_cat
WHERE sc.lib_sous_cat = :sous_cat";

        $statement = $this->db->prepare($query);
        $statement->bindParam(':sous_cat', $sous_cat, PDO::PARAM_STR);
        // $statement->bindParam(':limit', $max, PDO::PARAM_INT);
        // $statement->bindParam(':offset', $min, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($result);

        header('Content-Type: application/json');
        print_r($json);
        exit();
    }

    public function postInscription() {
        if (isset($_POST['nom']) 
            && isset($_POST['prenom']) 
            && isset($_POST['email']) 
            && isset($_POST['email-confirm']) 
            && isset($_POST['mdp']) 
            && isset($_POST['mdp-confirm']) 
            && isset($_POST['telephone'])
             && isset($_POST['adresse'])) {

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $email_confirm = htmlspecialchars($_POST['email-confirm']);
                $mdp = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_ARGON2ID);
                $mdp_confirm = password_hash(htmlspecialchars($_POST['mdp-confirm']), PASSWORD_ARGON2ID);
                $telephone = htmlspecialchars($_POST['telephone']);
                $adresse = htmlspecialchars($_POST['adresse']);
                

                // Vérifier que la personne n'est pas déjà en base



            echo 'Nom : ';
            echo $nom;
            echo '<br>';

            echo 'Prénom : ';
            echo $prenom;
            echo '<br>';

            echo 'Mail : ';
            echo $email;
            echo '<br>';

            echo 'Email-confirm : ';
            echo $email_confirm;
            echo '<br>';

            echo 'Mot de passe : ';
            echo $mdp;
            echo '<br>';

            echo 'Mot de passe-confirm : ';
            echo $mdp_confirm;
            echo '<br>';

            echo 'Téléphone : ';
            echo $telephone;
            echo '<br>';

            echo 'Adresse : ';
            echo $adresse;
            echo '<br>';


        } else header("Location : /connexion-inscription?error=missing-values");
    }
}
