<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 02:40
 */
class Agent extends Controleur
{
    public function __construct()
    {
        parent::__construct();
        if (!Session::isLogin())
            Redirect::login();
    }


    public function index()
    {

        require 'application/vue/_template/header.php';
        require 'application/vue/agent/index.php';
        require 'application/vue/_template/footer.php';

    }

    public function liste_client(){
        parent::loadModel('Users');
        $queryUsers = new UsersSQL();

        $clients = $queryUsers->findWithCondition('user_type = ?',array(USER_TYPE_CLIENT))->execute();

        require 'application/vue/_template/header.php';
        require 'application/vue/agent/liste_client.php';
        require 'application/vue/_template/footer.php';

    }

    public function liste_compagnie(){
        parent::loadModel('Users');
        $queryUsers = new UsersSQL();

        $clients = $queryUsers->findWithCondition('user_type = ?',array(USER_TYPE_COMPAGNIE))->execute();

        require 'application/vue/_template/header.php';
        require 'application/vue/agent/compagnie.php';
        require 'application/vue/_template/footer.php';

    }

    public function liste_agent(){
        parent::loadModel('Users');
        $queryUsers = new UsersSQL();

        $clients = $queryUsers->findWithCondition('user_type = ?',array(USER_TYPE_AGENT))->execute();

        require 'application/vue/_template/header.php';
        require 'application/vue/agent/liste_agent.php';
        require 'application/vue/_template/footer.php';

    }


}