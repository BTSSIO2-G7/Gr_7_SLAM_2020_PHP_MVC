<?php session_start(); 

function errorCheck() {
	if (!isset($_SESSION['auth'])) {
	header('Location: index.php?etat=erreur');
	} 

}

function idCheck() {

$bdd = new PDO('mysql:host=192.177.1.13:3306;dbname=gsbV2;charset=utf8', 'gsbclient', 'passwordclient');
$dblogin=$bdd->query('SELECT login FROM visiteur')->fetchAll(PDO::FETCH_COLUMN);
$dbmdp=$bdd->query('SELECT mdp FROM visiteur')->fetchAll(PDO::FETCH_COLUMN);


if ( isset($_POST['pw']) && isset($_POST['login']) ) {
$pw=$_POST['pw'];
$login=$_POST['login'];

for ($i=0; $i<count($dblogin); $i++){

	if ($login == $dblogin[$i] && $pw == $dbmdp[$i]) {
	session_start();
	$auth=true;
	$_SESSION['auth']=$auth;
	$_SESSION['login']=$login;
	$nomcomplet=$bdd->prepare("SELECT id, nom, prenom FROM visiteur WHERE login = ?");
	$nomcomplet->execute(array($login));
	
	while($donnees=$nomcomplet->fetch()){
		$_SESSION['idVisiteur']=$donnees['id'];
		$_SESSION['nom']=$donnees['nom'];
		$_SESSION['prenom']=$donnees['prenom'];
		
		}
	
	header('Location: index.php?etat=bienvenuevisiteur');
	}
	
	else {
		$idCorrecte=false;
		}	
	}
}

}

function fraisSelect() {

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'gsbclient', 'passwordclient');
$mois=$_SESSION['mois'];

$donnees=$bdd->prepare('SELECT COUNT(id) FROM lignefraishorsforfait WHERE mois=? AND idVisiteur=?');
$donnees->execute(array($mois,$_SESSION['idVisiteur']));
$resultat['nbfiche']=$donnees->fetchColumn();

$donnees=$bdd->prepare('SELECT * FROM lignefraishorsforfait WHERE mois=? AND idVisiteur=?');
$donnees->execute(array($mois,$_SESSION['idVisiteur']));
$resultat['horsforfait']=$donnees->fetchAll();

$donnees=$bdd->prepare('SELECT quantite FROM lignefraisforfait WHERE mois=? AND idVisiteur=? AND idFraisForfait=?');
$donnees->execute(array($mois,$_SESSION['idVisiteur'],'ETP'));
$resultat['etape']=$donnees->fetch();

$donnees=$bdd->prepare('SELECT * FROM lignefraisforfait WHERE mois=? AND idVisiteur=? AND idFraisForfait=?');
$donnees->execute(array($mois,$_SESSION['idVisiteur'],'KM'));
$resultat['kilo']=$donnees->fetch();

$donnees=$bdd->prepare('SELECT * FROM lignefraisforfait WHERE mois=? AND idVisiteur=? AND idFraisForfait=?');
$donnees->execute(array($mois,$_SESSION['idVisiteur'],'NUI'));
$resultat['nuitee']=$donnees->fetch();

$donnees=$bdd->prepare('SELECT * FROM lignefraisforfait WHERE mois=? AND idVisiteur=? AND idFraisForfait=?');
$donnees->execute(array($mois,$_SESSION['idVisiteur'],'REP'));
$resultat['repas']=$donnees->fetch();

$donnees=$bdd->prepare('SELECT * FROM fichefrais WHERE idVisiteur=:idVisiteur AND mois=:mois');
$donnees->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois']
	));
$resultat['ficheFrais']=$donnees->fetch();

return $resultat;

}


function fraisForfaitUpdate() {
$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'gsbclient', 'passwordclient');

