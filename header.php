
<section class = header_toolbar>
    <section class = header_logo>
    <a href="index.php"><img src="images/ampoule.png" alt="logo outils"> RéInfo Covid</a>
    </section>
    
    <section class = header_nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="livre-or.php">Livre d'or</a></li>
        <?php
        /* Profil ou Inscription */
        if (isset($_SESSION['login'])) 
        {
            echo '<li><a href="profil.php">profil</a></li>';
        }
        else 
        {
            echo '<li><a href="inscription.php">S\'inscrire</a></li>';
        }
        /* Affiche Se connecter ou Se déconnecter */
        if (!isset($_SESSION['login'])) 
        {
            echo '<li><a href="connexion.php">Se connecter</a></li>';
        }
        else 
        {
            echo '<li><a href="deconnexion.php">Se déconnecter</a></li>';
        }
        ?>
    </ul>
    </section>
</section>
<section class = header_slogan>
    <section class="slogantext"></section>
<h1>
<?php
    if (!isset($_SESSION['login'])) 
    {
        echo '<h1>Réinformez-vous</h1>
                <p>Ce que les médias ne veulent pas que vous sachiez</p>';
    }

    if (isset($_SESSION['login']))
    {
        echo '<h1>Réinformez-vous</h1>
        <p>Bonjour '.$_SESSION['login'].': Vous aiguisez votre sens critique</p>';
    }
?>
</h1>
    </section>
</section>
