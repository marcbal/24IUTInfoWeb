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
        $query = new CompagniesSQL();
        $compagnie = $query->findById(Session::get('id'));

        require 'application/vue/_template/header.php';
        require 'application/vue/compagnie/index.php';
        require 'application/vue/_template/footer.php';
    }

    public function navires(){
        parent::loadModel('Compagnies');

        $query = new CompagniesSQL();
        $compagnie = $query->findById(Session::get('id'));

        $queryNavire = new NaviresSQL();
        $queryNavire->findWithCondition('id_compagnie = ?',array($compagnie->getId()));


        require 'application/vue/_template/header.php';
        require 'application/vue/compagnie/navires.php';
        require 'application/vue/_template/footer.php';
    }

}