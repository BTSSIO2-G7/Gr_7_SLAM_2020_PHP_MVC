<!-- Elément : Formulaire d'insertion de ligne hors forfait dans la BDD -->

<form method="post" action="scripts/nouvelleligne_horsforfait.php">
  
  <div class="FlexRenseignement">
	
	<p class="Description">Pour renseigner une ligne hors forfait, veuillez d'abord créer une fiche forfait correspondant au mois grâce au formulaire précédent.</p>
  
	<?php include("elements/form_mois.php"); ?>

    <label for="date">Date :</label>
    <input type="number" name="date" min="1" max="31">
	
	<label for="montant">Montant : </label>
	<input type="number" name="montant" min="0">
  
	<label for="libelle">Libellé : </label>
	<input type="text" name="libelle">


  <input type="submit" value="Ajouter une ligne hors forfait" class="BtnConnexion">
  
  
  </div>
  
</form>