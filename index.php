<?php



require_once "utilisateur.php";

require_once "tache.php";

$route = isset($_GET["route"])? $_GET["route"] : "formulaire";

switch($route) {
    case "home" : require "accueil.php";
        break;
    case "formulaire" : require "form.php";
        break;
    default : "formulaire";
}




$utilisateur = new Utilisateur("","");

$utilisateur->insert_user();

setcookie('pseudo',$_POST["pseudo"], time() + 182 * 24 * 60 * 60 , "/");

var_dump($_COOKIE["pseudo"]);






?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>inscription</title>
    <link rel="stylesheet" type="text/css" href="cv.css">
</head>
<body>

</body>
</html>