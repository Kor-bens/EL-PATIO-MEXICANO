<?php 

class Contenir{
    private int             $id_plat;
    private int             $id_commande;
    private int             $nombre_plats;

    public function __construct($id_plat,$id_commande,$nombre_plats){
        $this->id_plat      = $id_plat;
        $this->id_commande  = $id_commande;
        $this->nombre_plats = $nombre_plats;
    }
}