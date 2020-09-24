<?php 
if (!session_id()) {session_start(); } 
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Métadonnées -->
	
    <meta charset="UTF-8">
    <title>Mon Profil - GSB</title>
	
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
  
		<div class="FlexProfil">
  
			<div class="ProfilElements">
				<img src="views/assets/utilisateur.png" alt="util" class="ImageProfil">
				<p class="Description"><?php echo $_SESSION['nom'] ?>, <?php echo $_SESSION['prenom'] ?></p>
			</div>
  
  <!-- Choix de l'option -->
			<div class="ProfilElements">
		
				<div><button onclick="window.location.href = 'index.php?etat=fraischoixmois';" class="BtnConnexion">Accéder à mes fiches de frais</button></div>
		
				<div><button onclick="window.location.href = 'index.php?etat=nouvelleligne';" class="BtnConnexion">Renseigner une ligne de frais</button></div>
		
				<div><button onclick="window.location.href = 'index.php?etat=deconnexion';" class="BtnConnexion">Me déconnecter</button></div>
		
			</div>
  
		</div>

	</div>
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>