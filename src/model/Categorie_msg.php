<?php 

class Categorie_msg{
    private int     $id_categorie_msg;
    private string  $nom_categorie;
    
    public function __construct($id_categorie_msg,$nom_categorie){
        $this->id_categorie_msg = $id_categorie_msg;
        $this->nom_categorie    = $nom_categorie;
       
    }

    public function getIdCategorieMsg(): int {

        return $this->id_categorie_msg;
    }

    public function setIdCategorieMsg(int $id_categorie_msg) {
        $this->id_categorie_msg = $id_categorie_msg;
    }

    public function getNomCategorie(): string {

        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie) {
        $this->nom_categorie = $nom_categorie;
    }
}