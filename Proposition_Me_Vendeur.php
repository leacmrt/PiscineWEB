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

 	$sqlCommande = "INSERT INTO commandes (ID_Item,ID_Vendeur,ID_Acheteur,Prix) VALUES (".$Offre['ID_Item'].",".$Offre['ID_vendeur'].",".$Offre['ID_Acheteur'].",".$Offre['Montant'].")";
 	$Ajout = mysqli_query($db_handle,$sqlCommande);

 	$sqlSuppression1 = "DELETE FROM offre WHERE ID_Offre = ".$ID_Offre."";
 	$Suppression1 = mysqli_query($db_handle,$sqlSuppression1);

 	$sqlSuppression2 = "DELETE FROM vente_meilleur WHERE ID_Item = ".$Offre['ID_Item']."";
 	$Suppression2 = mysqli_query($db_handle,$sqlSuppression2);

 	$sqlSuppression3 = "DELETE FROM items WHERE ID = ".$Offre['ID_Item']."";
 	$sqlSuppression3 = mysqli_query($db_handle,$sqlSuppression3);
}