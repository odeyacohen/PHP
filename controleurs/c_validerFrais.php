<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$mois = selectMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$idVisiteur=$_SESSION['idVisiteur'];

switch ($action) {

    case 'selectUser':
        $lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
        $listeVisiteur = $pdo-> selectVisiteur();
        $listeMois = $pdo->selectMois();
        
        $lesCles = array_keys($listeMois);
        $moisASelectionner = $lesCles[0];
        // var_dump($mois) ;
         //var_dump($listeMois) ;

    require 'vues/v_listeUserMois.php';
    break;

    case ' voirFrais':


    require 'vues/v_listeFraisForfait.php';
    require 'vues/v_listeFraisHorsForfait.php';
    break;
}


?>