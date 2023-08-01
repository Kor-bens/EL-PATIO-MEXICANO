<?php

class Personne {
    protected int       $id;
    protected string    $nom;
    protected string    $prenom;
    protected string    $email;
    protected string    $password;
    protected ?string   $phone;
    protected ?string   $avatar;

    public function __construct($id, $nom, $prenom, $email, $password, $phone = NULL, $avatar = NULL) {
        $this -> id         = $id;
        $this -> nom        = $nom;
        $this -> prenom     = $prenom;
        $this -> email      = $email;
        $this -> password   = $password;
        $this -> phone      = $phone;
        $this -> avatar     = $avatar;
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

    public function getPassword(): string {

        return $this->password;
    }

    public function setPassword(string $password) {
        $this->password = $password;
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
}

?>