<?php
/**
 * Created by PhpStorm.
 * User: SkynaCrow
 * Date: 30/05/2015
 * Time: 00:57
 */

class Escale extends Table{

    public $date_entree;
    public $date_sortie;


    public function __construct($date_entree="", $date_sortie="") {
        parent::__construct();

        $this->date_entree = $date_entree;
        $this->date_sortie= $date_sortie;
    }


}