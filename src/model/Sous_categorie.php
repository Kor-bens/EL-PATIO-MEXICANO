<?php

class Sous_cat_plat {
    private int     $id_sous_cat;
    private string  $lib_sous_cat;
    private string  $cat_plat;

    public function __construct($id_sous_cat, $lib_sous_cat, $cat_plat) {
        $this -> id_sous_cat         = $id_sous_cat;
        $this -> lib_sous_cat        = $lib_sous_cat;
        $this -> cat_plat  = $cat_plat;
    }

    public function getIdSousCat(): int {

        return $this->id_sous_cat;
    }
    public function setIdSousCat(int $id_sous_cat) {
        $this->id_sous_cat = $id_sous_cat;
    }

    public function getLibSousCat(): string {

        return $this->lib_sous_cat;
    }
    public function setLibSousCat(string $lib_sous_cat) {
        $this->lib_sous_cat = $lib_sous_cat;
    }

    public function getCatPlat(): string {

        return $this->cat_plat;
    }
    public function setCatPlat(string $cat_plat) {
        $this->cat_plat = $cat_plat;
    }
}

?>