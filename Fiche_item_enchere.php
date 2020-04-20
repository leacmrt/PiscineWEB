
 <?php
session_start() ;
$_SESSION['ID_IT_ENCH']="";
$_SESSION['Prix_max']="";
$_SESSION['Prix_min']="";
$_SESSION['NomENCH']="";
$_SESSION['datelm']="";



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

        $sql = 'SELECT * From (items JOIN vente_enchere ON items.ID = vente_enchere.ID_Item) WHERE items.ID ='.$ID_Item.'';
              $R_Item = mysqli_query($db_handle, $sql);
      }
?>
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
          <ul> Prix minimal : <?php echo $Item['Prix_min'] ?> €</ul>
          <ul> Date limite :  <?php echo $Item['Date_lim'] ;

          

date_default_timezone_set('Europe/Paris');
$today = getdate();

$Date= $Item['Date_lim'];
$annee=$Date[0].$Date[1].$Date[2].$Date[3];
$mois=$Date[5].$Date[6];
$jour=$Date[8].$Date[9];



//cho "Annee : ".$annee." Mois :".$mois." jour :".$jour;
     
     if($today['month']=='January')$M=1;
     if($today['month']=='February') $M=2;
     if($today['month']=='March') $M=3;
     if($today['month']=='April') $M=4;
     if($today['month']=='May')$M=5;
     if($today['month']=='June')$M=6;
     if($today['month']=='July')$M=7;
     if($today['month']=='August')$M=8;
     if($today['month']=='September')$M=9;
     if($today['month']=='October')$M=10;
     if($today['month']=='November')$M=11;
     if($today['month']=='December')$M=12;

    $DifA=$annee-$today['year'];
    $DifM=$mois-$M;
    $DifJ=$jour-$today['mday'];
    
    
      if($DifA>-1)
        {     if($DifM>-1)
            {
                   
                 if($DifJ<-1)
              { $DifM1=$DifM-1;
                $DifJ1=31+$DifJ;
                

              }else { }

                    
                $_SESSION['ID_IT_ENCH']=$Item['ID'];
                $_SESSION['Prix_max']=$Item['Enchere_max'];
                $_SESSION['Vendeur_min']=$Item['Prix_min'];
                $_SESSION['Prix_min']=$Item['Enchere_min'];
                $_SESSION['NomENCH']=$Item['Nom'];
                $_SESSION['datelm']=$Item['Date_lim']; 
       echo ".   <br>  Il vous reste :".$DifA." années ,".$DifM1."mois  , ".$DifJ1." jours pour enchérir sur cet article <br>";
         


        ?>


    <?php  



   }}

   /*if ($DifM==0&&$DifA==0&&$DifJ<=-1) 
   {
             $A=$Item['ID'];
              $sql = "SELECT * FROM Items WHERE ID LIKE '%".$Item['ID']."%'";
              $result = mysqli_query($db_handle, $sql);



               while ($data = mysqli_fetch_assoc($result))
              {
                 $Vendeur=$data['ID_vendeur'];

              }

               $sql = "SELECT * FROM vente_enchere  WHERE ID_Item LIKE '%".$Item['ID']."%'";
              $result = mysqli_query($db_handle, $sql);
              
              while ($data = mysqli_fetch_assoc($result))
              {
                 if($data['Enchere_max']!="")  //si quelqu'un a encherit ça va dans son panier
                  {
                  $acheteur= $data['ID_Encherisseur'];
                  $Prixfinal=$data['Prix_min']+1;
                  /*$sql = "INSERT INTO commandes(ID_Item,ID_Vendeur,ID_Acheteur,Prix) VALUES ('$A','$Vendeur','$acheteur','$Prixfinal')"; //remplacer par ID_utilisateur quand on aura lier avec les sessions  
                  $result = mysqli_query($db_handle, $sql);


                    $sql = "SELECT * FROM vente_immediate  WHERE ID_Item LIKE '%".$Item['ID']."%'";
                    $result = mysqli_query($db_handle, $sql);
                    if(mysqli_num_rows($result) != 0) 
                    {
                      $sql = "DELETE FROM vente_immediate  WHERE ID_Item LIKE '%".$Item['ID']."%'"; //si l'item est présent dedans 
                      $result = mysqli_query($db_handle, $sql);
                      }
                   
                 }

              }
              
              $sql=" UPDATE vente_enchere SET Fin=\"Oui\"WHERE ID_Item LIKE '%".$Item['ID']."%'"; //une fois que c'est dans un panier on l'efface de vente enchere et de vente immediat (car la combinaison est
              $result = mysqli_query($db_handle, $sql);

             echo " <script> location.replace(\"enchere.php\"); </script>";


           } */?>    </p> </ul>



              <ul>
          <form action="Encherir.php" method="post"> 
                <input type="hidden" name="ID_Item" value=<?php echo $Item['ID'] ?> >
                <input type="submit" name="button" value="Encherir" style="background-color: #ffffff">
              </form>


             <form action="Affichage_panier.php" method="post"> 
                <input type="hidden" name="ID_Item" value=<?php echo $Item['ID'] ?> >
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


