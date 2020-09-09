<?php
require('models/model.php');

function bienvenue() {
	require 'views/viewBienvenue.php';
}

function vousEtes() {
	require 'views/viewVousEtes.php';
}

function idVisiteur() {
	IdCheck();
	
	require 'views/viewIdentificationVisiteur.php';

}

function frais() {
	FraisSelect();
	require 'views/viewFrais.php';
}

?>