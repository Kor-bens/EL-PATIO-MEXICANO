<?php
class CntrlAppli {
    public function affAccueil() {
        require_once 'src/views/index.php';
    }

    public function affMenu() {
        require_once 'src/views/menu.php';
    }

    public function affContact() {
        require_once 'src/views/contact.php';
    }
}

?>