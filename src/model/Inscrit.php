<?php

class Inscrit extends Personne {
    protected Personne  $personne;
    protected string    $mdp;
    protected string    $adresse;
    protected ?string   $avatar;

    public function __construct($personne, $mdp, $adresse, $avatar = NULL) {
        $this -> personne       = $personne;
        $this -> mdp            = $mdp;
        $this -> adresse        = $adresse;
        $this -> avatar         = $avatar;

        
    }

    public function getEmail(): string {
        return $this->personne->getEmail();
    }

    public function getPersonne(): Personne {

        return $this->personne;
    }
    public function setPersonne(Personne $personne) {
        $this->personne = $personne;
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