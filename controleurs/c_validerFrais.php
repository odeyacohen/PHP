<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$mois = selectMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
//$visiteur=$_SESSION['idVisiteur'];

    
switch ($action) {

    case 'selectUser':
      
        $listeVisiteur = $pdo-> selectVisiteur();
        $listeMois = $pdo->selectMois();
           
    require 'vues/v_listeUserMois.php';
    break;

    case 'voirFrais':

    $mois=$_POST['lstMois'];
    $idVisiteur=$_POST['lstUser'];

    $_SESSION['visiteur_selection']= $idVisiteur;
    $_SESSION['mois_selection']= $mois;

    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
   $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);

    
    if(empty($lesFraisHorsForfait)&& empty ( $lesFraisForfait)){
        require 'vues/v_notifValideVide.php';
        break;

    }else{
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    }



   
    require 'vues/v_voirFrais.php';
    break;
    
    case 'majFraisForfait':
        $idVisiteur=$_SESSION['visiteur_selection'];
        $mois=$_SESSION['mois_selection'];

        $lesFrais=$_POST['lesFrais'];

         if (lesQteFraisValides($lesFrais)) {
             $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);
             require 'vues/v_notif.php';
        
         } else {
             ajouterErreur('Les valeurs des frais doivent être numériques');
             include 'vues/v_erreurs.php';
         }
         $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
         $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
         
         require 'vues/v_voirFrais.php';
        
        
    break;

    case 'majFraisHorsForfait':
        $idVisiteur=$_SESSION['visiteur_selection'];
        $mois=$_SESSION['mois_selection'];    
       
     
       $idFrais = filter_input(INPUT_GET, 'idFrais', FILTER_SANITIZE_STRING);  
       $libelle=$pdo->getLibelle($idFrais);

      if (!(str_contains($libelle['libelle'], 'REFUSE :'))){
        
      
        $modifierHorsForfait= $pdo->modifierHorsForfait($idFrais,$libelle);
       }
       $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
       $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    require 'vues/v_notifRefuse.php';
    require 'vues/v_voirFrais.php';       
    break;

    case'validerFiche':
        $idVisiteur=$_SESSION['visiteur_selection'];
        $mois=$_SESSION['mois_selection'];    
        $etat='VA';
        $validerFiche= $pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
    require 'vues/v_validerFiche.php';     
    require 'vues/v_voirFrais.php';     
    break;
}


?>