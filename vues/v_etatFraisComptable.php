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

    <?php

    $var = $value['libelle'];

    $rest = substr($var, 0, 9);

    if($rest == "[REFUSÉ]"){

    } else {
?>
   <td><a href="index.php?uc=validerFicheFrais&action=supprimerFrais&idFrais=<?= $value['id'] ?>" 
        onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a></td>
 
<?php
    }

    ?>



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
$_SESSION['tmp_sess'] = $value['idVisiteur'];

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


</body>
  </div>
  </div>