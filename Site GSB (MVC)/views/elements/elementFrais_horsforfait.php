<!-- Elément : Affichage d'une ligne de frais hors forfait -->

<div class="ListeFrais">
	<h4>NOTE DE FRAIS HORS FORFAIT N°<?php echo $resultat['horsforfait'][$i]['id']?></h4>
	<p>Date : <?php echo $resultat['horsforfait'][$i]['date'], '/', $_SESSION['mois'] ?><p>
	<p>Montant : <?php echo $resultat['horsforfait'][$i]['montant']?>€</p>
	<p>Libellé : <?php echo $resultat['horsforfait'][$i]['libelle']?></p>
	
	<form method="post" action="index.php?etat=supprimerligne">
	<input type="hidden" name="id" value=<?php echo $resultat['horsforfait'][$i]['id'] ?>>
	<input type="hidden" name="mois" value=<?php echo $_SESSION['mois'] ?>>
	<input type="submit" value="Supprimer cette ligne">
	</form>

</div>


