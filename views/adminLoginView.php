<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin - GemsPhones</title>
    <link rel="stylesheet" href="connexionInscription/css.css">
</head>
<body>

<?php include "header/header.html"; ?>

<div class="login-container">
    <h1>Connexion Admin</h1>
    <?php if (isset($error_message)) { ?>
        <div class="error-message"><?= $error_message ?></div>
    <?php } ?>
    <form action="index.php?page=adminLogin" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</div>

<?php include "footer/footer.html"; ?>

</body>
</html>
