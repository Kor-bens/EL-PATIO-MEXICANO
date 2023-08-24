<?php 

class Categorie_msg{
    private int     $id_cat_msg;
    private string  $lib_cat_msg;
    
    public function __construct($id_cat_msg,$lib_cat_msg){
        $this->id_cat_msg = $id_cat_msg;
        $this->lib_cat_msg    = $lib_cat_msg;
       
    }

    public function getIdCategorieMsg(): int {

        return $this->id_cat_msg;
    }

    public function setIdCategorieMsg(int $id_cat_msg) {
        $this->id_cat_msg = $id_cat_msg;
    }

    public function getNomCategorie(): string {

        return $this->lib_cat_msg;
    }

    public function setNomCategorie(string $lib_cat_msg) {
        $this->lib_cat_msg = $lib_cat_msg;
    }
}