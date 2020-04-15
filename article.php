<?php
session_start();
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$ModifD = isset($_POST["ModifD"])? $_POST["ModifD"] : "";
$ModifD1 = isset($_POST["ModifD1"])? $_POST["ModifD1"] : ""; 
$ModifC = isset($_POST["ModifC"])? $_POST["ModifC"] : ""; 
$ModifC1 = isset($_POST["ModifC1"])? $_POST["ModifC1"] : ""; 
$ModifM = isset($_POST["ModifM"])? $_POST["ModifM"] : ""; 
$ModifM11 = isset($_POST["ModifM11"])? $_POST["ModifM11"] : ""; 
$ModifM12 = isset($_POST["ModifM12"])? $_POST["ModifM12"] : "";
$ModifM13 = isset($_POST["ModifM13"])? $_POST["ModifM13"] : "";


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
  <div class="form" style=" padding-left: 100px; padding-right: 100px;padding-top: 10px">
    <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3">
    
    <div style=" padding-top: 20px ; padding-left:50px; " >
    <div style=" float :left ; border :1px solid  ; border-color:black">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
         <h2> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u>Voulez-vous modifier cet item ? </u></h2>
          <br>
           <h3> &nbsp Modifier la description &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifD" value="true">&nbsp  oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifD" value="false">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </h3>
          <center style="padding-left:200px "><input type="text" name="ModifD1" placeholder=" Modifier Description"> </center>

           <h3> &nbsp Modifier la Catégorie &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifC" value="true">&nbsp oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifC" value="false">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h3>
           <center style="padding-left:200px "> <select name="ModifC1" size="1">
                                    <option value="Ferraille ou Trésor">Ferraille ou trésor</option>
                                    <option value="Bon pour le Musée">Bon pour le musée</option>
                                    <option value="Accessoirs VIP">Accessoire VIP</option>
                  </select> </center>
          
           <h3> &nbsp Modifier la Mode de vente &nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifM" value="true">&nbsp oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifM" value="false">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h3>
          <center style="padding-left:200px " >
            <input type="checkbox" name="ModifM11" value="Immediat"> Immédiate
          <input type="checkbox" name="ModifM12" value="Enchere"> Enchère
          <input type="checkbox" name="ModifM13" value="Meilleure"> Meilleure Offre</center>


        
        
          
          <br>
           <center>
           <input type="submit" name="button1" value=" Modifier "> &nbsp&nbsp&nbsp&nbsp
           <input type="submit" name="button2" value=" Supprimer l'item "> </center>
           <br>

           <?php 

                    if (isset($_POST['button1'])) 
                      {   

                             if ($db_found) 
                             {
                               

                              if($ModifD&&($ModifD1!="")) 
                               {$sql ='UPDATE items SET Description="'.$ModifD1.'" WHERE Nom ="'.$_SESSION['NomArticle'].'"';
                              
                                
                                 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/
                                 $_SESSION['Description']=$ModifD1;
                                }
                              
                                if($ModifC&&($ModifC1=="Ferraille ou Trésor"||$ModifC1=="Bon pour le Musée"||$ModifC1=="Accessoirs VIP")) 
                                 {$sql ='UPDATE items SET Categorie="'.$ModifC1.'" WHERE Nom ="'.$_SESSION['NomArticle'].'"';
                              
                                
                                 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/
                                 $_SESSION['Categorie']=$ModifC1;
                                 }

                                   if($ModifM)
                                   {
                                      if($ModifM11!="")
                                      {$sql ='UPDATE items SET Immediat="'.$ModifM11.'" WHERE Nom ="'.$_SESSION['NomArticle'].'"';
                                       $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/
                                       $_SESSION['Immediat']=$ModifM11;}
                                      
                                      if($ModifM12!="")
                                      {$sql ='UPDATE items SET Enchere="'.$ModifM12.'" WHERE Nom ="'.$_SESSION['NomArticle'].'"';
                                       $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/
                                       $_SESSION['Enchere']=$ModifM12;}  
                                      
                                      if($ModifM13!="")
                                      {$sql ='UPDATE items SET Meilleure="'.$ModifM13.'" WHERE Nom ="'.$_SESSION['NomArticle'].'"';
                                       $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/
                                       $_SESSION['Meilleure']=$ModifM13;}

                                   }


                                echo "<script> window.alert(\"Vous avez modifier un item: ".$_SESSION['NomArticle']."\"); </script>";
                                 echo " <script> location.replace(\"article.php\"); </script>";
                             }

                      }






                      if (isset($_POST['button2'])) 
                      {   

                             if ($db_found) 
                             {
                               
  
                              $sql = "DELETE FROM items  WHERE Nom LIKE '%".$_SESSION['NomArticle']."%'";
                              
                                
                                 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/
                                 echo "<script> window.alert(\"Vous avez supprimé un item: ".$_SESSION['NomArticle']."\");</script>";
                                 echo " <script> location.replace(\"profil.php\"); </script>";
                               }


                      }
                    


           ?> 
           
      </form>
    </div>
  </div>
       
       <h2 style="color:#22a6b3"><b> <?php echo "<p style =\" float:right \"><u> Nom: </u>".$_SESSION['NomArticle'].'  <br/> <u>  Description </u> :'.$_SESSION['Description'] . ' <br> <u>  Catégorie: </u> '.$_SESSION['Categorie']. '<br/>
        <u> Mode de vente : </u> '.$_SESSION['Enchere']. '  '.$_SESSION['Immediat'].' ' .$_SESSION['Meilleure'].' <br/> <u> Vendu par :</u>'.$_SESSION['Mail'].'</p>'; ?></b></h2>
       <br><br><br> 

        <?php echo "<center style=\" padding-bottom: 120px ; padding-left:600px \">".$_SESSION['Photo1']." width=\"200\" height=\"200\" > </center>"; ?>

        

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

