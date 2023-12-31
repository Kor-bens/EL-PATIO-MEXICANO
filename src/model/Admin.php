<?php

#[AllowDynamicProperties]
class Admin extends Personne {
    
    protected string    $mdp;
    protected string    $adresse;
    protected ?string   $avatar;

    public function __construct($id_pers, $nom, $prenom, $email, $mdp, $adresse, $phone = NULL, $avatar = NULL) {
        parent::__construct($id_pers, $nom, $prenom, $email, $phone);
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


    public function getPhone() {

        return $this->phone;
    }

    public function setPhone($phone) {
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

    public function getIdPers(): int {

        return $this->id_pers;
    }
    
    public function setIdPers(int $id_pers) {
        $this->id_pers = $id_pers;
    }

}

?>