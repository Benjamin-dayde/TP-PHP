<?php

$utilisateur = (isset($_POST))? "accueil.php" : "index.php";

require_once "utilisateur.php";

require_once "tache.php";

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
    <header id="entete">
    </header>
    <div id="encadre">
        <article id="cadre">
            <p>
            <form method="post"action="index.php">
                 <fieldset>
                  <legend>information principale</legend>
                    <label for="pseudo"> pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required="required"/><br>
                    <label for="pass">mot de passe</label>
                    <input type="password"name="pass" id="pass" placeholder="Votre mot de passe" required="required"/>
                    <input type="submit" value="Envoyer">
                 </fieldset>
            </p>
        </article>
    </div>
</body>
</html>