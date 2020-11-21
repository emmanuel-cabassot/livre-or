<?php
session_start();
$messageok = null;
// Connexion à MySQL
$db=mysqli_connect("localhost", "root", "", "livreor");

$login = $_SESSION['login'];

if (isset($_POST['envoyer']) AND $_POST['password'] =! $_POST['confpass'])
{
    $message = 'Mot de passe et confirmation mot de passe différents';
}
else 
    {
        if(isset($_POST['envoyer']) ) 
        {
            // Réecriture des variables recupérées dans base de données
            $loginn=$_POST['new_login'];
            $password=$_POST['new_password'];

           
            // Requête de modification d'enregistrement
            $modifierprofil="UPDATE `utilisateurs` SET
            `login`='$loginn',
            `password`='$password'
            WHERE login='$login'";

            // Exécution de la requête
            $resultat=mysqli_query($db, $modifierprofil);
            // Contrôle sur la requête
            if(!$resultat) 
            {
                die('Erreur SQL !'.$modifierprofil.'<br />');
            }
            else 
            {
                $messageok = "<div class=erreur><h2>Votre profil a bien été modifié!</h2></div>";
                $_SESSION['login'] = $loginn;
                $login = $loginn;                
            }
        } // Fin du test isset  
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reinfo.css">
    <title>Votre profil</title>
</head>
<body>
    <header>
    <?php require('header.php')?>
    </header>
    <main class=main_profil>
        <section class=profil>
            
            <?php   
            if ($messageok != null) 
            {
                echo $messageok;
            }  
            else {
                echo ' <h1>Modifier son profil</h1>';
            }
            ?>       
            <section>
                <form action="#" method="POST">
                    <div class=erreur>
                    <?php
                        if (isset($message)) 
                        {
                            echo $message;
                        }
                    ?>
                    </div>
                        <label for="login">Login</label><br>
                        <input type="text" name="new_login" id="login" required placeholder=<?php echo $login; ?>>
                    <div>
                        <label for="pass">Mot de passe</label><br>
                        <input type="password" id="pass" name="new_password"  minlength="4" required>
                    </div>
                    <div>
                        <label for="confpass">Confirmer le mot de passe</label><br>
                        <input type="password" id="confpass" name="confpass" minlength="4" required>
                    </div>
                    <div class=bouton>
                        <input type="submit" name="envoyer" value="Enregistrer vos modifications">
                    </div>
                </form>
            </section>
        </section>
    </main>
    <footer>
    <?php require('footer.php')?> 
    </footer>  
</body>
</html>