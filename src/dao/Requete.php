<?php 

class Requete
{
    public Const LISTE_DEMANDES = 'SELECT id_cat_msg, lib_cat_msg FROM categorie_msg order by lib_cat_msg';
    public Const REQ_INS_MESS   = 'INSERT INTO message(date_envoi, texte, id_cat_msg, id_pers) VALUE (:date_envoi, :texte, :id_categorie, :id_role, :id_pers)';
    public const REQ_EXIST_EMAIL= "SELECT id_pers FROM personne WHERE mail =:mail";
    public const REQ_ROLE_PERS        = "SELECT id_role FROM personne WHERE id = :id_pers";
    public const REQ_INS_PERS   = "INSERT INTO personne(id_role,nom,prenom,mail,telephone, date_crea_pers) VALUES(:id_role,:nom,:prenom,:mail,:telephone, :date)";
    public const REQ_LAST_PERS  = "SELECT MAX(id_pers) FROM personne WHERE id_role = 2";
    // public const REQ_INS_INV     = "INSERT INTO invite(id_pers) SELECT DISTINCT id_pers FROM personne";
    public const REQ_INS_INV    = "INSERT INTO invite(id_pers) VALUES (:id_pers)";
    public const CHECK_IF_EXIST = "SELECT";
    // TODO: Ajouter la date de création de la personne

    
}



