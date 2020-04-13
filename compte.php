<?php



$ID=isset($_POST["ID"])? $_POST["ID"] : ""; //généré par phpmyadmin   //partie inscription
$Nom= isset($_POST["Nom"])? $_POST["Nom"] : "";
$Mail= isset($_POST["Mail"])? $_POST["Mail"] : "";
$Telephone= isset($_POST["Telephone"])? $_POST["Telephone"] : "";
$Role = isset($_POST["Role"])? $_POST["Role"] : "";
$Mdp1= isset($_POST["Mdp1"])? $_POST["Mdp1"] : "";
$Mdp2= isset($_POST["Mdp2"])? $_POST["Mdp2"] : "";

 
$Pseudo= isset($_POST["Pseudo"])? $_POST["Pseudo"] : ""; //partie connexion 
$Mdp3= isset($_POST["Mdp3"])? $_POST["Mdp3"] : "";


if (isset($_POST['button1'])) //inscription

   {
	 if($Nom!=""&&$Mail!=""&&$Telephone!=""&&$Role!=""&&$Mdp1!=""&&$Mdp2!="")
      {

         if($Mdp1==$Mdp2)
         {
             echo "Compte créé";
         }
         else echo "Veuillez saisir le même mot de passe svp";

	} else  echo "Veuillez remplir tout les champs svp";
}
        
else {echo "Probleme";}


if (isset($_POST['button2'])) //connexion
{
    if($Pseudo!=""&&$Mdp3!="")
    { 

    	

    }else echo "Veuillez remplir tout les champs svp";
}






?>
