<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {


    case 'inscriptionUser':
       
    require 'vues/v_inscription.php';
    break;

    case 'inscriptionValide':
        $nom=$_POST['Nom'];
        $prenom=$_POST['Prenom'];
        $login=$_POST['login'];
        $idVisiteur=$_POST['id'];


    $inscription= $pdo->newInscription($login,$nom,$prenom,$idVisiteur)  ;
    require 'vues/v_notifInscription.php';
    break;
    

}
