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
            return ;
        }

        $this->loadModel('Users');

        $type = $_POST['type'];

        $email = $_POST['mail'];
        $pass1 = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $checkResponse = "";


        var_dump($type);

        if($type == '0') {   // agent
            echo 'fuck1';
            parent::loadModel('Agents');
            $checkResponse = Session::registerAgent($email, $pass1, $pass2);

        }


        else if($type == '1') {  // compagnie
            parent::loadModel('Compagnies');
            $nom = $_POST['nom_compagnie'];
            $pays = $_POST['pays_compagnie'];
            $checkResponse = Session::registerCompagnie($email, $pass1, $pass2, $nom, $pays);
        }

        else if($type == '2') {
            parent::loadModel('Clients');
            $nom = $_POST['nom_client'];
            $adresse = $_POST['adresse_pays'];
            $checkResponse = Session::registerClient($email, $pass1, $pass2, $nom, $adresse);

        }

        if($checkResponse === true) {
            header('Location: '.URL.'acceuil');
        }


    }



}
