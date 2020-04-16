<?php
session_start();


require_once "utilisateur.php";

require_once "tache.php";

$route = isset($_GET["route"])? $_GET["route"] : "formulaire";


switch($route) {
    case "home" : $include = showHome() ;
        break;
    case "formulaire" : $include = showForm();
        break;
    case "connection" : $include = showConnect();
        break;
    case "insert_user" : insert_user();
        break;
    case "connect_user" : connect_user();
        break;
    default : $include = showForm();
}

function showHome(){
    return "accueil.php";
}

function showForm(){
    return "form.php";
}

function showConnect(){
    return "formconnect.php";
}

function insert_user(){

    $utilisateur = new Utilisateur("","");
    $utilisateur->setPseudo($_POST["pseudo"]);
    $utilisateur->setMp($_POST["pass"]);
    $utilisateur->save_user();
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "null";
    $_SESSION["pseudo"] = $pseudo ;
    //unset($_SESSION["pseudo"]);
    header('Location:index.php?route=connection');

}

function connect_user() {
    $utilisateur = new Utilisateur("","");
    $utilisateur->setPseudo($_POST["pseudo"]);
    $utilisateur->setMp($_POST["pass"]);
    $utilisateur->verify_user();
}

//echo($_SESSION["pseudo"]);










?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>inscription</title>
    <link rel="stylesheet" type="text/css" href="cv.css">
</head>
<body>

    <?php require $include ?>

</body>
</html>