<?php


class Connexion extends Controleur
{
    public function __construct(){
        parent::__construct();
    }
    
    public function index()
    {
        require 'application/vue/connexion/index.php';
        require 'application/vue/_template/footer.php';
    }

}
