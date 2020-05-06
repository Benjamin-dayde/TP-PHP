<?php
session_start();
//var_dump($_SESSION);

require "conf/global.php";

spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")){
        require_once "models/$class.php";
    }
});

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
    case "deconnect_user" : decoUser();
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

function showMembre() {
    $utilisateur = new Utilisateur();
    $utilisateur->selectAll();
}

function insert_user(){

    $utilisateur = new Utilisateur("","");
    $utilisateur->setPseudo($_POST["pseudo"]);
    $utilisateur->setMp(password_hash($_POST["pass"], PASSWORD_DEFAULT));
    $utilisateur->save_user();
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "null";
    $_SESSION["utilisateur"] = $pseudo ;
    
    header('Location:index.php?route=connection');

}

function connect_user() {
    $utilisateur = new Utilisateur("","");
    $utilisateur->setPseudo($_POST["pseudo"]);
    $utilisateur->setMp($_POST["pass"]);
    $utilisateur->verify_user();
}

function decoUser() {
    unset($_SESSION["utilisateur"]);
    header('Location:index.php?route=connection');
}











?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>inscription</title>
    <link rel="stylesheet" type="text/css" href="todolist.css">
</head>
<body>

    <?php require $include ?>

</body>
</html>