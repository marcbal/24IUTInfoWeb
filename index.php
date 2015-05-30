<?php
$mtime_debut = microtime(true);


require_once('application/config/config.php');
require_once('application/libs/Controleur.php');
require_once('application/libs/Redirect.php');
require_once('application/libs/Application.php');
require_once('application/libs/Session.php');
require_once('application/libs/NeverTrustUserInput.php');
require_once('application/libs/password.php');	// API externe (cf commentaire en début de fichier)
require_once('application/libs/date.php');	// API externe (cf commentaire en début de fichier)



require_once('application/modele/base/queries/Query.class.php');
require_once('application/modele/base/tables/Table.class.php');
require_once('application/modele/base/db/CRUDAdapter.class.php');
require_once('application/modele/base/db/DBAdapter.class.php');
require_once('application/modele/base/db/pdo/PDOCRUDAdapter.class.php');
require_once('application/modele/base/db/pdo/PDODBAdapter.class.php');

require_once('application/modele/mymodel/queries/AgentsSQL.class.php');
require_once('application/modele/mymodel/queries/ClientsSQL.class.php');
require_once('application/modele/mymodel/queries/Compagnie_naviresSQL.class.php');
require_once('application/modele/mymodel/queries/ConteneursSQL.class.php');
require_once('application/modele/mymodel/queries/EscalesSQL.class.php');
require_once('application/modele/mymodel/queries/NaviresSQL.class.php');
require_once('application/modele/mymodel/queries/TransportersSQL.class.php');
require_once('application/modele/mymodel/queries/UsersSQL.class.php');

require_once('application/modele/mymodel/tables/Agents.class.php');
require_once('application/modele/mymodel/tables/Clients.class.php');
require_once('application/modele/mymodel/tables/Compagnie_navires.class.php');
require_once('application/modele/mymodel/tables/Compagnies.class.php');
require_once('application/modele/mymodel/tables/Conteneurs.class.php');
require_once('application/modele/mymodel/tables/Escales.class.php');
require_once('application/modele/mymodel/tables/Mouvements.class.php');
require_once('application/modele/mymodel/tables/Navires.class.php');
require_once('application/modele/mymodel/tables/Transporters.class.php');
require_once('application/modele/mymodel/tables/Users.class.php');

$app = new Application();

?><!-- durée d'exécution : <?php echo (microtime(true)-$mtime_debut); ?> s -->
