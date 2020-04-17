<?php

session_start(); 

//Provient du 1er firmulaire
$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin   
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Description= isset($_POST["Description"])? $_POST["Description"] : "";
$Photo1 = isset($_POST["Photo1"])? $_POST["Photo1"] : "";
$Photo2 =  isset($_POST["Photo2"])? $_POST["Photo2"] : "";
$Photo3 =isset($_POST["Photo3"])? $_POST["Photo3"] : "";
$Video = isset($_POST["Vidéo"])? $_POST["Vidéo"] : "";
$TypeIm=isset($_POST["TypeIm"])? $_POST["TypeIm"] : "";
$TypeEn=isset($_POST["TypeEn"])? $_POST["TypeEn"] : "";
$TypeMe=isset($_POST["TypeMe"])? $_POST["TypeMe"] : "";
$Photoprofil= isset($_POST["Photoprofil"])? $_POST["Photoprofil"] : "";
$Categorie= isset($_POST["Categorie"])? $_POST["Categorie"] : "";

$TypeEn= isset($_POST["TypeEn"])? $_POST["TypeEn"] : "";
$TypeIm= isset($_POST["TypeIm"])? $_POST["TypeIm"] : "";
$TypeMe= isset($_POST["TypeMe"])? $_POST["TypeMe"] : "";

//Provient du 2eme formulaire
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
$Prix_min_En = isset($_POST["Prix_min_En"])? $_POST["Prix_min_En"] : "";
$Date_lim_En = isset($_POST["Date_lim_En"])? $_POST["Date_lim_En"] : "";
$Prix_min_Me = isset($_POST["Prix_min_Me"])? $_POST["Prix_min_Me"] : "";

$ID_vendeur=$_SESSION['ID_vendeur'];

$Immediat = NULL;
$Enchere = NULL;
$Offre = NULL;


//partie SQL
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button2']))
	{

       //partie sql
                
				if ($db_found) 
         	{

             $sql = "SELECT * FROM items";
				if ($Nom != "") {//on cherche le livre avec les paramètres titre et auteur
			 $sql .= " WHERE Nom LIKE '%$Nom%'";
				if ($Description != "") {
			 $sql .= " AND Description LIKE '%$Description%'";}
			}
			 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat

			if(mysqli_num_rows($result) != 0) 
			{
			  
			   while ($data = mysqli_fetch_assoc($result))
			   {
			   $_SESSION['NomArticle'] = $data['Nom'];
         $_SESSION['ID'] = $data['ID'];
		      $_SESSION['Photo1'] = $data['Photo1'] ;
          $_SESSION['Photo2'] = $data['Photo2'] ;
          $_SESSION['Photo3'] = $data['Photo3'] ;
          $_SESSION['Vidéo'] = $data['Vidéo'] ;
		      $_SESSION['Description'] = $data['Description'];
		      $_SESSION['Enchere'] = $data['Enchere'];
		      $_SESSION['Meilleure'] = $data['Meilleure'];
		      $_SESSION['Immediat'] = $data['Immediat'];
		      $_SESSION['Categorie']=$data['Categorie'];

		      header ('location: article.php');}

              
             } else { 
             	       
                  
                      if ($TypeIm)
                      {
                        $Immediat = "Immediat";
                      }

                      if ($TypeEn)
                      {
                        $Enchere = "Enchere";
                      }

                      if ($TypeMe)
                      {
                        $Offre = "Offre";
                      }


                      $sql = "INSERT INTO items(Nom, Description, Immediat, Enchere, Meilleure, Photo1,Photo2,Photo3,Video,ID_vendeur,Categorie) VALUES ('$Nom','$Description','$Immediat','$Enchere','$Offre','$Photo1','$Photo2','$Photo3','$Video','$ID_vendeur','$Categorie')"; 

                      $result = mysqli_query($db_handle, $sql);

                      $sqlID = "SELECT max(ID) FROM items";
                      $resultID = mysqli_query($db_handle, $sqlID);
                      $IDMAX = mysqli_fetch_row($resultID)[0];

                        if ($TypeIm)
                      {
                        $sqlIm = "INSERT INTO vente_immediate (ID_Item,Prix) VALUES ('$IDMAX','$Prix')";
                        $resultIm = mysqli_query($db_handle, $sqlIm);
                      }

                      if ($TypeEn)
                      {
                        $sqlEn = "INSERT INTO vente_enchere (ID_Item,Date_lim,Prix_min) VALUES ('$IDMAX','$Date_lim_En','$Prix_min_En')";
                        $resultEn = mysqli_query($db_handle, $sqlEn);
                      }

                      if ($TypeMe)
                      {
                        $sqlMe = "INSERT INTO vente_meilleur (ID_Item,Prix_min) VALUES ('$IDMAX','$Prix_min_Me')";
                        $resultMe = mysqli_query($db_handle, $sqlMe);
                      }
                      
                     $_SESSION['NomArticle'] = $_POST['Nom'];
                     $_SESSION['ID'] = $IDMAX;
                     $_SESSION['Photo1'] = $Photo1;
                     $_SESSION['Photo2'] = $Photo2;
                     $_SESSION['Photo3'] = $Photo3;
                     $_SESSION['Vidéo'] = $Vidéo;
                     $_SESSION['Description'] = $_POST['Description'];
                     $_SESSION['Enchere'] = $Enchere;
                     $_SESSION['Meilleure'] =$Offre;
                     $_SESSION['Immediat'] = $Immediat;
                     $_SESSION['Categorie']=$Categorie;

                        $Immediat = NULL;
                        $Enchere = NULL;
                        $Offre = NULL;

                       
                       header ('location: article.php');
                       
             }




     		    }else echo "<script> window.alert(\"Base de donnée introuvable \"); history.back(); </script>";




	}

  ?>




<?php      

if (isset($_POST['button3']))
	{ 
      if ($db_found) 
      {



      	if($Photoprofil)
     		{ 


           			 echo "coucou";
            	     $sql ='UPDATE utilisateurs SET Photoprofil="'.$Photoprofil.'" WHERE ID ="'.$ID_vendeur.'"';

            		$result = mysqli_query($db_handle, $sql);
            		$_SESSION['Photoprofil']=$Photoprofil;
            		header ('location: profil.php');

      		}
       }


     }


?>
