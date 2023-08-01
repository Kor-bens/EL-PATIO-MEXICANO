<?php 

class Statut_cdes{
    private int     $id;
    private string  $nom;
    

    public function __construct($id,$nom){
        $this->id   = $id;
        $this->nom  = $nom;
    }
}