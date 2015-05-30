<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 29/05/2015
 * Time: 23:32
 */

class Transporters extends Table{


    public $id_navire;
    public $id_conteneur;

    public function __construct($id_navire = "", $id_conteneur = ""){
        parent::__construct();

        $this->id_navire = $id_navire;
        $this->id_conteneur = $id_conteneur;
    }

}