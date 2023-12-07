<link rel="icon" type="image/x-icon" href="../images/icon.png">
<link rel="stylesheet" href="css.css">

<?php
session_start();

// Vérifiez si l'administrateur est connecté
//if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== false || $_SESSION['admin_session_id'] !== session_id()) {
//    header("Location: connexion_admin.php");
//    exit();
//}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boutique_telephone";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer le résumé de toutes les commandes
$sql = "SELECT COUNT(*) as total_commands FROM commandes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_commands = $row['total_commands'];
} else {
    $total_commands = 0;
}

// Récupérer la dernière commande (s'il y en a au moins une)
$sql_latest_order = "SELECT id, date_commande, payer FROM commandes ORDER BY date_commande DESC LIMIT 1";
$result_latest_order = $conn->query($sql_latest_order);

if ($result_latest_order->num_rows > 0) {
    $latest_order = $result_latest_order->fetch_assoc();
    $latest_order_id = $latest_order['id'];
    $latest_order_date = $latest_order['date_commande'];
    $latest_order_status = $latest_order['payer'];
} else {
    $latest_order_id = "Aucune commande";
    $latest_order_date = "N/A";
    $latest_order_status = "N/A";
}

$sql_all_orders = "SELECT id, date_commande, payer FROM commandes ORDER BY date_commande DESC";
$result_all_orders = $conn->query($sql_all_orders);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin - GemsPhones</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php include "../header/header.html"; ?>

<div class="form-container2">
    <h1>Tableau de bord Admin</h1>
    <p>Bienvenue, administrateur!</p>

    <div class="form-container">
        <h2>Résumé des commandes</h2>
        <p>Total des commandes : <?php echo $total_commands; ?></p>
        <p>Dernière commande : <?php echo $latest_order_id; ?></p>
        <p>Date de la dernière commande : <?php echo $latest_order_date; ?></p>
        <p>Statut de paiement de la dernière commande : <?php echo $latest_order_status; ?></p>
    </div>
    <div class="form-container">
        <h2>Détails</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>Date de commande</th>
                    <th>Statut de paiement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result_all_orders->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['date_commande'] . "</td>";
                    echo "<td>" . $row['payer'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Ajoutez d'autres éléments spécifiques au tableau de bord ici -->

    <a href="../page_accueil/accueil.php"><button class="button">Se déconnecter</button></a>
    <br></br>
</div>

<?php include "../footer/footer.html"; ?>

</body>
</html>
