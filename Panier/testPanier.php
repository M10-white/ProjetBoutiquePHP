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
$sql = $sql = "SELECT produit.NOM_PRODUIT, produit.PRIX_PRODUIT, contenue.quantité, (produit.PRIX_PRODUIT * contenue.quantité) AS total FROM contenue 
JOIN produit ON contenue.produits_id = produit.ID_PRODUIT
WHERE contenue.clients_id = $idUser";
$result = $conn->query($sql);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser = $_SESSION['userId'];
    $idProduit = $_POST['id_produit'];
    $nouvelleQuantite = $_POST['nouvelle_quantite'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "boutique_telephone";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Évitez les injections SQL en utilisant des requêtes préparées
    $stmt = $conn->prepare("UPDATE contenue SET quantité = ? WHERE clients_id = ? AND produits_id = ?");
    $stmt->bind_param("iii", $nouvelleQuantite, $idUser, $idProduit);

    if ($stmt->execute()) {
        echo "Quantité mise à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de la quantité";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GemsPhones</title>
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
    <?php
    $totalPanier = 0;
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['NOM_PRODUIT'] . '</td>';
        echo '<td>' . $row['PRIX_PRODUIT'] . ' €</td>';
        // Utilisation d'une classe pour identifier chaque ligne
        echo '<td class="quantite" data-id="' . $row['NOM_PRODUIT'] . '">' . $row['quantité'] . '</td>';
        echo '<td>' . $row['total'] . ' €</td>';
        // Formulaire pour modifier ou supprimer avec un événement onchange
        echo '<td>
        <form class="modification-form" onsubmit="modifierQuantite(this); return false;">
            <input type="hidden" name="id_produit" value="' . $row['NOM_PRODUIT'] . '">
            <input type="number" name="nouvelle_quantite" value="' . $row['quantité'] . '">
            <button type="submit" name="action" value="modifier">Modifier</button>
        </form>
      </td>';

        // Formulaire pour supprimer
        echo '<td>
                <form class="suppression-form">
                    <input type="hidden" name="id_produit" value="' . $row['NOM_PRODUIT'] . '">
                    <button type="submit" name="action" value="supprimer">Supprimer</button>
                </form>
              </td>';
        echo '</tr>';
        $totalPanier += $row['total'];
    }
    ?>
</tbody>
        </table>

        <div class="total">
    <p>Total du panier : <span><?= number_format($totalPanier, '2', ',', ' ') . ' €'; ?></span></p>
    <a href="paiement/checkout.php?montant=<?= $totalPanier; ?>"><button>Payer</button></a>
</div>
            
    </main>
</body>
</html>

<script>
    function modifierQuantite(form) {
        const formData = new FormData(form);

        // Envoie des données via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'modifier_quantite.php', true);

        // Gestionnaire d'événement de chargement AJAX
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Mise à jour de la quantité côté client si la requête a réussi
                const quantiteElement = form.closest('tr').querySelector('.quantite');
                quantiteElement.textContent = formData.get('nouvelle_quantite');
                console.log('Quantité modifiée avec succès');
            } else {
                console.error('Erreur lors de la modification de la quantité');
            }
        };

        // Envoi de la requête AJAX
        xhr.send(formData);
    }
</script>
<?php
$conn->close(); // ferme la base de données
?>
