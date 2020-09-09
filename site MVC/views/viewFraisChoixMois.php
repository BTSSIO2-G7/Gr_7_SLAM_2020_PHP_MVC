<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Métadonnées -->
	
    <meta charset="UTF-8">
    <title>Fiches de frais - GSB</title>
	
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
  
	<?php include("elements/navbar_connected.php"); ?>


  <!-- Début du corps de la page -->
  
	<div class="FlexPage">
  
		<p class="LabelUtilisateur">Bienvenue, <?php echo $_SESSION['login']; ?></p>
  
		<h2 class="TitreFrais">Vos fiches de frais</h2>
  
	<div class="FlexElements">
		
		<!-- Recherche du mois demandé -->
		<div><?php include("elements/recherche_mois.php"); ?></div>
		
	</div>
	
  </div>
  
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>