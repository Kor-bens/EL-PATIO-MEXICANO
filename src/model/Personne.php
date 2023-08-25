<?php

class Personne {
    protected int       $id_pers;
    protected string    $nom;
    protected string    $prenom;
    protected string    $email;
    protected string    $mdp;
    protected ?string   $phone;
    protected ?string   $avatar;

    public function __construct($nom, $prenom, $email, $mdp, $phone = NULL, $avatar = NULL) {
        $this -> nom            = $nom;
        $this -> prenom         = $prenom;
        $this -> email          = $email;
        $this -> mdp            = $mdp;
        $this -> phone          = $phone;
        $this -> avatar         = $avatar;
    }

    public function getNom(): string {

        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function getPrenom(): string {

        return $this->prenom;
    }
    
    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

    public function getEmail(): string {

        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getMdp(): string {

        return $this->mdp;
    }

    public function setMdp(string $mdp) {
        $this->mdp = $mdp;
    }

    public function getPhone(): string {

        return $this->phone;
    }

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }

    public function getAvatar(): ?string {

        return $this->avatar;
    }
    public function setAvatar(?string $avatar) {
        $this->avatar = $avatar;
    }

    public function getDateCreaPers(): date {

        return $this->date_crea_pers;
    }

    public function setDateCreaPers(date $date_crea_pers) {

        $this->date_crea_pers = $date_crea_pers;
        
    }
}

?>