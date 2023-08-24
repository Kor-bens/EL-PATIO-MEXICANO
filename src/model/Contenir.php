<?php 

class Contenir{
    private Plat            $plat;
    private Commande        $commande;
    private int             $nombre_plats;

    public function __construct($plat,$commande,$nombre_plats){
        $this->plat         = $plat;
        $this->commande     = $commande;
        $this->nombre_plats = $nombre_plats;
    }
}