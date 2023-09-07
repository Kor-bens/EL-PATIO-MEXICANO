<?php
  #[AllowDynamicProperties]
class Personne {
    protected int       $id_pers;
    protected string    $nom;
    protected string    $prenom;
    protected string    $email;
    protected ?string   $phone;

    public function __construct($nom, $prenom, $email, $phone = NULL) {
        $this -> nom            = $nom;
        $this -> prenom         = $prenom;
        $this -> email          = $email;
        $this -> phone          = $phone;
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
}

?>