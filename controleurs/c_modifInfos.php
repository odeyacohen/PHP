<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$idVisiteur = $_SESSION['idVisiteur'];

switch ($action) {
  
    case 'informations':
    
    $information= $pdo->getInfosUser($idVisiteur);
    //var_dump($information);
   
        
    require 'vues/v_infosUser.php';
    break;

    case 'modifInfos':
        
        $idVisiteur=$_SESSION['idVisiteur'];
        //var_dump($idVisiteur);
        
        //var_dump($ville);

        
        $infos= $pdo->majInfosUser($idVisiteur,
    
        );

        $information= $pdo->getInfosUser($idVisiteur);
        require 'vues/v_infosUser.php';
        break;

    

}
