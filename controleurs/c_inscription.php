<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

switch ($action) {


    case 'inscriptionUser':
       
    require 'vues/v_inscription.php';
    break;

    case 'inscriptionValide':

        $user = [
            "id"=> ($_POST['id']),
            "nom" => ($_POST['nom']),
            "prenom" => ($_POST['prenom']),
            "login" => ($_POST['login']),
            "mdp" => ($_POST['mdp']),
            "adresse" => ($_POST['adresse']),
            "cp" => ($_POST['cp']),
            "ville" => ($_POST['ville']),
            "dateEmbauche" => ($_POST['dateembauche']),
            "role" => ($_POST['role']),
        ];
        var_dump($user);
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $login=$_POST['login'];
        $idVisiteur=$_POST['id'];
        $adresse=$_POST['adresse'];
        $cp=$_POST['cp'];
        $ville=$_POST['ville'];
        $dateEmbauche=$_POST['dateembauche'];
        $role=$_POST['role'];
        $mdp=password_hash($_POST['mdp'],PASSWORD_BCRYPT);




    $inscription= $pdo->newInscription($user)  ;
    require 'vues/v_notifInscription.php';
    break;
    

}
