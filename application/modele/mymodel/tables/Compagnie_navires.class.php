<?php
/**
 * Created by PhpStorm.
 * User: SkynaCrow
 * Date: 30/05/2015
 * Time: 00:29
 */

class Compagnie_navires extends Table {

    public $id_navire;
    public $id_compagnie;


    public function __construct($id_navire="", $id_compagnie=""){
        parent::__construct();

        $this->id_navire = $id_navire;
        $this->id_compagnie = $id_compagnie;
    }
}