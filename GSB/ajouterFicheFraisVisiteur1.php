<?php 
/*session_start();*/

//include("../includes/verifConnexionVisiteur.php"); 
/*if(isset($_SESSION['erreurFICHEFRAIS'])){
  $ok=$_SESSION['erreurFICHEFRAIS'];
  echo $ok;
  echo "probleme dans les valeurs";
}*/
include("../includes/header.php"); 
?>
<html>
<head>
	<title>fichefrais</title >
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="../css/param.css">
  <script  language="javascript">
        function ajoutLigne( pNumero){//ajoute une ligne de produits/qt� � la div "lignes"     
			//masque le bouton en cours
			document.getElementById("but"+pNumero).setAttribute("hidden","true");	
			pNumero++;										//incr�mente le num�ro de ligne
            var laDiv=document.getElementById("lignes");	//r�cup�re l'objet DOM qui contient les donn�es
			var titre = document.createElement("label") ;	//cr�e un label
			laDiv.appendChild(titre) ;						//l'ajoute � la DIV
			titre.setAttribute("class","titre") ;			//d�finit les propri�t�s
			titre.innerHTML= "   "+ pNumero + " : ";
			//zone our la date du frais
			var ladate = document.createElement("input");
			laDiv.appendChild(ladate);
			ladate.setAttribute("name","FRA_AUT_DAT"+pNumero);
			ladate.setAttribute("size","12"); 
			ladate.setAttribute("class","zone");
			ladate.setAttribute("type","text");	
			//zone de saisie pour un nouveau libell�			
			var libelle = document.createElement("input");
			laDiv.appendChild(libelle);
			libelle.setAttribute("name","FRA_AUT_LIB"+pNumero);
			libelle.setAttribute("size","30"); 
			libelle.setAttribute("class","zone");
			libelle.setAttribute("type","text");
			//zone de saisie pour un nouveau montant		
			var mont = document.createElement("input");
			laDiv.appendChild(mont);
			mont.setAttribute("name","FRA_AUT_MONT"+pNumero);
			mont.setAttribute("size","3"); 
			mont.setAttribute("class","zone");
			mont.setAttribute("type","text");			
			var bouton = document.createElement("input");
			laDiv.appendChild(bouton);
			//ajoute une gestion �venementielle en faisant �voluer le num�ro de la ligne
			bouton.setAttribute("onClick","ajoutLigne("+ pNumero +");");
			bouton.setAttribute("type","button");
			bouton.setAttribute("value","+");
			bouton.setAttribute("class","zone");	
			bouton.setAttribute("id","but"+ pNumero);				
        }
    </script>
    
</head>

<body id="bodyform" >

  <table  style="width: 100%"> 
    <tr>
      <td style="width: 50%; text-align: right;"><h1>FICHE DE FRAIS&nbsp;&nbsp;</h1></td>
    </tr>
  </table>

  <label for="annee"><B>Matricule :</B></label>
  <input type="text" id="annee" name="annee" maxlength="4" size="10" />
  
  <form name="formulaire" action="fraisbd.php" method ="POST" onreset="javascript: return validAnnulation();" onsubmit="javascript: return verifSaisie();">

  <legend class="legende"><U><B>PERIODE D'ENGAGEMENT</U></B></legend>
         <table>
            <tr>
			  </br></br>
              <td><label for="mois"><B>Mois</B> (en chiffre): </label></td>
              <td><input type="text" id="mois" name="mois" maxlength="2" size="25" /></td>
        	    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td><label for="annee"><B>Ann&eacute;e</B> (en chiffre) : </label></td>
              <td><input type="text" id="annee" name="annee" minlength="4" maxlength="4" size="25" /></td>
            </tr>

          </table>
  	

  	<br />

  <legend class="legende"><B><U>FRAIS AU FORFAIT</U></B></legend>
       <table>
            <tr>
			  </br> </br>
              <td><label for="repas"><B>Repas du midi</B> (29,00 euros): </label></td>
              <td><input type="text" id="repas" name="repas" maxlength="3" size="25" /></td>
        	    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td><label for="nuite"><B>Nuit&eacute;</B> (80,00 euros) : </label></td>
              <td><input type="text" id="nuite" name="nuite" maxlength="4" size="25" /></td>
			  
            </tr>
            <tr>
			 <td></br></td>
			</tr>
            <tr>
			 
              <td><label for="etape"><B>Etape</B> (110,00 euros): </label></td>
              <td><input type="text" id="etape" name="etape" maxlength="2" size="25" /></td>
        	    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td><label for="km"><B>Km</B> (0,62 euros) : </label></td>
              <td><input type="text" id="km" name="km" maxlength="10" size="25" /></td>
            </tr>
         
          </table>
          <p>
            <input class="bouton" type="submit" id="Valider" name="boutonValider" value="Valider" />
          
          </p>
 
  </form >
  <form name="fraisOrForfait" action="fraisOrForfaitbd.php" onsubmit="javascript: return ajoutLigne();" method ="POST">
   <legend class="legende"><B><U>FRAIS HORS FORFAIT</U></B></legend>
      <table>
           <tr>
       </br> </br>
             <td><label for="date"><B>Date</B> (**/**/****) <B>:</B> </label></td>
             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td><label for="lib"><B>Libell&eacute; : </B> </label></td>
             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td><label for="mont"><B>Montant :</B> </label></td>
           </tr>
      
           <tr>
             <td><input type="text" id="date" name="Date" maxlength="8" size="25" /></td>
             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td><input type="text" id="lib" name="lib" maxlength="30" size="25" /></td>
             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td><input type="text" id="mont" name="mont" maxlength="4" size="25" /></td>
             <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
             <td><input type="submit" id="but1" value="+" class="bouton"></form></td>
          </tr>
          
      </table>
   
  </form>

  	
  

</body>

</html>
