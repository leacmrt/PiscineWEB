<?php
session_start();
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$ModifD = isset($_POST["ModifD"])? $_POST["ModifD"] : ""; 
$ModifC = isset($_POST["ModifC"])? $_POST["ModifC"] : ""; 
$ModifM = isset($_POST["ModifM"])? $_POST["ModifM"] : ""; 
$ModifD1 = isset($_POST["ModifD1"])? $_POST["ModifD1"] : ""; 
$ModifC1 = isset($_POST["ModifC1"])? $_POST["ModifC1"] : ""; 
$ModifM11 = isset($_POST["ModifM11"])? $_POST["ModifM11"] : ""; 
$ModifM12 = isset($_POST["ModifM12"])? $_POST["ModifM12"] : ""; 
$ModifM13 = isset($_POST["ModifM13"])? $_POST["ModifM13"] : ""; 
$ModifIm1 = isset($_POST["ModifIm1"])? $_POST["ModifIm1"] : ""; 
$ModifEn1 = isset($_POST["ModifEn1"])? $_POST["ModifEn1"] : "";
$ModifEn2 = isset($_POST["ModifEn2"])? $_POST["ModifEn2"] : "";
$ModifMe1 = isset($_POST["ModifMe1"])? $_POST["ModifMe1"] : "";


?>
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
        <li><a href="PageAccueil.php"  style="color:#ecf0f1" ><b><font size = "+1">Home</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom" ><b><font size = "+1">Catégories</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte  <?php echo $_SESSION['Mail']; ?> </font></b></a></li>
        <li><a href="panier.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>



