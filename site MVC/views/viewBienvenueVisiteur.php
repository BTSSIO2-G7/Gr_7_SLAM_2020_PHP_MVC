<?php session_start(); 
if (isset($_SESSION['auth']) == false) {
	header('Location: scripts/erreur.php');
	} // Sécurité : Si l'utilisateur tente d'accéder à cette page sans être authentifié, il accède une page différente.
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Métadonnées -->
	
    <meta charset="UTF-8">
    <title>Mon Profil - GSB</title>
	
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
  
  <?php include("elements/navbar_connected.php"); ?>


  <!-- Début du corps de la page -->
	<div class="FlexPage">
  
		<div class="FlexProfil">
  
			<div class="ProfilElements">
				<img src="assets/utilisateur.png" alt="util" class="ImageProfil">
				<p class="Description"><?php echo $_SESSION['nom'] ?>, <?php echo $_SESSION['prenom'] ?></p>
			</div>
  
  <!-- Choix de l'option -->
			<div class="ProfilElements">
		
				<div><button onclick="window.location.href = 'fraischoixmois.php';" class="BtnConnexion">Accéder à mes fiches de frais</button></div>
		
				<div><button onclick="window.location.href = 'nouvelleligne.php';" class="BtnConnexion">Renseigner une ligne de frais</button></div>
		
				<div><button onclick="window.location.href = 'scripts/deconnexion.php';" class="BtnConnexion">Me déconnecter</button></div>
		
			</div>
  
		</div>

	</div>
  <!-- Pied de page -->
  
  <?php include("elements/footer.php"); ?>

  </body>
 </html>