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
	
	<!-- Fiche de frais du mois -->
		<h2 class="TitreFrais">Votre fiche de frais -  Mois <?php echo $_SESSION['mois'] ?></h2>

		<p class="Description">
		<?php if ( isset ($ficheFrais['idVisiteur']) && isset ($ficheFrais['mois']) ) {include("elements/elementFrais_fiche.php");}
		else {echo "Vous n'avez pas encore renseigné de fiche de frais pour ce mois ci.";}; // Si il n'y a pas de fiche, un message s'affiche 
		?>
		</p>

	<!-- Interface de redirection -->
		<div class="FlexElements">
  
		<!-- Nouvelle fiche -->
			<div><button onclick="window.location.href = 'index.php?etat=nouvelleligne';" class="BtnConnexion">Renseigner une nouvelle ligne de frais</button></div>
	
		<!-- Choix du mois -->
			<div>
			<?php include("elements/recherche_mois.php"); ?>
			</div>
		</div>
	
	<!-- Affichages des lignes -->

		<h2 class="TitreFrais">Ligne de frais sur forfait</h2>
		<?php include("elements/elementFrais_surforfait.php"); ?>

		<h2 class="TitreFrais">Ligne de frais hors forfait - <?php echo $resultat['nbfiche'] ?> ligne(s)</h2>
		<?php 
		for ($i=0; $i<$resultat['nbfiche']; $i++){
		include("elements/elementFrais_horsforfait.php"); }
		?>
   
	</div>
  
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>