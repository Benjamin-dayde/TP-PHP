<?php



require_once "utilisateur.php";

require_once "tache.php";

$route = isset($_GET["route"])? $_GET["route"] : "formulaire";


switch($route) {
    case "home" : $include = showHome() ;
        break;
    case "formulaire" : $include = showForm()  ;
        break;
    case "insert_user" : insert_user();
        break;
    default : $include = showForm();
}

function showHome(){
    return "accueil.php";
}

function showForm(){
    return "form.php";
}

function insert_user(){
    $utilisateur = new Utilisateur("","");
    $utilisateur->setPseudo($_POST["pseudo"]);
    $utilisateur->setMp($_POST["pass"]);
    $utilisateur->save_user();
    header('Location:index.php?route=home');
}






setcookie('pseudo',$_POST["pseudo"], time() + 182 * 24 * 60 * 60 , "/");

//var_dump($_COOKIE["pseudo"]);






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