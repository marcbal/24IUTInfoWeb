<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Accueil extends Controleur
{
    public function __construct(){
        parent::__construct();
        if(!Session::isLogin())
            Redirect::login ();
    }
    
    public function index($args)
    {
        require 'application/vue/_template/header.php';
        require 'application/vue/accueil/index.php';
        require 'application/vue/_template/footer.php';
    }

}
