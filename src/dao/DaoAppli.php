<?php
require_once 'src/dao/Db.php';
require_once 'src/dao/Requete.php';
require_once 'src/model/Personne.php';
require_once 'src/model/Inscrit.php';
require_once 'src/model/Demande.php';
require_once 'src/model/Categorie_msg.php';
require_once 'src/model/Message_contact.php';
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
        $date = date('d-m-Y');
        $stmt->execute(['id_role' => $id_role, 'nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'telephone' => $telephone, 'date_crea_pers' => $date]);
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
        $stmt->execute();
    }
  
    //METHODE POUR VERIFIER SI UN EMAIL EXISTE DANS LA TABLE PERSONNE
    public function verifMail($mail)
    {
        $requete = Requete::REQ_EXIST_EMAIL;
        $preparation = $this->db->prepare($requete);
        $preparation->execute(["mail" => $mail]);
        $row = $preparation->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $row["id_pers"];
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
    
        $id_categorie = $_POST['demande'];

        $stmt->execute(['date_envoi' => $date_envoi, 'texte' => $texte, 'id_categorie' => $id_categorie, 'id_pers' => $id_pers]);
    }


    public function getData($sous_cat, $min, $max)
    {
        // TODO: Vérifier la validité de la variable $categorie

        // if(!is_int($min)) {$min = (int) $min;}
        // if(!is_int($max)) {$max = (int) $max;}
        $min = (int) $min;
        $max = (int) $max;
        $min--;

        $query = Requete::REQ_PLATS;

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

                // Récupérer les éléments venant du formulaire
            $nom            = htmlspecialchars($_POST['nom']);
            $prenom         = htmlspecialchars($_POST['prenom']);
            $email          = htmlspecialchars($_POST['email']);
            $email_confirm  = htmlspecialchars($_POST['email-confirm']);
            $mdp            = htmlspecialchars($_POST['mdp']);
            $mdp_confirm    = htmlspecialchars($_POST['mdp-confirm']);
            $telephone      = htmlspecialchars($_POST['telephone']);
            $adresse        = htmlspecialchars($_POST['adresse']);
            

            // Vérifier que la personne n'est pas déjà en base
            $query = Requete::CHECK_IF_EXIST;
            $check = $this -> db->prepare($query);
            $check->execute(array($email));
            $row = $check->rowCount();

            // On fait toute une série de vérifications, dans un ordre de priorité
            // décidé arbitrairement :
            // - La personne n'est pas en base
            // - le nom, le prénom, le mail ne sont pas trop longs
            // - Le mail a un bon format de mail
            // - Le mail et le mot de passe correspondent à leurs confirmations

            if($row === 0) {

                if(strlen($nom) < 100) {

                    if(strlen($prenom) < 100) {

                        if(strlen($email) < 100) {

                            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if($email == $email_confirm) {

                                    if($mdp == $mdp_confirm) {

                                        // Suite à des problèmes d'incompatibilité, on repasse sur un sha256
                                        // $mdp = password_hash($mdp, PASSWORD_ARGON2ID);
                                        $mdp = hash('sha256', $mdp);

                                        // On crée une instance de Personne qu'on enverra en base
                                        $personne = new Personne(0, $nom, $prenom, $email, $telephone);
                                        
                                        // On insère une personne en base
                                        $query = Requete::INSERT_PERS;
                                        $statement = $this->db->prepare($query);
                                        $statement->execute([
                                            'nom'       => $personne->getNom(),
                                            'prenom'    => $personne->getPrenom(),
                                            'mail'      => $personne->getEmail(),
                                            'telephone' => $personne->getPhone()
                                        ]);

                                        // On crée
                                        $inscrit = new Inscrit(0, $nom, $prenom, $email, $mdp, $adresse, $telephone, NULL);

                                        $query = Requete::INSERT_INSCRIT;                                        
                                        $statement = $this->db->prepare($query);

                                        $statement->execute([
                                            'mail'      => $inscrit->getEmail(),
                                            'mdp'       => $inscrit->getMdp(),
                                            'adresse'   => $inscrit->getAdresse()
                                        ]);

                                        $query = Requete::FETCH_ID_PERS;
                                        $statement = $this->db->prepare($query);
                                        $statement->execute([
                                            'email' => $email
                                        ]);
                                        $data = $statement->fetch();
                                        $id_pers = $data['id_pers'];

                                        $personne->setIdPers($id_pers);
                                        $inscrit->setIdPers($id_pers);

                                        header('Location: /connexion-inscription?error=none');

                                    } else header('Location: /connexion-inscription?error=password-retype');
                                } else header('Location: /connexion-inscription?error=email-retype');
                            } else header('Location: /connexion-inscription?error=email-format');
                        } else header('Location: /connexion-inscription?error=email-lgth');
                    } else header('Location: /connexion-inscription?error=first-name-lgth');
                } else header('Location: /connexion-inscription?error=name-lgth');
            } else header('Location: /connexion-inscription?error=already');
        } else header("Location : /connexion-inscription?error=missing-values");
    }

    public function postConnexion() {
        if(isset($_POST['email']) &&
            isset($_POST['mdp'])) {

            $email  = htmlspecialchars( $_POST['email']);
            $mdp    = htmlspecialchars($_POST['mdp']);
            // $mdp    = password_hash($mdp, PASSWORD_ARGON2ID);
            $mdp = hash('sha256', $mdp);

            $query = Requete::CHECK_IF_EXIST;
            $check = $this-> db -> prepare($query);
            $check -> execute(array($email));
            $data = $check->fetch();
            $rows = $check->rowCount();

            if($rows == 1) { //Si l'utilisateur existe
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                    // On stocke l'ID Role Admin dans une variable
                    $query      = Requete::FETCH_ID_ROLE;
                    $statement  = $this->db->prepare($query);
                    $lib_admin   = "admin";
                    $statement->execute(array($lib_admin));

                    $role_data = $statement->fetch();
                    $id_admin = $role_data['id_role'];
                    
                    
                    // On stocke l'ID Role Inscrit dans une variable
                    $lib_inscrit = "inscrit";
                    $statement = $this->db->prepare($query);
                    $statement->execute(array($lib_inscrit));
                    
                    $role_data = $statement->fetch();
                    $id_incsrit = $role_data['id_role'];

                    // On crée une instance de Personne avec les données de l'utilisateur
                    $id_pers    = $data['id_pers'];
                    $nom        = $data['nom'];
                    $prenom     = $data['prenom'];
                    $email      = $data['mail'];
                    $telephone  = $data['telephone'];
                    $personne   = new Personne($id_pers, $nom, $prenom, $email, $telephone);

                    // On regarde si l'utilisateur est admin ou inscrit

                    if($data['id_role'] == $id_admin) {
                        $this->connectAdmin($personne, $mdp);
                    } else if ($data['id_role'] == $id_incsrit) {
                        $this->connectInscrit($personne, $mdp);

                    } else header('Location : /connexion-inscription?error=unknown-role');                    
                } else header('Location: /connexion-inscription?error=email-format');
            } else header('Location: /connexion-inscription?error=unknown-user');
        } else header ('Location: /index');
    }

    public function connectAdmin($personne, $mdp) {
        $prenom = $personne->getPrenom();
        $nom    = $personne->getNom();
        $email  = $personne->getEmail();
        
        $query = "SELECT p.nom, p.prenom, p.mail, p.telephone, p.date_crea_pers, a.mdp, a.avatar
        FROM personne p
        INNER JOIN admin a on p.id_pers = a.id_pers
        WHERE p.mail = ?";

        $statement = $this->db->prepare($query);
        $statement->execute(array($email));
        $data = $statement->fetch();
        
        if($mdp === $data['mdp']) {
            
            $admin = new Admin($personne, $mdp);
            
            $_SESSION['status'] = 'logged';
            $_SESSION['role'] = 'admin';
            $_SESSION['user']   = $inscrit;
            
            header ('Location: /index');

        } else header('Location: inscription-connexion?error=bad-password');
    }

    public function connectInscrit($personne, $mdp) {
        require_once 'src/model/Inscrit.php';
        
        $id_pers= $personne->getIdPers();
        $prenom = $personne->getPrenom();
        $nom    = $personne->getNom();
        $email  = $personne->getEmail();
        
        $query = Requete::FETCH_INSCRIT;

        $statement = $this->db->prepare($query);
        $statement->execute(array($email));
        $data = $statement->fetch();
        
        $adresse = $data['adresse'];

        if($mdp === $data['mdp']) {
            
            $adresse = $data['adresse'];
            $inscrit = new Inscrit($id_pers, $nom, $prenom, $email, $mdp, $adresse);
            
            $_SESSION['status'] = 'logged';
            $_SESSION['role'] = 'admin';
            $_SESSION['user']   = $inscrit;
            
            header ('Location: /index');
            // TODO: Gérer les exceptions de connexion

        } else header('Location: inscription-connexion?error=bad-password');
    }

    public function postModifier() {
        if (isset($_POST['nom']) 
            && isset($_POST['prenom']) 
            && isset($_POST['email']) 
            && isset($_POST['new-email']) 
            && isset($_POST['last-mdp']) 
            && isset($_POST['new-mdp']) 
            && isset($_POST['new-mdp-confirm']) 
            && isset($_POST['telephone'])
            && isset($_POST['adresse'])) {

                // Récupérer les éléments venant du formulaire
                $form_nom            = htmlspecialchars($_POST['nom']);
                $form_prenom         = htmlspecialchars($_POST['prenom']);
                $form_last_email     = htmlspecialchars($_POST['email']);
                $form_new_email      = htmlspecialchars($_POST['new-email']);
                $form_last_mdp       = htmlspecialchars($_POST['last-mdp']);
                $form_new_mdp        = htmlspecialchars($_POST['new-mdp']);
                $form_new_mdp_confirm= htmlspecialchars($_POST['new-mdp-confirm']);
                $form_telephone      = htmlspecialchars($_POST['telephone']);
                $form_adresse        = htmlspecialchars($_POST['adresse']);

                // Vérifier que la personne est déjà en base
                $query = Requete::CHECK_IF_EXIST;
                $check = $this -> db->prepare($query);
                $check->execute(array($form_last_email));
                $row = $check->rowCount();
                $data = $check->fetch();
                
                $id_pers        = $_SESSION['user']->getIdPers();
                $last_nom       = $data['nom'];
                $last_prenom    = $data['prenom'];
                $last_mdp       = $data['mdp'];
                $last_email     = $data['mail'];
                $last_adresse   = $data['adresse'];
                $last_telephone = $data['telephone'];

                $inscrit = new Inscrit($id_pers, $last_nom, $last_prenom, $last_email, $last_mdp, $last_adresse, $last_telephone);
                
                var_dump($inscrit);

                // On va faire toute une série de vérifications :
                    // - L'utilisateur existe déjà en base
                    // - L'ancien mot de passe rentré est correct
                    // - Le nouveau mdp et sa confirmation correspondent

                if($row === 1) {
                    if(!empty($form_new_mdp)) {
                        $form_new_mdp = hash('sha256', $form_new_mdp);

                        if($form_last_mdp === $inscrit->getMdp() && $form_new_mdp != $last_mdp) {
                            if($form_new_mdp === $form_new_mdp_confirm) {
                                $this->changeMdp($inscrit, $form_new_mdp);
                            }
                        }
                        
                    } if(!empty($form_new_email) && $form_new_email != $inscrit->getEmail()) {
                        $this -> changeEmail($inscrit, $form_new_email);
                        // $inscrit->setEmail($form_new_email);

                    } if (!empty($form_nom) && $form_nom != $inscrit->getNom()) {
                        $this->changeNom($inscrit, $form_nom);

                    } if(!empty($form_prenom) && $form_prenom != $inscrit -> getPrenom()) {
                        $this->changePrenom($inscrit, $form_prenom);

                    } if(!empty($form_adresse) && $form_adresse != $inscrit -> getAdresse()) {
                        $this->changePrenom($inscrit, $form_adresse);
                    }           
                
            }
        }
    }

    public function changeMdp(Inscrit $inscrit, $form_new_mdp) {
        require_once 'src/model/Inscrit.php';
        try {
            $query = Requete::CHANGE_MDP;
            $statement = $this->db->prepare($query);
            $statement->execute([
                'form_new_mdp'  => $form_new_mdp,
                'email'     => $inscrit->getEmail()
            ]);

            $inscrit->setMdp($form_new_mdp);
            $_SESSION['user'] = $inscrit;
        } catch (Exception $e) {
            echo "Il y a eu une erreur : ", $e->getMessage();
        }
        
    }

    public function changeEmail($inscrit, $new_email) {
        try {
            $query = Requete::CHANGE_EMAIL;
            $statement = $this->db->prepare($query);
            $statement->execute([
                'new_email' => $new_email,
                'email'     => $inscrit->getEmail()
            ]);

            $inscrit->setEmail($new_email);
            $_SESSION['user'] = $inscrit;
        } catch (Exception $e) {
            echo 'Il y a eu une erreur', $e->getMessage();
        }
    }

    public function changeNom(Inscrit $inscrit, $form_nom) {
        require_once 'src/model/Inscrit.php';
        try {
            $query = Requete::CHANGE_NOM;
            $statement = $this->db->prepare($query);
            $statement->execute([
                'form_nom'  => $form_nom,
                'email'     => $inscrit->getEmail()
            ]);

            $inscrit->setNom($form_nom);
            $_SESSION['user'] = $inscrit;
        } catch (Exception $e) {
            echo "Il y a eu une erreur : ", $e->getMessage();
        }
        
    }

    public function changePrenom(Inscrit $inscrit, $form_prenom) {
        require_once 'src/model/Inscrit.php';
        try {
            $query = Requete::CHANGE_PRENOM;
            $statement = $this->db->prepare($query);
            $statement->execute([
                'form_prenom'  => $form_prenom,
                'email'     => $inscrit->getEmail()
            ]);

            $inscrit->setPrenom($form_prenom);
            $_SESSION['user'] = $inscrit;
        } catch (Exception $e) {
            echo "Il y a eu une erreur : ", $e->getMessage();
        }
        
    }

    public function changeAdresse(Inscrit $inscrit, $form_adresse) {
        require_once 'src/model/Inscrit.php';
        try {
            $query = Requete::CHANGE_ADRESSE;
            $statement = $this->db->prepare($query);
            $statement->execute([
                'form_prenom'  => $form_adresse,
                'email'     => $inscrit->getEmail()
            ]);

            $inscrit->setAdresse($form_adresse);
            $_SESSION['user'] = $inscrit;
        } catch (Exception $e) {
            echo "Il y a eu une erreur : ", $e->getMessage();
        }
        
    }

    public function afficheMessagePersonne() {
        $requete = Requete::REQ_MSG_PERS;
        $stmt = $this->db->query($requete);
        $liste = [];
        while ($row = $stmt->fetch()) {
            $texte = $row['texte'];
            $categorie_msg = new Categorie_msg($row['id_cat_msg'], $row['lib_cat_msg']);
            $date_envoi = $row['date_envoi'];
            
            // Gestion des données potentiellement nulles
            $nom = $row['nom']; // Valeur par défaut vide si le nom est nul
            $prenom = $row['prenom']; // Valeur par défaut vide si le prénom est nul
            $email = $row['mail']; // Valeur par défaut vide si l'email est nul
            $phone = $row['telephone'] ?? ''; // Valeur par défaut vide si le téléphone est nul
            
            $personne = new Personne($row['id_pers'], $nom, $prenom, $email, $phone);
            $id_msg  = $row['id_msg'];
            $message = new Message_contact($id_msg, $date_envoi, $texte, $categorie_msg, $personne);
            array_push($liste, $message);
        }
        return $liste;
    }

    // public function recupDemandes()
    // {
    //     $requete = Requete::LISTE_DEMANDES;
    //     $statement = $this->db->query($requete);
    //     $liste = [];
    //     while ($row = $statement->fetch()) {
    //         $id = $row['id_cat_msg'];
    //         $nom = $row['lib_cat_msg'];
    //         $demande = new Demande($id, $nom);
    //         array_push($liste, $demande);
    //     }
    //     return $liste;
    // }
}
