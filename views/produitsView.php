<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nos Produits</title>
    <link rel="stylesheet" href="Projet_boutique/Boutique.css"> 
</head>
<body>
<?php include 'header/header.html'; ?>

<main>
    <form method="GET"> 
        <header>
            <label for="triPrix">Trier par prix :</label>
            <select id="triPrix" name="triPrix">
                <option value="croissant">Prix Croissant</option>
                <option value="decroissant">Prix Décroissant</option>
            </select>
            <input type="submit" value="Appliquer">
            <br><br>
            <label for="marque">Filtrer par marque :</label>
            <div id="marque">
                
                <?php foreach(['iPhone', 'Samsung', 'Motorola', 'LG', 'Nokia', 'OnePlus', 'Asus', 'Google', 'Sony', 'Xiaomi'] as $marque): ?>
                    <input type="checkbox" name="marque[]" value="<?= $marque ?>"> <?= $marque ?>
                <?php endforeach; ?>
            </div>
            <input type="submit" value="Appliquer le filtre par marque">
        </header>
    </form>
    
    <h1>Nos Produits</h1>
    <div class="Produit">
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <h2><?= htmlspecialchars($product['NOM_PRODUIT']) ?></h2>
                    <a href="index.php?page=detail_produit&id_produit=<?= $product['ID_PRODUIT'] ?>">
    <img class="image_produit" src="<?= htmlspecialchars($product['URL_IMAGE']) ?>" alt="Image du produit">
</a>
                    <div class="description_generale">
                        <div class="description_produit">
                            <p class="prix_produit"><u>Prix</u> : <?= htmlspecialchars($product['PRIX_PRODUIT']) ?> €</p>
                            <p><u>Stock</u> : <?= htmlspecialchars($product['STOCK_PRODUIT']) ?></p>
                            <p><u>Marque</u> : <?= htmlspecialchars($product['MARQUE_TEL']) ?></p>
                            <p><u>Caractéristique</u> : <?= htmlspecialchars($product['CARACTERISTIQUE_TEL']) ?></p>
                        </div>
                        <div class="notation">
                            <p><u>Note moyenne</u> :</p>
                            <?php
                            $averageRating = rand(1, 5); 
                            echo '<p>';
                            for ($i = 1; $i <= 5; $i++) {
                                echo $i <= $averageRating ? '&#9733;' : '&#9734;'; // etoiles pleines ou vides
                            }
                            echo '</p>';
                            ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>

<?php include 'footer/footer.html'; ?>
</body>
</html>
