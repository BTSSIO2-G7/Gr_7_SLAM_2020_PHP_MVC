<?php
require('models/model.php');

function bienvenue() {
	require 'views/viewBienvenue.php';
}

function vousEtes() {
	require 'views/viewVousEtes.php';
}

function idVisiteur() {
	$auth=true;
	idCheck();
	
	require 'views/viewIdentificationVisiteur.php';
}

function bienvenueVisiteur() {
	require 'views/viewBienvenueVisiteur.php';
}

function erreur() {
	require 'views/viewErreur.php';
}

function fraisChoixMois() {
	require 'views/viewFraisChoixMois.php';
}

function frais() {
	fraisSelect();
	require 'views/viewFrais.php';

}

function nouvelleLigne() {
	require 'views/viewNouvelleLigne.php';
}

function ligneSurForfait() {
	nouvelleLigneSurForfait();
	require 'views/viewBienvenueVisiteur.php';
}

function ligneHorsForfait() {
	nouvelleLigneHorsForfait();
}

function deconnexion() {
// Ce php détruit la session actuelle, déconnectant l'utilisateur. 
session_destroy();
header ('Location: ../index.php');
}

?>