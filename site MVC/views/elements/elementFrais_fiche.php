<!-- Elément : Affichage d'une fiche de frais-->

<div class="ListeFrais">
	<p>Nom : <?php echo $_SESSION['nom'], ' ', $_SESSION['prenom']?></p>
	<p>Nombre de justificatifs : <?php echo $ficheFrais['nbJustificatifs']?><p>
	<p>Montant validé : <?php echo $ficheFrais['montantValide']?>€</p>
	<p>Date de modification : <?php echo $ficheFrais['datemodif']?></p>
	<p>Mois : <?php echo $strmois?></p>
	<p>Etat : <?php echo $ficheFrais['idEtat']?></p>
</div>