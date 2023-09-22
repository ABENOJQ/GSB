
<?php

    session_start();
    include("../includes/header.php");
    include("..\includes\connexionBdd.php");
    
    
    $mois="";
    $annee="";
    $q_repas="";
    $q_nuite="";
    $q_etape="";
    $q_km="";
    $idVisiteur="";
    
    
    $repasid="REP";
    $nuiteid="NUI";
    $etapeid="ETP";
    $kmid="KM";

    //$login="cbedos";
    //$login=$_SESSION["login"];

    $id=$_SESSION['ident'];
    $mois=$_POST["mois"];
    $annee=$_POST["annee"];
    $q_repas=$_POST["repas"];
    $q_nuite=$_POST["nuite"];
    $q_etape=$_POST["etape"];
    $q_km=$_POST["km"];


   
    /*$reqSQLid="SELECT id FROM visiteur WHERE login='$login';";
    
    $resultatid=$connexion->query($reqSQLid);

    $idVisiteur=$resultatid->fetch();

    $id= $idVisiteur[0];*/

   
      
    
    //$test="bernardino";
    $reqSQL="INSERT INTO lignefraisforfaits VALUES ('$id','$mois','$etapeid',$q_etape,'$annee')";
    //$reqSQL="INSERT INTO lignefraisforfaits VALUES('m1','Fev','ETP',10)";
    //$reqSQL="SELECT * FROM lignefraisforfait";
    




    $a=$connexion->exec($reqSQL) ;
    
    header("Location: ajouterFicheFraisVisiteur.php");

    
   

    //$b=$a->fetch();

    //$c=$b[0];

    //echo $c;

?> 
