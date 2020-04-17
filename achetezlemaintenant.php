<!DOCTYPE html>
<html lang="en">

<head>
  <title> Immédiat </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>




<! Partir php et sql>
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
        $sql = "SELECT * FROM (items  JOIN vente_immediate ON items.ID = vente_immediate.ID_Item)";
        $R_Im = mysqli_query($db_handle, $sql);
      }
    ?>



<body style="background-color:#c7ecee">

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

<div class="jumbotron" style="background-color:#ffffff ">
    <div class="container-fluid">
      <div style="float:left;">
        <img src="logo2.png" width="300" height="100">
      </div>
      <div style="float:left;">
             
        <p style="padding-left:200px">• Bienvenue dans la section vente immédiate ! <br></p>
        <p style="padding-left:200px">• Vous trouvez ici tous les en vente immédiate ! <br></p>
  
      </div>
    </div>
  </div>

  <div class="container" style="color:#22a6b3 ">
  <?php
  while ($Stock_Im = mysqli_fetch_assoc($R_Im)) 
            {
              ?><form action="Fiche_item_immediat.php" method="post">
                  <input type="hidden" name="ID_Item" value=<?php echo $Stock_Im['ID'] ?> >
              <?php
              echo '<div style="border:solid;border-color:#22a6b3;width:1100px;background-color:#ffffff;height:200px;">'.'<p><b><font size = "+1">';
                echo '<div style="float:left;padding-left:10px">';
                  echo '<img src="'.$Stock_Im['Photo1'].'" width="250" height="170">';
                echo '</div>';
                echo '<div style=";padding-left:300px;padding-top:30px">';
                  echo $Stock_Im['Nom'].'<br><br>'.'Prix : '.$Stock_Im['Prix'].' €'.'<br>'.'<input type="submit" name="button" value="Clickez pour en savoir plus !">'; 
                echo '</div></div>'; 
                ?></form> 
              <?php
            }
  ?>
</div>
<!-- /.container -->

  <!-- Footer -->
<footer class="container-fluid text-center" style="padding-top: 30 background-color: lightgrey">
  <p>©EBAY-ECE 2020</p>  
  <form class="form-inline">Rejoignez notre newsletter:
    <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
    <button type="button" class="btn btn-danger">Signez</button>
    <br><br>
  </form>
</footer>
  <!-- Bootstrap core JavaScript -->
  
</body>

  <!-- Toutes les informations ainsi que les images de la sculpture proviennent du site : https://www.artsper.com/fr/oeuvres-d-art-contemporain/sculpture/728886/alba -->
  
</html>