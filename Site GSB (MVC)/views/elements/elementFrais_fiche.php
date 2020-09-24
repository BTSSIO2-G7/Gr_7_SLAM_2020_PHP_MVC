<!-- Elément : Affichage d'une fiche de frais-->

<div class="ListeFrais">
	<p>Nom : <?php echo $_SESSION['nom'], ' ', $_SESSION['prenom']?></p>
	<p>Nombre de justificatifs : <?php echo $resultat['ficheFrais']['nbJustificatifs']?><p>
	<p>Montant validé : <?php echo $resultat['ficheFrais']['montantValide']?>€</p>
	<p>Date de modification : <?php echo $resultat['ficheFrais']['datemodif']?></p>
	<p>Mois : <?php echo $resultat['ficheFrais']['mois']?></p>
	<p>Etat : <?php echo $resultat['ficheFrais']['idEtat']?></p>
</div>