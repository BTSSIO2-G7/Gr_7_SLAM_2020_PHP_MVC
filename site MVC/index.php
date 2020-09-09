<?php 
require('controllers/controller.php');

if (isset($_GET['etat'])) {
	switch($_GET['etat']) {
		case 'vousetes' :
			vousEtes();
		case 'visiteurmedical' :
			idVisiteur();
	}
}
else {
	bienvenue();
}

?>