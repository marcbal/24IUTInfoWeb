<?php
/**
 * Created by PhpStorm.
 * User: SkynaCrow
 * Date: 30/05/2015
 * Time: 00:41
 */

class Clients extends Table{

    public $nom;
    public $adresse;


    public function __construct($nom="", $adresse="") {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }


    /*
    public $rue;
    public $ville;
    public $code_postale;
    public $pays;


    public function __construct($nom="", $rue="", $ville="", $code_postale="", $pays="") {
        parent::__construct();

        $this->nom = $nom;
        $this->rue = $rue;
        $this->ville= $ville;
        $this->code_postale = $code_postale;
        $this->pays = $pays;
    }
    */
}