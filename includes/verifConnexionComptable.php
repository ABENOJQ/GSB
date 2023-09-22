<?php



if ($_SESSION['utilisateurValide'] != TRUE){
    header('Location: ../index.html');
}
if($_SESSION['posteUtilisateur']=="visiteur"){
    header('Location: ../index.html');
}



?>

