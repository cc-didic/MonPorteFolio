<header class="site-header">
    <div class="logo">
        <a href="/index.php#">Cédric Caron</a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/index.php#">Acceuil</a></li>

            <?php
                if(isLoggedIn()):?>
                    <li><a href="/createproject.php">Créer un projet</a></li>
            <?php endif?>

            <li><a href="/index.php#projects">Mes projets</a></li>
            <li><a href="/index.php#skills">Skills</a></li>
        </ul>
    </nav>

    <div class="cta">
        <?php
            if(isLoggedIn()):?>
                <a href="/logout.php" class="btn-primary" role="button" aria-label="Se déconnecter">Se déconnecter</a>
            <?php else: ?>
                <a href="/login.php" class="btn-primary" role="button" aria-label="Se connecter">Se connecter</a>
            <?php endif
        ?>

    </div>
</header>
