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

	<p class="LabelUtilisateur">Bienvenue, <?php echo $_SESSION['login'] ?></p>
  
	<p class="Erreur">
		<?php 
		if ( $erreur == true ) {echo "Erreur : Vous n'avez pas encore renseigné de fiche de frais";} 
		?>
	</p>
	
	<!-- Formulaire de création de ligne sur forfait qui implique la création d'une fiche -->
	<h2 class="TitreFrais">Nouvelle ligne de frais sur forfait</h2>
  	  
	<?php include("views/elements/form_surforfait.php"); ?>

	<!-- Formulaire de création de ligne hors forfait : impossible sans fiche de frais -->
	<h2 class="TitreFrais">Nouvelle ligne de frais hors forfait</h2>

	<?php include("views/elements/form_horsforfait.php"); ?>

  </div>
  
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>