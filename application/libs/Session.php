<?php

/**
 * Session class
 *
 * handles the session stuff. creates session when no one exists, sets and
 * gets values, and closes the session properly (=logout). Those methods
 * are STATIC, which means you can call them with Session::get(XXX);
 *
 *
 *
 * Cette classe gère aussi le système de session utilisateur/login
 *
 */
class Session
{
    /**
     * starts the session
     */
    public static function init()
    {
        // if no session exist, start the session
        if (session_id() == '') {
            session_start();
        }
    }

    /**
     * sets a specific value to a specific key of the session
     * @param mixed $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    
    /**
     * gets/returns the value of a specific key of the session
     * @param mixed $key Usually a string, right ?
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else
            return null;
    }

    /**
     * deletes the session (= logs the user out)
     */
    public static function destroy()
    {
        session_destroy();
    }

    public static function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }



	public static function isLogin() {
		return (Session::get('is_login') === true);
	}


	/**
	 * try to login with e-mail and password
	 *       /!\     need model "Users" to be loaded
	 */

	public static function login($mail, $pass)
	{
		if (!NeverTrustUserInput::checkEmail($mail))
		{
                    Session::add("login_feedback_negative","Mauvais email ou mot de passe..");    
                    return false;
		}
		$users = new UsersSQL();
		$user = $users->findByUser_email($mail)->execute();

		if (count($user) == 0)
		{
                    Session::add("login_feedback_negative","Mauvais email ou mot de passe..");    
                    return false;
		}
		$user = $user[0];

		if (!password_verify($pass, $user->user_password_hash))
		{
                    Session::add("login_feedback_negative","Mauvais email ou mot de passe..");    
                    return false;
		}


		// la connexion est bonne


		Session::set('is_login', true);
		Session::set('user_id', $user->getId());
		Session::set('user_mail', $user->user_email);
		Session::set('user_type', $user->user_type);
		
		
		return true;

	}

    public static function registerCommun($mail, $pass, $pass2)
    {
        // vérification de la validité des champs

        if (!NeverTrustUserInput::checkEmail($mail))
            return 'invalid_email';    // email non valide


        if (!NeverTrustUserInput::checkPasswordValidity($pass))
            return 'invalid_password';    // pass non valide

        if ($pass != $pass2)
            return 'different_password';    // les 2 mots de passes différents


        // on vérifie si le mail existe dans la base de donnée
        $users = new UsersSQL();
        $user = $users->findByUser_email($mail)->execute();
        if (count($user) != 0) {
            return 'email_exist';
        }

        return true;
    }

    public static function registerAgent($mail, $pass, $pass2)
	{
        $return = Session::registerCommun($mail, $pass, $pass2);
		if($return !== true) return $return;

		$agent = new Agents();
        $agent->save();
		// création d'un nouveau Users
		$user = new Users($mail, password_hash($pass, PASSWORD_DEFAULT), 'agent', "","", $agent->getId());
		$user->save();
		
		return true;
		
	}

    public static function registerCompagnie($mail, $pass, $pass2, $nom, $pays)
    {
        $return = Session::registerCommun($mail, $pass, $pass2);
		if($return !== true) return $return;

		$compagnie = new Compagnies($nom, $pays);
        $compagnie->save();
		// création d'un nouveau Users
		$user = new Users($mail, password_hash($pass, PASSWORD_DEFAULT), 'compagnie', "", $compagnie->getId(), "");
		$user->save();

		return true;

	}

    public static function registerClient($mail, $pass, $pass2, $nom, $adresse)
    {
        $return = Session::registerCommun($mail, $pass, $pass2);
		if($return !== true) return $return;

		$client = new Clients($nom, $adresse);
        $client->save();

		// création d'un nouveau Users
		$user = new Users($mail, password_hash($pass, PASSWORD_DEFAULT), 'client', $client->getId(),"", "");
		$user->save();

		return true;

	}
        
        public static function renderFeedback($name=''){
            
            
            $positive = Session::get($name.'_feedback_positive');
            $negative = Session::get($name.'_feedback_negative');

            
             require 'application/vue/_template/feedback.php';
            Session::set($name.'_feedback_positive', null);
            Session::set($name.'_feedback_negative', null);
        }
}
