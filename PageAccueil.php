<?php
session_start();

$database = "testpiscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

?>
     <!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body style="background-color:#c7ecee">

  
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
<div class="jumbotron" style="background-color:#ffffff ">
  <div class="container-fluid">
    <div style="float:left;">
      <img src="logo2.png" width="500" height="200">
    </div>
    <div style="float:left;">
           
      <p style="padding-left:200px">• La vente aux enchères en ligne pour la communauté ECE Paris <br></p>
      <p style="padding-left:200px">• Trois méthodes d'achat: immédiat, par enchère ou à la meilleure offre ! <br></p>
      <p style="padding-left:200px">• Livraison gratuite en France métropolitaine pour plus de 35€ d'achat !<br></p>
      <p style="padding-left:200px">• Paiement sécurisé et assuré par INSEECpayment. <br></p>
      <p style="padding-left:200px">• Garantie qualitée ECE. Satisfait ou remboursé ! <br></p>

    </div>
  </div>
</div>

<?php 
       //partie enchere automatique dès qu'un utilisateur se connecte
       




       if($db_found)
        {
         
              $sql14 = "SELECT * FROM vente_enchere ";
              $result14 = mysqli_query($db_handle, $sql14);

              if(mysqli_num_rows($result14)!=0) 
               {  

                while ($data=mysqli_fetch_assoc($result14))
                  {
                    date_default_timezone_set('Europe/Paris');
                    $today = getdate();

                    $Date= $data['Date_lim'];
                    $annee=$Date[0].$Date[1].$Date[2].$Date[3];
                    $mois=$Date[5].$Date[6];
                    $jour=$Date[8].$Date[9];


                    if($today['month']=='January')$M=1;
                    if($today['month']=='February')$M=2;
                    if($today['month']=='March') $M=3;
                    if($today['month']=='April') $M=4;
                    if($today['month']=='May')$M=5;
                    if($today['month']=='June')$M=6;
                    if($today['month']=='July') $M=7;
                    if($today['month']=='August')$M=8;
                    if($today['month']=='September')$M=9;
                    if($today['month']=='October')$M=10;
                    if($today['month']=='November')$M=11;
                    if($today['month']=='December')$M=12;

                     $DifA=$annee-$today['year'];
                     $DifM=$mois-$M;
                     $DifJ=$jour-$today['mday'];




                     if($DifA>-1)
                      {
                      if($DifM>-1)
                       {
                       if($DifJ<-1)
                       { $DifM1=$DifM-1;
                         $DifJ1=31+$DifJ;
                       }else {  $DifM1=$DifM;
                         $DifJ1=$DifJ;  }
                        //echo "<br> Il vous reste ".$DifA ."années ,".$DifM1." mois, ".$DifJ1."pour encherir"; 
  
                   }}

        if (($DifM==0&&$DifA==0&&$DifJ<=-1)||($DifA<0)||($DifA==0&&$DifM<0)) 
           {
              $A=$data['ID_Item'];
              echo $A."<br>";


              $sql = "SELECT * FROM Items WHERE ID LIKE '%".$A."%'";
              $result = mysqli_query($db_handle, $sql);



               while ($data1 = mysqli_fetch_assoc($result))
              {
                 $Vendeur=$data1['ID_vendeur'];

              }

               $sql20 = "SELECT * FROM vente_enchere  WHERE ID_Item =\"$A\"";
               $result20 = mysqli_query($db_handle, $sql20);
              
              while ($data2 = mysqli_fetch_assoc($result20))
              {
                 if($data2['Enchere_max']!="0")  //si quelqu'un a encherit ça va dans son panier
                  {
                  //$acheteur= $data2['ID_Encherisseur'];
                 //if($data2['Enchere_max']==$data2['Enchere_min'])
                  //{$Prixfinal=$data2['Prix_min'];}
                 //else $Prixfinal=$data2['Prix_min']+1;

                    $sql = "SELECT * FROM vente_immediate  WHERE ID_Item LIKE '%".$A."%'";
                    $result = mysqli_query($db_handle, $sql);
                    if(mysqli_num_rows($result) != 0) 
                    {
                      $sql = "DELETE FROM vente_immediate  WHERE ID_Item LIKE '%".$A."%'"; //si l'item est présent dedans 
                      $result = mysqli_query($db_handle, $sql);
                      }
                   
                      }else {
                            $sql = "DELETE FROM vente_enchere  WHERE ID_Item LIKE '%".$A."%'"; //si l'item est présent dedans 
                            $result = mysqli_query($db_handle, $sql);

                            $sql = "UPDATE items  set Enchere=\"\"  WHERE ID LIKE '%".$A."%'"; //si l'item est présent dedans 
                            $result = mysqli_query($db_handle, $sql);
                          }

              }
              
                  $sql=" UPDATE vente_enchere SET Fin=\"Oui\"WHERE ID_Item LIKE '%".$A."%'";
                  $result = mysqli_query($db_handle, $sql);



           }  
          }
         }

        } //premiere étape
       
       $A= $_SESSION['ID_vendeur'];
        if($db_found)
        {
              $sql = "SELECT * FROM (vente_enchere JOIN items ON vente_enchere.ID_Item =  items.ID) WHERE ID_Encherisseur =\"$A\" AND Fin =\"Oui\" " ;
              $result = mysqli_query($db_handle, $sql);

              if(mysqli_num_rows($result)!=0) 
               {  

                while ($data=mysqli_fetch_assoc($result))
                  {

                  
                  $Prixfinal=$data['Enchere_min']+1;
                  $I=$data['ID_Item'];

                  $sql1 = "SELECT * FROM Items WHERE ID =\"$I\" ";
                  $result1 = mysqli_query($db_handle, $sql1);
                  while ($data1 = mysqli_fetch_assoc($result1))
                 {
                  $Vendeur=$data1['ID_vendeur'];
                  $sql2 = "INSERT INTO commandes(ID_Item,ID_Vendeur,ID_Acheteur,Prix) VALUES ('$I','$Vendeur','$A','$Prixfinal')"; 
                  $result2 = mysqli_query($db_handle, $sql2);
                  $Nom= str_replace('&nbsp',' ', $data['Nom']);

                  $sql3 = "DELETE FROM vente_enchere WHERE ID_Item=\"$I\" "; 
                  $result3 = mysqli_query($db_handle, $sql3);


                  echo "<script> alert(\"Vous avez gagné votre enchère pour cet item: ".$Nom." Vous allez passer à la commande :\") </script>"; 
                  $_SESSION['ModeEnch']="1";
                  $_SESSION['Prixfin']=$Prixfinal;
                  $_SESSION['IDENCH']=$I;
                  
                  echo " <script> location.replace(\"commande.php\"); </script>";


                  }


                  
                
                  }
              }
        }



