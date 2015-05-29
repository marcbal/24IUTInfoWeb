<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 00:35
 */


class Compagnie extends Controleur
{
    public function __construct(){
        parent::__construct();
        if(!Session::isLogin())
            Redirect::login ();
    }

    public function index()
    {
        require 'application/vue/_template/header.php';
        require 'application/vue/compagnie/index.php';
        require 'application/vue/_template/footer.php';
    }

}