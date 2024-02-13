<!DOCTYPE html>
<html>
<head>
    <title>GemsPhones</title>
    <link rel="stylesheet" href="views/css.css">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="form-container">
                <form action="" method="post">
                    Nom d'utilisateur: <input type="text" name="username" required><br>
                    Mot de passe: <input type="password" name="password" required><br>
                    Confirmer le mot de passe :<input type="password" name="confirm_password" required><br>
                    <input class="opacity" type="submit" value="S'inscrire">
                    <a href="connexion.php" class="opacity"><input type="button" value="Déjà un compte ->"></a> 
                    <a href="./index.php" class="opacity">retour accueil</a> 
                    <?php if (isset($inscriptionStatus)): ?>
                    <p><?php echo $inscriptionStatus; ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
</head>
