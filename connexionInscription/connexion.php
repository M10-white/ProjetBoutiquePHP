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


    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $_SESSION['userId'] = $row['id'];

        echo "Connexion réussie. ID de l'utilisateur: " . $_SESSION['userId'];
        
    } else {
        echo "Identifiants incorrects";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GemsPhones</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<section class="container">
<div class="login-container">
<div class="form-container">
    <form method="post" action="connexion.php">
        Nom d'utilisateur: <input type="text" name="username" required><br>
        Mot de passe: <input type="password" name="password" required><br>
        <input class="opacity" type="submit" value="Se connecter">
        <a href="inscription.php" class="opacity"><input type="button" value="Pas de compte ?"></a> 
        <a href="../page_accueil/accueil.php" class="opacity">retour accueil</a> 

    </form>
    </div>
</div>
</section>
</body>
</html>
