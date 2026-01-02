<?php
    require_once 'utils/session.php';
    require_once 'db/function.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Cas où le formulaire a été rempli et soumis
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Récupérer l'utilisateur avec cet email
        $user = getUserByEmail($email);
        
        if($user && password_verify($password, $user['password'])){
            $_SESSION['idUser'] = $user['idUsers'];
            header('Location: index.php');
        }
        else{
            echo "Nom d'utilisateur ou mot de passe incorrect";
        }
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
        <div class="container">
            <h1 class="section-title">Connexion</h1>

            <form class="form-card" action="" method="post" enctype="multipart/form-data">
            
            <div class="form-grid">
                <div class="form-group full">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email">
                </div>

                <div class="form-group full">
                    <label for="password">Mot de passe</label>
                    <input id="password" name="password" required type="text"></input>
                </div>
            </div>

            <div class="form-actions">
                <button class="btn-primary" type="submit">Connexion</button>
            </div>
        </form>
    </div>
    </main>

    <?php include_once "includes/footer.php"; ?>
    
</body>
</html>
