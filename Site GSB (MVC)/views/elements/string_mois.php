<!-- Elément : php permettant de déduire un mois à partir d'un chiffre de 1 à 12 -->

<?php

switch ($mois) {
    case 1:
		$strmois="Janvier"; break;
    case 2:
		$strmois="Février"; break;
    case 3:
		$strmois="Mars"; break;    
	case 4:
		$strmois="Avril"; break;    
	case 5:
		$strmois="Mai"; break;	    
	case 6:
		$strmois="Juin"; break;	    
	case 7:
		$strmois="Juillet"; break;	    
	case 8:
		$strmois="Août"; break;	    
	case 9:
		$strmois="Semptembre"; break;	    
	case 10:
		$strmois="Octobre"; break;	    
	case 11:
		$strmois="Novembre"; break;	    
	case 12:
		$strmois="Décembre"; break;		
}

?>