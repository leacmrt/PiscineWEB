<?php
session_start();


$database = "testpiscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

 if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp']))  {  ?>
 
<!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
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
        <li><a href="Formulaire_Nouvelle_Vente.php" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
        <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte : <?php echo $_SESSION['Mail']; ?> </font></b></a></li>
        <li><a href="panier.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
        <li><a href="deco.php" style="color:#ecf0f1"><span class="glyphicon glyphicon-off"></span><b><font size = "+1"> Deconnexion</font></b></a></li>
      </ul>
    </div>
  </div>
</nav>


 



<div class="container-fluid">


  
      <center ><img src="logo2.png" width="500" height="150"> </center>
   



<div style="padding-top: 50px; padding-right: 250px; padding-left: 250px;">
  <div style=" border:5px solid; border-color: #22a6b3; padding-left: 30px;padding-right: 30px;background-color:#ffffff">

          
            <h1 style=" color : darkblue"> <center>  Bienvenue</center></h1>       
                                     <?php  if($_SESSION['Photoprofil']=="")
                                  {?> <div style=" border:5px solid; border-color: #22a6b3;background-color:lightgrey; float: right; width: 120px; height: 160px;">
                                        <br><p>Voulez vous rajouter une photo de profil? </p>
                                          <form action="Formulaire2.php" method="post" enctype="multipart/form-data" >
                                            <input type="file" id="Photoprofil" name="Photoprofil" style="width: 110px">
                                            <input type="submit" name="button3" value="Poster ">
                                          </form>
                                      </div>
                                     <?php  } else if($_SESSION['Photoprofil']!=""){ ?>
                                        <div style=" border:5px solid; border-color: #22a6b3;background-color:lightgrey; float: right; width: 120px; height: 160px;">
                                         <?php echo $_SESSION['Photoprofil']." width=\"110\" height=\"150\">"; ?>
                                      </div> <?php } ?>


             <center>  <h2 style=" color : darkblue; padding-left: 120px" > <strong> <?php echo  $_SESSION['Pseudo']; ?> </strong> </h2><p style="padding-left: 120px"> Votre role :  <strong> <?php echo  $_SESSION['Role']; ?> </strong> </p> </center>

  


               <?php  if( $_SESSION['Role']=="Vendeur") { ?> 
               <br>       

                <br><br><br><h2  style=" color : darkblue"> <center >Vos articles en vente : </center></h2>  <?php 


                       if ($db_found) 
                      {

                                    $sql = "SELECT * FROM items";
                                    $sql .= " WHERE ID_vendeur LIKE '%".$_SESSION['ID_vendeur']."%' ";
                                    $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat

                          if(mysqli_num_rows($result) != 0) 
                           {
                              while ($data = mysqli_fetch_assoc($result))
                              {
                                
                                echo " <center> <div style=\" border:2px solid; border-color: black;  width: 200px; height: 200px; \">  <strong>". $data['Nom']."</strong> <br/>";
                                echo $data['Photo1']." width=\"150\" height=\"150\"></div>  </center>  <br>"; 
                                }
                              }
                            } 

                          }
                            ?>



                <?php  if( $_SESSION['Role']=="Acheteur") { ?> 
                 <br><br><br><br><center>

                  Votre panier  : <a href="panier.html" style="color: blue"><span class="glyphicon glyphicon-shopping-cart" > Votre panier  </span> </a><br>
                  Catégorie: <a href="categorie.html" style="color: blue"><span class="glyphicon glyphicon-globe" > Catégorie </span> </a> <br>
                  Achat: <a href="Achat.html" style="color: blue"><span class="glyphicon glyphicon-eur" > Achat </span> </a>
                   </center><?php    }  ?>




                <?php  if( $_SESSION['Role']=="ADMIN") { ?> 
                 <br><br><br><br><center>

                  En premiers temps, un administrateur est le chef vendeur. Il peut ajouter ou supprimer des items dans le site de marché. <br><br> 

                  En second temps, un administrateur peut ajouter ou supprimer des vendeurs (fournisseurs) avec leur email ECE, pseudo et nom sur une base de données.
                   </center><?php    }  ?>
  
        
      </div>
    

   






    </div>
  </div>




  <footer class="container-fluid text-center">
      <p>©EBAY-ECE 2020</p>  
        <form class="form-inline">Rejoignez notre newsletter:
          <input type="email" class="form-control" size="50" placeholder="Adresse E-mail">
        <button type="button" class="btn btn-danger">Signez</button>
        </form>
  </footer>
  </body>
</html>
<?php } ?>
