<?php
include("vues/v_sommaire_comptable.php");
$idVisiteur = $_SESSION['idVisiteur'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
$va = 0;

switch($action){
	case 'RembourserVisiteur':{
		break;
    }
    
    case 'remboursementFiche':{
		$id = $_SESSION['tmp_sess'];
		$pdo->RemboursementFicheFrais($id);
		header('Location: index.php?uc=rembourserFicheFrais&action=RembourserVisiteur');
		break;
	}
	
}

include("vues/v_rembourserVisiteur.php");
