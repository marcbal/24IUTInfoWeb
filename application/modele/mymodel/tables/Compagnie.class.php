<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 29/05/2015
 * Time: 23:22
 */

class Compagnie extends Table{


    public $nom;

    public $pays;


    public function __construct($nom = "", $pays = ""){
        parent::__construct();
        $this->nom = $nom;
        $this->pays = $pays;

    }

}