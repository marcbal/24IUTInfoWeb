<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); // niveau d'erreur en phase de d�veloppement
setlocale(LC_TIME, 'fr_FR.utf8','fra'); // date en langue fran�aise, fr_FR
define('URL', dirname($_SERVER['PHP_SELF']).'/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', '24iutinfo');
define('DB_USER', '24iutinfo');
define('DB_PASS', 'wh5m8ZpsEyvYrHF7');




// nom d'utilisateur
define('USERNAME_MAX_SIZE', 20);
define('USERNAME_MIN_SIZE', 2);

// mot de passe
define('PASSWORD_MIN_SIZE', 8);


//les type d'utilisateur
define('USER_TYPE_COMPAGNIE','compagnie');  //TODO a faire
define('USER_TYPE_AGENT','agent');
define('USER_TYPE_CLIENT','client');