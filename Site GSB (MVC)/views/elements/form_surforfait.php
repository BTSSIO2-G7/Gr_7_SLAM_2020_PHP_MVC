<!-- Elément : Insertion d'une ligne sur forfait dans la BDD -->

<form method="post" action="index.php?etat=lignesurforfait">

  <div class="FlexRenseignement">
	
	<p class="Description">Ce formulaire crée une fiche de forfait correspondant au mois renseigné. Insérez une valeur pour chaque champ.</p>

	<?php include("form_mois.php"); ?>
	
	<label for="etape">Forfait étape (110€)</label>
	<input type="number" name="etape" min="0" value="0" required="required" >
	
	<label for="kilo">Frais kilométrique (1€/km)</label>
	<input type="number" name="kilo" min="0" value="0" required="required">
	
	<label for="nuitee">Nuitée hôtel (80€)</label>
	<input type="number" name="nuitee" min="0" value="0" required="required">
	
	<label for="repas">Repas restaurant (25€)</label>
	<input type="number" name="repas" min="0" value="0" required="required">
  
   <input type="submit" value="Créer une fiche de frais" class="BtnConnexion">
   

  </div>
  
</form>