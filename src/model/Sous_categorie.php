<?php

class Sous_categorie {
    private int     $id;
    private string  $nom;
    private string  $categorie;

    public function __construct($id, $nom, $categorie) {
        $this -> id         = $id;
        $this -> nom        = $nom;
        $this -> categorie  = $categorie;
    }

    public function getId(): int {

        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
    }

    public function getNom(): string {

        return $this->nom;
    }
    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getCategorie(): string {

        return $this->categorie;
    }
    public function setCategorie(string $categorie) {
        $this->categorie = $categorie;
    }
}

?>