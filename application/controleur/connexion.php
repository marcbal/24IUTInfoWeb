<?php


class Connexion extends Controleur
{
    public function __construct(){
        parent::__construct();
    }
    
    public function index()
    {
        require 'application/vue/_template/header.php';
        require 'application/vue/connexion/index.php';
        require 'application/vue/_template/footer.php';
    }
    
    public function verification(){
	if (Session::isLogin())
        {
            Redirect::home();
        }
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        parent::loadModel('Users');
        if(Session::login($mail, $pass) === true)
            Redirect::home();
        else
            Redirect::login();
    }

}
