<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = $_SESSION['idVisiteur'];

switch ($action) {
  
    case 'informations':
    
    $information= $pdo->getInfosUser($idVisiteur);
    var_dump($information);
   
        
        require 'vues/v_infosUser.php';
        break;

    case 'modifInfos':
        $information= $pdo->getInfosUser($idVisiteur);
        $information= $pdo->majInfosUser($idVisiteur);
        require 'vues/v_infosUser.php';
        break;

    

}
