<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>historique</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>




<! Partir php et sql>
    <?php


        $bdd = "testpiscine";
        $db_handle = mysqli_connect('localhost', 'root', '' );
        $bdd_piscine = mysqli_select_db($db_handle, $bdd);

        $sql1 = "SELECT * FROM commandes WHERE commandes.ID_Acheteur = ".$_SESSION['ID_vendeur']."
                UNION SELECT * FROM commandes WHERE commandes.ID_Vendeur = ".$_SESSION['ID_vendeur'].""; 
        $R_Commandes = mysqli_query($db_handle, $sql1);
      ?>



<!Barre de navigation>
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
        <li><a href="PageAccueil.php"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="Catégories.php" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="PageAchat.php" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="Formulaire_Nouvelle_Vente.php" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte : <?php echo $_SESSION['Mail']; ?></font></b></a></li>
        <li><a href="panier.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>

<! Logo et grand titre>
  <div class="container text-center">
  <div style="background-color:#ffffff">
      <img src="logo2.png" width="500" height="200">
  </div>
  </div>
 <div class="container-fluid text-center">
  <div style="background-color:#22a6b3">
      <h1  style="color:#ecf0f1"><b><font size = "+1"> Historique des commandes </font></b></h1>
  </div>
  </div>



<!Affichage des items qui sont dans le panier>

  <div class="container" style="color:#22a6b3 ">
    <?php 
        

          while ($Commandes = mysqli_fetch_assoc($R_Commandes)) 
          {
              echo '<center><div style="border:solid;border-color:#22a6b3;width:800px;height:70px;">'.'<p><b><font size = "+1">'.'<div style="padding-top: 10px">';
                echo 'Commande numéro : '.$Commandes['ID_Commande'].'&nbsp&nbsp&nbsp&nbsp&nbsp';
                echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                echo 'Montant: '.$Commandes['Prix'].' €'; 
              echo '</div></div></center>'; 

          }
    ?>
  </div>






<footer class="container-fluid text-center" style="bottom: 30px;">
  <p>©EBAY-ECE 2020</p>  
  <form class="form-inline">Rejoignez notre newsletter:
    <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
    <button type="button" class="btn btn-danger">Signez</button>
  </form>
</footer> 

</body>
</html> 