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
    
    <form class="listeBouton" action="pageAcceuil.php" method="post">
    <table id="tableTousLesVisiteurs" cellspacing="3">
    <?php

require("..\includes\connexionBdd.php");
    
    $sql="SELECT nom,prenom FROM visiteur WHERE TypVisiteur LIKE('medicale');";
    $result= $connexion->query($sql);
   
while ($ligne != false) {
    
    $msg="<tr>";
   
    for($y=0;$y<5 ;$y++){
        if($ligne != false){
            $bouton = $ligne['nom']." ".$ligne['prenom'];
            $msg=$msg."<td id='tailleLigne'>"."<input type='submit' id='boutonListeBoutonComptable' name='boutonChoisi' value='".$bouton."'>"."</td>";
            $ligne=$result->fetch();}
        }
    echo $msg."</tr>";
    
    
        
    }
   
  
// On ferme le curseur
$result->closeCursor();
// on ferme la connexion
$connexion = null;

?>
</table>
</form>
    
    
    
   
    
   

	
	
</body>
</html>