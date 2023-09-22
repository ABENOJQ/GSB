<?php
//Appel script connexion
require("..\includes\connexionBdd.php");

session_start();

$sqlid='SELECT id From visiteur WHERE id LIKE("m%") ORDER BY id DESC';

$idsql=$connexion->query($sqlid);

$idprem=$idsql->fetch();

$x=0;

$comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890*&@%*147852636AZERTYUIOPQSDFGHJKLMWXCVBN*&@%';
 $pass = array(); 
 $combLen = strlen($comb) - 1; 
 for ($i = 0; $i < 12; $i++) {
     $n = rand(0, $combLen);
     $pass[] = $comb[$n];
 }

 
 for($i=1;$i<=count($idprem[0]);$i++ ){
    
    $x+=$idprem[0][$i];

 }



$id="m".$x+=1;
echo "id:".$id."<br/>";
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mdp=implode($pass);
$identifiant=$nom[0].$prenom;
$adresse=$_POST['adresse'];
$cp=$_POST['cp'];
$ville=$_POST['ville'];
$dateEmbauche=date("Y-m-d");
$poste="medicale";




$sql="INSERT INTO visiteur VALUES('$id','$nom','$prenom','$identifiant','$mdp','$adresse','$cp','$ville','$dateEmbauche','$poste')";

$resultat = $connexion->exec($sql);

// On ferme le curseur

$idsql->closeCursor();
// on ferme la connexion
$connexion = null;

?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Quentin">
	<meta name="description" content="Inscription">
	<title>Inscription GSB</title>
	<link rel="stylesheet" href="../css/param.css">
	<style>
        body {
            background-image: url(../images/1erePage.jpg);
			background-size: 100%;
			font-family:  Arial, Helvetica, sans-serif;

        }
        * {
            margin: 0;
            padding: 0;
        }
		
	</style>
</head>


<body>
	<form action="/Ma page de traitement" method="post"  id="forminscription">
		<img class="logoInscription" src="../images/logo.png" alt="logo">		
		<h1 ><u>Vos identifiants:</u></h1>
		<p><br/></p>
			<label for="identifiantChoisi"><b>Voici votre identifiant :</b></label>
			<p><br/></p>	
            <?php
            echo "<p>".$identifiant."</p>";
            ?>
            <p><br/></p>
			<label for="motdepasseChoisi"><b>Voici votre mot de passe :</b></label>
			<p><br/></p>
            <?php
            echo "<p>".$mdp."</p>";
            ?>
            <p><br/></p>
			<input type="submit" value="Retour" >
	
	</form>
</body>