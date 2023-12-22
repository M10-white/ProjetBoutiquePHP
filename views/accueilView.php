<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>GemsPhones</title>
    <link rel="stylesheet" href="views/accueil.css">
</head>
<body>

<?php include "header/header.html"; ?>

<div class='information-container'>
    <div class='inner-container'>
        <h1 class='section-title'>Information</h1>
        <div class='border'></div>
        <div class='service-container'>
        <div class='service-box'>
          <div class='service-icon'>
            <i class='fa fa-code'></i>
          </div>
          <div class='service-title'>GemsPhones</div>
          <div class='description'>
           GemsPhones c'est la référence des sites de reventes de téléphones. Avec nous, vous êtes certains de faire bonne affaire, tout en conservant votre porte monnaie. 
           N'hésitez plus un instant et charger votre panier
          </div>
        </div>

        <div class='service-box'>
          <div class='service-icon'>
            <i class='fa fa-paint-brush'></i>
          </div>
          <div class='service-title'>Catalogue de produits</div>
          <div class='description'>
            GemsPhones contient les meilleurs offres du marché en terme de prix avec une selection des meilleures marques. Soyez sur de retrouver votre téléphone du moment chez GemsPhones
          </div>
        </div>
        
        <div class='service-box'>
          <div class='service-icon'>
            <i class='fa fa-cut'></i>
          </div>
          <div class='service-title'>Ecoresponsable</div>
          <div class='description'>
            GemsPhones s'engage a planter un arbre à chaque achat d'un téléphone. Nous essayons tout comme vous à penser à notre planète.
          </div>
        </div>
        </div>
    </div>
</div>

<main>
    <br>
    <h2>Promotions</h2>
    <section class="products_list">
        <?php foreach ($featuredProducts as $product): ?>
            <form action="" class="product">
                <div class="image_product">
                    <img src="views/project_images/<?= htmlspecialchars($product['img']) ?>">
                </div>
                <div class="content">
                    <h4 class="name"><?= htmlspecialchars($product['name']) ?></h4>
                    <h2 class="price"><?= htmlspecialchars($product['promotion']) ?>€ <del><?= htmlspecialchars($product['price']) ?>€</del> </h2>
                    <a href="../Panier/testPanier.php" class="id_product">Ajouter au panier</a>
                </div>
            </form>
        <?php endforeach; ?>
    </section>
</main>

<script src="views/script.js"></script> 

<?php include "footer/footer.html"; ?>

</body>
</html>
