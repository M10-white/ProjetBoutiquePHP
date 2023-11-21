<?php
session_start();

$host = 'localhost';
$db   = 'boutique_telephone';
$user = 'root';
$pass = '';


$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<section class="container">
<div class="login-container">
<div class="form-container">
<form action="inscription.php" method="post">
    Nom d'utilisateur: <input type="text" name="username" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <input class="opacity" type="submit" value="S'inscrire">
    <a href="connexion.php" class="opacity"><input type="button" value="deja un compte ->"></a> 
    <a href="../page_accueil/accueil.php" class="opacity">retour accueil</a> 

</form>
</div>
</div>
</section>
</body>
</html>

