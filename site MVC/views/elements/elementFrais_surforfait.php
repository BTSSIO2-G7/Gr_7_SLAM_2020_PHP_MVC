<!-- Elément : Affichage d'une ligne de frais sur forfait -->

<div class="ListeFrais">
	<h4>NOTE DE FRAIS SUR FORFAIT</h4>
	<p>Nombre de forfait étape : <?php echo $resultat['etape'] ?></p>
	<p>Nombre de kilomètres : <?php echo $kilo['quantite'] ?></p>
	<p>Nombre de nuitées hôtel : <?php echo $nuitee['quantite'] ?></p>
	<p>Nombre de repas restaurant : <?php echo $repas['quantite'] ?></p>
	
	<form method="post" action="editerligne.php">
	<input type="hidden" name="mois" value=<?php echo $mois ?>>
	<input type="hidden" name="etape" value=<?php echo $etape['quantite'] ?>>
	<input type="hidden" name="kilo" value=<?php echo $kilo['quantite'] ?>>
	<input type="hidden" name="nuitee" value=<?php echo $nuitee['quantite'] ?>>
	<input type="hidden" name="repas" value=<?php echo $repas['quantite'] ?>>
	<input type="submit" value="Modifier cette ligne">
	</form>
	
</div>