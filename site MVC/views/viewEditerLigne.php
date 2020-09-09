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

	<!-- Formulaire de création de ligne sur forfait qui implique la création d'une fiche -->
	<h2 class="TitreFrais">Modifer une ligne de frais sur forfait</h2>
  	  
	<!-- Elément : Insertion d'une ligne sur forfait dans la BDD -->

<form method="post" action="scripts/editerligne_surforfait.php">

  <div class="FlexRenseignement">
	
	<input type="hidden" name="mois" value=<?php echo $_POST['mois'] ?>>

	<label for="montant">Forfait étape (110€)</label>
	<input type="number" name="etape" min="0" value=<?php echo $_POST['etape']?> required="required" >
	
	<label for="montant">Frais kilométrique (1€/km)</label>
	<input type="number" name="kilo" min="0" value=<?php echo $_POST['kilo']?> required="required">
	
	<label for="montant">Nuitée hôtel (80€)</label>
	<input type="number" name="nuitee" min="0" value=<?php echo $_POST['nuitee']?> required="required">
	
	<label for="montant">Repas restaurant (25€)</label>
	<input type="number" name="repas" min="0" value=<?php echo $_POST['repas']?> required="required">
  
   <input type="submit" value="Modifier une fiche de frais" class="BtnConnexion">
   

  </div>
  
</form>

  </div>
  
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>