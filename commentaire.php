<?php 
session_start();
$login = $_SESSION['login'];
$db = mysqli_connect('localhost', 'root', '', 'livreor');
$requete = "SELECT `id` FROM `utilisateurs` WHERE login='$login'";
$query = mysqli_query($db, $requete);
$reponse = mysqli_fetch_all($query);
$id = $reponse[0][0];
if (isset($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']);
}

if (isset($_POST['valider']) AND isset($_POST['commentaire'])) {
    $requete_insert = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$id', NOW())";
    $requete_enregistree = mysqli_query($db, $requete_insert) or die('Erreur SQL !'.$requete_insert.'<br>'.mysqli_error($db));
        if (isset($requete_enregistree)) {
            header("Location: livre-or.php");
        }
        else{
            $erreur_modification = 'Erreur sur l\'enregistrement du commentaire.';
        }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reinfo.css">
    <title>Ajouter un commentaire</title> 
</head>
<body>
    <header>
        <?php require('header.php') ?>
    </header>
    <main class=main_commentaire>
        
        <section class="page_commentaire">
        <h1><?php echo 'La parole est à vous '.$_SESSION['login'].'!</h1>';?>
            <form action="" method="post">        
                <textarea id="commentaire" name="commentaire" rows="15" cols="61"  required>Bonjour,</textarea>
                <section class="submit">
                    <input type="submit" value="Envoyer" name="valider">
                </section>
            </form>
        </section>

    </main>
    <footer>
        <?php require('footer.php') ?>
    </footer>
    
</body>
</html>