<?php 
session_start();
include("../includes/verifConnexionComptable.php"); 
include("../includes/header.php"); 
?>



<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Quentin">
	<meta name="description" content="Inscription">
	<title>Fiche de frais</title>
	<link rel="stylesheet" href="../css/param.css">
	<style>
        body {
			background-color: #F8FFFC;
			font-family:  Arial, Helvetica, sans-serif;

        }

        * {
    margin: 0;
    padding: 0;
}
		
	</style>
</head>


<body>
    
    <?php if($_SESSION['posteUtilisateur']=="comptable"){
        echo "<div class='box'><h1>LES FICHES DE FRAIS</h1></div>";
    }
    else{
        echo "<div class='box'><h1>VOS FICHES DE FRAIS</h1></div>";

    }
    ?>
    <div class="boutonHorizontalFF">
    <?php

    require("..\includes\connexionBdd.php");

    $visiteurChoisi=$_SESSION['visiteurChoisi'];
  
    $nomVisiteurChoisi=explode(" ",$visiteurChoisi);
 

    $sql="SELECT dateModif,idEtat,montantValide FROM fichefrais ff, visiteur v WHERE ff.idVisiteur=v.id and v.nom ="."'".$nomVisiteurChoisi[0]."'".";";
    echo $sql;
    $result= $connexion->query($sql);
    $ligne=$result->fetch();

    while($ligne != false){
        $date=$ligne['dateModif'];
        $etat=$ligne['idEtat'];
        $total=$ligne['montantValide'];
        $bouton="DATE:".$date."&nbsp;"."ETAT: "."&nbsp;".$etat."TOTAL: ".$total."&nbsp;";
        echo "<p class='boutonhori'>".$bouton."</p>";
        $ligne=$result->fetch(); 
    }

        //$redirection='onclick="window.location.href = \'pageAcceuil.php\'"';
        //echo "<div>"."DATE:".$date."&nbsp;"."<input type='button' id='' value='".$bouton."'".$redirection."></div>";
        //$ligne=$result->fetch();         
        
    
   
  
// On ferme le curseur
$result->closeCursor();
// on ferme la connexion
$connexion = null;

   

    

?>
</div>
    
    
    
   
    
   

	
	
</body>
</html>