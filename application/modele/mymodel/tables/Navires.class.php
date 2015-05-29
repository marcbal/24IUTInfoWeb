<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 29/05/2015
 * Time: 23:27
 */

class Navires extends Table{

    public $nom;

    public $capacite;

    public function __construct($nom = "", $capacite = ""){
        parent::__construct();

        $this->capacite = $capacite;
        $this->nom = $nom;

    }

}