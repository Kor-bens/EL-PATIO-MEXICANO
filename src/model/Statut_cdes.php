<?php 

class Statut_cmde{
    private int     $id_statut;
    private string  $lib_statut;
    

    public function __construct($id_statut,$lib_statut){
        $this->id_statut   = $id_statut;
        $this->lib_statut  = $lib_statut;
    }

    public function getIdStatut(): int {

        return $this->id_statut;
    }
    public function setIdStatut(int $id_statut) {
        $this->id_statut = $id_statut;
    }

    public function getLibStatut(): string {

        return $this->lib_statut;
    }
    public function setLibStatut(string $lib_statut) {
        $this->lib_statut = $lib_statut;
    }
}