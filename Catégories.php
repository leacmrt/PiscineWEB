 <?php
session_start();


 if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp']))   
  { 
    if ($_SESSION['Role'] == 'Acheteur' )
    {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Catégories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


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
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center">
  <div style="background-color:#ffffff">
      <img src="logo2.png" width="500" height="200">
  </div>
  </div>

  <div class="container" style="padding-top: 50px"> 
  <h1 style="color:#22a6b3"><b><font size = "+1"><center><font size = "+2"> Catégories </font></b></center></h1>   
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><b><font size = "+1"><center>Ferraille ou Trésor</font></b></center> </div> <a href="feraille.php">
        <div class="panel-body"><img src="offre1.jpg" class="img-responsive" style="width:100%,height: 170px" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><b><font size = "+1"><center>Bon pour le Musée</font></b></center></div> <a href="Musée.php">
        <div class="panel-body"><img src="offre3.jpg" class="img-responsive" style="width:100%,height: 170px" alt="Image"></div>
        <div class="panel-footer">Cliquez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3" ><b><font size = "+1"><center>Accessoire VIP</font></b></center></div> <a href="VIP.php">
        <div class="panel-body"><img src="offre2.jpg" class="img-responsive" style="width:100%,height: 170px" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
  </div>
</div>

     <?php 
    }  
      else 
      {
        ?>
        <div style="padding-top: 100px; padding-bottom: 100px">
        <center><div style=" border: 5px solid; border-color: #22a6b3; height: 200px; width: 700px ">
        <b><div style="padding-left: 50px; padding-right: 50px; padding-top: 50px; color: #22a6b3"><font size = "+1">Créez vous un compte acheteur pour bénéficier du service d'achat. <br><br>

        <br><br><input type="button" value="Retour" onclick="history.go(-1)" style="background-color: #22a6b3; color: #ffffff">
  
        </form></font></div>

      <?php
      }  
  }
  else 
  {
  ?>
        <div style="padding-top: 100px; padding-bottom: 100px">
        <center><div style=" border: 5px solid; border-color: #22a6b3; height: 280px; width: 600px ">
        <b><div style="padding-left: 50px; padding-right: 50px; padding-top: 50px; color: #22a6b3"><font size = "+1">Veuillez vous connecter.<br><br>

        <br><br><input type="button" value="Retour" onclick="history.go(-1)" style="background-color: #22a6b3; color: #ffffff">
  
  
        </form></font></div>

  <?php
  }
  ?>
