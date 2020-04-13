<?php

session_start();

$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin   
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Description= isset($_POST["Description"])? $_POST["Description"] : "";
$Type= isset($_POST["Type"])? $_POST["Type"] : "";
$Photo1 = isset($_POST["Photo1"])? $_POST["Photo1"] : "";
$Photo2= isset($_POST["Photo2"])? $_POST["Photo2"] : "";
$Photo3= isset($_POST["Photo3"])? $_POST["Photo3"] : "";
$Video= isset($_POST["Video"])? $_POST["Video"] : "";
//$ID_PROPRIETAIRE= $_SESSION["ID"];

 



//partie SQL
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);



if (isset($_POST['button1'])) //inscription

   {
	 
      {

           echo $Photo1."<br/>".$Type;
         	/*if ($db_found) 
         	{
             
              $sql= "INSERT INTO Items(Nom, Description, Type, ID_PROPRIETAIRE)
                     VALUES('$Nom', '$Description', '$Type', '$ID_PROPRIETAIRE)'";
               $result = mysqli_query($db_handle, $sql);
               echo "<script> window.alert(\"Votre items est maintenat en vente!\"); history.back(); </script>";
           } 
			else {echo "<script> window.alert(\"Database not found\"); history.back(); </script>";}*/

         }
         
	// else { echo "<script> window.alert(\"Veuillez remplir tout les champs svp! Minimum une photo requise\"); history.back();</script>";}
}
        








?>
