<?php



require_once "utilisateur.php";

require_once "tache.php";

$route = isset($_GET["route"])? $_GET["route"] : "formulaire";

switch($route) {
    case "home" : header('location: accueil.php');
        break;
    case "formulaire" : header('location: form.php');
        break;
    default : "formulaire";
}




$utilisateur = new Utilisateur("pseudo","motdepasse");

$utilisateur->insert_user();

setcookie('pseudo',$_POST["pseudo"], time() + 182 * 24 * 60 * 60 , "/");



