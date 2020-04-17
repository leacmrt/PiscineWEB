<?php

$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Refuser = isset($_POST["Refuser"])? $_POST["Refuser"] : ""; 
$Accepter = isset($_POST["Accepter"])? $_POST["Accepter"] : ""; 
$ID_Offre = isset($_POST["ID_Offre"])? $_POST["ID_Offre"] : ""; 



$sql = "SELECT * FROM (offre JOIN items ON offre.ID_Item = items.ID ) WHERE offre.ID_Offre = ".$ID_Offre."";
$result = mysqli_query($db_handle,$sql);
$Offre = mysqli_fetch_assoc($result);


if ($Refuser) //Si l'offre est refusée
{
	$sqlUpdate = "UPDATE offre SET Valide = 'Non' WHERE ID_Offre = ".$ID_Offre."";
	$Update = mysqli_query($db_handle,$sqlUpdate);

}

if ($Accepter) //Si l'offre est acceptée
{
	echo $Offre['ID_Item'];
	echo $Offre['ID_vendeur'];
	echo $Offre['ID_Acheteur'];
	echo $Offre['Montant'];



 	$sqlCommande = "INSERT INTO commandes (ID_Item,ID_Vendeur,ID_Acheteur,Prix) VALUES (".$Offre['ID_Item'].",".$Offre['ID_vendeur'].",".$Offre['ID_Acheteur'].",".$Offre['Montant'].")";
 	$Ajout = mysqli_query($db_handle,$sqlCommande);

 	$sqlSuppression = "DELETE FROM offre WHERE ID_Offre = ".$ID_Offre."";
 	$Suppression = mysqli_query($db_handle,$sqlSuppression);
}