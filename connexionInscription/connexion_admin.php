<link rel="icon" type="image/x-icon" href="../images/icon.png">

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique_telephone";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT id_admin FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['userId'] = $row['id'];

        echo "Connexion réussie. ID de l'utilisateur: " . $_SESSION['userId'];

        // Redirige vers la page d'accueil après la connexion réussie
        header("Location: admin_gestionnaire.php");
        exit();
    } else {
        $error_message = "Identifiants incorrects";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin - GemsPhones</title>
    <link rel="stylesheet" href="css.css">
    <!-- Ajoutez d'autres liens de style ou scripts au besoin -->
</head>
<body>

<?php include "../header/header.html"; ?>

<div class="login-container">
    <h1>Connexion Admin</h1>
    <?php if (isset($error_message)) { ?>
        <div class="error-message"><?= $error_message ?></div>
    <?php } ?>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</div>

<?php include "../footer/footer.html"; ?>

</body>
</html>
