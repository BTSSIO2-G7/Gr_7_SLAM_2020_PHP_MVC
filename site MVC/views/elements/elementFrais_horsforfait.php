<!-- Elément : Affichage d'une ligne de frais hors forfait -->

<div class="ListeFrais">
	<h4>NOTE DE FRAIS HORS FORFAIT N°<?php echo $horsForfait[$i]['id']?></h4>
	<p>Date : <?php echo $horsForfait[$i]['date'], ' ', $strmois ?><p>
	<p>Montant : <?php echo $horsForfait[$i]['montant']?>€</p>
	<p>Libellé : <?php echo $horsForfait[$i]['libelle']?></p>
	
	<form method="post" action="scripts/supprimerligne_horsforfait.php">
	<input type="hidden" name="id" value=<?php echo $horsForfait[$i]['id'] ?>>
	<input type="hidden" name="mois" value=<?php echo $mois ?>>
	<input type="submit" value="Supprimer cette ligne">
	</form>

</div>


