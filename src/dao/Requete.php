<?php 

class Requete
{
    public Const LISTE_DEMANDES = 'SELECT id, nom_categorie FROM categories_msg order by nom_categorie';
    public Const REQ_INS_MESS = 'INSERT INTO messages(texte) VALUE (?)';
    public const REQ_ROLE_USER = 'SELECT id, nom, prenom, mail, telephone, adresse, id_role FROM personnes';
    
}
