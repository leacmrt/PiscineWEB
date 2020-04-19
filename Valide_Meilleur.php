<!DOCTYPE html>
<html lang="en">
<head>
  <title>Panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:#c7ecee">


<?php

      try    //Tentative de connexion à la bdd
      {
        $bdd = "testpiscine";
        $db_handle = mysqli_connect('localhost', 'root', '' );
        $bdd_piscine = mysqli_select_db($db_handle, $bdd);
      }

      catch(Exception $e)  //Affichage des erreurs
      {
      die('Erreur: '. $e->getMessage());
      }

      if ($bdd_piscine)  //Si connexion réussie
      {
      }

$Montant = isset($_POST["Montant"])? $_POST["Montant"] : ""; 
$ID_Item = isset($_POST["ID_Item"])? $_POST["ID_Item"] : ""; 

 
$sqlPrixmin = "SELECT Prix_min FROM vente_meilleur WHERE ID_Item = ".$ID_Item."";
$resultPrixmin = mysqli_query($db_handle, $sqlPrixmin);
$Prixmin = mysqli_fetch_row($resultPrixmin)[0];



  if ($Montant >= $Prixmin)
  { ?>

       <div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 150px;color:#22a6b3">
        <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
          <p><center><b><font size = "+1"> Clickez sur "Valider" pour confirmer votre offre de <?php echo $Montant ?> €. </font></b><center></p>
  
            <form action="Proposition_Me_Acheteur.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $ID_Item ?>>
              <input type="hidden" name="Montant" value=<?php echo $Montant ?>>  

              <div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:320px"><a href="#"><b><font size = "+1"><input type="submit" name="button" value="Ok!" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div>
            </form><br>

              <center><form action="Montant_Meilleur.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $ID_Item ?>>

              <div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:305px"><a href="#"><b><font size = "+1"><input type="submit" name="button" value="Retour" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div>
            </form></center>


        </div>
      </div>
 
 <?php
  }
  else
  { ?>

       <div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 200px;color:#22a6b3">
        <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3; height: 170px">
          <p><center><b><font size = "+1"><br> Veuillez entrer un montant supérieur au montant minimal accepté. </font></b></center></p>
  
            <center><form action="Montant_Meilleur.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $ID_Item ?>>

              <div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:320px"><a href="#"><b><font size = "+1"><input type="submit" name="button" value="Retour" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div>
            </form></center>
        </div>
      </div>

  <?php  
  }
  ?>


</body>
</html>