?>

<div class="container-fluid">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><b><font size = "+1"><center>Catégories</font></b></center> </div> <a href="Catégories.php">
        <div class="panel-body"><img src="loupe.jpg" class="img-responsive" style="height: 170px" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3"><b><font size = "+1"><center>Achat</font></b></center></div> <a href="PageAchat.php">
        <div class="panel-body"><img src="sac.jpg" class="img-responsive" style="height: 170px" alt="Image"></div>
        <div class="panel-footer">Cliquez pour en savoir plus</div> </a>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color:#22a6b3" ><b><font size = "+1"><center>Vente</font></b></center></div> <a href="Formulaire_Nouvelle_Vente.php">
        <div class="panel-body"><img src="argent.jpg" class="img-responsive" style="height: 170px" alt="Image"></div>
        <div class="panel-footer">Clickez pour en savoir plus</div> </a>
      </div>
    </div>
  </div>
</div>

<div class="container">    
  <div class="row">
      <center>
      <h4> A PROPOS DE EBAY-ECE </h4>
      <br> Ce site est une plateforme de vente en ligne propre à l'ECE. <br> Vous trouverez tous ce dont vous avez besoin allant de la simple pièce de feraille aux accessoires
       les plus prestigieux grâce à nos nombreux fournisseurs.
      
      <br> Cette plateforme a été fondé en 2020 grâce à la collaboration de 3 élèves dans le but de promouvoir des achats de proximité et de qualité au sein de l'ECE Paris.
      </center>
      
      
    </div>
    
</div><br>

<div class="container">    
  <div class="row">
      <center>
      <h4> Nos valeurs  </h4>
      <br> Qualité, rapidité et fiabialité sont nos maîtres-mots. 
      <br> Ce site est protégé et aucunes de vos données confidentielles ne seront transmises à de tiers personnes ou organismes. </center>
      
      
    </div>
    
</div><br>


</div><br><br>
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