 <?php
session_start();
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meilleur offre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">






<?php

$bdd = "testpiscine";
$db_handle = mysqli_connect('localhost', 'root', '' );
$bdd_piscine = mysqli_select_db($db_handle, $bdd);

$ID_Item= isset($_POST["ID_Item"])?$_POST["ID_Item"] : "";
echo $ID_Item;
$Mode= isset($_POST["Mode"])?$_POST["Mode"] : "";

$Button1= isset($_POST["button1"])?$_POST["button1"] : "";
$Button2= isset($_POST["button2"])?$_POST["button2"] : "";
$Adresse1= isset($_POST["Adresse1"])?$_POST["Adresse1"] : "";
$Adresse2= isset($_POST["Adresse2"])?$_POST["Adresse2"] : "";
$Ville= isset($_POST["Ville"])?$_POST["Ville"] : "";
$CodeP= isset($_POST["CodeP"])?$_POST["CodeP"] : "";
$Pays= isset($_POST["Pays"])?$_POST["Pays"] : "";
$CarteNom= isset($_POST["CarteNom"])?$_POST["CarteNom"] : "";
$CarteNum= isset($_POST["CarteNum"])?$_POST["CarteNum"] : "";
$CVC= isset($_POST["CVC"])?$_POST["CVC"] : "";
$Expiration= isset($_POST["Expiration"])?$_POST["Expiration"] : "";








