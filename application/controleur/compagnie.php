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
        if (!Session::isLogin())
            Redirect::login();
        if (Session::get('user_type') != USER_TYPE_AGENT and Session::get('user_type') != USER_TYPE_COMPAGNIE)
            Redirect::to('');
    }

    public function index($id = false)
    {

        parent::loadModel('Users');
        parent::loadModel('Compagnies');

        $query = new UsersSQL();
        $queryCompagnie = new CompagniesSQL();

        if ($id == false) {
            $compagnie = $query->findById(Session::get('user_id'));

        }
        else {
            $compagnie = $query->findById($id[0]);

        }
        if ($compagnie === null)
            Redirect::to('');

        $compagnie->loadCompagnie($queryCompagnie);

        require 'application/vue/_template/header.php';
        require 'application/vue/compagnie/index.php';
        require 'application/vue/_template/footer.php';

    }

    public function navires(){
        parent::loadModel('Compagnies');
        parent::loadModel('Navires');

        $query = new CompagniesSQL();
        $compagnie = $query->findById(Session::get('id'));

        $queryNavire = new NaviresSQL();
        $queryNavire->findWithCondition('id_compagnie = ?',array($compagnie->getId()));


        require 'application/vue/_template/header.php';
        require 'application/vue/compagnie/navires.php';
        require 'application/vue/_template/footer.php';
    }

}