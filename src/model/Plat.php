<?php 

class Plat{
    private int             $id;
    private string          $nom;
    private string          $prix;
    private string          $description;
    private string          $image;
    private string          $ingredient;
    private string          $restriction_alimentaire;
    private Sous_categorie  $id_sc;

    public function __construct($id,$nom,$prix,$description,$image,$ingredient,$restriction_alimentaire){
        $this->id                       = $id;
        $this->nom                      = $nom;
        $this->prix                     = $prix;
        $this->description              = $description;
        $this->image                    = $image;
        $this->ingredient               = $ingredient;
        $this->restriction_alimentaire  = $restriction_alimentaire;
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

    public function getPrix(): string {
        return $this->prix;
    }
    public function setPrix(string $prix) {
        $this->prix = $prix;
    }

    public function getDescription(): string {
        return $this->description;
    }
    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getImage(): string {
        return $this->image;
    }
    public function setImage(string $image) {
        $this->image = $image;
    }

    public function getIngredient(): string {
        return $this->ingredient;
    }
    public function setIngredient(string $ingredient) {
        $this->ingredient = $ingredient;
    }

    public function getRestrictionAlimentaire(): string {
        return $this->restriction_alimentaire;
    }
    public function setRestrictionAlimentaire(string $restriction_alimentaire) {
        $this->restriction_alimentaire = $restriction_alimentaire;
    }
}