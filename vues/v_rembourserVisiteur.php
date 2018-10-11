<?php
$affiche = $pdo->selectVisiteurValidation();

?>
<body>
    <h2>Voici la liste des visiteurs Validé (VA) : </h2><br>
    <style>

#contenu{
  min-height: 0;
  border-left: none;
}

</style>
<div id="contenu" style="margin-top: -20px;">

<?php

if(!empty($affiche)){
    ?>

    
<table class="listeLegere">
<tbody>
	<tr>
		<th> Code visiteur</th>
		<th> Nom</th>
		<th> Prenom</th>
		<th> Date</th>
		<th> Remboursement </th>	
	</tr>
<?php foreach ($affiche as $value){
$annee = substr ($value['mois'], 0, 4); // Sous-chaîne de la valeur mois, mis dans année en prenant les 4 premiers caractères
$mois = substr ($value['mois'], 4, 2); // Sous-chaîne de la valeur mois, mis dans mois en prenant les 2 derniers caractères
$time = $mois."/".$annee; // Concaténation des deux variables
$_SESSION['tmp_sess'] = $value['id'];
?>
	<tr>
		<td><?= $value['id']; ?></td>
		<td><?= $value['nom']; ?></td>
		<td><?= $value['prenom'];?></td>
		<td><?= $time;?></td>
        <td>        
		<a href="index.php?uc=rembourserFicheFrais&action=remboursementFiche&idUser=<?= $value['id']; ?>" 
				onclick="return confirm('Voulez-vous vraiment rembourser cette fiche de frais');">Rembourser fiche</a>
		</td>

	</tr>
<?php	} ?>
</tbody>
	
</table>

    <?php
} else {
    echo "Aucune fiche en attente d'un remboursement";
}

?>


</div>
</body>