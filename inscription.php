<?php
session_start();
$erreur_modification = null;
$messageok = null;
$db = mysqli_connect('localhost', 'root', '', 'livreor');

// Contrôler la connexion
if (!$db)
{ 
    $MessageConnexion = die ("connection impossible");
}
else 
{   /* Vérifie que mot de passe à bien été confirmé */
    if (isset($_POST['envoyer']) AND  $_POST['password'] != $_POST['confirm_password']) 
    {
        $message = 'Mot de passe et confirmation du mot de passe sont différents';
    }
    // Autre contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie et que la confirmation du mot de pass est ok
    if(isset($_POST['envoyer']) AND $_POST['password'] === $_POST['confirm_password']) 
    { 
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $select = "SELECT `login`FROM `utilisateurs` WHERE login = '$login'";
        $request = mysqli_query($db, $select);
        $rows = mysqli_num_rows($request);

        if ($rows == 1) 
        {
            $message = $login.' existe déjà.';
        }
        else 
        {
                // Requête d'insertion
            $nouvelle_inscription="INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')";
            // Exécution de la reqête
            $requete_enregistree = mysqli_query($db, $nouvelle_inscription) or die('Erreur SQL !'.$nouvelle_inscription.'<br>'.mysqli_error($db));
            if (isset($requete_enregistree)) 
            {
                $messageok = "<h1>Votre profil a bien été crée, vous pouvez vous connecter.</h1>";
            }
            else
            {
                $erreur_modification = 'Erreur sur l\'enregistrement de votre profil.';
            }
        }

        
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reinfo.css">
    <title>Inscription</title>
</head>
<body>
    <header>
    <?php require('header.php')?>
    </header>
    <main class=main_inscription>      
        <section class=formulaire>        
        <?php   
            if ($messageok != null) 
            {
                echo $messageok;
            }  
            else {
                ?>
                
                <h1>Créer votre profil</h1>
                           
            <section>
                <form action="" method="post">
                    <div class = erreur>
                    <p>
                    <?php 
                    if (isset($message)) 
                    {
                        echo $message;
                    }
                    if (isset($erreur_modification)) 
                    {
                        echo $erreur_modification;
                    }
                    ?>  
                    </p>                  
                    </div>
                    <div>
                        <label for="login">Login</label><br>
                        <input type="text" name="login" id="login" required>
                    </div>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="password" minlength="2" required>
                    </div>
                    <div>
                        <label for="conf_pass">Confirmer le mot de passe</label><br>
                        <input type="password" id="conf_pass" name="confirm_password" minlength="2" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name = "envoyer" value="Envoyer le formulaire" >
                    </div>
                   
                </form>
            </section>
                <?php } ?>
        </section>
    </main>
    <footer>
    <?php require('footer.php')?>  
    </footer>

</body>
</html>