<?php
session_start();


 if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp']))  
 {
      if ($_SESSION['Role'] == 'Vendeur' )
    {

 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulaire Vente</title>
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
        <li><a href="PageAccueil.php"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="Catégories.php" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="PageAchat.php" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="Formulaire_Nouvelle_Vente.php" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte:  <?php echo $_SESSION['Mail']; ?> </font></b></a></li>
        <li><a href="panier.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>


  <div class="container-fluid text-center">
    <div>
      <img src="logo2.png" width="250" height="90">
      <h2 style="color:#22a6b3"><b> Vous souhaitez vendre un article ?</b></h2>
    </div>
  </div>

  <div class="form" style=" padding-left: 100px; padding-right: 100px;padding-top: 10px">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
    
      <form class="form-horizontal" action="Formulaire2.php" method="post" enctype="multipart/form-data" >
        <h4 style="color:#22a6b3"> <b><font size = "+1"><center><br>Votre article en vente:</center></font></b></h4>
          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br> * Nom de votre article: </font></b><br><br></h4>
            </div>
            <div style="float: left; padding-left: 50px; padding-top: 22px">
              <input name="Nom" id="Nom" class="form-control" placeholder="Nom?" type="text" size="130">
            </div>
          </div>

          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br> Description:</font></b><br><br></h4>
            </div>
            <div style="float: left; padding-left: 50px; padding-top: 22px">
              <input name="Description" class="form-control" placeholder="Description?" type="text" size="130">
            </div>
          </div>

          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br>* Type de vente:</font></b><br><br></h4>
            </div>

            <div style="float: left; padding-left: 50px; padding-top: 22px;color: #8395a7">
              <input type="checkbox" name="TypeIm" value="Immediat">&nbsp Immédiate &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="checkbox" name="TypeEn" value="Enchere">&nbsp Enchère &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="checkbox" name="TypeMe" value="Meilleure">&nbsp Meilleure offre
            </div>
          </div>

          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br>* Catégorie: </font></b><br><br></h4>
            </div>

            <div style="float: left; padding-left: 50px; padding-top: 22px;color: #8395a7">
              <input type="radio" name="Categorie" value="Ferraille ou Trésor">&nbsp Ferraille ou Trésor &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="radio" name="Categorie" value="Bon pour le Musée">&nbsp Bon pour le Musée &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="radio" name="Categorie" value="Accessoire VIP">&nbsp Accessoire VIP
            </div>
          </div>



      <div class="form-group" style="padding-left: 100px;">
          <div style="float: left;width: 200px;">
            <h4 style="color:#22a6b3"><b><font size = "+1"><br>Photos et Video:</font></b><br><br></h4>
          </div>

          <div class="form-group" style="padding-left: 260px;padding-top: 10px;">
            <div>
              <div style="float: left;width: 500px">
                <input type="file" id="Photo1" name="Photo1" style="float: left;"> <p style="color:#22a6b3"> Photo 1 </p>
                <input type="file" id="Photo2" name ="Photo2" style="float: left;"> <p style="color:#22a6b3"> Photo 2 </p>
              </div>
              <div>
                <input type="file" id="Photo3" name="Photo3" style="float: left;"> <p style="color:#22a6b3"> Photo 3 </p>
                <input type="file" id="Vidéo" name="Video" style="float: left;"> <p style="color:#22a6b3"> Vidéo </p>
              </div>
            </div>
          </div>

         <div class="form-group" style="padding-left: 510px">
           <div class="button" style="background-color:#22a6b3; width: 100px"> 
           <a href="#" style=" color:#ffffff"><b><font size = "+1"><center> <input type="submit" name="button1" value=" Continuer " style="background-color: #22a6b3"> </center></font></b></a>
          </div>
         </div>

       </div>

      
    </form>
  </div>
  </div>
  </body>

</html>



<?php 
    }  
      else 
      {
        ?>
        <div style="padding-top: 100px; padding-bottom: 100px">
        <center><div style=" border: 5px solid; border-color: #22a6b3; height: 200px; width: 700px ">
        <b><div style="padding-left: 50px; padding-right: 50px; padding-top: 50px; color: #22a6b3"><font size = "+1">Créez vous un compte vendeur pour bénéficier du service de vente. <br><br>

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