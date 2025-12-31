<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un projet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="section-title">Créer un projet</h1>

        <form class="form-card" action="" method="post" enctype="multipart/form-data">
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
                    <input id="gh_link" name="gh_link" type="url" placeholder="https://github.com/monrepo">
                </div>

                <div class="form-group full">
                    <label for="pr_link">Lien démo / Page</label>
                    <input id="pr_link" name="pr_link" type="url" placeholder="https://monprojet.example">
                </div>
            </div>

            <div class="form-actions">
                <button class="btn-primary" type="submit">Créer le projet</button>
            </div>
        </form>
    </div>
    
</body>
</html>