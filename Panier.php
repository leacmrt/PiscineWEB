
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>




<! Partir php et sql>
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
        $B_SUPP= NULL;
        $ID_SUPP = NULL;
        $B_SUPP= isset($_POST["buttonSupp"])?$_POST["buttonSupp"] : "";
        $ID_SUPP= isset($_POST["ID_Supp"])?$_POST["ID_Supp"] : "";
        $Mode_Supp= isset($_POST["Mode_Supp"])?$_POST["Mode_Supp"] : "";

        if ($B_SUPP)
        {
          $Supression = $db_handle -> prepare("DELETE FROM panier WHERE ID_Item = \"".$ID_SUPP."\" AND Mode = \"".$Mode_Supp."\"");
          $Supression -> execute();
        }

        $B_SUPP= NULL;
        $ID_SUPP = NULL;
        $Supression = NULL;



        $sql1 = "SELECT * FROM ((panier JOIN items ON panier.ID_Item = items.ID) JOIN vente_immediate ON panier.ID_Item = vente_immediate.ID_Item) WHERE (panier.ID_Acheteur = \"".$_SESSION['ID_vendeur']."\" AND  panier.Mode = 'immediat')";;
        $R_Im = mysqli_query($db_handle, $sql1);

        $sql2 = "SELECT * FROM ((panier JOIN items ON panier.ID_Item = items.ID) JOIN vente_enchere ON panier.ID_Item = vente_enchere.ID_Item) WHERE (panier.ID_Acheteur = \"".$_SESSION['ID_vendeur']."\" AND  panier.Mode = 'enchere')";
        $R_En = mysqli_query($db_handle, $sql2);

        $sql3 = "SELECT * FROM ((panier JOIN items ON panier.ID_Item = items.ID) JOIN vente_meilleur ON panier.ID_Item = vente_meilleur.ID_Item) WHERE (panier.ID_Acheteur = \"".$_SESSION['ID_vendeur']."\" AND  panier.Mode = 'meilleure')";
        $R_Me = mysqli_query($db_handle, $sql3);
      }
 
      ?>





<!Barre de navigation>
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
        <li><a href="Catégories.html" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
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

<! Logo et grand titre>
  <div class="container text-center">
  <div style="background-color:#ffffff">
      <img src="logo2.png" width="500" height="200">
  </div>
  </div>
 <div class="container-fluid text-center">
  <div style="background-color:#22a6b3">
      <h1  style="color:#ecf0f1"><b><font size = "+1"> Panier </font></b></h1>
  </div>
  </div>



