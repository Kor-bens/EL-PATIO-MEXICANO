<?php 

class Demande 
{
    public int $id;
    public string $nom;

    public function __construct($id,$nom){
        $this->id = $id;
        $this->nom = $nom;

      
    }

      public function getId() {
                return $this->id;
        }
        public function setId($id) {
                $this->id = $id;
        }

    public function getNom(): string {
        return $this->nom;
    }
    public function setNom(string $nom) {
        $this->nom = $nom;
    }
}
