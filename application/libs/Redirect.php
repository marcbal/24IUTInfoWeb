<?php

class Redirect
{
	/**
	 * To the homepage
	 */
	public static function home()
	{
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