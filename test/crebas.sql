use elpatiomexicano;

drop table if exists roles;
drop table if exists categories_msg;
drop table if exists statuts_cde;
drop table if exists sous_categories;
drop table if exists plats;
drop table if exists personnes;
drop table if exists commandes;
drop table if exists votes;
drop table if exists messages;
drop table if exists contenir;

CREATE TABLE Role(
   id INT,
   nom VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE categories_msg(
   id INT,
   nom_categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE statuts_cde(
   id INT,
   nom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE sous_categories(
   id INT,
   nom VARCHAR(50) NOT NULL,
   categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE plats(
   id INT,
   nom VARCHAR(50) NOT NULL,
   prix INT NOT NULL,
   description VARCHAR(50) NOT NULL,
   image VARCHAR(50),
   ingrédients VARCHAR(500) NOT NULL,
   restrictions_alimentaires VARCHAR(50),
   id_id_sc INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_id_sc) REFERENCES sous_categories(id)
);

CREATE TABLE personnes(
   id INT,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   mail VARCHAR(50) NOT NULL,
   mot_de_passe VARCHAR(50) NOT NULL,
   telephone VARCHAR(50),
   avatar VARCHAR(50),
   adresse VARCHAR(150),
   id_role INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_role) REFERENCES Role(id)
);

CREATE TABLE commandes(
   id INT,
   date_cmde VARCHAR(50),
   id_statut INT NOT NULL,
   id_pers INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_statut) REFERENCES statuts(id),
   FOREIGN KEY(id_pers) REFERENCES personnes(id)
);

CREATE TABLE votes(
   id_plat INT,
   id_pers INT,
   note INT NOT NULL,
   PRIMARY KEY(id_plat, id_pers),
   FOREIGN KEY(id_plat) REFERENCES plats(id),
   FOREIGN KEY(id_pers) REFERENCES personnes(id)
);

CREATE TABLE messages(
   id_msg INT,
   date_envoi DATE NOT NULL,
   texte VARCHAR(5000) NOT NULL,
   id_categorie INT NOT NULL,
   id_pers INT NOT NULL,
   PRIMARY KEY(id_msg),
   FOREIGN KEY(id_categorie) REFERENCES categories_msg(id),
   FOREIGN KEY(id_pers) REFERENCES personnes(id)
);

CREATE TABLE contenir(
   id_plat INT,
   id_commande INT,
   nombre_plats INT NOT NULL,
   PRIMARY KEY(id_plat, id_commande),
   FOREIGN KEY(id_plat) REFERENCES plats(id),
   FOREIGN KEY(id_commande) REFERENCES commandes(id)
);
