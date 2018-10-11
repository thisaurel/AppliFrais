<style>

#contenu{
  min-height: 0;
  border-left: none;
}

</style>
<div id="contenu" style="margin-top: -35px;">
<h3>Fiche de hors frais du mois <?php echo $numMois."-".$numAnnee?> : </h3>
<?php
$fraishorsforfait = $pdo->selectlignefraishorsforfait();
?>
<body>
<table class="listeLegere">
  <tr>
    <th> code visiteur</th>
    <th> Mois</th>
    <th> Libelle</th>
    <th> Date </th>
    <th> Montant </th>
    <th> modifier </th>
  </tr>
<?php foreach ($fraishorsforfait as $value){
$annee = substr ($value['mois'], 0, 4); // Sous-chaîne de la valeur mois, mis dans année en prenant les 4 premiers caractères
$mois = substr ($value['mois'], 4, 2); // Sous-chaîne de la valeur mois, mis dans mois en prenant les 2 derniers caractères
$time = $mois."/".$annee; // Concaténation des deux variables
// <td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id 
?>
  <tr>
    <td><?php echo $value['idVisiteur']; ?></td>
    <td><?php echo $time;?></td>
    <td><?php echo $value['libelle']; ?></td>
    <td><?php echo $value['date']; ?></td>
    <td><?php echo $value['montant']."€";?></td>
   <td><a href="index.php?uc=validerFicheFrais&action=supprimerFrais&idFrais=<?php echo $value['id'] ?>" 
        onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
  </tr>
<?php } ?>
</table>
</body>
  </div>
  </div>