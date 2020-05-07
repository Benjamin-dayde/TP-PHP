<?php

//var_dump($_COOKIE["pseudo"]);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>inscription</title>
    <link rel="stylesheet" type="text/css" href="todolist.css">
</head>
<body>
    <header>
    </header>
    <div>
        <article class=form>
            <p>
            <form method="POST" action="index.php?route=insert_user">
                 <fieldset>
                  <legend>inscrivez vous</legend>
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