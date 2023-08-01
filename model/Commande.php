<?php

class Commande {
    private int         $id;
    private DateTime    $date_cmde;
    private int         $id_statut;
    private int         $id_pers;
    private int         $prix_total;

    public function __construct($id, $date_cmde, $id_statut, $id_pers, $prix_total) {
        $this -> id         = $id;
        $this -> date_cmde  = $date_cmde;
        $this -> id_statut  = $id_statut;
        $this -> id_pers    = $id_pers;
        $this -> prix_total = $prix_total;
    }

    public function getId(): int {

        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
    }

    public function getDateCmde(): DateTime {

        return $this->date_cmde;
    }
    public function setDateCmde(DateTime $date_cmde) {
        $this->date_cmde = $date_cmde;
    }

    public function getIdStatut(): int {

        return $this->id_statut;
    }
    public function setIdStatut(int $id_statut) {
        $this->id_statut = $id_statut;
    }

    public function getIdPers(): int {

        return $this->id_pers;
    }
    public function setIdPers(int $id_pers) {
        $this->id_pers = $id_pers;
    }

    public function getPrixTotal(): int {

        return $this->prix_total;
    }
    public function setPrixTotal(int $prix_total) {
            $this->prix_total = $prix_total;
    }
}

?>