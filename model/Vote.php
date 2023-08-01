<?php

class Vote {
    private int     $id_plat;
    private int     $id_pers;
    private int     $note;

    public function __construct($id_plat, $id_pers, $note) {
        $this -> id_plat    = $id_plat;
        $this -> id_pers    = $id_pers;
        $this -> note       = $note;
    }

    public function getIdPlat(): int {

        return $this->id_plat;
    }
    public function setIdPlat(int $id_plat) {
        $this->id_plat = $id_plat;
    }

    public function getIdPers(): int {

        return $this->id_pers;
    }
    public function setIdPers(int $id_pers) {
        $this->id_pers = $id_pers;
    }

    public function getNote(): int {

        return $this->note;
    }
    public function setNote(int $note) {
        $this->note = $note;
    }
}

?>