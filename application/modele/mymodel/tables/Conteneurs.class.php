<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 29/05/2015
 * Time: 23:25
 */

class Conteneurs extends Table{

    public $capacite;

    public $id_client;

    public function __construct($capacite = "", $id_client = ""){
        parent::__construct();

        $this->capacite = $capacite;
        $this->id_client = $id_client;

    }

}