<?php 
require('controllers/controller.php');
$auth = IdVisiteur();
?>

<!DOCTYPE html>

<html lang="fr">
  <head>
    <!-- Métadonnées -->
	
    <meta charset="UTF-8">
    <title>Connexion - GSB</title>
	
	<!-- Pointage vers le style.css -->
    <link rel="stylesheet" href="css/style.css">
	<!-- Création d'un favicon -->
	<link rel="icon" href="assets/gsb.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Compatibilité IE et Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
  </head>
  
  <!-- Début du corps de texte -->
  
  <body>
  
  <!-- En-tête : Nom et description -->
  
  <?php include("elements/header.php"); ?>
  
  <?php include("elements/navbar_disconnected.php"); ?>

  <!-- Début du corps de la page -->
  
  <div class="FlexContenu">
  
	<div class="MenuConnexion">
		<div class="ContenuTitre">
			<h2>Se connecter</h2>
		</div>
  
		<div class="FlexForm">
  
			<img src="assets/gsb.png" alt="GSB" class="LogoGSB">
  
		<!-- Début du formulaire -->
			<form method="post" action="viewIdentificationVisiteur.php">

			<!-- Demande du login -->
			<div>
				<p>Nom de compte</p>
				<input type="text" name="login">
			</div>
  
			<!-- Demande du mot de passe -->
			<div>
				<p>Mot de passe</p>
				<input type="password" name="pw">
			</div>
  
			<!-- Confirmation -->
			<div>
				<input type="submit" value="Connexion" class="BtnConnexion">
			</div>
  
			</form>
  
		<!-- Affichage d'erreur : si le mot de passe d'Admin est incorrect ou si le login est incorrect -->
			<p class="Erreur">
			<?php 
			if ( $auth == false ) {echo "Erreur : Nom de compte ou mot de passe incorrect";} 
			?>
			</p>

		</div>
      
		<a class="IconePrec" href="viewVousEtes.php"><i class="fa fa-angle-left fa-fw"></i></a>

	</div>


  </div>
  
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>