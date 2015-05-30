<?php
/**
 * Created by PhpStorm.
 * User: SkynaCrow
 * Date: 30/05/2015
 * Time: 00:21
 */

class Mouvements extends Table {

    public $type; // ENUM D, C
    public $id_conteneur;
    public $id_escale;


    public function __construct($type="", $id_conteneur="", $id_escale=""){
        parent::__construct();

        $this->type = $type;
        $this->id_conteneur = $id_conteneur;
        $this->id_escale = $id_escale;
    }

}