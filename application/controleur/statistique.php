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
            echo "toto";
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
        var_dump($navires);
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



            $escaleModele=new EscalesSQL();
            $escales=$escaleModele->findWithCondition("id_navire=:id",array("id"=>$_POST["navire"]))->execute();


        require 'application/vue/stat/getEscale.php';

    }
    public function getStatWithoutEscale(){
        parent::loadModel("Compagnies");
        parent::loadModel("Navires");
        parent::loadModel("Conteneurs");
        $compagnieModele=new CompagniesSQL();
        $compagnie=$compagnieModele->findById($_POST["compagnie"]);
        $navireSQL=new NaviresSQL();
        $navire=$navireSQL->findById($_POST["navire"]);

        $transporterModele=new TransportersSQL();
        $transporters=$transporterModele->findWithCondition("id_navire=:id",array("id"=>$_POST["navire"]))->execute();

        $conteneurs=array();
        foreach($transporters as $t){
            $conteneurMoodele=new ConteneursSQL();
            $conteneurs[]=$conteneurMoodele->findWithCondition("id=:id and id in (
            select id_conteneur
            from mouvements
            where id_escale in (
                select id
                from escale
                where (year(date_entree)=:annee or year(date_sortie)=:annee ) and
                (month(date_entree)=:mois or year(date_sortie)=:mois )
            )",array("id"=>$t->getId(),"annee"=>$_POST["annee"],"mois"=>$_POST["mois"]))->execute();
        }


        $nbC = 0;
        $nbD = 0;

        parent::loadModel('Mouvements');

        $queryMouvements = new MouvementsSQL();

        foreach($conteneurs as $conteneur){
            $conteneurs->countMov($queryMouvements);
            $nbC+=$conteneur->nbC;
            $nbD+=$conteneur->nbD;
        }



        require 'application/vue/stat/getStatWithoutEscale.php';

    }
}