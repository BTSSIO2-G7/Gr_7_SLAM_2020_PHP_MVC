<?php
require('models/model.php');

function bienvenue() {
	require 'views/viewBienvenue.php';
}

function vousEtes() {
	require 'views/viewVousEtes.php';
}

function idVisiteur() {
	$idCorrecte=true;
	idCheck();
	
	require 'views/viewIdentificationVisiteur.php';
}

function bienvenueVisiteur() {
	require 'views/viewBienvenueVisiteur.php';
}

function erreur() {
	errorCheck();
}

function fraisChoixMois() {
	require 'views/viewFraisChoixMois.php';
}

function frais() {
	$resultat=fraisSelect();
	require 'views/viewFrais.php';

}

function nouvelleLigne() {
	require 'views/viewNouvelleLigne.php';
}

function editerLigneAffichage() {
	require 'views/viewEditerLigne.php';
}

function editerLigne() {
	fraisForfaitUpdate();
	require 'views/viewBienvenueVisiteur.php';
}

function supprimerLigne() {
	supprimerLigneHorsForfait();
	require 'views/viewBienvenueVisiteur.php';
}

function ligneSurForfait() {
	nouvelleLigneSurForfait();
	require 'views/viewBienvenueVisiteur.php';
}

function ligneHorsForfait() {
	nouvelleLigneHorsForfait();
	require 'views/viewBienvenueVisiteur.php';
}

function deconnexion() {
// Ce php détruit la session actuelle, déconnectant l'utilisateur. 
session_destroy();
header ('Location: index.php');
}

?>