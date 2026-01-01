<?php
    require_once 'utils/session.php';
    require_once 'db/function.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Cas où le formulaire a été rempli et soumis
        $titre = $_POST["title"];
        $description = $_POST["description"];
        $github_link = $_POST["github_link"];
        $project_link = $_POST["project_link"];

        $success = insertProject($titre, $description, $github_link, $project_link);
    }
    else{
        // Cas où le formulaire est vide
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un projet</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require_once "includes/header.php"; ?>

    <div class="container">
        <h1 class="section-title">Créer un projet</h1>

        <form class="form-card" action="" method="post" enctype="multipart/form-data">
            
            <?php
                if(isset($success)):
                    if($success):?>
                        <div class="alert success">
                            Le projet a bien été créé
                        </div>
                    <?php else: ?>
                        <div class="alert error">
                            Une erreur est survenue
                        </div>
                    <?php endif;
                endif;
            ?>
            

            <div class="form-grid">
                <div class="form-group full">
                    <label for="title">Titre</label>
                    <input id="title" name="title" type="text" placeholder="Titre du projet">
                </div>

                <div class="form-group full">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Courte description du projet"></textarea>
                </div>

                <div class="form-group full">
                    <label for="gh_link">Lien GitHub</label>
                    <input id="github_link" name="github_link" type="url" placeholder="https://github.com/monrepo">
                </div>

                <div class="form-group full">
                    <label for="pr_link">Lien démo / Page</label>
                    <input id="project_link" name="project_link" type="url" placeholder="https://monprojet.example">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn-primary" type="submit">Créer le projet</button>
            </div>
        </form>
    </div>
    
    <?php include_once "includes/footer.php"; ?>
</body>
</html>
