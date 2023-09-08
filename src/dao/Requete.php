<?php 

class Requete
{
    public Const LISTE_DEMANDES = 'SELECT id_cat_msg, lib_cat_msg FROM categorie_msg order by lib_cat_msg';
    public Const REQ_INS_MESS   = 'INSERT INTO message(date_envoi, texte, id_cat_msg, id_pers) VALUE (:date_envoi, :texte, :id_categorie, :id_pers)';
    public const REQ_EXIST_EMAIL= "SELECT id_pers FROM personne WHERE mail =:mail";
    public const REQ_ROLE_PERS        = "SELECT id_role FROM personne WHERE id = :id_pers";
    public const REQ_INS_PERS   = "INSERT INTO personne(id_role,nom,prenom,mail,telephone, date_crea_pers) VALUES(:id_role,:nom,:prenom,:mail,:telephone,:date_crea_pers)";
    public const REQ_LAST_PERS  = "SELECT MAX(id_pers) FROM personne WHERE id_role = 2";
    // public const REQ_INS_INV     = "INSERT INTO invite(id_pers) SELECT DISTINCT id_pers FROM personne";
    public const REQ_INS_INV    = "INSERT INTO invite(id_pers) VALUES (:id_pers)";
    public const CHECK_IF_EXIST = "SELECT p.id_pers, p.mail, p.nom, p.prenom, p.id_role, p.telephone, i.mdp, i.adresse FROM personne p INNER JOIN inscrit i on i.id = p.id_pers WHERE mail = ?";
    public const REQ_PLATS = "SELECT p.id_plat, 
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
    public const INSERT_PERS = "INSERT INTO personne (id_role, 
                                                        nom, 
                                                        prenom, 
                                                        mail, 
                                                        telephone, 
                                                        date_crea_pers)
                                VALUES((SELECT id_role FROM role WHERE lib_role = 'Inscrit'), 
                                        :nom, 
                                        :prenom, 
                                        :mail, 
                                        :telephone, 
                                        CURDATE())";

    public const INSERT_INSCRIT = "INSERT INTO inscrit (id, 
                                                        mdp,
                                                        adresse)
                                                VALUES ((SELECT id_pers FROM personne WHERE mail = :mail),
                                                        :mdp,
                                                        :adresse)";

    
    public const FETCH_ID_ROLE = "SELECT id_role FROM role WHERE lib_role = ?";
    public const FETCH_ID_PERS = "SELECT id_pers FROM personne WHERE mail = :email";
    public const FETCH_INSCRIT = "SELECT p.id_pers, p.nom, p.prenom, p.mail, p.telephone, p.date_crea_pers, i.mdp, i.adresse, i.avatar
                                    FROM personne p
                                    INNER JOIN inscrit i on p.id_pers = i.id
                                    WHERE p.mail = ?";

        // TODO: Rajouter toutes les requêtes pour modification de la personne
        public const CHANGE_EMAIL = "UPDATE `elpatiomexicano`.`personne` SET `mail` = :new_email WHERE (`mail` = :email);
        ";

        public const CHANGE_NOM = "UPDATE `elpatiomexicano`.`personne` SET `nom` = :form_nom WHERE (`mail` = :email);
        ";

        public const CHANGE_PRENOM = "UPDATE `elpatiomexicano`.`personne` SET `prenom` = :form_prenom WHERE (`mail` = :email);
        ";

        public const CHANGE_MDP = "UPDATE `elpatiomexicano`.`personne`
                                        INNER JOIN inscrit i on i.id = personne.id_pers
                                        SET `mdp` = :mdp 
                                        WHERE (`mail` = :email);
        ";
    public const REQ_MSG_PERS = "SELECT m.id_msg, m.date_envoi, m.texte, m.id_cat_msg, m.id_pers, c.lib_cat_msg, p.nom, p.prenom,p.mail
    FROM message m
    LEFT JOIN categorie_msg c ON m.id_cat_msg = c.id_cat_msg
    LEFT JOIN personne p ON m.id_pers = p.id_pers";
}



