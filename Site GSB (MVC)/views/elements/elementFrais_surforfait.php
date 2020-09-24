<!-- Elément : Affichage d'une ligne de frais sur forfait -->

<div class="ListeFrais">
	<h4>NOTE DE FRAIS SUR FORFAIT</h4>
	<p>Nombre de forfait étape : <?php echo $resultat['etape']['quantite'] ?></p>
	<p>Nombre de kilomètres : <?php echo $resultat['kilo']['quantite'] ?></p>
	<p>Nombre de nuitées hôtel : <?php echo $resultat['nuitee']['quantite'] ?></p>
	<p>Nombre de repas restaurant : <?php echo $resultat['repas']['quantite'] ?></p>
	
	<form method="post" action="index.php?etat=editerligneaffichage">
	<input type="hidden" name="mois" value=<?php echo $_SESSION['mois'] ?>>
	<input type="hidden" name="etape" value=<?php echo $resultat['etape']['quantite'] ?>>
	<input type="hidden" name="kilo" value=<?php echo $resultat['kilo']['quantite'] ?>>
	<input type="hidden" name="nuitee" value=<?php echo $resultat['nuitee']['quantite'] ?>>
	<input type="hidden" name="repas" value=<?php echo $resultat['repas']['quantite'] ?>>
	<input type="submit" value="Modifier cette ligne">
	</form>
	
</div>