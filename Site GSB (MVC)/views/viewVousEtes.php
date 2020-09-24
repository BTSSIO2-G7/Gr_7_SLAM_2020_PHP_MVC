<?php $bdd = new PDO('mysql:host=192.177.1.13:3306;dbname=gsbV2;charset=utf8', 'admindb', 'password');
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
    <!-- Métadonnées -->
	
    <meta charset="UTF-8">
    <title>Connexion - GSB</title>
	
	<!-- Pointage vers le style.css -->
    <link rel="stylesheet" href="views/css/style.css">
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
			
			<!-- Choix du métier : visiteur ou comptable (comptable ne mène à rien pour le moment) -->
			<p class="Description">Vous êtes</p>
  
			<div class="FlexChoixUtil">
  
				<a href="index.php?etat=visiteurmedical" class="ChoixUtil">
				<p>Visiteur médical</p>
				</a>
  
				<a class="ChoixUtil">
				<p>Comptable</p>
				</a>
  
			</div>
			
		</div>

	</div>
	  
	<!-- Pied de page -->
	  
	<?php include("elements/footer.php"); ?>

  </body>
 </html>
