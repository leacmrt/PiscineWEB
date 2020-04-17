<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meilleur offre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">


  <script type="text/javascript">
    function validation() {
      alert("Vous avez acheté l'article !")
      <?php  header ('location.replace("Formulaire_livraison.php")');?>

    }
  </script>



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

?>
</head>

<nav class="navbar navbar-inverse" style="background-color:#22a6b3">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="logo4.png" width="30" height="30"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="PageAccueil.html"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="PageAchat.html" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="develop1.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte</font></b></a></li>
        <li><a href="panier.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>




  <div style="padding-top: 100px; padding-bottom: 100px">
    <center><div style=" border: 5px solid; border-color: #22a6b3; height: 280px; width: 600px ">

      <?php 
      $sql = "SELECT * FROM donnees WHERE ID_Vendeur = 4";
      $result = mysqli_query($db_handle,$sql);

      if ($donnee = mysqli_fetch_assoc($result))
      {
          echo '<h2><center> Vos données: </center></h2><br>';
          echo '<center>'.$donnee['CarteNom'].'</center>';
          echo '<center>'.$donnee['Adresse1'].'   '.$donnee['Adresse2'].'</center>';
          echo '<center>'.$donnee['Ville'].'   '.$donnee['CodeP'].'   '.$donnee['Pays'].'</center><br>';
          echo '<center> Carte: '.$donnee['CarteNum'].'   CVC: '.$donnee['CVC'].'   Expiration: '.$donnee['Expiration'].'<br><br>';

          echo '<a href="#" style=" color:#ffffff;"><b><font size = "+1"><input type="submit" name="button1" value="Valider" style="background-color:#22a6b3;"></font></b></a>'.'   '.'<a href="Formulaire_livraison.php" style=" color:#ffffff;"><b><font size = "+1"><input type="submit" name="button2" value="Modifier" style="background-color:#22a6b3;"></font></b></a>';
      }
      else
      {
        echo '<h2><center> Vous ne possèdez pas de données </center></h2><br>';
        echo '<a href="Formulaire_livraison.php" style=" color:#ffffff;"><b><font size = "+1"><center><input type="submit" name="button1" value="Nouvelles données" style="background-color:#22a6b3;"> </center></font></b></a>';
      }


?>
    </div>
  </div></center>


  <!-- Footer -->
  <footer class="container-fluid text-center" style="background-color: lightgrey">
    <p>©EBAY-ECE 2020</p>  
    <form class="form-inline">Rejoignez notre newsletter:
      <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
      <button type="button" class="btn btn-danger">Signez</button>
      <br><br>
    </form>
  </footer>


<!-- Toutes les informations ainsi que les images de la pièce de monnaie proviennent du site : http://www.sympatico.ca/actualites/decouvertes/histoire/monnaie-royale-canadienne-1.1508001 -->

</html>