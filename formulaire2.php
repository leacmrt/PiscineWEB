<?php
session_start();



$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin   
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Description= isset($_POST["Description"])? $_POST["Description"] : "";


$Photo1 = isset($_FILES["Photo1"]['name'])? $_FILES["Photo1"]['name'] : "";
$Photo2 =  isset($_FILES["Photo2"]['name'])? $_FILES["Photo2"]['name'] : "";
$Photo3 = isset($_FILES["Photo3"]['name'])? $_FILES["Photo3"]['name'] : "";
$Video = isset($_FILES["Vidéo"]['name'])? $_FILES["Vidéo"]['name'] : "";
$Photoprofil= isset($_FILES["Photoprofil"]['name'])? $_FILES["Photoprofil"]['name'] : "";

$Categorie= isset($_POST["Categorie"])? $_POST["Categorie"] : "";
$ID_Vendeur= $_SESSION['ID_vendeur'];


 if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp']))  
{  ?>
 
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
        <li><a href="#"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte:  <?php echo $_SESSION['Mail']; ?> </font></b></a></li>
        <li><a href="panier.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>
  
  

<?php 

  $TypeEn = isset($_POST['TypeEn']);
  $TypeMe = isset($_POST['TypeMe']);
  $TypeIm = isset($_POST['TypeIm']);

  

?>

<form class="form-horizontal" action="Formulaire3.php" method="post" enctype="multipart/form-data" >

  <input type="hidden" name="ID" value=<?php echo $ID ?> >
  <input type="hidden" name="Nom" value=<?php echo $Nom ?> >
  <input type="hidden" name="Description" value=<?php echo $Description ?> >

  <input type="hidden" name="Photo1" value=<?php echo $Photo1 ?> >
  <input type="hidden" name="Photo2" value=<?php echo $Photo2 ?> >
  <input type="hidden" name="Photo3" value=<?php echo $Photo3 ?> >
  <input type="hidden" name="Video" value=<?php echo $Video ?> >
  <input type="hidden" name="Immediat" value=<?php echo $TypeIm ?> >
  <input type="hidden" name="Enchere" value=<?php echo $TypeEn ?> >
  <input type="hidden" name="Offre" value=<?php echo $TypeMe ?> >
  <input type="hidden" name="Photoprofil" value=<?php echo $Photoprofil ?> >
  <input type="hidden" name="Categorie" value=<?php echo $Categorie ?> >

  <input type="hidden" name="TypeIm" value=<?php echo $TypeIm ?> >
  <input type="hidden" name="TypeMe" value=<?php echo $TypeMe ?> >
  <input type="hidden" name="TypeEn" value=<?php echo $TypeMe ?> >




 <?php 
 if ($TypeIm)
  {
?>
  
  <div class="form" style=" padding-left: 100px; padding-right: 100px">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
    
      
        <h3 style="color:#22a6b3"><b><font size = "+1"><center>Vente immédiate :</center></font></b></h3>
          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br>Prix :</font></b><br></h4>
            </div>
            <div style="float: left; padding-left: 50px; padding-top: 22px">
              <input name="Prix" id="Prix" class="form-control" placeholder="Prix?" type="text" size="130">
            </div>
          </div>
    </div>
  </div><br>
  <?php
  } 

  if ($TypeEn)
  {
  ?>
  <div class="form" style=" padding-left: 100px; padding-right: 100px;padding-top: 10px">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
        <h3 style="color:#22a6b3"><b><font size = "+1"><center>Enchères :</center></font></b></h3>
          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br>Prix minimal:</font></b><br></h4>
            </div>
            <div style="float: left; padding-left: 50px; padding-top: 22px">
              <input name="Prix_min_En" id="Prix_min_En" class="form-control" placeholder="Prix?" type="text" size="130">
            </div>
          </div>

          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br>Date limite :</font></b><br><br></h4>
            </div>
            <div style="float: left; padding-left: 50px; padding-top: 22px">
              <input name="Date_lim_En" id="Date_lim_En" class="form-control" placeholder="Date limite?" type="text" size="130">
            </div>
          </div>  
    </div>
  </div><br>
  <?php
  } 

  if ($TypeMe)
  { 
  ?>
  <div class="form" style=" padding-left: 100px; padding-right: 100px;padding-top: 10px">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
        <h3 style="color:#22a6b3"><b><font size = "+1"><center>Meilleur prix :</center></font></b></h3>
          <div class="form-group" style="padding-left: 100px">
            <div style="float: left;width: 200px;">
              <h4 style="color:#22a6b3"><b><font size = "+1"><br>Prix minimal:</font></b><br></h4>
            </div>
            <div style="float: left; padding-left: 50px; padding-top: 22px">
              <input name="Prix_min_Me" id="Prix_min_Me" class="form-control" placeholder="Prix?" type="text" size="130">
            </div>
          </div>
        
    </div>
  </div><br>
    
  <?php
  }  
  ?> 
  
  <a href="#" style=" color:#ffffff"><b><font size = "+1"><center> <input type="submit" name="button2" value=" Finaliser " style="background-color: #22a6b3"> </center></font></b></a>
   </form>


<?php



  ?>


  </div>
  </div>
  </body>

</html>
<?php } ?>
