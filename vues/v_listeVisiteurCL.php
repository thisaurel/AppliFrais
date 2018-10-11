<?php
$affiche = $pdo->selectVisiteur();
?>
<body>
<h2> Voici la liste des visiteurs Cloturé (CL) : </h2><br/>
<style>

#contenu{
  min-height: 0;
  border-left: none;
}

</style>
<div id="contenu" style="margin-top: -20px;">

<table class="listeLegere">
<tbody>
	<tr>
		<th> Code visiteur</th>
		<th> Nom</th>
		<th> Prenom</th>
		<th> Date</th>
		<th>Détails</th>
		
		<th> Validation </th>	
	</tr>
<?php foreach ($affiche as $value){
$annee = substr ($value['mois'], 0, 4); // Sous-chaîne de la valeur mois, mis dans année en prenant les 4 premiers caractères
$mois = substr ($value['mois'], 4, 2); // Sous-chaîne de la valeur mois, mis dans mois en prenant les 2 derniers caractères
$time = $mois."/".$annee; // Concaténation des deux variables
?>
	<tr>
		<td><?= $value['id']; ?></td>
		<td><?= $value['nom']; ?></td>
		<td><?= $value['prenom'];?></td>
		<td><?= $time;?></td>
		<td><a style="text-decoration: none;" href="index.php?uc=validerFicheFrais&action=afficheFrais&idVisiteur=
			<?= $value['id'].'&mois='.$value['mois']; ?>">Détails des fiches de frais </a> </td>
			<td>
        
		<a href="index.php?uc=validerFicheFrais&action=validerFicheFrais&idUser=<?= $value['id']; ?>" 
				onclick="return confirm('Voulez-vous vraiment valider cette fiche de frais');">Valider fiche</a>
		
		
				</td>

	</tr>
<?php	} ?>
</tbody>
	
</table>

</div>
</body>