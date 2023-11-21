<?php
session_start();
if(isset($_SESSION['userId'])) {
    $idUser = $_SESSION['userId'];
} else {
    echo "trouve pas l'id";
}
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=boutique_telephone', 'root', '');

if (isset($_GET['id_produit'])) {
    // Récupère la valeur de 'id_produit' depuis l'URL
    $id_produit = $_GET['id_produit'];
    
    // Requête SQL pour sélectionner le produit avec l'ID correspondant
    $query = "SELECT * FROM produit WHERE ID_PRODUIT = :id_produit";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id_produit', $id_produit);
    $statement->execute();

    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo $id_produit;
        $nom_produit = $row['NOM_PRODUIT'];
        $description_produit = $row['DESCRIPTION_PRODUIT'];
        $prix_produit = $row['PRIX_PRODUIT'];
        $stock_produit = $row['STOCK_PRODUIT'];
        $marque_tel = $row['MARQUE_TEL'];
        $caracteristique_tel = $row['CARACTERISTIQUE_TEL'];
        $url_image = $row['URL_IMAGE'];
    } else {
        header('Location: liste_produits.php');
        exit();
    }
} else {
    header('Location: liste_produits.php');
    exit();
}

//

if (isset($_POST['bouton'])) {
    //verif si le produit existe déja dans le panier
    $stmt = $pdo->prepare("SELECT * FROM contenue WHERE clients_id = $idUser AND produits_id = $id_produit");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        //si il existe, creér
        $stmt = $pdo->prepare("UPDATE contenue SET quantité = quantité + 1 WHERE clients_id = $idUser AND produits_id = $id_produit");
        $stmt->execute();
    } else {
        // si il n'existe pas, +1
        $stmt = $pdo->prepare("INSERT INTO contenue (clients_id, produits_id, quantité) VALUES ($idUser, $id_produit, 1)");
        $stmt->execute();
    }

    echo "ajouté";
}

//


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $nom_produit ?></title>
    <link href="Boutique.css" rel="stylesheet">
</head>
<body>
<main>
    <a href="Page_Produit.php"><input type="button" class="boutonD" value="RETOUR"/></a>
    <div class="detail_produit">
        <h1 class="h1_detail"><?= $row['NOM_PRODUIT'] ?></h1>
        <img class="image_detail" src="<?= $url_image ?>" alt="<?= $nom_produit ?>">
        <div class="description_detail_produit">
        <p><u>Description</u> : <?= $description_produit ?></p>
        <p><u>Prix</u> : <?= $prix_produit ?> €</p>
        <p><u>Stock</u> : <?= $stock_produit ?></p>
        <p><u>Marque</u> : <?= $marque_tel ?></p>
        <p><u>Caractéristique</u> : <?= $caracteristique_tel ?></p>
        <form action="" method="POST"><button name="bouton" >Ajouter au panier</button></form>
        </div>
    </div>
</main>

</body>
</html>

<?php
$pdo = null;
?>

