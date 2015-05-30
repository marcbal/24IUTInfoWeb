<?php
/**
 * Created by PhpStorm.
 * User: thibault
 * Date: 30/05/15
 * Time: 02:10
 */
class Statistique extends Controleur{
    public function __construct(){
        parent::__construct();
        if (!Session::isLogin())
            Redirect::login();
    }
    public function index(){
        parent::loadModel('Compagnies');
        if(Session::get("user_type")=="compagnie"){
            $compagnies=array();
            $compagnieModel=new CompagniesSQL();
            $userModele=new UsersSQL();
            $user=$userModele->findById(Session::get("user_id"));
            $compagnies[]=$compagnieModel->findById($user->id_compagnie);
        }
        else if(Session::get("user_type")=="client"){

        }else{
            $compagnieModel=new CompagniesSQL();
            $compagnies=$compagnieModel->findAll()->execute();
        }
        require 'application/vue/_template/header.php';
        require 'application/vue/stat/index.php';
        require 'application/vue/_template/footer.php';
    }
    public function statClient($array){

    }
    public function getNavire($array){
        if(!isset($_POST["compagnie"]) or empty($_POST["compagnie"])){
            return false;
        }
        parent::loadModel('Navires');
        parent::loadModel('Compagnie_navires');
        $compagnieNavireModele=new Compagnie_naviresSQL();
        $compagnieNavire=$compagnieNavireModele->findWithCondition("id_navire=:id",array("id"=>$_POST["compagnie"]))->execute();
        $navire=array();
        foreach($compagnieNavire as $cn){
            $navireModele=new NaviresSQL();
            $navires[]=$navireModele->findById($cn->id_navire);
        }
        require 'application/vue/stat/getNavire.php';
    }
    public function getEscale(){
        if(!isset($_POST["navire"]) or empty($_POST["navire"])){
            return false;
        }
        parent::loadModel('Navires');
        parent::loadModel('Transporters');
        parent::loadModel('Conteneurs');
        parent::loadModel('Mouvements');
        parent::loadModel('Escales');

        $navireModele=new NaviresSQL();
        $navire=$navireModele->findById($_POST["navire"]);

        $transporterModele=new TransportersSQL();
        $transporters=$transporterModele->findWithCondition("id_navire=:id",array("id"=>$_POST["navire"]));

        $conteneurs=array();
        foreach($transporters as $t){
            $conteneurMoodele=new ConteneursSQL();
            $conteneurs[]=$conteneurMoodele->findById($t->id_conteneur);
        }


        $mouvements=array();
        foreach($conteneurs as $c){
            $mouvementModele=new MouvementsSQL();
            $mouvements[]=$mouvementModele->findWithCondition("id_conteneur=:id",array("id"=>$c->getId()));
        }
        $escales=array();
        foreach($mouvements as $m){
            $escaleModele=new EscalesSQL();
            $escales=$escaleModele->findWithCondition("id_escale=:id",array("id"=>$m->id_escale));
        }

        require 'application/vue/stat/getEscale.php';

    }
}