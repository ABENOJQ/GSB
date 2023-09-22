<?php



if ($_SESSION['utilisateurValide'] != TRUE){
    header('Location: ../index.html');
}
if($_SESSION['posteUtilisateur']=="comptable"){
    header('Location: ../index.html');
}



?>

