<?php 
require('controllers/controller.php');

if (isset($_GET['etat'])) {
		
	switch($_GET['etat']) {
		case 'vousetes' :
			vousEtes();
			break;
		case 'visiteurmedical' :
			idVisiteur();
			break;
		case 'bienvenuevisiteur' :
			bienvenueVisiteur();
			break;
		case 'erreur' :
			erreur();
			break;
		case 'fraischoixmois' :
			fraisChoixMois();
			break;
		case 'nouvelleligne' :
			nouvelleLigne();
			break;
		case 'lignesurforfait' :
			ligneSurForfait();
			break;
		case 'lignehorsforfait' :
			ligneHorsForfait();
			break;
		case 'frais' :
			$_SESSION['mois']=$_POST['mois'];
			frais();
			break;
		case 'deconnexion' :
			deconnexion();
			break;
		case 'editerligneaffichage' :
			editerLigneAffichage();
			break;
		case 'editerligne' :
			editerLigne();
			break;
		case 'supprimerligne' :
			supprimerLigne();
			break;
	}
}
else {
	bienvenue();
}

?>