<?php

class Role {
    private int     $id_role;
    private string  $lib_role;

    public function __construct($id_role, $lib_role) {
        $this -> id_role     = $id_role;
        $this -> lib_role    = $lib_role;
    }

    public function getIdRole(): int {

        return $this->id_role;
    }

    public function setIdRole(int $id_role) {
        $this->id_role = $id_role;
    }

    public function getLibRole(): string {

        return $this->lib_role;
    }
    
    public function setLibRole(string $lib_role) {
        $this->lib_role = $lib_role;
    }
}

?>