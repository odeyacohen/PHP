<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
//$idVisiteur = $_SESSION['idVisiteur'];

switch ($action) {
  
    case 'informations':
  
    
    $information= $pdo->selectVisiteur();

   // var_dump($information);
   
        
    require 'vues/v_afficheInfos.php';
    break;
}