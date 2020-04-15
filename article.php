<?php
session_start();
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
$ModifD = isset($_POST["ModifD"])? $_POST["ModifD"] : ""; 
$ModifC = isset($_POST["ModifC"])? $_POST["ModifC"] : ""; 
$ModifM = isset($_POST["ModifM"])? $_POST["ModifM"] : ""; 



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
    
    <div style=" padding-top: 50px ; padding-left:50px; " >
    <div style=" float :left ; border :1px solid  ; border-color:black">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
         <h2> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u>Voulez vous modifier cet item ? </u></h2>
          <br>
           <h3> &nbsp Modifier la description &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifD" value="oui">&nbsp  oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifD" value="non">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h3>
          
           <h3> &nbsp Modifier la Catégorie &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifC" value="oui">&nbsp oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifC" value="non">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h3>
          
           <h3> &nbsp Modifier la Mode de vente &nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifM" value="oui">&nbsp oui &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="ModifM" value="non">&nbsp non &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </h3>
          
          <br><br>
           <center>
           <input type="submit" name="button1" value=" Modifier "> &nbsp&nbsp&nbsp&nbsp
           <input type="submit" name="button2" value=" Supprimer l'item "> </center>
           <br><br>

           <?php 
                      if (isset($_POST['button2'])) 
                      {   

                             if ($db_found) 
                             {
                               echo "<script> window.alert(\"Vous allez supprimer un item!\"); history.back(); </script>";
  
                              $sql = "SELECT * FROM items  WHERE Nom LIKE '%".$_SESSION['NomArticle']."%'";
                              if ($_SESSION['Description']!= "") {
                              $sql .= " AND Description LIKE '%".$_SESSION['Description']."%'";}
                                 }
                                 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat*/


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

