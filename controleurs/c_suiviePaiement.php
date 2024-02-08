<?php


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);



$mois = selectMois(date('d/m/Y'));
// $numAnnee = substr($mois, 0, 4);
// $numMois = substr($mois, 4, 2);
    
switch ($action) {

    case 'selectionFiche':

        $listeVisiteur = $pdo-> selectVisiteur();
        $listeMois= $pdo->getFicheValidee();

        //var_dump($listeVisiteur[0]);

        require 'vues/v_listeSuivie.php';
        break;
    

    case 'ficheValide':
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $mois=$_POST['lstMois'];
        $idVisiteur=$_POST['lstVisiteur'];

         $_SESSION['visiteur_selection']= $idVisiteur;
         $_SESSION['mois_selection']= $mois;

        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        
      if (empty($lesFraisHorsForfait) && empty($lesFraisForfait)){
        
   
        require 'vues/v_notifVide.php';
        break;
      }
      
      else {
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
      }
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
       
   require 'vues/v_fichePaiement.php';
    break;

    case 'fichePaiement';
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $idVisiteur=$_SESSION['visiteur_selection'];
    $mois=$_SESSION['mois_selection'];
    $etat='MP';

        $miseEnPaiement=$pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);
        
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
      
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);

        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        require 'vues/v_notifPaiement.php';
        require 'vues/v_fichePaiement.php';
    
    break;



}
?>