$update = $bdd->prepare('UPDATE lignefraisforfait SET quantite = :etape WHERE mois = :mois AND idFraisForfait = :ETP AND idVisiteur = :idVisiteur');
$update->execute(array(
	'etape' => $_POST['etape'],
	'mois' => $_POST['mois'],
	'ETP' => 'ETP',
	'idVisiteur' => $_SESSION['idVisiteur']
	)); // Mise à jour de la ligne forfait du formulaire

$update = $bdd->prepare('UPDATE lignefraisforfait SET quantite = :kilo WHERE mois = :mois AND idFraisForfait = :KM AND idVisiteur = :idVisiteur');
$update->execute(array(
	'kilo' => $_POST['kilo'],
	'mois' => $_POST['mois'],
	'KM' => 'KM',
	'idVisiteur' => $_SESSION['idVisiteur']
	)); // Mise à jour de la ligne forfait du formulaire	

$update = $bdd->prepare('UPDATE lignefraisforfait SET quantite = :nuitee WHERE mois = :mois AND idFraisForfait = :NUI AND idVisiteur = :idVisiteur');
$update->execute(array(
	'nuitee' => $_POST['nuitee'],
	'mois' => $_POST['mois'],
	'NUI' => 'NUI',
	'idVisiteur' => $_SESSION['idVisiteur']
	)); // Mise à jour de la ligne forfait du formulaire

$update = $bdd->prepare('UPDATE lignefraisforfait SET quantite = :repas WHERE mois = :mois AND idFraisForfait = :REP AND idVisiteur = :idVisiteur');
$update->execute(array(
	'repas' => $_POST['repas'],
	'mois' => $_POST['mois'],
	'REP' => 'REP',
	'idVisiteur' => $_SESSION['idVisiteur']
	)); // Mise à jour de la ligne forfait du formulaire
	
$montantFrais=$bdd->query('SELECT montant FROM fraisforfait')->fetchAll(PDO::FETCH_COLUMN);
$montantValide=($montantFrais[0]*$_POST['etape'])+($montantFrais[1]*$_POST['kilo'])+($montantFrais[2]*$_POST['nuitee'])+($montantFrais[3]*$_POST['repas']); // Calcul du montant validé grâce aux infos

$update = $bdd->prepare('UPDATE fichefrais SET montantValide = :montantValide, dateModif = :dateModif, idEtat = :idEtat WHERE idVisiteur = :idVisiteur AND mois = :mois');
$update->execute(array(
	'montantValide' => $montantValide,
	'dateModif' => date('d-m-Y'),
	'idEtat' => 'CR',
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois']
	)); // Mise à jour d'une fiche frais
}


function nouvelleLigneHorsForfait() {

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'gsbclient', 'passwordclient');

$donnees=$bdd->prepare('SELECT * FROM fichefrais WHERE idVisiteur=:idVisiteur AND mois=:mois');
$donnees->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois']
	));
$ficheFrais=$donnees->fetch(); // Sélection de la fiche de frais de l'utilisateur

if (isset($ficheFrais['idVisiteur']) && isset($ficheFrais['mois']) ) { // Conditionnelle : Si il y a une fiche de frais, faire :

$insert = $bdd->prepare('INSERT INTO lignefraishorsforfait(idVisiteur,mois,libelle,date,montant) VALUES(:idVisiteur,:mois,:libelle,:date,:montant)');
$insert->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	'libelle' => $_POST['libelle'],
	'date' => $_POST['date'],
	'montant' => $_POST['montant']
	)); // Insérer les infos écrites dans la base de données gsbV2

$update = $bdd->prepare('UPDATE fichefrais SET montantValide = montantValide + :montant WHERE idVisiteur = :idVisiteur AND mois = :mois');
$update->execute(array(
	'montant' => $_POST['montant'],
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	)); // Mise à jour du montant validé

$update = $bdd->prepare('UPDATE fichefrais SET nbJustificatifs = nbJustificatifs + 1 WHERE idVisiteur = :idVisiteur AND mois = :mois');
$update->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	)); // Mise à jour du nombre de justificatifs (+1)
 // Redirection vers la page de bienvenue
}

