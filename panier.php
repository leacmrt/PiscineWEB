    <?php
    // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
    session_start ();

    // On récupère nos variables de session
    if (isset($_SESSION['Mail']) && isset($_SESSION['Mdp'])) {

      // On teste pour voir si nos variables ont bien été enregistrées
      echo '<html>';
      echo '<head>';
      echo '<title>Page de notre section membre</title>';
      echo '<meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
           <link rel="stylesheet" type="text/css" href="style.css">';

      echo '</head>';

      echo '<body>';
      echo '<nav class="navbar navbar-inverse" style="background-color:#22a6b3">
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
           <li><a href="PageAccueil.html" style="color:#ecf0f1"><b><font size = "+1">Home</font></b></a></li>
           <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Catégories</font></b></a></li>
           <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Achat</font></b></a></li>
           <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Vendre</font></b></a></li>
           <li><a href="#" style="color:#ecf0f1"><b><font size = "+1">Admin</font></b></a></li>
           </ul>
          <ul class="nav navbar-nav navbar-right">
           <li><a href="#" style="color:#ecf0f1"><span class="glyphicon glyphicon-user"></span><b><font size = "+1"> Compte</font></b></a></li>
           <li><a href="panier.html" style="color:#ecf0f1"><span class="glyphicon glyphicon-shopping-cart"></span><b><font size = "+1"> Panier</font></b></a></li>
           </ul>
          </div>
         </div>
        </nav>';

      echo ' </br> Votre login est '.$_SESSION['Mail'].' et votre mot de passe est '.$_SESSION['Mdp'].'.';
      echo '<br />';

      // On affiche un lien pour fermer notre session
      echo '<a href="PageAccueil.php">Retour à la page d accueil</a>';
    }
    else {
      echo 'Les variables ne sont pas déclarées.';
    }
    ?>