<!Affichage des items qui sont dans le panier>

  <div class="container" style="color:#22a6b3 ">
    <?php 
        if ((is_null($R_Im))&&(is_null($R_En))&&(is_null($R_Me)))
        {
          echo 'Votre panier est vide';
        }

        else
        {
          echo '<div style="background-color:#22a6b3;width:1100px;">
                  <h1  style="color:#dcf0f1"><b><font size = "+1"><center> Achats immédiats </center></font></b></h1>'.'<div style="width:100px;padding-left:485px">'.
                  '</div>'.
                '</div>';
          while ($PanierIm = mysqli_fetch_assoc($R_Im)) 
          {

              echo '<div style="border:solid;border-color:#22a6b3;width:1100px;height:200px;">'.'<p><b><font size = "+1">';
              echo '<div style="float:left;padding-left:10px">';
                echo '<img src="'.$PanierIm['Photo1'].'" width="250" height="170">';
              echo '</div>';
              echo '<div style=";padding-left:300px;padding-top:30px">';
                echo $PanierIm['Nom'].'<br><br>'.'Prix : '.$PanierIm['Prix']; 
              echo '</div>'; 


              //Bouton supprimer ?>

              <form action="Fiche_item_immediat.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $PanierIm['ID_Item'] ?> >
              <?php
              echo '<div style="float:left;padding-top:25px;padding-left:40px;width:700px">';
                echo '<a href="#"><b><font size = "+1"><input type="submit" name="button1" value="Voir cet article" style="background-color:#22a6b3;color: #ffffff;float:left"> </font></b></a>';
              ?> </form>


              <form action="SupprimerPanier.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $PanierIm['ID_Item'] ?> > 
              <input type="hidden" name="Mode" value='Immediat' > 
              <?php
                echo '<div style="padding-left:660px">
                  <a href="#"><b><font size = "+1"><input type="submit" name="button1" value="Supprimer" style="background-color:#22a6b3;color: #ffffff;"></font></b></a></div>'; 
              echo '</div>';
            echo '</p></b></font>'.'</div>';
            ?> </form> <?php
          }





          echo '<div style="background-color:#22a6b3;width:1100px">
                  <h1  style="color:#ecf0f1"><b><font size = "+1"><center> Enchères </center></font></b></h1>
                </div>';
          while ($PanierEn = mysqli_fetch_assoc($R_En)) 
          {
            echo '<div style="border:solid;border-color:#22a6b3;width:1100px;height:200px;">'.'<p><b><font size = "+1">';
              echo '<div style="float:left;padding-left:10px">';
                echo '<img src="'.$PanierEn['Photo1'].'" width="250" height="170">';
              echo '</div>';
              echo '<div style=";padding-left:300px;padding-top:30px">';
                echo $PanierEn['Nom'].'<br><br>'.'Date limite : '.$PanierEn['Date_lim']; 
              echo '</div>'; 

              //Boutons enchérir et supprimer ?>
              <form action="Fiche_item_enchere.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $PanierEn['ID_Item'] ?> >
              <?php
              echo '<div style="float:left;padding-top:25px;padding-left:40px;width:700px">';
                echo '<a href="#"><b><font size = "+1"><input type="submit" name="button1" value="Voir cet article" style="background-color:#22a6b3;color: #ffffff;float:left"> </font></b></a>';
              ?> </form>


              <form action="SupprimerPanier.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $PanierEn['ID_Item'] ?> > 
              <input type="hidden" name="Mode" value='Enchere' > 
              <?php
                echo '<div style="padding-left:660px">
                  <a href="#"><b><font size = "+1"><input type="submit" name="button1" value="Supprimer" style="background-color:#22a6b3;color: #ffffff;"></font></b></a></div>'; 
              echo '</div>';
            echo '</p></b></font>'.'</div>';
            ?> </form> <?php
          }


          echo '<div style="background-color:#22a6b3;width:1100px">
                  <h1  style="color:#ecf0f1"><b><font size = "+1"><center> Meilleures offres </center></font></b></h1>
                </div>';
          while ($PanierMe = mysqli_fetch_assoc($R_Me)) 
          {
            echo '<div style="border:solid;border-color:#22a6b3;width:1100px;height:200px;">'.'<p><b><font size = "+1">';
              echo '<div style="float:left;padding-left:10px">';
                echo '<img src="'.$PanierMe['Photo1'].'" width="250" height="170">';
              echo '</div>';
              echo '<div style=";padding-left:300px;padding-top:30px">';
                echo $PanierMe['Nom']; 
              echo '</div>'; 

              //Boutons enchérir et supprimer ?>
              <form action="Fiche_item_Meilleur.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $PanierMe['ID_Item'] ?> >
              <?php
              echo '<div style="float:left;padding-top:25px;padding-left:40px;width:700px">';
                echo '<a href="#"><b><font size = "+1"><input type="submit" name="button1" value="Voir cet article" style="background-color:#22a6b3;color: #ffffff;float:left"> </font></b></a>';
              ?> </form>


              <form action="SupprimerPanier.php" method="post">
              <input type="hidden" name="ID_Item" value=<?php echo $PanierMe['ID_Item'] ?> > 
              <input type="hidden" name="Mode" value='Meilleure' > 
              <?php
                echo '<div style="padding-left:660px">
                  <a href="#"><b><font size = "+1"><input type="submit" name="button1" value="Supprimer" style="background-color:#22a6b3;color: #ffffff;"></font></b></a></div>'; 
              echo '</div>';
            echo '</p></b></font>'.'</div>';
            ?> </form> <?php
          }


        } 
    ?>
  </div>






<footer class="container-fluid text-center" style="bottom: 30px;">
  <p>©EBAY-ECE 2020</p>  
  <form class="form-inline">Rejoignez notre newsletter:
    <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
    <button type="button" class="btn btn-danger">Signez</button>
  </form>
</footer> 

</body>
</html> 