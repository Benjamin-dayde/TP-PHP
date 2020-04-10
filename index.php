<?php

require_once "utilisateur.php";

require_once "tache.php";

$route = isset($_POST["root"])? $_POST["root"] : "home";

switch($route) {
    case "home" : $root = retourMaison();
        break;
    case "insert_user" : insert_user();
        break;
    default : retourMaison();
}


function retourMaison() {
    return "accueil.php";
}

$utilisateur = new Utilisateur("","");

$utilisateur->insert_user();






?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>inscription</title>
    <link rel="stylesheet" type="text/css" href="cv.css">
</head>
<body>

    <?php require "form.php" ?>


</body>
</html>