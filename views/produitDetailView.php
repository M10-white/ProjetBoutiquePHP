<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['NOM_PRODUIT']) ?></title>
    <link href="Projet_boutique/Boutique.css" rel="stylesheet">
</head>
<body>
<main>
    <a href="index.php?page=produits"><input type="button" class="boutonD" value="RETOUR"/></a>
    <div class="detail_produit">
        <h1 class="h1_detail"><?= htmlspecialchars($product['NOM_PRODUIT']) ?></h1>
        <img class="image_detail" src="<?= htmlspecialchars($product['URL_IMAGE']) ?>" alt="<?= htmlspecialchars($product['NOM_PRODUIT']) ?>">
        <div class="description_detail_produit">
            <p><u>Description</u> : <?= htmlspecialchars($product['DESCRIPTION_PRODUIT']) ?></p>
            <p><u>Prix</u> : <?= htmlspecialchars($product['PRIX_PRODUIT']) ?> €</p>
            <p><u>Stock</u> : <?= htmlspecialchars($product['STOCK_PRODUIT']) ?></p>
            <p><u>Marque</u> : <?= htmlspecialchars($product['MARQUE_TEL']) ?></p>
            <p><u>Caractéristique</u> : <?= htmlspecialchars($product['CARACTERISTIQUE_TEL']) ?></p>
            <form method="post" action="index.php?page=detail_produit&id_produit=<?= $product['ID_PRODUIT']; ?>">
                <input type="hidden" name="action" value="ajouter_au_panier">
                <button type="submit">Ajouter au panier</button>
            </form>
        </div>
    </div>
</main>

</body>
</html>
