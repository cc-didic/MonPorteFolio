<?php require_once 'db/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon portefolio</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php require_once "includes/header.php"; ?>

    <main>
        <section class="hero-section">
            <div>
                <h1>Caron Cédric - Développeur Web</h1>
                <div>Envoyez-moi votre idée de projet, et je vous la réalise en deux semaines.</div>
            </div>
            
            <img src="img/tom-cruise.jpeg" alt="Tom Cruise">
        </section>

        <section class="projects">
            <h2>Mes projets</h2>
            <div class="list-projects">
                <?php
                    $pdo = getDBConnection();

                    $sql = "SELECT * FROM my_portfolio_php.projects;";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    $result = $stmt->fetchAll();
                    foreach($result as $row) :?>

                        <article class="project">
                            <!-- Images -->
                            <!-- Titre -->
                            <h3>
                                <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "\t"; ?>
                            </h3>
                            <!-- Description -->
                            <p class="description">
                                <?php echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . "\t"; ?>
                            </p>
                            <!-- Lien Github -->
                            <a href="<?php echo htmlspecialchars($row['github_link'], ENT_QUOTES, 'UTF-8') . "\n"; ?>">Github</a>
                            <!-- Lien Projet -->
                            <a href="<?php echo htmlspecialchars($row['project_link'], ENT_QUOTES, 'UTF-8') . "\n"; ?>">Voir</a>
                            <!-- Technos -->
                        </article>
                        
                    <?php endforeach; ?>
                
            </div>
        </section>

        <section class="skills">

        </section>

        <section class="references">

        </section>
    </main>

    <?php include_once "includes/footer.php"; ?>
    
</body>
</html>
