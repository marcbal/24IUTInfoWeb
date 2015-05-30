<?php

/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 30/05/2015
 * Time: 02:40
 */
class Client extends Controleur
{
    public function __construct()
    {
        parent::__construct();
        if (!Session::isLogin())
            Redirect::login();
        if (Session::get('user_type') != USER_TYPE_AGENT and Session::get('user_type') != USER_TYPE_CLIENT)
            Redirect::to('');
    }


    public function index($id = false)
    {

        parent::loadModel('Users');
        parent::loadModel('Clients');

        $query = new UsersSQL();
        $queryClient = new ClientsSQL();

        if ($id == false) {
            $client = $query->findById(Session::get('id'));

        }
        else {
            //print_r($id);
            $client = $query->findById($id[0]);

        }
        if ($client === null)
            Redirect::to('');

        $client->loadClient($queryClient);

        require 'application/vue/_template/header.php';
        require 'application/vue/client/index.php';
        require 'application/vue/_template/footer.php';

    }
}