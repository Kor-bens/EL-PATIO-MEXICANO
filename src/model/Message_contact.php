<?php 

class Message_contact {
    private int             $id_msg;
    private string          $date_envoi;
    private string          $texte;
    private Categorie_msg   $categorie_msg;
    private Personne        $personne; // Ajout de la propriété personne

    public function __construct($id_msg, $date_envoi, $texte, $categorie_msg, $personne) {
        $this->id_msg = $id_msg;
        $this->date_envoi = $date_envoi;
        $this->texte = $texte;
        $this->categorie_msg = $categorie_msg;
        $this->personne = $personne;
    }

    // Ajout de la méthode pour obtenir l'objet Personne
    public function getPersonne(): Personne {
        return $this->personne;
    }
    public function setPersonne(Personne $personne) {
        $this->personne = $personne;
    }

    public function getCategorieMsg(): Categorie_msg {

        return $this->categorie_msg;
    }
    public function setCategorieMsg(Categorie_msg $categorie_msg) {
        $this->categorie_msg = $categorie_msg;
    }

    public function getTexte(): string {

        return $this->texte;
    }
    public function setTexte(string $texte) {
        $this->texte = $texte;
    }

    public function getDateEnvoi(): string {

        return $this->date_envoi;
    }
    public function setDateEnvoi(string $date_envoi) {
        $this->date_envoi = $date_envoi;
    }

    public function getIdMsg(): int {

        return $this->id_msg;
    }
    public function setIdMsg(int $id_msg) {
        $this->id_msg = $id_msg;
    }
}