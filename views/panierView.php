<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GemsPhones - Mon Panier</title>
    <link rel="stylesheet" href="Panier/testPanier.css">
</head>
<body>
    <header>
        <h1>Mon Panier</h1>
        <a href="index.php?page=accueil"><button class="button2">Retour Accueil</button></a>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPanier = 0;
                foreach ($panierItems as $item) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($item['NOM_PRODUIT']) . '</td>';
                    echo '<td>' . htmlspecialchars($item['PRIX_PRODUIT']) . ' €</td>';
                    echo '<td>' . htmlspecialchars($item['quantité']) . '</td>';
                    echo '<td>' . htmlspecialchars($item['total']) . ' €</td>';
                    echo '<td>
                            <form action="index.php?page=modifier_quantite_panier" method="post">
                                <input type="hidden" name="id_produit" value="' . $item['ID_PRODUIT'] . '">
                                <input type="number" name="nouvelle_quantite" value="' . $item['quantité'] . '">
                                <button type="submit">Modifier</button>
                            </form>
                            <form action="index.php?page=supprimer_article_panier" method="post">
                                <input type="hidden" name="id_produit" value="' . $item['ID_PRODUIT'] . '">
                                <button type="submit">Supprimer</button>
                            </form>
                          </td>';
                    echo '</tr>';
                    $totalPanier += $item['total'];
                }
                ?>
            </tbody>
        </table>

        <div class="total">
            <p>Total du panier : <?= number_format($totalPanier, 2, ',', ' ') ?> €</p>
            <a href="Panier/paiement/checkout.php?montant=<?= $totalPanier * 100; ?>"><button>Payer</button></a>
        </div>
    </main>

    <?php include "footer/footer.html"; ?>
</body>
</html>