//     Récupération des données de Formulaire_Livraison.php 



     if ($Button1)//si le formulaire s'envoie
       {
           
            if($Adresse1!=""&&$Ville!=""&&$CodeP!=""&&$Pays!=""&&$CarteNom!=""&&$CarteNum!=""&&$CVC!=""&&$Expiration!="")//si tout les champs sont remplis (sauf adresse 2 on s'en fou) 
              { 

                          $sql = "SELECT * FROM donnees";
                           if ($CarteNum != "") {//on cherche le livre avec les paramètres titre et auteur
                          $sql .= " WHERE CarteNum LIKE '%$CarteNum%'";
                           if ($CarteNom != "") {
                             $sql .= " AND CarteNom LIKE '%$CarteNom%'";}}
                              $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat

                            if(mysqli_num_rows($result) != 0) 
                          {echo "<script> window.alert(\"Le compte existe . <br>\")";}
                          else
                          {
                               $sql= "INSERT INTO donnees(Adresse1, Adresse2, Ville, CodeP, Pays, CarteNom,CarteNum,CVC,Expiration,ID_Vendeur)
                               VALUES('$Adresse1', '$Adresse2', '$Ville', '$CodeP','$Pays','$CarteNom','$CarteNum', '$CVC','$Expiration',\"".$_SESSION['ID_vendeur']."\")";
                              $result = mysqli_query($db_handle, $sql);
                              echo "<script> window.alert(\"Vos données sont bien enregistrées\"); 
                              ; </script>";

                          }

              }else echo " <script> alert(\"Veuillez remplir tout les champs!\") </script>";

       }

//     Récupération des données de Modif_Livraison.php 

       if ($Button2)//si le formulaire s'envoie
       {
           
            if($Adresse1!=""&&$Ville!=""&&$CodeP!=""&&$Pays!=""&&$CarteNom!=""&&$CarteNum!=""&&$CVC!=""&&$Expiration!="")//si tout les champs sont remplis (sauf adresse 2 on s'en fou) 
              { 

                       $sql1= "UPDATE  donnees SET Adresse1 = '$Adresse1' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";
                       $sql2= "UPDATE  donnees SET Adresse2 = '$Adresse2' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";
                       $sql3= "UPDATE  donnees SET Ville = '$Ville' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";

                       $sql4= "UPDATE  donnees SET CodeP = '$CodeP' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";

                       $sql5= "UPDATE  donnees SET Pays = '$Pays' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";

                       $sql6= "UPDATE  donnees SET CarteNom = '$CarteNom' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";
                       $sql7= "UPDATE  donnees SET CarteNum = '$CarteNum' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";
                       $sql8= "UPDATE  donnees SET CVC = '$CVC' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";

                       $sql9= "UPDATE  donnees SET Expiration = '$Expiration' WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";

                        $result1 = mysqli_query($db_handle, $sql1);
                        $result2 = mysqli_query($db_handle, $sql2);
                        $result3 = mysqli_query($db_handle, $sql3);
                        $result4 = mysqli_query($db_handle, $sql4);
                        $result5 = mysqli_query($db_handle, $sql5);
                        $result6 = mysqli_query($db_handle, $sql6);
                        $result7 = mysqli_query($db_handle, $sql7);
                        $result8 = mysqli_query($db_handle, $sql8);
                        $result9 = mysqli_query($db_handle, $sql9);
                    
                    echo "<script> window.alert(\"Vos données sont ont bien été modifiée\")</script>";

              }else echo " <script> alert(\"Veuillez remplir tout les champs!\") </script>";
        } 

       

$Button1= NULL;
$Button2= NULL;


?>























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




  <div style="padding-top: 100px; padding-bottom: 100px">
    <center><div style=" border: 5px solid; border-color: #22a6b3; height: 280px; width: 600px ">

      <?php 
      $sql = "SELECT * FROM donnees WHERE ID_Vendeur = \"".$_SESSION['ID_vendeur']."\"";
      $result = mysqli_query($db_handle,$sql);

      if ($donnee = mysqli_fetch_assoc($result))
      {
          echo '<h2><center> Vos données: </center></h2><br>';
          echo '<center>'.$donnee['CarteNom'].'</center>';
          echo '<center>'.$donnee['Adresse1'].'   '.$donnee['Adresse2'].'</center>';
          echo '<center>'.$donnee['Ville'].'   '.$donnee['CodeP'].'   '.$donnee['Pays'].'</center><br>';
          echo '<center> Carte: '.$donnee['CarteNum'].'   CVC: '.$donnee['CVC'].'   Expiration: '.$donnee['Expiration'].'<br><br>';

          if ($Mode == 'Meilleur')
          {
          echo '<form action="Montant_Meilleur.php" method="post">
                <input type="hidden" name="ID_Item" value='.$ID_Item.'> 
          <a href="#" style=" color:#ffffff;"><b><font size = "+1"><input type="submit" name="button1" value="Continuer" style="background-color:#22a6b3;"></font></b></a>'.'   '.'<a href="Formulaire_livraison.php" style=" color:#ffffff;"><b><font size = "+1"></form>';
          }

          if ($Mode == 'Immediat')
          {
          echo '<form action="Achat_immediat_seul.php" method="post">
                <input type="hidden" name="ID_Item" value='.$ID_Item.'> 
          <a href="#" style=" color:#ffffff;"><b><font size = "+1"><input type="submit" name="button1" value="Continuer" style="background-color:#22a6b3;"></font></b></a>'.'   '.'<a href="Formulaire_livraison.php" style=" color:#ffffff;"><b><font size = "+1"></form>';
          }

          //if ($Mode == 'Enchere')
          
          if($_SESSION['ModeEnch']==1)
          { 
            echo '<form action="commande4.php" method="post">
                <input type="hidden" name="ID_Item" value='.$_SESSION['IDENCH'].'> 
          <a href="#" style=" color:#ffffff;"><b><font size = "+1"><input type="submit" name="buttonench" value="Continuer" style="background-color:#22a6b3;"></font></b></a>'.'   '.'<a href="Formulaire_livraison.php" style=" color:#ffffff;"><b><font size = "+1"></form>';
          }
          ?>



            <form action="Modif_livraison.php" method="post">
            <input type="hidden" name="Mode" value=<?php echo $Mode ?>>
            <input type="hidden" name="ID_Item" value=<?php echo $ID_Item ?>>
          <input type="submit" name="button2" value="Modifier" style="background-color:#22a6b3;"></font></b></a></form>

      <?php
      }
      else
      {
        echo '<h2><center> Vous ne possèdez pas de données </center></h2><br>';?>
        <form class="form-horizontal" action="Formulaire_livraison.php" method="post">
        <input type="hidden" name="ID_Item" value= <?php echo $ID_Item ?>>
        <input type="hidden" name="Mode" value=<?php echo $Mode ?>>
        <input type="submit" value="Nouvelles données"></form> <?php
        echo '';
      }


?>
    </div>
  </div></center>


  <!-- Footer -->
  <footer class="container-fluid text-center" style="background-color: lightgrey">
    <p>©EBAY-ECE 2020</p>  
    <form class="form-inline">Rejoignez notre newsletter:
      <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
      <button type="button" class="btn btn-danger">Signez</button>
      <br><br>
    </form>
  </footer>


</html>