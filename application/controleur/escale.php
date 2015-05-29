<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 01:00
 */

class Escale extends Controleur
{
    public function __construct()
    {
        parent::__construct();
        if (!Session::isLogin())
            Redirect::login();
    }

    public function index()
    {


    }

    //TODO tester si ca existe
    public function escale($id){
        $queryMouvement = new MouvementSQL();
         $nbCharg = count($queryMouvement->findWithCondition("id_conteneur = ? and type = ?", array($id, 'c'))->execute()); // le nombre de chargement
        $nbDecharg = count($queryMouvement->findWithCondition("id_conteneur = ? and type = ?", array($id, 'd'))->execute()); // le nombre de dechargement

    }

}