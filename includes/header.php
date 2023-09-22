<?php 
include("..\includes\connexionBdd.php");
?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Quentin">
	<meta name="description" content="Inscription">
	<title>Visiteur</title>
	<link rel="stylesheet" href="../css/param.css">
	<style>
         * {
    margin: 0;
    padding: 0;
}
body{
    overflow-x:hidden;
}
    </style>

    </head>


<body>
    <div id="header">
        <div class="deconnexion" >
		<input type="button" id="deconnexion" onclick="window.location.href = 'deconnexion.php'" value="Deconnexion"/>
        </div>

        <div class="gaucheprofil">
            <div class="imageProfil">
                <p id="nom2emePage"><b>
                <?php
                $ident=$_SESSION['ident'];
                $sql='SELECT nom,prenom FROM visiteur WHERE id="'.$ident.'"';
                $result=$connexion->query($sql);
        
                $ligne=$result->fetch();

                if($_SESSION['posteUtilisateur']=="comptable"){
                    $poste= "<span class='rouge'>".$_SESSION['posteUtilisateur']."</span>";

                }
                else{
                    $poste= "<span class='bleu'>".$_SESSION['posteUtilisateur']."</span>";

                }

        

                echo  $poste."<span class='blanc'> : ".$ligne['nom']." ".$ligne['prenom']."</span>";

                // On ferme le curseur
                $result->closeCursor();
                // on ferme la connexion
                $connexion = null;
                ?>
                </b>
		        </p>
            </div>
            <div classe="image">
                <?php
                if($_SESSION['posteUtilisateur']=="comptable"){
                $img= "../images/profilComptable.png";

                }
                else{
                    $img= "../images/profilUtilisateur.png";

                }
                echo "<img  class='profilUtilisateur' src='".$img."' alt='profilUtilisateur'>";

                ?>
            </div>
        </div>
    
        
        
    </div>
</body>
</html>
	