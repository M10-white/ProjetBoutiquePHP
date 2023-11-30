<link rel="stylesheet" href="css.css">
<link rel="icon" type="image/x-icon" href="../images/icon.png">

<?php
session_start();

$host = 'localhost';
$db   = 'boutique_telephone';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifier si les champs de mot de passe sont vides
    if (!empty($password) && !empty($confirm_password)) {
        // Vérifier si les mots de passe correspondent
        if ($password == $confirm_password) {
            // Hasher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insérer l'utilisateur dans la base de données
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed_password]);
            echo "<div class='avert'>&#128275 Compte crée ! &#128275</div>";
        } else {
            echo "<div class='avert'>&#128680 Les mots de passe ne correspondent pas ! &#128680</div>";
        }
    } else {
        echo "Veuillez entrer un mot de passe et le confirmer.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="form-container">
                <form action="inscription.php" method="post">
                    Nom d'utilisateur: <input type="text" name="username" required><br>
                    Mot de passe: <input type="password" name="password" required><br>
                    Confirmer le mot de passe :<input type="password" name="confirm_password" required><br>
                    <input class="opacity" type="submit" value="S'inscrire">
                    <a href="connexion.php" class="opacity"><input type="button" value="Déjà un compte ->"></a> 
                    <a href="../page_accueil/accueil.php" class="opacity">retour accueil</a> 
                </form>
            </div>
        </div>
    </section>
</body>
<script src="inscription.php"></script>
</html>
