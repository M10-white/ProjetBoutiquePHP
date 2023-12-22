<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="views/css.css">
</head>
<body>
<div class="container">
    <div class="login-container">
        <div class="form-container">
            <form method="post" action="index.php?page=inscription">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" value="S'inscrire">
            </form>
            <?php if (isset($inscriptionStatus)): ?>
                <p><?php echo $inscriptionStatus; ?></p>
            <?php endif; ?>
            <div class="links">
                <a href="index.php?page=connexion"><button type="button">Connexion</button></a>
                <a href="index.php?page=accueil"><button type="button">Accueil</button></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
