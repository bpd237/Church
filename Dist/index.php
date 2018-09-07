<?php
	/* if(isset($_POST['submit'])) {
	    ini_set( 'display_errors', 1 );
	    error_reporting( E_ALL );
	    $from = "biyapaul45@gmail.com";
	    $to = "biyapaul45@gmail.com";
	    $subject = "Vérification PHP mail";
	    $message = "PHP mail marche";
	    $headers = "From:" . $from;
	    mail($to,$subject,$message, $headers);
	    die('mail envoyé');

		$_POST = null;
	}*/


?>
<?php

	////////////////////////////////////////////////////////////////////// I N T R O D U C T I O N
	define('ROOT', dirname(__DIR__)); // Constante qui contient nom du repertoire parent
	require ROOT.'/App/App.php'; // Inclusion du fichier App.php [notre fichier principal]
	App::load(); // Appel de la fonction load() qui se trouve dans la classe statique App

	////////////////////////////////////////////////////////////////////// L A   L A N G U E
	if(!isset($_SESSION['aoadbfamtoidfnaomldfka'])) {
		if(isset($_GET['p'])) {
			$__tmp = stripcslashes(htmlentities($_GET['p']));
			$__tmp = explode('.', $__tmp);
			$_SESSION['aoadbfamtoidfnaomldfka'] = $__tmp[0];
		} else {

			$_SESSION['aoadbfamtoidfnaomldfka'] = 'fr';
		}
	}

	if($_SESSION['aoadbfamtoidfnaomldfka'] == '*') {
		$_SESSION['aoadbfamtoidfnaomldfka'] = 'fr';
	}
	///////////////////////////////////////////////////////////////////// C H A N G E M E N T   D E   L A N G U E
	if(!empty($_POST['lang'])) {
			$_SESSION['aoadbfamtoidfnaomldfka'] = $_POST['lang'];
		// $_POST = null;
	}

	///////////////////////////////////////////////////////////////////// P E T I T   S Y S T E M E   D E   R O U T I N G
	$p = isset($_GET['p']) ? stripcslashes(htmlentities($_GET['p'])) : $_SESSION['aoadbfamtoidfnaomldfka'].'.Page.Home.Index'; // récupération de la page à charger
	$p = explode('.', $p); // division de la valeur de $p en un tableau de plusieurs éléments correspondants aux noms des fichiers à charger
	
	if($p[0] != 'admin') {

		$controller = '\ChurchFinanceManager\Controller\\'.ucfirst($p[1]).'\\'.ucfirst($p[2]).'Controller'; // Appel du controleur correspondant
	}else {

		if($p[3] == 'logout') {

			unset($_SESSION['aedjkaKDAIkjeILAODkljeiLEKA4ç_H']);
			header('Location: index');
			die();
		}else {

			$_SESSION['aoadbfamtoidfnaomldfka'] = 'admin';
			$controller = '\ChurchFinanceManager\Controller\\'.ucfirst($p[0]).'\\'.ucfirst($p[0]).'Controller'; // Appel du controleur correspondant
		}

	}

	// die();
	//////////////////////////////////////////////////////////////////// C O N T R O L L E U R  E T  V U E
	$action = $p[3]; // Chargement de la méthode correspondante

	$controller = new $controller(); // Appel de la page correspondante
	$controller->$action(); // Appel de la page correspondante
?>