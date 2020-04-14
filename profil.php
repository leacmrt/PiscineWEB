<?php
session_start();


 if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp']))  {  ?>
 
<!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
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
        <li><a href="#"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
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


 



<div class="container-fluid">


  
      <center ><img src="logo2.png" width="500" height="150"> </center>
   



<div style="padding-top: 50px; padding-right: 250px; padding-left: 250px;">
  <div style=" border:5px solid; border-color: #22a6b3; padding-left: 30px;padding-right: 30px;background-color:#ffffff">
    
          <div class="text-center border border-light p-5">
               Bienvenue <h2 style=" color : darkblue;" > <strong> <?php echo  $_SESSION['Pseudo']; ?> </strong> </h2> Votre role :  <strong> <?php echo  $_SESSION['Role']; ?>
               <?php  if( $_SESSION['Role']=="Vendeur") { ?> 
                < br>Vos articles en vente :  <?php    }  ?>


                <?php  if( $_SESSION['Role']=="Acheteur") { ?> 
                 <br>Votre panier  : <a href="panier.html" style="color: blue"><span class="glyphicon glyphicon-shopping-cart" > Votre panier  </span>  <?php    }  ?>
  
        
      </div>
    </div>

   






    </div>
  </div>




  <footer class="container-fluid text-center">
      <p>©EBAY-ECE 2020</p>  
        <form class="form-inline">Rejoignez notre newsletter:
          <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
        <button type="button" class="btn btn-danger">Signez</button>
        </form>
  </footer>
  </body>
</html>
<?php } ?>
