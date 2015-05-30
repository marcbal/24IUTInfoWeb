<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Inscription extends Controleur
{
    public function __construct(){
        parent::__construct();/*
        if(!Session::isLogin())
            Redirect::login ();//*/
    }
    
    public function index()
    {
        require 'application/vue/_template/header.php';
        require 'application/vue/inscription/index.php';
        require 'application/vue/_template/footer.php';
    }


    public function register($args) {
        if(!Session::isLogin()) {
            echo 'Vous êtes déjà connecté';
            return false;
        }

        $this->loadModel('Users');

        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($args === "agent") {
            $this->loadModel('Agents');
            Session::registerAgent($email, $pass1, $pass2);
        }

        $nom = $_POST['nom'];

        if($args === "compagnie") {
            $this->loadModel('Compagnies');
            $pays = $_POST['pays'];
            Session::registerCompagnie($email, $pass1, $pass2, $nom, $pays);
        }

        if($args === "client") {
            $this->loadModel('Clients');
            $adresse = $_POST['adresse'];
            Session::registerClient($email, $pass1, $pass2, $nom, $adresse);

        }

    }



}
