<!DOCTYPE html>
<head>
<meta charset="utf-8">
</head>
<style>
table, caption, th, td {

    border: 2px solid skyblue;
    border-collapse: collapse;

}
 body {
            background-image: url(../images/1erePage.jpg);
			background-size: 100%;
			font-family:  Arial, Helvetica, sans-serif;

        }
table{
    width:100%;
}
</style>
<body>
    <h1><u>Session dirigeant</u></h1>
    <?php require("..\includes\connexionBdd.php"); ?>
<table>
    <caption> Tout les comptable</caption>
    
<?php

$sql='SELECT nom,prenom,login,mdp,adresse,ville FROM visiteur WHERE TypVisiteur="comptable"';

$result=$connexion->query($sql);

$ligne=$result->fetch();

$i=1;

while ($ligne != false) {
    $msg="<tr>";
    for($i=0;$i<6;$i++){
        $msg=$msg."<td>".$ligne[$i]."</td>";
        
    }
    echo $msg."</tr>";
    $ligne=$result->fetch();
    
    
}


// On ferme le curseur
$result->closeCursor();
// on ferme la connexion
$connexion = null;

?>

</table>
</body>
</html>