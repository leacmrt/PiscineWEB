<?php



$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin 
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Mail= isset($_POST["Mail"])? $_POST["Mail"] : "";
$Telephone= isset($_POST["Telephone"])? $_POST["Telephone"] : "";
$Role = isset($_POST["Role"])? $_POST["Role"] : "";
$Mdp1= isset($_POST["Mdp1"])? $_POST["Mdp1"] : "";
$Mdp2= isset($_POST["Mdp2"])? $_POST["Mdp2"] : "";




if (isset($_POST['button1'])) {
	 {

	

	 echo "Compte créé";

	}}
        
else {echo "Probleme";}






?>
