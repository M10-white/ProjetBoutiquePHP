<?php //element connexsion base de donnée
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique_telephone";
 
// creez la connexion à la base
$conn = new mysqli($servername, $username, $password, $dbname);
 
// verif connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
?>
 
<?php
session_start();
$idUser = $_SESSION['userId'];
$date = '';
$sql = "INSERT INTO commandes VALUES ('$idUser', '$date', 'OK')";
if(isset($_SESSION['userId'])) {
    $result = mysqli_query($conn, $sql);
    print("TEST");
} else {
  print"bug";
}
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section>
    <p>
      Paiement réussi      
    </p>
    <a href="index.php?page=accueil"><button style="margin: 0 30px 0 0;">CONTINUER</button>
  </section>
</body>
</html>