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
        if(Session::isLogin()) {
            echo 'Vous êtes déjà connecté';
            return false;
        }

        $this->loadModel('Users');

        $type = $_GET['type'];

        $email = $_GET['mail'];
        $pass1 = $_GET['pass'];
        $pass2 = $_GET['pass2'];
        $checkResponse = "";

        if($type == 1) {   // agent
            $this->loadModel('Agents');
            $checkResponse = Session::registerAgent($email, $pass1, $pass2);
            echo 'fuck';
        }


        else if($type == 2) {  // compagnie
            $this->loadModel('Compagnies');
            $nom = $_GET['nom_compagnie'];
            $pays = $_GET['pays_compagnie'];
            $checkResponse = Session::registerCompagnie($email, $pass1, $pass2, $nom, $pays);
        }

        else if($type == 3) {
            $this->loadModel('Clients');
            $nom = $_GET['nom_client'];
            $adresse = $_GET['adresse_pays'];
            $checkResponse = Session::registerClient($email, $pass1, $pass2, $nom, $adresse);

        }

        if($checkResponse === true) {
            header('Location: '.URL.'acceuil');
        }


    }



}
