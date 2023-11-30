<?php
session_start();
if(isset($_SESSION['userId'])) {
    $idUser = $_SESSION['userId'];
} else {
    header("Refresh: 0;url=../connexionInscription/inscription.php");
}
?>

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
$sql = "SELECT produit.NOM_PRODUIT, produit.PRIX_PRODUIT, contenue.quantité, (produit.PRIX_PRODUIT * contenue.quantité) AS total FROM contenue 
        JOIN produit ON contenue.produits_id = produit.ID_PRODUIT
        WHERE contenue.clients_id = $idUser";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <link rel="stylesheet" href="testPanier.css">
    <link rel="icon" type="image/x-icon" href="../images/icon.png">

</head>
<body>
    <header>
        <h1>Mon Panier</h1>
        <a href="../page_accueil/accueil.php" ><button class="button2">Retour Accueil</button></a>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php //affiche les colone par article dans le panier
                $totalPanier = 0 ;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['NOM_PRODUIT'] . '</td>';
                    echo '<td>' . $row['PRIX_PRODUIT'] . ' €</td>';
                    echo '<td>' . $row['quantité'] . '</td>';
                    echo '<td>' . $row['total'] . ' €</td>';
                    echo '</tr>';
                    $totalPanier += $row['total'];
                }
                ?>
            </tbody>
        </table>

            <div class="total"> <!--bug dans l'affichage du total des article a corriger-->
            <p>Total du panier : <span><?= number_format($totalPanier, '2', ',', ' '). ' €' ; ?></span></p>
            <a href="paiement/checkout.php?montant=<?= $totalPanier ; ?>"><button>Payer</button></a>
            </div>
            
    </main>
</body>
</html>


<?php
$conn->close(); // ferme la base de données
?>
