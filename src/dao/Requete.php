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
    public const CHECK_IF_EXIST = "SELECT mail FROM personne WHERE mail = ?";
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
    // TODO: Ajouter la date de création de la personne

    
}



