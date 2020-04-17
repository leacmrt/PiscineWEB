<?php

$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$Montant = isset($_POST["Montant"])? $_POST["Montant"] : ""; 
$ID_Item = isset($_POST["ID_Item"])? $_POST["ID_Item"] : ""; 
$Message = "";



$sqlRecherche = "SELECT * FROM offre WHERE ((ID_Acheteur = 4) AND (ID_Item = ".$ID_Item."))";
$resultRecherche = mysqli_query($db_handle,$sqlRecherche);

      if ($Echange = mysqli_fetch_assoc($resultRecherche))
      {
        $Num = $Echange['Numero'] + 1;

        $sql1 = "UPDATE offre SET Montant = ".$Montant." WHERE ID_Offre = ".$Echange['ID_Offre']."";
        $sql2 = "UPDATE offre SET Numero  = ".$Num." WHERE ID_Offre = ".$Echange['ID_Offre']."";
        $sql3 = "UPDATE offre SET Valide  = 'Attente' WHERE ID_Offre = ".$Echange['ID_Offre']."";

        $result1 = mysqli_query($db_handle,$sql1);
        $result2 = mysqli_query($db_handle,$sql2);
        $result3 = mysqli_query($db_handle,$sql3);
      }
      else
      {
        $sql4 = "INSERT INTO offre (ID_Item,ID_Acheteur,Valide,Numero,Montant) VALUES (".$ID_Item.",'4','Attente','1',".$Montant.")";
        $result4 = mysqli_query($db_handle,$sql4);
      }

?>
     








