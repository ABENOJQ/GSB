<?php

session_start();

if ($_SESSION['utilisateurValide'] != TRUE){
    header('Location: ../index.html');
}
if($_SESSION['posteUtilisateur']=="visiteur"){
    header('Location: ../index.html');
}



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
    <?php include("../includes/header.php"); ?>
    
    <div class="listeBouton">
    <?php


    
    $sql="SELECT nom,prenom FROM visiteur WHERE id LIKE('m%');";
    $result= $connexion->query($sql);
    $ligne= $result->fetch();




while ($ligne != false) {
    $msg="<tr>";
    for($i=0;$i<6;$i++){
        for($y=0;$y<3;$y++){
            $bouton = $ligne['nom']." ".$ligne['prenom'];
            $msg=$msg."<td>"."<input type='button' id='boutonListeBoutonComptable' value='".$bouton."'".$redirection.">"."</td>";
            $ligne=$result->fetch();
        }
    $ligne=$result->fetch();
        
    }
    echo $msg."</tr>";
    $ligne=$result->fetch();
    
    
}


// On ferme le curseur
$result->closeCursor();
// on ferme la connexion
$connexion = null;

?>
<?php
    require("..\includes\connexionBdd.php");
    
    $sql="SELECT nom,prenom FROM visiteur WHERE id LIKE('m%');";
    $result= $connexion->query($sql);
    $ligne= $result->fetch();

    while($ligne != false){
        $bouton = $ligne['nom']." ".$ligne['prenom'];
        $redirection='onclick="window.location.href = \'pageAcceuil.php\'"';
        echo "<div><input type='button' id='boutonListeBoutonComptable' value='".$bouton."'".$redirection."></div>";
        $ligne=$result->fetch();
    }
         
           

        
    

        ?>

</div>
    
    
   
    
   

	
	
</body>
</html>