<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="views/css.css"> 
</head>
<body>
    <div class="container">
    <div class="login-container">
        <div class="form-container">
            <form method="post" action="index.php?page=connexion">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="submit" value="Se connecter">
            </form>
            <?php if (isset($loginStatus)): ?>
                <p><?php echo $loginStatus; ?></p>
            <?php endif; ?>
            <div class="links">
                <a href="index.php?page=inscription"><button type="button">Connexion</button></a>
                <a href="index.php?page=accueil"><button type="button">Accueil</button></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
