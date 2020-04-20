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
</head>


<body >

<! Partir php et sql>
    <?php
      try
      {
        $bdd = "testpiscine";
        $db_handle = mysqli_connect('localhost', 'root', '' );
        $bdd_piscine = mysqli_select_db($db_handle, $bdd);
      }

      catch(Exception $e)
      {
      die('Erreur: '. $e->getMessage());
      }

      if ($bdd_piscine)
      {
        $ID= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";

        $sql = "SELECT * FROM (items JOIN vente_immediate ON items.ID = vente_immediate.ID_Item) WHERE items.ID = ".$ID."";
        $sql2 = "SELECT Prix FROM (items JOIN vente_immediate ON items.ID = vente_immediate.ID_Item) WHERE items.ID = ".$ID."";
        $R_Item = mysqli_query($db_handle, $sql);
        $R_Prix = mysqli_query($db_handle, $sql2);
        $Prix = mysqli_fetch_row($R_Prix)[0];
      }
      ?>
      

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


 <! Logo et grand titre>
  <div class="container-fluid text-center">
    <div>
      <img src="logo2.png" width="250" height="90">
      <h2 style="color:#22a6b3"><b> Achat immédiat</b></h2>
    </div>
  </div>


  <!prix >
   <div class="container-fluid"style="background-color:#22a6b3;height: 60px;padding-top: 20px;padding-left: 100px">
    <div>
      <p  style="color:#ecf0f1;float: left;"><b><font size = "+1"> Total: </font></b></p>
    </div>
    <div style="padding-left:20px; width: 500px; float: left;">
      <p style=" width: 200px;color: #ffffff"><font size = "+1">


            <?php echo $Prix.' €'; ?>


      <!Bouton finalisation>
      </font></p>
    </div>
      <div class="button" style="padding-left: 960px">
      <form class="form-horizontal" action="Validation_Achat_immediat.php" method="post">
        <input type="hidden" name="ID_Item" value= <?php echo $ID ?>>
        <input type="hidden" name="Prix" value= <?php echo $Prix ?>>

          <a href="#" style=" color:#ffffff;"><b><font size = "+1"><center><input type="submit" name="button1" value="Finaliser l'achat" style="background-color:#ffffff;color: #22a6b3;"> </center></font></b></a>
    </div>
  </div>


  <!Affichage de item>
  <div class="container" style="color:#22a6b3 ">
    <?php 
      while ($Item = mysqli_fetch_assoc($R_Item)) 
          {
            echo '<div style="border:solid;border-color:#22a6b3;width:1100px;height:200px;">'.'<p><b><font size = "+1">';
              echo '<div style="float:left;padding-left:10px">';
                echo '<img src="'.$Item['Photo1'].'" width="250" height="170">';
              echo '</div>';
              echo '<div style="float:left;padding-left:30px;padding-top:50px">';
                echo $Item['Nom'].'<br><br>'.'Prix : '.$Item['Prix'].' €'; 
              echo '</div>';
              echo '<div style="float:left;padding-left:500px;padding-top:130px">'; 
              echo '</div>';
            echo '</p></b></font>'.'</div>';
          }
    ?>
  </div>
</body>

