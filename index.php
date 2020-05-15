<?php
session_start();
//var_dump($_SESSION);

//----------- Implementation de la conncetion a la base de donnée -------------------//

require "conf/global.php";

//----------- Chargement automatique des classe ------------------//

spl_autoload_register(function ($class) {
    if(file_exists("models/$class.php")){
        require_once "models/$class.php";
    }
});

//------------- Routeur (chemin d'accés vers le controleur) ---------------//

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

//-------------- Controleur (redirige vers les page demandé) -----------------//

function showHome(){
    return "accueil.php";
}
  
function showForm(){
    return "form.php";
}

function showConnect(){
    return "formconnect.php";
}

// function showMembre() {
//     $utilisateur = new Utilisateur();
//     $utilisateur->selectAll();
// }

//-------------- Permet d'inséré un utilisateur dans la base de donnée --------------//

function insert_user(){

    //--------Verifie si le pseudo et le mot de passe n'ont pas caractére speciaux---------//

    if (preg_match('#^[a-zA-Z0-9]+$#', $_POST['pseudo']) && preg_match('#^[a-zA-Z0-9]+$#', $_POST['Mp']))  {

        $utilisateur = new Utilisateur("","");
        $utilisateur->setPseudo($_POST["pseudo"]);
        $utilisateur->setMp(password_hash($_POST["pass"], PASSWORD_DEFAULT));
        $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "null";
        $_SESSION["utilisateur"] = $pseudo ;
        $utilisateur->insert();
        echo "Le pseudo entré est correct.";

    } else {
        echo "Le pseudo et le mot de passe sont incorrect.";
    }

    


    
    header('Location:index.php?route=connection');

}

//-------------- Permet de connecté un utilisateur depuis la base de donnée --------------//

function connect_user() {
    
    $utilisateur = new Utilisateur("","");
    $utilisateur->setPseudo($_POST["pseudo"]);
    $utilisateur->setMp($_POST["pass"]);
    $verif = $utilisateur->selectByPseudo();

    if($verif) {
        header('Location:index.php?route=home');
    } else {
        header('Location:index.php?route=formulaire');
    }
    
    
}

//-------------- Permet de deconnecté un utilisateur --------------//

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