else { // Si il n'y a pas de fiche de frais, redirection vers la page précédente
header ('Location: index.php?etat=erreurhorsforfait');	
}
}


function nouvelleLigneSurForfait() {

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'gsbclient', 'passwordclient');

$insert = $bdd->prepare('INSERT INTO lignefraisforfait VALUES(:idVisiteur,:mois,:idFrais,:quantite)');
$insert->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	'idFrais' => 'ETP',
	'quantite' => $_POST['etape']
	)); // Insertion dans ligne forfait du formulaire
	
	
$insert = $bdd->prepare('INSERT INTO lignefraisforfait VALUES(:idVisiteur,:mois,:idFrais,:quantite)');
$insert->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	'idFrais' => 'KM',
	'quantite' => $_POST['kilo']
	)); // De même
	
$insert = $bdd->prepare('INSERT INTO lignefraisforfait VALUES(:idVisiteur,:mois,:idFrais,:quantite)');
$insert->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	'idFrais' => 'NUI',
	'quantite' => $_POST['nuitee']
	)); // De même
	
$insert = $bdd->prepare('INSERT INTO lignefraisforfait VALUES(:idVisiteur,:mois,:idFrais,:quantite)');
$insert->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	'idFrais' => 'REP',
	'quantite' => $_POST['repas']
	)); // De même
	
$montantFrais=$bdd->query('SELECT montant FROM fraisforfait')->fetchAll(PDO::FETCH_COLUMN);
$montantValide=($montantFrais[0]*$_POST['etape'])+($montantFrais[1]*$_POST['kilo'])+($montantFrais[2]*$_POST['nuitee'])+($montantFrais[3]*$_POST['repas']); // Calcul du montant validé grâce aux infos

$insert = $bdd->prepare('INSERT INTO fichefrais(idVisiteur,nbJustificatifs,montantValide,dateModif,mois,idEtat) VALUES(:idVisiteur,:nbJustificatifs,:montantValide,:dateModif,:mois,:idEtat)');
$insert->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'nbJustificatifs' => "0",
	'montantValide' => $montantValide,
	'dateModif' => date('d-m-Y'),
	'mois' => $_POST['mois'],
	'idEtat' => 'CR'
	)); // Création d'une fiche frais

}


function supprimerLigneHorsForfait() {

$bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'gsbclient', 'passwordclient');

$donnees=$bdd->prepare('SELECT * FROM lignefraishorsforfait WHERE idVisiteur=:idVisiteur AND mois=:mois AND id = :id');
$donnees->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois'],
	'id' => $_POST['id']
	));
$ligneFrais=$donnees->fetch(); // Sélection de la fiche de frais de l'utilisateur

$donnees=$bdd->prepare('SELECT * FROM fichefrais WHERE idVisiteur=:idVisiteur AND mois=:mois');
$donnees->execute(array(
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois']
	));
$ficheFrais=$donnees->fetch(); // Sélection de la fiche de frais de l'utilisateur

$donnees=$bdd->prepare('DELETE FROM lignefraishorsforfait WHERE id = ?');
$donnees->execute(array($_POST['id'])); // Suppression de la ligne impliquée grâce à ce qui est envoyé en POST


$nouveauMontant = $ficheFrais['montantValide'] - $ligneFrais['montant'];
echo $nouveauMontant;

$update = $bdd->prepare('UPDATE fichefrais SET montantValide = :montantValide, dateModif = :dateModif, idEtat = :idEtat, nbJustificatifs = :nbJustificatifs WHERE idVisiteur = :idVisiteur AND mois = :mois');
$update->execute(array(
	'montantValide' => $nouveauMontant,
	'dateModif' => date('d-m-Y'),
	'idEtat' => 'CR',
	'nbJustificatifs' => $ficheFrais['nbJustificatifs']-1, 
	'idVisiteur' => $_SESSION['idVisiteur'],
	'mois' => $_POST['mois']
	)); // Mise à jour d'une fiche frais
	
}

?>
