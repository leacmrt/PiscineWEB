 
 <?php
session_start();


 if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp']))   { ?>
     <!DOCTYPE html>
<html lang="en">

<head>

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
        <li><a href="#"  style="color:#ecf0f1" ><b><font size = "+1">Home</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom" ><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte : <?php echo $_SESSION['Mail']; ?> </font></b></a></li>
        <li><a href="panier.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron" style="background-color:#ffffff ">
  <div class="container-fluid">
    <div style="float:left;">
      <img src="logo2.png" width="500" height="200">
    </div>
    <div style="float:left;">
           
      <p style="padding-left:200px">• La vente aux enchères en ligne pour la communauté ECE Paris <br></p>
      <p style="padding-left:200px">• Trois méthodes d achat: Immediat, par enchère ou à la meilleure offre ! <br></p>
      <p style="padding-left:200px">• Livraison gratuite en France métropolitaine pour plus de 35€ d achat !<br></p>
      <p style="padding-left:200px">• Payment sécurisé et assuré par INSEECpayment. <br></p>
      <p style="padding-left:200px">• Garantie qualitée ECE. Satisfait ou remboursé ! <br></p>

    </div>
  </div>
</div>


<div class="container-fluid">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><b><font size = "+1"><center>Dernière offre</font></b></center> </div> <a href="categorie.html">
        <div class="panel-body"><img src="offre1.jpg" class="img-responsive" style="width:100%,height: 170px" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><b><font size = "+1"><center>Bon plan de la semaine</font></b></center></div> <a href="achat.html">
        <div class="panel-body"><img src="offre2.jpg" class="img-responsive" style="height: 170px" alt="Image"></div>
        <div class="panel-footer">Cliquez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3" ><b><font size = "+1"><center>Offre exclusive !</font></b></center></div> <a href="vendre.html">
        <div class="panel-body"><img src="offre3.jpg" class="img-responsive" style="height: 170px" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
  </div>
</div>

<div class="container">    
  <div class="row">
      <center>
      <h4> A PROPOS DE EBAY-ECE </h4>
      <br> Explications : <br> Notre histoire : </center>
      
      
    </div>
    
</div><br>

<div class="container">    
  <div class="row">
      <center>
      <h4> Nos valeurs  </h4>
      <br> blablabla</center>
      
      
    </div>
    
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3">Catégories </div> <a href="categorie.html">
        <div class="panel-body"><img src="loupe.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3">Achat</div> <a href="achat.html">
        <div class="panel-body"><img src="shopping.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Cliquez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3">Vendre</div> <a href="Formulaire_Nouvelle_Vente.php">
        <div class="panel-body"><img src="Vente.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
  </div>
</div><br><br>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="container-fluid text-center">
  <p>©EBAY-ECE 2020</p>  
  <form class="form-inline">Rejoignez notre newsletter:
    <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
    <button type="button" class="btn btn-danger">Signez</button>
  </form>
</footer>
  <!-- Bootstrap core JavaScript -->
  
</body>
</html> 

 <?php }  else    header ('location: PageAccueil.html'); ?> 