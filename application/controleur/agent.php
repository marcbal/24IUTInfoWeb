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

    }
}