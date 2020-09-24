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
			erreur();
			bienvenueVisiteur();
			break;
		case 'erreur' :
			affichageErreur();
			break;
		case 'fraischoixmois' :
			erreur();
			fraisChoixMois();
			break;
		case 'nouvelleligne' :
			erreur();
			nouvelleLigne();
			break;
		case 'lignesurforfait' :
			erreur();
			ligneSurForfait();
			break;		
		case 'lignehorsforfait' :
			erreur();
			ligneHorsForfait();
			break;
		case 'erreurhorsforfait' :
			erreur();
			horsForfaitErreur();
			break;
		case 'frais' :
			erreur();
			$_SESSION['mois']=$_POST['mois'];
			frais();
			break;
		case 'deconnexion' :
			erreur();
			deconnexion();
			break;
		case 'editerligneaffichage' :
			erreur();
			editerLigneAffichage();
			break;
		case 'editerligne' :
			erreur();
			editerLigne();
			break;
		case 'supprimerligne' :
			erreur();
			supprimerLigne();
			break;
	}
}
else {
	bienvenue();
}

?>