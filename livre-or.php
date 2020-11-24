<?php
session_start();
//Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "livreor");

//requete Grace à un INNER JOIN et transformation de la date au format EUR
$requete = "SELECT utilisateurs.login, DATE_FORMAT(date, GET_FORMAT(DATE, 'EUR')), commentaire FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur  ORDER BY date DESC";

//Demande de la $requetes placée dans $db
$query = mysqli_query($db, $requete);

//Met dans le tableau $commentaires la requete
$commentaires = mysqli_fetch_all($query);

//Compte le nombre de commentaires
for ($occu_commentaires=0; isset($commentaires[$occu_commentaires]) ; $occu_commentaires++) { 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reinfo.css">
    <title>Livre d'or</title>
</head>
<body>
    <header>
        <?php require('header.php') ?>
    </header>
    <main class="main_livre">
        <section class="page_livre">
        <h1>Les commentaires</h1>
        <?php 
        if (isset($_SESSION['login'])) {
            echo '  <section class="ajouter">
                        <a href="commentaire.php">Ajouter un commentaire</a>
                    </section>';
        }
        for ($i=0; $i < $occu_commentaires ; $i++) { 
            echo '  <section class="commentaires">
                        <h2>posté le '.$commentaires[$i][1].' par <span>'.$commentaires[$i][0].'</span></h2> 
                        <p><i>'.$commentaires[$i][2].'</i></p>
                    </section>';
        }
        ?>
        </section>
    </main>
    <footer>
        <?php require('footer.php') ?>
    </footer>
</body>
</html>