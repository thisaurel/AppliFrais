<style>

#contenu{
  min-height: 0;
  border-left: none;
}

#encadre{
  border: 2px black;
}

</style>
<div id="contenu" style="margin-top: -35px;">
<hr>
<h3>Fiche de hors-forfait du mois <?= $_GET['mois'] ?> de <?= $_GET['idVisiteur'] ?>: </h3>
<?php
$fraishorsforfait = $pdo->selectlignefraishorsforfait();
?>
<body>

<table class="listeLegere">
  <tr>
    <th> Code Visiteur</th>
    <th> Mois</th>
    <th> Libelle</th>
    <th> Date </th>
    <th> Montant </th>
    <th> Supprimer </th>
  </tr>
<?php foreach ($fraishorsforfait as $value){
$annee = substr ($value['mois'], 0, 4); // Sous-chaîne de la valeur mois, mis dans année en prenant les 4 premiers caractères
$mois = substr ($value['mois'], 4, 2); // Sous-chaîne de la valeur mois, mis dans mois en prenant les 2 derniers caractères
$time = $mois."/".$annee; // Concaténation des deux variables
?>
  <tr>
    <td><?= $value['idVisiteur']; ?></td>
    <td><?= $time;?></td>
    <td><?= $value['libelle']; ?></td>
    <td><?= $value['date']; ?></td>
    <td><?= $value['montant']."€";?></td>
   <td><a href="index.php?uc=validerFicheFrais&action=supprimerFrais&idFrais=<?= $value['id'] ?>" 
        onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
  </tr>
<?php } ?>
</table>

<h3>Fiche de forfait du mois <?= $_GET['mois'] ?> de <?= $_GET['idVisiteur'] ?>: </h3>
<?php
$fraisforfait = $pdo->selectlignefraisforfait();
?>

<table class="listeLegere">
  <tr>
    <th> Code Visiteur</th>
    <th> Mois</th>
    <th> Libelle</th>
    <th> Quantite </th>
    
  </tr>
<?php foreach ($fraisforfait as $value){

$annee = substr ($value['mois'], 0, 4); // Sous-chaîne de la valeur mois, mis dans année en prenant les 4 premiers caractères
$mois = substr ($value['mois'], 4, 2); // Sous-chaîne de la valeur mois, mis dans mois en prenant les 2 derniers caractères
$time = $mois."/".$annee; // Concaténation des deux variables
?>
  <tr>
    <td><?= $value['idVisiteur']; ?></td>
    <td><?= $value['mois']; ?></td>
    <td><?= $value['libelle']; ?></td>
    <td><?= $value['quantite']; ?></td>
  </tr>
<?php } ?>
</table>
<br>

<style>
.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #dcecfb;
	-webkit-box-shadow:inset 0px 1px 0px 0px #dcecfb;
	box-shadow:inset 0px 1px 0px 0px #dcecfb;
	background-color:#bddbfa;
	-moz-border-radius:16px;
	-webkit-border-radius:16px;
	border-radius:16px;
	border:1px solid #84bbf3;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:12px 57px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
}
.myButton:hover {
	background-color:#80b5ea;
}
.myButton:active {
	position:relative;
	top:1px;
} 
</style>

<a href="#" class="myButton">Valider fiche</a>

</body>
  </div>
  </div>