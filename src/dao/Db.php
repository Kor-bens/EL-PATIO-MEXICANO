<?php

class Db{

    private PDO $db;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=elpatiomexicano;charset=utf8','elpatio', 'mexicano1234*');
        }catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    public function getDb(){
        return $this->db;
    }
}