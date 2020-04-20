
 <?php
session_start();
?>


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

<?php
$ID_Item= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";
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
        <li><a href="PageAccueil.php"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="Catégories.php" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="PageAchat.php" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="Formulaire_Nouvelle_Vente.php" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte : <?php echo $_SESSION['Mail']; ?></font></b></a></li>
        <li><a href="panier.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>

    
    <div style="padding-top: 100px; padding-bottom: 100px">
    <center><div style=" border: 5px solid; border-color: #22a6b3; height: 280px; width: 600px ">
      <b><div style="padding-left: 50px; padding-right: 50px; padding-top: 50px; color: #22a6b3"><font size = "+1">Quel montant voulez vous proposer ? <br><br>

        <form class="form-horizontal" action="Valide_Meilleur.php" method="post">
        <input type="hidden" name="ID_Item" value= <?php echo $ID_Item ?>>
        <input name="Montant" class="form-control" placeholder="Montant" type="number"  size="2"><br><br>

        
        <input type="submit" name="button" value="Valider" style="background-color:#22a6b3; color: #ffffff"></font></b>
        </form></font></div>
