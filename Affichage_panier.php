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
        $B_ADD= NULL;
        $ID_ADD = NULL;
        $B_ADD= isset($_POST["button"])?$_POST["button"] : "";
        $ID_ADD= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";

          $Ajout = $db_handle -> prepare("INSERT into panier VALUES (".$ID_ADD.",1)");
          $Ajout -> execute();

        $B_ADD= NULL;
        $ID_ADD = NULL;
        $Ajout = NULL;
      }

      ?>





 <div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 150px;color:#22a6b3">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
	<p><center><b><font size = "+1"> Article ajouté au panier </font></b></center></p>
	

  <div style="padding-top:10px;padding-bottom: 40px"><div style="padding-left:320px"><a href="javascript:history.back(-1)"><b><font size = "+1"><input type="submit" name="retour" value="Retour" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a>
  </div>
  </div>
  </div>
</div>

</body>
</html>