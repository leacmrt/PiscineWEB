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
$Photoprofil= isset($_FILES["Photoprofil"]['name'])? $_FILES["Photoprofil"]['name'] : "";
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

$ErreurObligatoire = 0;
$ErreurType = 0;


//partie SQL
$database = "testpiscine";//connectez-vous dans votre BDD//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
		

if (($TypeIm)&&($Prix == "")) //Si le prix n'est pas renseigné
{

	$ErreurObligatoire = $ErreurObligatoire + 1;		

}
if (($TypeEn)&&($Prix_min_En == "")) //Si le prix min n'est pas renseigné
{

	$ErreurObligatoire = $ErreurObligatoire + 1;		

}
if (($TypeEn)&&($Date_lim_En == "")) //Si la date lim n'est pas renseigné
{

	$ErreurObligatoire = $ErreurObligatoire + 1;		

}
if (($TypeMe)&&($Prix_min_Me == "")) //Si le prix min n'est pas renseigné
{

	$ErreurObligatoire = $ErreurObligatoire + 1;		

}
if ($ErreurObligatoire > 0) //Si il y au moins une erreur
{
?>

	<div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 200px;color:#22a6b3">
		        <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3; height: 170px">
		          <p><center><b><font size = "+1"><br> Veuillez remplir les champs obligatoires (*). </font></b></center></p>
		            <center><form action="formulaire2.php" method="post">
		            <input type="hidden" name="ID" value=<?php echo $ID ?>>
		            <input type="hidden" name="Nom" value=<?php echo $Nom ?>>
		            <input type="hidden" name="Description" value=<?php echo $Description ?>>
		            <input type="hidden" name="Photo1" value=<?php echo $Photo1 ?>>
		            <input type="hidden" name="Photo2" value=<?php echo $Photo2 ?>>
		            <input type="hidden" name="Photo3" value=<?php echo $Photo3 ?>>
		            <input type="hidden" name="Video" value=<?php echo $Video ?>>
		            <input type="hidden" name="Categorie" value=<?php echo $Categorie ?>>
		            <input type="hidden" name="TypeEn" value=<?php echo $TypeEn ?>>
		            <input type="hidden" name="TypeIm" value=<?php echo $TypeIm ?>>
		            <input type="hidden" name="TypeMe" value=<?php echo $TypeMe ?>>
		            <input type="hidden" name="Photoprofil" value=<?php echo $Photoprofil ?>>

		              <div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:320px"><a href="#"><b><font size = "+1"><input type="submit" name="button" value="Retour" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div>
		            </form></center>
		        </div>
	      	</div>
<?php
}
if (($TypeIm)&&(is_int($Prix)==1)) //Si le prix n'est pas un entier
{
	$ErreurType = $ErreurType + 1;		

}
if (($TypeEn)&&(is_int($Prix_min_En)==1)) //Si le prix min n'est pas un entier
{

	$ErreurType = $ErreurType + 1;		

}
if (($TypeMe)&&(is_int($Prix_min_Me)==1)) //Si le prix min n'est pas un entier
{

	$ErreurType = $ErreurType + 1;		

}
if ($ErreurType > 0) //Si il y a au moins une erreur de type
{
?>

	<div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 200px;color:#22a6b3">
		        <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3; height: 170px">
		          <p><center><b><font size = "+1"><br> Veuillez respecter les types des données. </font></b></center></p>

		            <center><form action="formulaire2.php" method="post">
		            <input type="hidden" name="ID" value=<?php echo $ID ?>>
		            <input type="hidden" name="Nom" value=<?php echo $Nom ?>>
		            <input type="hidden" name="Description" value=<?php echo $Description ?>>
		            <input type="hidden" name="Photo1" value=<?php echo $Photo1 ?>>
		            <input type="hidden" name="Photo2" value=<?php echo $Photo2 ?>>
		            <input type="hidden" name="Photo3" value=<?php echo $Photo3 ?>>
		            <input type="hidden" name="Video" value=<?php echo $Video ?>>
		            <input type="hidden" name="Categorie" value=<?php echo $Categorie ?>>
		            <input type="hidden" name="TypeEn" value=<?php echo $TypeEn ?>>
		            <input type="hidden" name="TypeIm" value=<?php echo $TypeIm ?>>
		            <input type="hidden" name="TypeMe" value=<?php echo $TypeMe ?>>
		            <input type="hidden" name="Photoprofil" value=<?php echo $Photoprofil ?>>

		              <div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:320px"><a href="#"><b><font size = "+1"><input type="submit" name="button" value="Retour" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div>
		            </form></center>
		        </div>
	      	</div>
<?php
}
if (($ErreurObligatoire == 0)&&($ErreurType == 0))  //Si il n'y a pas d'erreurs
{
?>

	<div class="form" style=" padding-left: 400px; padding-right: 400px;padding-top: 200px;color:#22a6b3">
		        <div style="background-color: #ffffff; border: 5px solid; border-color: #22a6b3; height: 350px">
		          <p><center><b><font size = "+1"><br> Votre article: </font><br><br> 
		          	Nom : <?php echo $Nom ?> <br>
		          	Description : <?php echo $Description ?> <br><br>

		          	<?php
		          	if ($TypeIm)
		          	{
		          	?>
		          	Vente immédiate : <br> Prix : <?php echo $Prix ?> € <br><br>
		          	<?php
		          	}
		          	if ($TypeEn)
		          	{
		          	?>
		          	Enchère : <br> Prix minimal : <?php echo $Prix_min_En ?> € <br> Date limite : <?php echo $Date_lim_En ?> <br><br>
		          	<?php
		          	}
		          	if ($TypeMe)
		          	{
		          	?>
		          	Meilleur prix : <br> Prix minimal : <?php echo $Prix_min_Me ?> €<br><br>
		          	<?php
		          	}
		          	?>

		          	<center>
		          		<form action="formulaire3.php" method="post">
			          	<input type="hidden" name="ID" value=<?php echo $ID ?>>
			            <input type="hidden" name="Nom" value=<?php echo $Nom ?>>
			            <input type="hidden" name="Description" value=<?php echo $Description ?>>
			            <input type="hidden" name="Photo1" value=<?php echo $Photo1 ?>>
			            <input type="hidden" name="Photo2" value=<?php echo $Photo2 ?>>
			            <input type="hidden" name="Photo3" value=<?php echo $Photo3 ?>>
			            <input type="hidden" name="Video" value=<?php echo $Video ?>>
			            <input type="hidden" name="Categorie" value=<?php echo $Categorie ?>>
			            <input type="hidden" name="TypeEn" value=<?php echo $TypeEn ?>>
			            <input type="hidden" name="TypeIm" value=<?php echo $TypeIm ?>>
			            <input type="hidden" name="TypeMe" value=<?php echo $TypeMe ?>>
			            <input type="hidden" name="Photoprofil" value=<?php echo $Photoprofil ?>>
			            <input type="hidden" name="Prix" value=<?php echo $Prix ?>>
			            <input type="hidden" name="Prix_min_En" value=<?php echo $Prix_min_En ?>>
			            <input type="hidden" name="Date_lim_En" value=<?php echo $Date_lim_En ?>>
			            <input type="hidden" name="Prix_min_Me" value=<?php echo $Prix_min_Me ?>>

		          		<div style="padding-top:25px;padding-bottom: 15px"><div style="padding-left:320px"><a href="#"><b><font size = "+1"><input type="submit" name="button" value="Continuer" style="background-color:#22a6b3;color: #ffffff;float:left"></font></b></a></div></div>
		            	</form>
		            </center>
<?php
}
?>