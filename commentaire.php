<?php 
//Demarre session
session_start();

//Intègre la valeur de $_SESSION dans variable
$login = $_SESSION['login'];

//Se connecte a la base de données
$db = mysqli_connect('localhost', 'root', '', 'livreor');

// Sélect des infos dans la bdd
$requete = "SELECT `id` FROM `utilisateurs` WHERE login='$login'";

//Ramène les infos correspondantes a la bdd et à la sélection
$query = mysqli_query($db, $requete);

//Mets dans un tableau les infos ($reponse)
$reponse = mysqli_fetch_all($query);

//Récupere l'id dans le tableau et la met dans une varaiable
$id = $reponse[0][0];

//Si la variabe $_POST existe la met dans une variable $commentaire avec sécurisation htmlspecialchars
if (isset($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']);
}

//Si le formulaire est bien rempli, on insert les valeurs dans la bdd grace a un INSERT INTO
if (isset($_POST['valider']) AND isset($_POST['commentaire'])) {
    $requete_insert = "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$id', NOW())";

//si $requete_enregistree à bien envoyer les info dans la base de données on est redirigé vers 'livree-or.php'
    $requete_enregistree = mysqli_query($db, $requete_insert) or die('Erreur SQL !'.$requete_insert.'<br>'.mysqli_error($db));
        if (isset($requete_enregistree)) {
            header("Location: livre-or.php");
        }
        
        //Sinon on enregistre le message d'erreur dans la variable $erreur_modification
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
        <h1><?php echo 'La parole est à vous '.$_SESSION['login'].'!';
            if (isset($erreur_modification)) 
            {
                echo '<br>'.$erreur_modification;
            }?></h1>
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