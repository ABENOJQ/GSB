<?php

session_start();
$_SESSION['utilisateurValide']=FALSE;


//Appel script connexion
require("..\includes\connexionBdd.php");

//Ecriture requete
$poste = $_POST['Poste'];
$sql='SELECT id,login,mdp FROM visiteur WHERE TypVisiteur='.'"'.$poste.'"';

if($poste == "medicale" ){
	$_SESSION['posteUtilisateur'] = "visiteur";
}
if($poste == "comptable" ){
	$_SESSION['posteUtilisateur'] = "comptable";
}


//envoie requete
$resultat = $connexion->query($sql);

$ligne = $resultat->fetch();

$ok = 0;
while( $ligne == true and $ok < 2 ) {
	if( $_POST['Identifiant'] == $ligne['login'] ) {
		//echo "<br>".$ligne['login']."</br>";
		$ok = 1; 
	}
	if( $_POST['mdp'] == $ligne['mdp'] ) {
		//echo "<br>".$ligne['mdp']."</br>";
		$_SESSION['ident']=$ligne['id'];
		
		$ok++;
	}
	$ligne = $resultat->fetch();
}

if( $ok == 2 ) {
	//test si marche
	//echo "bon";
	
	//echo "<br>".$_SESSION['ident']."</br>";
	$_SESSION['utilisateurValide'] = TRUE;
	//test voir cookie serveur
	//echo $_SESSION['utilisateurValide'];
	//echo $_SESSION['posteUtilisateur'];
	if($poste=="medicale"){
		header('Location: pageAcceuil.php');}
	if($poste=="comptable"){
		header('Location: toutLesVisiteur.php');

	}
}
else{
	header('Location: ..\index.html');
}
// On ferme le curseur
$resultat->closeCursor();
// on ferme la connexion
$connexion = null;






	
?>

