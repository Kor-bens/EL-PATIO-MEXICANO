<?php

#[AllowDynamicProperties]
class Inscrit extends Personne {
    
    protected string    $mdp;
    protected string    $adresse;
    protected ?string   $avatar;

    public function __construct($nom, $prenom, $email, $mdp, $adresse, $phone = NULL, $avatar = NULL) {
        parent::__construct($nom, $prenom, $email, $phone);
        $this -> mdp            = $mdp;
        $this -> adresse        = $adresse;
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


    public function getPhone(): string {

        return $this->phone;
    }

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }

    public function getMdp(): string {
        
        return $this->mdp;
    }
    
    public function setMdp(string $mdp) {
        $this->mdp = $mdp;
    }    

    public function getAdresse(): string {

        return $this->adresse;
    }

    public function setAdresse(string $adresse) {
        $this->adresse = $adresse;
    }
    
    public function getAvatar(): ?string {

        return $this->avatar;
    }

    public function setAvatar(?string $avatar) {
        $this->avatar = $avatar;
    }



}

?>