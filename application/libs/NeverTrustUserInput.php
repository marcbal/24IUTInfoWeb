<?php

/**
 * Classe qui g�re les v�rifications des formulaires et autres donn�es provenant des utilisateurs
 * 
 * Par Marc Baloup
 */
class NeverTrustUserInput
{

	public static function checkEmail($mail)
	{
		return preg_match('#^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$#i', $mail);
	}
	
	
	public static function checkPasswordValidity($pass)
	{
		return preg_match('#^.{'.PASSWORD_MIN_SIZE.',}$#', $pass);
	}

}