<div class="container-fluid text-center">
    <div>
      <img src="logo2.png" width="250" height="60">
      <h2 style="color:#22a6b3"><b> ARTICLE </b></h2>
    </div>
  </div>
 <br>
  <div style=" padding-left: 100px; padding-right: 100px;padding-top: 10px ;">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3; height: 500px">
    
    <div style="float :left ;padding-top: 15px ; padding-left:50px;" >
    <div style=" border :1px solid  ; border-color:black ; width: 600px; height: 460px">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
         <h2> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u>Voulez vous modifier cet item ? </u></h2>
          <br>
           <h4 style=" color : black"> &nbsp Modifier la description &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifD" value="oui">&nbsp  oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifD" value="non">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h4>
          <center style="padding-left:130px" ><input type="text" id ="ModifD1" name="ModifD1" placeholder="Modifier la description"></center>
          <br>
           <h4 style=" color : black"> &nbsp Modifier la Catégorie &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifC" value="oui">&nbsp oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifC" value="non">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h4>
           <center style="padding-left:130px"  > <select name="ModifC1" size="1">
                                    <option name="" value="Ferraille ou Trésor">Ferraile ou trésor</option>
                                    <option name="" value="Bon pour le Musée">Bon pour le Musée</option>
                                    <option name="" value="Accessoirs VIP">Accessoirs VIP</option>
          </select></center>

          <br>
           <h4 style=" color : black"> &nbsp Modifier la Mode de vente &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifM" value="oui">&nbsp oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifM" value="non">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h4>
          <center>
          <input type="checkbox" name="ModifM11" value="Immediat"> Immédiat
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="checkbox" name="ModifM12" value="Enchere"> Enchère
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="checkbox" name="ModifM13" value="Meilleure"> Meilleure offre </center><br>

          <center>
           <input type="text" id ="ModifIm1" name="ModifIm1" placeholder="Prix">
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           <input type="text" id ="ModifEn1" name="ModifEn1" placeholder="Prix min">
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="text" id ="ModifMe1" name="ModifMe1" placeholder="Prix min"> </center><br>

          <center> <input type="text" id ="ModifEn2" name="ModifEn2" placeholder="Date lim"> </center>

          
          <br>
           <center >
           <input type="submit" name="button1" value=" Modifier "> &nbsp&nbsp&nbsp&nbsp
           <input type="submit" name="button2" value=" Supprimer l'item "> </center>
           <br><br>

           <?php 
                      if (isset($_POST['button2'])) 
                      {   

                             if ($db_found) 
                             {
                                echo "<script> window.alert(\"Vous allez supprimer un item!\");</script>";
    
                                $sql = "DELETE FROM items  WHERE Nom LIKE '%".$_SESSION['NomArticle']."%'";
                                if ($_SESSION['Description']!= "") 
                                {
                                  $sql .= " AND Description LIKE '%".$_SESSION['Description']."%'";
                                }

                              }
                              $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/

                              $sql = "DELETE FROM vente_enchere  WHERE ID_Item LIKE '%".$_SESSION['ID']."%'";
                              $result = mysqli_query($db_handle, $sql);

                              $sql = "DELETE FROM vente_immediate  WHERE ID_Item LIKE '%".$_SESSION['ID']."%'";
                              $result = mysqli_query($db_handle, $sql);
                              $sql = "DELETE FROM vente_meilleur WHERE ID_Item LIKE '%".$_SESSION['ID']."%'";
                              $result = mysqli_query($db_handle, $sql);


                              echo " <script> location.replace(\"profil.php\"); </script>";

                      }


                       if (isset($_POST['button1'])) 
                        {   

                             if ($db_found) 
                             {
                               
                               if($ModifD)//pour modifier la description
                               { 
                               
                                  if($ModifD1!="")
                                    {
                                    $sql=" UPDATE items SET Description =\"$ModifD1\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                    $result = mysqli_query($db_handle, $sql);
                                    $_SESSION['Description']=$ModifD1;
                                    }
                              }


                                if($ModifC)//pour modifier la catégorie
                               { 
                               
                                  if($ModifC1!="")
                                    { 
                                    
                                    $sql=" UPDATE items SET Categorie =\"$ModifC1\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                    $result = mysqli_query($db_handle, $sql);
                                    $_SESSION['Categorie']=$ModifC1;

                                     }
                              }


                              if($ModifM)//pour modifier les ventes
                               { 
                               
                                  if($ModifM11!="") //Immédiat
                                    { 

                                      if ($_SESSION['Immediat']!="")
                                      {
                                        if ($ModifIm1!="")
                                          {
                                            $sql2=" UPDATE vente_immediate SET Prix =\"$ModifIm1\" WHERE ID_Item =\"".$_SESSION['ID']."\" ";
                                            $result2 = mysqli_query($db_handle, $sql2);
                                          }
                                      }
                                      else
                                      {
                                        $sql=" UPDATE items SET Immediat =\"$ModifM11\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                        $result = mysqli_query($db_handle, $sql);
                                        $_SESSION['Immediat']=$ModifM11;

                                        $sql2=" INSERT INTO vente_immediate (ID_Item, Prix) VALUES (\"".$_SESSION['ID']."\",\"$ModifIm1\")";
                                        $result2 = mysqli_query($db_handle, $sql2);
                                      }
                                    }

                                    else
                                    {
                                      if ($_SESSION['Immediat']!="")
                                      {

                                        $sql=" UPDATE items SET Immediat =\"$ModifM11\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                        $result = mysqli_query($db_handle, $sql);
                                        $_SESSION['Immediat']=$ModifM11;



                                        $sql2="DELETE FROM vente_immediate WHERE ID_Item = ".$_SESSION['ID']."";
                                        $result2 = mysqli_query($db_handle, $sql2);
                                      }
                                    }




                                    if($ModifM12!="") //Enchere
                                    {  
                                      if ($_SESSION['Enchere']!="")
                                      {
                                        if ($ModifEn1!="")
                                          {
                                            $sql2=" UPDATE vente_enchere SET Prix_min =\"$ModifEn1\" WHERE ID_Item =\"".$_SESSION['ID']."\" ";
                                            $result2 = mysqli_query($db_handle, $sql2);
                                          }

                                          if ($ModifEn2!="")
                                          {
                                            $sql3=" UPDATE vente_enchere SET Date_lim =\"$ModifEn2\" WHERE ID_Item =\"".$_SESSION['ID']."\" ";
                                            $result3 = mysqli_query($db_handle, $sql3);
                                          }
                                      }
                                      else
                                      {
                                        $sql=" UPDATE items SET Enchere =\"$ModifM12\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                        $result = mysqli_query($db_handle, $sql);
                                        $_SESSION['Enchere']=$ModifM12;

                                        $sql2=" INSERT INTO vente_enchere (ID_Item,Prix_min,Date_lim) VALUES (\"".$_SESSION['ID']."\",\"$ModifEn1\",\"$ModifEn2\")";
                                        $result2 = mysqli_query($db_handle, $sql2);
                                      }
                                    }

                                    else
                                    {
                                      if ($_SESSION['Enchere']!="")
                                      {

                                        $sql=" UPDATE items SET Enchere =\"$ModifM12\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                        $result = mysqli_query($db_handle, $sql);
                                        $_SESSION['Enchere']=$ModifM12;


                                        $sql2="DELETE FROM vente_enchere WHERE ID_Item = ".$_SESSION['ID']."";
                                        $result2 = mysqli_query($db_handle, $sql2);
                                      }
                                    }


                                 if($ModifM13!="") //Meilleur prix
                                  { 
                                    if ($_SESSION['Meilleure']!="")
                                      {
                                        if ($ModifMe1!="")
                                          {
                                            $sql2=" UPDATE vente_meilleur SET Prix_min =\"$ModifMe1\" WHERE ID_Item =\"".$_SESSION['ID']."\" ";
                                            $result2 = mysqli_query($db_handle, $sql2);
                                          }
                                      }
                                      else
                                      {
                                        $sql=" UPDATE items SET Meilleure =\"$ModifM13\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                        $result = mysqli_query($db_handle, $sql);
                                        $_SESSION['Meilleure']=$ModifM13;

                                        $sql2=" INSERT INTO vente_meilleur (ID_Item,Prix_min) VALUES (\"".$_SESSION['ID']."\",\"$ModifMe1\")";
                                        $result2 = mysqli_query($db_handle, $sql2);
                                      }
                                    }

                                    else
                                    {
                                      if ($_SESSION['Meilleure']!="")
                                      {

                                        $sql=" UPDATE items SET Meilleure =\"$ModifM13\" WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                                        $result = mysqli_query($db_handle, $sql);
                                        $_SESSION['Meilleure']=$ModifM13;


                                        $sql2="DELETE FROM vente_meilleur WHERE ID_Item = ".$_SESSION['ID']."";
                                        $result2 = mysqli_query($db_handle, $sql2);
                                      }
                                    }
                                }
                              }
                        }

                        ?> 
           
      </form>
    </div>
  </div>
       <br><br><br>
        <?php 

                if ($db_found) 
                {
                  $sql= "SELECT * FROM items  WHERE Nom =\"".$_SESSION['NomArticle']."\" ";
                  $result = mysqli_query($db_handle, $sql);
                   while ($data = mysqli_fetch_assoc($result))
                              {
                                $VA=$data['ID_vendeur'];
                              }

                  $sql="SELECT * FROM utilisateurs WHERE ID=\"".$VA."\"";
                  $result = mysqli_query($db_handle, $sql);
                   while ($data = mysqli_fetch_assoc($result))
                              {
                                $SA=$data['Mail'];
                              }

                }

        ?>

       <h2 style="color:#22a6b3"><b> <?php echo "<p style =\" float :right \"><u> Nom: </u>".$_SESSION['NomArticle'].'  <br/> <u>  Description </u> :'.$_SESSION['Description'] . ' <br> <u>  Catégorie: </u> '.$_SESSION['Categorie']. '<br/>
        <u> Mode de vente : </u> '.$_SESSION['Enchere']. '  '.$_SESSION['Immediat'].' ' .$_SESSION['Meilleure'].' <br/> <u> Vendu par :</u>'.$SA.'</p>'; ?></b></h2>
       <br><br><br> 

        <?php echo '<center style=\" padding-bottom: 120px ; padding-left:600px \">'.'<img src="'.$_SESSION['Photo1'].'" width="200" height="200" > </center>'; ?>

        

       </div>

      
   
  </div>

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