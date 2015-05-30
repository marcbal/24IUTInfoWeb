<?php


class Connexion extends Controleur
{
    public function __construct(){
        parent::__construct();
    }
    
    public function index()
    {
        require 'application/vue/connexion/index.php';
        require 'application/vue/_template/footer.php';
    }
    
    public function verification(){
	if (Session::isLogin())
        {
            Redirect::home();
        }
        $mail = $_POST['usermail'];
        $pass = $_POST['password'];
        parent::loadModel('Users');
        if(Session::login($mail, $pass) === true)
                echo "fuck";
            //Redirect::home();
        else
            echo "you";
            //Redirect::login();
    }

}
