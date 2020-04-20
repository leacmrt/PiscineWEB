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

//partie SQL
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID_Offre= isset($_POST["ID_Offre"])?$_POST["ID_Offre"] : "";

$sqlMontant = "SELECT Montant FROM offre WHERE ID_Offre = ".$ID_Offre."";
$resultMontant = mysqli_query($db_handle, $sqlMontant);
$Montant = mysqli_fetch_row($resultMontant)[0];

?>


</head>

<! Barre de navigation>
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
        <li><a href="PageAccueil.php"  style="color:#ecf0f1" ><b><font size = "+1">Home</font></b></a></li>
        <li><a href="Catégories.php" style="color:#ecf0f1" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom" ><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="PageAchat.php" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="Formulaire_Nouvelle_Vente.php" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte : <?php echo $_SESSION['Mail']; ?> </font></b></a></li>
        <li><a href="panier.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>

    
    <div style="padding-top: 100px; padding-bottom: 100px">
    <center><div style=" border: 5px solid; border-color: #22a6b3; height: 280px; width: 600px ">
      <b><div style="padding-left: 50px; padding-right: 50px; padding-top: 50px; color: #22a6b3"><font size = "+1">Vous avez recu une offre de :<br>

        <form class="form-horizontal" action="Proposition_Me_Vendeur.php" method="post">
        <input type="hidden" name="ID_Offre" value= <?php echo $ID_Offre ?>>
        <h1><center><b> <?php echo $Montant ?> €</b></center></h1><br><br>

        
        <center><input type="submit" name="Accepter" value="Accepter" style="background-color:#22a6b3; color: #ffffff">
        <input type="submit" name="Refuser" value="Refuser" style="background-color:#22a6b3; color: #ffffff"></center>
      </font></b>
        </form>
