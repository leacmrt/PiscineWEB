<?php


session_start() ;
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

                ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Enchères</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">


  <script type="text/javascript">
    function validation() {
      alert("Vous avez acheté l'article !")
    }

  

  </script>


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
        <li><a href="PageAccueil.html"  style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="PageAchat.html" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="develop1.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte</font></b></a></li>
        <li><a href="panier.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>



<div class="container text-center">
  <div style="background-color:#ffffff">
      <img src="logo2.png" width="200" height="80">
  </div>
</div> <br> <br> <br> <br> <br>

<body style="background-color:#c7ecee;">

<div class="container"> <div style="border:solid;border-color:#22a6b3;width:1100px;background-color:#ffffff;height:300px;padding-left: 30px;padding-top: 20px">   
    <div class="row">
     

  
      
        
        <center><h3 style="color:darkblue"> 
          <ul> <?php echo "<div style=\"border:solid;border-color:#818bd8;width:350px;height:80px\"><br> Article : ".$_SESSION['NomENCH']."<br></div> </ul> <br> <ul> Souhaitez - vous encherir pour ". $_SESSION['Vendeur_min']."€ ? <br>";  ?> </ul>
          

          <ul>
            </h3></center>
   <br><br>
          <center>
          <form action="" method="post"> 
                <input type="submit" name="button12" value="Encherir" style="background-color: #ffffff">
                <input type="text" name="NewEnch" placeholder="Proposition enchère"> </center>
                
          </form>

          <?php 

           if(isset($_POST['button12']))
            {

               $Prixmin=$_SESSION['Prix_min'];
               $PrixMax=$_SESSION['Prix_max'];
               $Prop= isset($_POST["NewEnch"])? $_POST["NewEnch"] : "";
               
               
               
              
              if(($Prop>$_SESSION['Prix_min'])&&($Prop<$_SESSION['Prix_max'])&&($Prop>$_SESSION['Vendeur_min']))
                { 
                  $Prixmin=$Prop;}

                if($Prop>$_SESSION['Prix_max'])
                { $Prixmin=$PrixMax;
                  $PrixMax=$Prop;
                }

             
                        if ($db_found) 
                       {
                      
                       $sql=" UPDATE vente_enchere SET Enchere_max =\"$PrixMax\"  , Prix_min=\"$Prixmin\"  WHERE ID_Item =\"".$_SESSION['ID_IT_ENCH']."\" "; //mettre avec session le id de l'acheteur à la place de 18
                       $result = mysqli_query($db_handle, $sql);
                       

                       if($Prop>$_SESSION['Prix_max'])
                       {
                        $sql=" UPDATE vente_enchere SET ID_Encherisseur =\"19\" WHERE ID_Item =\"".$_SESSION['ID_IT_ENCH']."\" "; //mettre avec session le id de l'acheteur à la place de 18
                       $result = mysqli_query($db_handle, $sql);
                       $_SESSION['Prix_max']=$PrixMax;

                       }

                       echo " <script>  alert(\"Votre propostion a bien été prise en compte!\") ;location.replace(\"enchere.php\"); </script>";
                     }

              }

        

          ?>

          </ul>

   

</div></div>
  

</body> 
<br> 



  <!-- Footer -->
  <footer class="container-fluid text-center">
    <p>©EBAY-ECE 2020</p>  
    <form class="form-inline">Rejoignez notre newsletter:
      <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
      <button type="button" class="btn btn-danger">Signez</button>
      <br><br>
    </form>
  </footer>


<!-- Toutes les informations ainsi que les images de la pièce de monnaie proviennent du site : http://www.sympatico.ca/actualites/decouvertes/histoire/monnaie-royale-canadienne-1.1508001 -->

</html>


