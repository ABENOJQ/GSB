<?php
	// D�finitions de constantes pour la connexion � MySQL
	$hote="localhost";//172.16.63.jsp 
	$login="root";//compte visiteur avec peu de droit
	$mdp="";
	$nombd="bd_gsb";

	// Connection au serveur
	try {
			$connexion = new PDO("mysql:host=$hote;dbname=$nombd",$login,$mdp);
	} catch ( Exception $e ) { 
		  die("\n Connection à '$hote' impossible : ".$e->getMessage());
	}
?>

