<?php



$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin   //partie inscription
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Mail= isset($_POST["Mail"])? $_POST["Mail"] : "";
$Telephone= isset($_POST["Telephone"])? $_POST["Telephone"] : "";
$Role = isset($_POST["Role"])? $_POST["Role"] : "";
$Mdp1= isset($_POST["Mdp1"])? $_POST["Mdp1"] : "";
$Mdp2= isset($_POST["Mdp2"])? $_POST["Mdp2"] : "";
$Photoprofil="";
$PhotoFond="";

 
$Mail1= isset($_POST["Mail1"])? $_POST["Mail1"] : ""; //partie connexion 
$Mdp3= isset($_POST["Mdp3"])? $_POST["Mdp3"] : "";


//partie SQL
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



if (isset($_POST['button1'])) //inscription

   {
	 if($Nom!=""&&$Mail!=""&&$Telephone!=""&&$Role!=""&&$Mdp1!=""&&$Mdp2!="")
      {

         if($Mdp1==$Mdp2)
         {
         	if ($db_found) 
         	{
             $sql = "SELECT * FROM utilisateurs";
				if ($Mail != "") //on cherche le livre avec le paramètre mail 
			 $sql .= " WHERE Mail LIKE '%$Mail%'";
			
			 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat

			if(mysqli_num_rows($result) == 0) 
			{
              $sql= "INSERT INTO utilisateurs(Nom, Mail, Telephone, Role, Mdp, Photoprofil,PhotoFond)
                     VALUES('$Nom', '$Mail', '$Telephone', '$Role','$Mdp1','$Photoprofil','$PhotoFond')";
               $result = mysqli_query($db_handle, $sql);
               echo "<script> window.alert(\"Vous êtes bien inscrit sur EBAY ECE\"); history.back(); </script>";
           } 


			else { echo "<script> window.alert(\"Cet E-mail est déjà utilisé sur ce site\"); history.back();</script>";}
        }
else {echo "<script> window.alert(\"Database not found\"); history.back(); </script>";}

         }
         else echo "<script> window.alert(\"Veuillez rentrer le même mot de passe svp !".$_POST['Role']." \"); history.back();</script>";

	} else { echo "<script> window.alert(\"Veuillez remplir tout les champs svp!\"); history.back();</script>";}
}
        


if (isset($_POST['button2'])) //connexion
{
    if($Mail1!=""&&$Mdp3!="")
    { 
        if ($db_found) 
         	{
             $sql = "SELECT * FROM utilisateurs";
				if ($Mail1 != "") {//on cherche le livre avec les paramètres titre et auteur
			 $sql .= " WHERE Mail LIKE '%$Mail1%'";
				if ($Mdp3 != "") {
			 $sql .= " AND Mdp LIKE '%$Mdp3%'";}
			}
			 $result = mysqli_query($db_handle, $sql);//regarder s'il y a de résultat

			if(mysqli_num_rows($result) != 0) 
			{
			  echo "<script> window.alert(\"Le compte existe . <br>\")";
			  session_start ();
			  
			  $_SESSION['Mail'] = $_POST['Mail1'];
		      $_SESSION['Mdp'] = $_POST['Mdp3'];



		    // on redirige notre visiteur vers une page de notre section membre
		     header ('location: PageAccueil.php');

              while ($data = mysqli_fetch_assoc($result))
		      {echo "ID: " . $data['ID'] . "<br>";
		       echo "Nom: " . $data['Nom'] . "<br>";
		       echo "Mail: " . $data['Mail'] . "<br>";
		       echo "Telephone: " . $data['Telephone'] . "<br>";
		       echo "Role: " . $data['Role'] . "<br>";
		       echo "<br>";


             $_SESSION['ID_vendeur']= $data['ID'];
             $_SESSION['Pseudo']= $data['Nom'];
             $_SESSION['Role']= $data['Role'];
             $_SESSION['Photoprofil']=$data['Photoprofil'];
             $_SESSION['PhotoFond']=$data['PhotoFond'];
		      }
           } 


				else { echo "<script> window.alert(\"Le compte n'existe pas\"); history.back(); </script>";
			           }
            
            }
		else {echo "<script> window.alert(\"Database not found\"); history.back(); </script>";}

    }else  echo "<script> window.alert(\"Veuillez remplir tout les champs svp!\"); history.back(); </script>";
}






?>