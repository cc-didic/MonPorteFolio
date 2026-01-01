<?php 
    require_once 'db/function.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Cas où le formulaire (suppression) a été rempli et soumis
        $idProjectToDelete = $_POST["idProjectToDelete"];

        $success = deleteProject($idProjectToDelete);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon portefolio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <?php require_once "includes/header.php"; ?>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Caron Cédric - Développeur Web</h1>
                <div>Envoyez-moi votre idée de projet, et je vous la réalise en deux semaines.</div>
            </div>
            
            <img src="img/tom-cruise.jpeg" alt="Tom Cruise">
        </section>

        <section class="projects">

            <?php
                if(isset($success)):
                    if($success):?>
                        <div class="alert success">
                            Le projet a bien été supprimé
                        </div>
                    <?php else: ?>
                        <div class="alert error">
                            Une erreur est survenue
                        </div>
                    <?php endif;
                endif;
            ?>

            <h2>Mes projets</h2>
            <div class="list-projects">
                <?php

                    $projects = getAllProjects();

                    foreach($projects as $row) :?>

                        <article class="project">
                            <!-- Images -->

                            <!-- Bouton supprimer -->
                            <form action="" method="POST">
                                <input type="hidden" name="idProjectToDelete" value="<?php echoValue($row, 'idprojects'); ?>"/>
                                <input type="submit" value="Delete">
                            </form>

                            <!-- Titre -->
                            <h3>
                                <?php echoValue($row, 'title'); ?>
                            </h3>

                            <!-- Description -->
                            <p class="description">
                                <?php echoValue($row, 'description'); ?>
                            </p>

                            <!-- Skills -->
                            <div class="project-skills">
                                <?php foreach($row['skills'] as $skill): ?>
                                    <div><?php echo $skill; ?></div>
                                <?php endforeach ?>
                            </div>

                            <div class="links">
                                <!-- Lien Github -->
                                <a href="<?php echoValue($row, 'github_link'); ?>"class="btn-link github" target="_blank"><i class="fab fa-github"></i>Github</a>
                                <!-- Lien Projet -->
                                <a href="<?php echoValue($row, 'project_link'); ?>"class="btn-link project-url" target="_blank"><i class="fas fa-external-link-alt"></i>Voir</a>
                            </div>
                            
                            <!-- Technos -->
                        </article>
                        
                    <?php endforeach; ?>
                
            </div>
        </section>

        <section class="skills">

            <h2>Mes skills</h2>
            <div class="list-skills">
                <?php

                    $skills = getAllSkills();

                    foreach($skills as $skill) :?>

                        <article class="skill">

                            <?php if($skill['logo'] == null): ?>
                                <!-- Nom -->
                                <h3>
                                    <?php echoValue($skill, 'name'); ?>
                                </h3>
                            
                            <?php else: ?>
                                <!-- Logo -->
                                <p class="img">
                                    <img src="<?php echoValue($skill, 'logo'); ?>" alt= "<?php echoValue($skill, 'name'); ?>"/>
                                </p>

                            <?php endif; ?>
                            
                        </article>
                        
                    <?php endforeach; ?>
                
            </div>

        </section>

        <section class="references">

        </section>
    </main>

    <?php include_once "includes/footer.php"; ?>
    
</body>
</html>
