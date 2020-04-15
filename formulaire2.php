<?php

session_start(); 

$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin   
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Description= isset($_POST["Description"])? $_POST["Description"] : "";
$Photo1 = isset($_FILES["Photo1"])? $_FILES["Photo1"] : "";
$Photo2 =  "LALA";
$Photo3 ="LALA";
$Video = "LALA";
$Immediat=isset($_POST["Immediat"])? $_POST["Immediat"] : "";
$Enchere=isset($_POST["Enchere"])? $_POST["Enchere"] : "";
$Offre=isset($_POST["Meilleure"])? $_POST["Meilleure"] : "";

$ID_vendeur=$_SESSION['ID_vendeur'];


//partie SQL
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if (isset($_POST['button1']))
	{
		if($Nom!=""&&$Description!=""&&isset($_POST['Type']))
		{
			


			if(isset($_FILES['Photo1']))
     		{ 

     			
     			
	    
	    		foreach($_POST['Type'] as $Type)
		   			{
		   		     if($Type=="Immediat")
		   		     	$Immediat="Immediate";

		   		     if($Type=="Enchere")
		   		     	$Enchere="Enchere";

		   		     if($Type=="Meilleure")
		   		     	$Offre="Meilleure";
		   	        }


     			$dossier = 'upload/';
     			$fichier = basename($_FILES['Photo1']['name']);
     			if(move_uploaded_file($_FILES['Photo1']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     			{
          			
          			//echo '<img src='.$dossier."/".$fichier.' width=100 height=100 > <br>'; //afficher une image sur l'écran
          			$rec='<img src='.$dossier."/".$fichier;
     			}

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
		      $_SESSION['Photo1'] = $data['Photo1'] ;
		      $_SESSION['Description'] = $data['Description'];
		      $_SESSION['Enchere'] = $data['Enchere'];
		      header ('location: article.php');}

              
             } else { 
             	       
                       $_SESSION['NomArticle'] = $_POST['Nom'];
		               $_SESSION['Photo1'] = $rec;
		               $_SESSION['Description'] = $_POST['Description'];
		               $_SESSION['Enchere'] = $Enchere;

                       $sql = "INSERT INTO items(Nom, Description, Immediat, Enchere, Meilleure, Photo1,Photo2,Photo3,Video,ID_vendeur)
                       VALUES ('$Nom','$Description','$Immediat','$Enchere','$Offre','$rec','','','','$ID_vendeur')"; 
                       $result = mysqli_query($db_handle, $sql);
                       
                       header ('location: article.php');
                       
             }




     		    }else echo "<script> window.alert(\"Base de donnée introuvable \"); history.back(); </script>";

    		}else echo "<script> window.alert(\"Veuillez poster au minimum une photo de votre item\"); history.back(); </script>";
            

    	        
     		
 		}else echo "<script> window.alert(\"Veuillez remplir les champs obligatoirs svp \"); history.back(); </script>";



	}else echo "probleme1";

        








?>
