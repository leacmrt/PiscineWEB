

 <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Immédiat</title>
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



<?php
try    //Tentative de connexion à la bdd
      {
        $bdd = "testpiscine";
        $db_handle = mysqli_connect('localhost', 'root', '' );
        $bdd_piscine = mysqli_select_db($db_handle, $bdd);
      }

      catch(Exception $e)  //Affichage des erreurs
      {
      die('Erreur: '. $e->getMessage());
      }

      if ($bdd_piscine)  //Si connexion réussie
      {
      
        $ID_Item= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";

        $sql = "SELECT * From (items JOIN vente_immediate ON items.ID = vente_immediate.ID_Item) WHERE items.ID =".$ID_Item."";
              $R_Item = mysqli_query($db_handle, $sql);
      }
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

<?php
while ($Item = mysqli_fetch_assoc($R_Item)) 
            {
?>

<div class="container text-center">
  <div style="background-color:#ffffff">
      <img src="logo2.png" width="200" height="80">
  </div>
</div> <br> <br> <br> <br> <br>

<body style="background-color:#c7ecee;">

<div class="container"> <div style="border:solid;border-color:#22a6b3;width:1100px;background-color:#ffffff;height:300px;padding-left: 30px;padding-top: 20px">   
    <div class="row">
      <div class="col-sm-2">
  
        <div > 
          <a href="<?php echo $Item['Photo2'] ?>" target="_blank" >
          <img src="<?php echo $Item['Photo2'] ?>" alt="image2" height="70" width="70" style="border:solid;border-color:#22a6b3"/></a> 
        </div> <br>
          
        <div> 
          <a href="<?php echo $Item['Photo3'] ?>" target="_blank" >
          <img src="<?php echo $Item['Photo3'] ?>" alt="image3" height="70" width="70" style="border:solid;border-color:#22a6b3"/></a> 
        </div> <br>

        <div> 
          <a href="<?php echo $Item['Video'] ?>" target="_blank" >
          <img src="<?php echo $Item['Video'] ?>" alt="Vidéo" height="70" width="70" style="border:solid;border-color:#22a6b3"/></a> 
        </div> <br>
      </div>

  <div class="col-sm-3"> 
    <div> 
    <a href="<?php echo $Item['Photo1'] ?>" target="_blank" >
    <img src="<?php echo $Item['Photo1'] ?>" alt="Petite image1" height="250" width="250" style="border:solid;border-color:#22a6b3" /></a> 
    </div> <br>
  </div>
      
      <div class="col-sm-6" style=" color: #22a6b3"> 
        <br> 
          <ul> <?php echo $Item['Nom'] ?> </ul>
          <ul> <?php echo $Item['Description'] ?> </ul>
          <ul> Prix : <?php echo $Item['Prix'] ?> </ul>

          <ul>
          <form action="commande.php" method="post"> 
                <input type="hidden" name="ID_Item" value=<?php echo $Item['ID_Item'] ?> >
                <input type="hidden" name="Mode" value='Immediat'>
                <input type="submit" name="button" value="Acheter" style="background-color: #ffffff">
              </form>

             <form action="Affichage_panier.php" method="post"> 
                <input type="hidden" name="ID_Item" value=<?php echo $Item['ID_Item'] ?> >
                <input type="hidden" name="Mode" value='immediat' >
                <input type="submit" name="button" value="Ajouter au panier" style="background-color: #ffffff">
              </form>
          </ul>

      </div>
  </div>



    



</div></div>

<br>

<br>  
<body style="background-color:#c7ecee">
<div class="container">    
  <div class="row">

  </div>
</div>
</body> 
<br> 

<?php
}
?>



  <!-- Footer -->
  <footer class="container-fluid text-center" style="background-color: lightgrey">
    <p>©EBAY-ECE 2020</p>  
    <form class="form-inline">Rejoignez notre newsletter:
      <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
      <button type="button" class="btn btn-danger">Signez</button>
      <br><br>
    </form>
  </footer>


<!-- Toutes les informations ainsi que les images de la pièce de monnaie proviennent du site : http://www.sympatico.ca/actualites/decouvertes/histoire/monnaie-royale-canadienne-1.1508001 -->

</html>