<?php 
session_start();
include("../includes/header.php"); 
?>

<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Quentin">
	<meta name="description" content="Inscription">
	<title>Visiteur</title>
	<link rel="stylesheet" href="../css/param.css">
	<style>
        body {
			
            background-image: url(../images/fondAcceuil.png);
			width:100%;
			font-family:  Arial, Helvetica, sans-serif;

        }


		
	</style>
</head>


<body>
	
   
    <?php if($_SESSION['posteUtilisateur']=="comptable"){
        $nom=$_POST['boutonChoisi'];
        $_SESSION['visiteurChoisi']=$nom;
        echo "<div class='box'><h1>".$nom."</h1></div>";
    }?>
    <img  class="logo2emeClient" src="../images/logo.png" alt="logo">
    <div class="renseignement2emeClientdep">
    <?php
          if($_SESSION['posteUtilisateur']=="comptable"){
            $bouton= "Valider les fiches de frais";
            $redirection='onclick="window.location.href = \'gnagnagna\'"';

        }
        else{
            $bouton= "Reseignemer ma fiche de frais";
            $redirection='onclick="window.location.href = \'ajouterFicheFraisVisiteur.php\'"';

        }
        echo "<input type='button' id='renseignement2emeClient'value='".$bouton."'".$redirection.">";

        ?>
  
    </div>
    <div class="Consulter2emeClientdep">
    <?php
       
          if($_SESSION['posteUtilisateur']=="comptable"){
            $bouton= "Voir le suivi de des fiches de frais";
            $redirection='onclick="window.location.href = \'touteFicheFrais.php\'"';
        }
        else{
            $bouton= "Consulter mes fiches de frais";
            $redirection='onclick="window.location.href = \'touteFicheFrais.php\'"';

        }
        echo "<input type='button' id='Consulter2emeClient' value='".$bouton."'".$redirection.">";

        ?>

    </div>

	
	
</body>
</html>