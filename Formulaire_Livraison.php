 <?php
session_start();
?>


<?php

$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$Adresse1 = isset($_POST["Adresse1"])? $_POST["Adresse1"] : ""; 
$Adresse2 = isset($_POST["Adresse2"])? $_POST["Adresse2"] : ""; 
$Ville= isset($_POST["Ville"])? $_POST["Ville"] : ""; 
$CodeP = isset($_POST["CodeP"])? $_POST["CodeP"] : ""; 
$Pays = isset($_POST["Pays"])? $_POST["Pays"] : ""; 
$CarteNom = isset($_POST["CarteNom"])? $_POST["CarteNom"] : ""; 
$CarteNum = isset($_POST["CarteNum"])? $_POST["CarteNum"] : ""; 
$CVC= isset($_POST["CVC"])? $_POST["CVC"] : ""; 
$Expiration= isset($_POST["Expiration"])? $_POST["Expiration"] : ""; 


$ID_Item= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";
$Mode= isset($_POST["Mode"])?$_POST["Mode"] : "";



?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Données de livraisons</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
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
        <li><a href="PageAcceuil.php"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
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

 <center>
      <img src="logo2.png" width="500" height="150">
    </center>
<br>


<div class="container">
<center>
   
  <div style="width: 700px; height: 1000px">
  <div style=" border:5px solid; border-color: #22a6b3; padding-left: 30px;padding-right: 30px;background-color:#ffffff">

    <div class="text-center border border-light p-5">
       <h3> Vos informations de payment </h3>

         <form class="form-horizontal" action="commande.php" method="post">
          <input type="hidden" name="ID_Item" value= <?php echo $ID_Item ?>>
          <input type="hidden" name="Mode" value=<?php echo $Mode ?>>
             <br>
             <div class='form-row'>

              <div class='col-xs-12'>
                <label class='control-label'>Adresse </label>
                <input class='form-control' name="Adresse1"size='4' type='text' placeholder='Ligne 1'>
                <input class='form-control' name="Adresse2"size='4' type='text' placeholder='Ligne 2'>
              </div><br><br><br><br>
              
              <div class='form-row'>
              <div class='col-xs-4'>
                <label class='control-label'>Ville</label>
                <input  class='form-control' name='Ville' placeholder=' ' size='4' type='text'>
              </div>

              <div class='col-xs-4'>
                <label class='control-label'>Code Postal</label>
                <input  class='form-control' name='CodeP' placeholder='' size='4'  placeholder='ex 70015' required pattern="[0-9]{5}" type='text'>
              </div>

              <div class='col-xs-4'>
                <label class='control-label'>Pays</label>
                <input class='form-control' name='Pays' placeholder='' size='2' type='text'>
              </div>
              <br><br><br><br><br>
            </div>

              <div class='col-xs-12'>
                <label class='control-label'>Nom sur la carte </label>
                <input class='form-control' name='CarteNom' size='4' type='text'>
              </div><br><br><br>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 '>
                <label class='control-label'>Numéro de carte</label>
                <input class='form-control' name='CarteNum' size='20' type='text'>
              </div><br><br><br>
            </div>
            <div class='form-row'>
              <div class='col-xs-4'>
                <label class='control-label'>CVC</label>
                <input  class='form-control' name='CVC' placeholder='ex. 311'  required pattern="[0-9]{3}" size='4' type='text'>
              </div>
              <div class='col-xs-8'>
                <label class='control-label'>Expiration</label>
                <input class='form-control' name='Expiration' placeholder='AAAA-MM-JJ' required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" size='2' type='text'>
              </div>
              <br><br><br><br><br>
            </div>
            
            <div class='form-row'>
              <br>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary submit-button' name="button1" value = "Submit" type='submit'>Valider</button>
              </div><br><br>
            </div>
            <br><br>
      </form>
    </div>
    
    </div>
  </div>
  </center>
  </div>

<footer class="container-fluid text-center" style="background-color: lightgrey">
  <p><br><br>©EBAY-ECE 2020</p>  
</footer>

</body>
</html>
