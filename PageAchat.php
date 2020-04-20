
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
  <title>Achat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body style="background-color:#c7ecee">
    
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

<div class="jumbotron" style="background-color:#ffffff ">
    <div class="container-fluid">
      <div style="float:left;">
        <img src="logo2.png" width="300" height="100">
      </div>
      <div style="float:left;">
             
        <p style="padding-left:200px">• Bienvenue dans la section achat du site ! <br></p>
        <p style="padding-left:200px">• Vous trouvez ici, les enchères, les achats immédiats et les meilleures offres ! <br></p>
        <p style="padding-left:200px">• Livraison gratuite en France métropolitaine pour plus de 35€ d'achat !<br></p>
        <p style="padding-left:200px">• Paiment sécurisé et assuré par INSEECpayment. <br></p>
        <p style="padding-left:200px">• Garantie qualitée ECE. Satisfait ou remboursé ! <br></p>
  
      </div>
    </div>
  </div>



<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><centre>Enchères </centre></div> <a href="Enchere.php">
        <div class="panel-body"><img src="enchere.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Clickez ici pour voir les offres en enchères !</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><centre>Achat immédiats</centre></div> <a href="achetezlemaintenant.php">
        <div class="panel-body"><img src="buyitnow.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Clickez ici pour voir les offres en achat immédiat !</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><centre> Meilleur prix </centre></div> <a href="meilleureoffre.php">
        <div class="panel-body"><img src="meilleur.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Clickez ici pour voir les offres en meilleur prix !</div> </a>
      </div>
    </div>
  </div>
</div>
<br><br>
  
<!-- /.container -->

  <!-- Footer -->
<footer class="container-fluid text-center" style="background-color: lightgrey">
  <p>©EBAY-ECE 2020</p>  
  <form class="form-inline">Rejoignez notre newsletter:
    <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
    <button type="button" class="btn btn-danger">Signez</button>
    <br><br>
  </form>
</footer>
  <!-- Bootstrap core JavaScript -->

  <!-- Toutes les informations ainsi que les images proviennent du site : https://www.maty.com/Bijoux/0116173/bague-maty-or-750-blanc-diamants.html -->
  
</body>

</html>

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