<?php

require_once 'includes/fct.inc.php';
require_once 'includes/class.pdogsb.inc.php';
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
require 'vues/v_entete.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
if ($uc && !$estConnecte) {
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;

case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
case 'suiviePaiement':
    include 'controleurs/c_suiviePaiement.php';
    break;
case 'validerFrais':
    include 'controleurs/c_validerFrais.php';
     break;
case 'inscription':
    include 'controleurs/c_inscription.php';
    break;
case 'modifInfos':
    include 'controleurs/c_modifInfos.php';
    break;
case 'afficheInfos':
    include 'controleurs/c_afficheInfos.php';
    break;

}
require 'vues/v_pied.php';
?>