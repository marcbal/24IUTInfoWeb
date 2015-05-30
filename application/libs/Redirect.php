<?php

class Redirect
{
	/**
	 * To the homepage
	 */
	public static function home()
	{
        if(Session::get('user_type') == USER_TYPE_AGENT)
            Redirect::to('agent');
        if(Session::get('user_type') == USER_TYPE_CLIENT)
            Redirect::to('client');
        if(Session::get('user_type') == USER_TYPE_COMPAGNIE)
            Redirect::to('compagnie');
		Redirect::to('');
	}
        
    public static function login()
	{
		Redirect::to('connexion/');
	}
        
	/**
	 * To the defined page
	 *
	 * @param $path
	 */
	public static function to($path)
	{
		header("location: " . URL . $path);
		exit();
	}
        

}