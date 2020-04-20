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

		$ID= isset($_POST["ID_Item"])?$_POST["ID_Item"] : ""; 
    $Mode= isset($_POST["Mode"])?$_POST["Mode"] : ""; 

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
 
      ?>





 <div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 150px;color:#22a6b3">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
	<p><center><b><font size = "+1"> Voulez vous vraiment supprimer cet article ? </font></b><center></p>
	


	<form action="Panier.php" method="post">
              <input type="hidden" name="ID_Supp" value=<?php echo $ID ?>>
              <input type="hidden" name="Mode_Supp" value=<?php echo $Mode ?>>  
              <?php
                echo '<div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:100px"><a href="#"><b><font size = "+1"><input type="submit" name="buttonSupp" value="supprimer" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div>';?>
    		</form>
              <?php
                echo '<div style="padding-left:450px"> <a href="Panier.php"><b><font size = "+1"><input type="submit" name="button1" value="annuler" style="background-color:#22a6b3;color: #ffffff;"></font></b></a></div></div>'; ?>

</div>
</div>
</body>
</html>