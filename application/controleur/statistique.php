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
        require 'application/vue/stat/getNavire';
    }
}