<?php 

class Plat{
    private int             $id_plat;
    private string          $nom_plat;
    private string          $prix;
    private string          $description;
    private string          $img_plat;
    private string          $ingredient;
    private string          $regime;
    private Sous_categorie  $sous_cat_plat;

    public function __construct($id_plat,$nom_plat,$prix,$description,$img_plat,$ingredient,$regime, $sous_cat_plat){
        $this->id_plat      = $id_plat;
        $this->nom_plat     = $nom_plat;
        $this->prix         = $prix;
        $this->description  = $description;
        $this->img_plat     = $img_plat;
        $this->ingredient   = $ingredient;
        $this->regime       = $regime;
        $this->sous_cat_plat= $sous_cat_plat;
    }

    

    public function getId_plat(): int {
        return $this->id_plat;
    }
    public function setId_plat(int $id_plat) {
        $this->id_plat = $id_plat;
    }

    

    public function getNom_plat(): string {
        return $this->nom_plat;
    }
    public function setNom_plat(string $nom_plat) {
        $this->nom_plat = $nom_plat;
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

    public function getImg_plat(): string {
        return $this->img_plat;
    }
    public function setImg_plat(string $img_plat) {
        $this->img_plat = $img_plat;
    }

    public function getIngredient(): string {
        return $this->ingredient;
    }
    public function setIngredient(string $ingredient) {
        $this->ingredient = $ingredient;
    }

    public function getRegime(): string {
        return $this->regime;
    }
    public function setRegime(string $regime) {
        $this->regime = $regime;
    }

    public function getSousCatPlat(): Sous_categorie {

        return $this->sous_cat_plat;
    }
    public function setSousCatPlat(Sous_categorie $sous_cat_plat) {
        $this->sous_cat_plat = $sous_cat_plat;
    }
}