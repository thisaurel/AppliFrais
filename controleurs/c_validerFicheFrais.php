<?php
include("vues/v_sommaire_comptable.php");
$idVisiteur = $_SESSION['idVisiteur'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
$va = 0;

switch($action){
	case 'choisirVisiteur':{
		break;
	}
	case 'afficheFrais':{
		$va = 1;
		break;
	}
	case 'saisirFrais':{
		if($pdo->estPremierFraisMois($idVisiteur,$mois)){
			$pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
		}
		break;
	}
	case 'validerCreationFrais':{
		$dateFrais = $_REQUEST['dateFrais'];
		$libelle = $_REQUEST['libelle'];
		$montant = $_REQUEST['montant'];
		valideInfosFrais($dateFrais,$libelle,$montant);
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
		else{
			$pdo->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
		}
		break;
	}
	case 'supprimerFrais':{
		$idVisiteur = $_SESSION['idVisiteur'];
		$mois = $_SESSION['mois'];
		$numAnnee =substr( $mois,0,4);
		$numMois =substr( $mois,4,2);
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
		$idFrais = $_REQUEST['idFrais'];
		$pdo->supprimerFraisHorsForfait($idFrais);
		header('Location: '. $_SERVER['HTTP_REFERER']);
		break;
	}
	case 'validerFicheFrais':{
		$id = $_SESSION['tmp_sess'];
		$pdo->miseAjourFicheFraisValidation($id);
		header('Location: index.php?uc=validerFicheFrais&action=choisirVisiteur');
		break;
	}
	case 'validerMajFraisForfait':{
		$lesFrais = $_REQUEST['lesFrais'];
		if(lesQteFraisValides($lesFrais)){
			   $pdo->majFraisForfaitComptable($_GET['idVisiteur'], $mois, $lesFrais);
			   header('Location: index.php?uc=validerFicheFrais&action=afficheFrais&idVisiteur='.$_GET['idVisiteur'].'&mois='.$mois);
		} else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
		break;
	}
}

include("vues/v_listeVisiteurCL.php");

if($va == 1){
$idVisiteur = $_SESSION['idVisiteur'];
$mois = $_SESSION['mois'];
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);


include("vues/v_etatFraisComptable.php");
}


?>