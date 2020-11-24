<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reinfo.css">
    <title>RéInfo Covid</title>
</head>
<body>
    <header>   
        <?php require('header.php') ?>
    </header>
    <main class="main_accueil">
        <section class="page_accueil">
            <section class="titre">
                <h1><span>A</span>ctualité</h1>
            </section>
            <section class="les_articles">
                <article> 
                    <a href="https://www.menara.ma/fr/article/covid-19-une-etude-danoise-met-en-doute-lefficacite-des-masques-faciaux" target="_blank">
                    <section class="conteneur_image">
                        <img src="images/article_masque.jpg" alt="une mère et sa fille masquées qui font les courses en grande">
                    </section>
                    <section class="text">
                        <h2>Utilité du masque : l’étude danoise qui dérange</h2> 
                        <p>Une étude contrôlée randomisée menée sur 6000 personnes, réalisée en coopération avec 4 hôpitaux </p>
                    </section>
                    </a>
                </article>
                <article> 
                    <a href="https://www.youtube.com/watch?v=IwCLTAArXn4" target="_blank">
                    <section class="conteneur_image">
                        <img src="images/article_bigpharma.jpg" alt="article du bmj">
                    </section>
                    <section class="text">
                        <h2>La science est supprimée à des fins politiques et financières</h2> 
                        <p>Video commentant l'article spectaculaire du rédacteur en chef du BMJ, prestigieuse revue scientifique médicale britannique.</p>
                    </section>
                    </a>
                </article>
            </section>
        </section>
    </main>
    <footer>
        <?php require('footer.php'); ?>
    </footer>   
</body>

</html>