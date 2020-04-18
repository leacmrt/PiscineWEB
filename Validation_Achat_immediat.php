<?php
session_start();
?>


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

        $ID_Item= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";
        $Prix= isset($_POST["Prix"])?$_POST["Prix"] : "";

        $sqlVendeur = "SELECT ID_vendeur FROM items WHERE ID = ".$ID_Item."";
        $R_Vendeur = mysqli_query($db_handle, $sqlVendeur);
        $ID_Vendeur = mysqli_fetch_row($R_Vendeur)[0];

        
        echo $ID_Item.'---'.$ID_Vendeur.'---'.$_SESSION['ID_vendeur'].'---'.$Prix;

        $sqlAjout = "INSERT INTO commandes (ID_Item,ID_Vendeur,ID_Acheteur,Prix) VALUES (\"".$ID_Item."\",\"".$ID_Vendeur."\",\"".$_SESSION['ID_vendeur']."\",\"".$Prix."\")";
        $Ajout = mysqli_query($db_handle,$sqlAjout);

        $sqlSuppression2 = "DELETE FROM vente_immediate WHERE ID_Item = ".$ID_Item."";
        $Suppression2 = mysqli_query($db_handle,$sqlSuppression2);

        $sqlSuppression3 = "DELETE FROM items WHERE ID = ".$ID_Item."";
        $sqlSuppression3 = mysqli_query($db_handle,$sqlSuppression3);
      }

      ?>





 <div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 150px;color:#22a6b3">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
	<p><center><b><font size = "+1"> Vottre commande d'un montant de <?php echo $Prix ?> € est validé !</font></b></center></p>
	

  <div style="padding-top:10px;padding-bottom: 40px"><div style="padding-left:320px"><a href="PageAchat.php"><b><font size = "+1"><input type="submit" name="retour" value="Retour" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a>
  </div>
  </div>
  </div>
</div>

</body>
</html>