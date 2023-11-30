<link rel="icon" type="image/x-icon" href="../images/icon.png">

<?php
session_start();
 include '../header/header.html';
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=boutique_telephone', 'root', '');

$triPrix = isset($_GET['triPrix']) ? $_GET['triPrix'] : 'croissant';

// Requête SQL pour récupérer les produits avec les filtres
$query = "SELECT * FROM produit WHERE 1";

// Appliquez le filtre de tri par prix
if ($triPrix === 'croissant') {
    $query .= " ORDER BY PRIX_PRODUIT ASC";
} else {
    $query .= " ORDER BY PRIX_PRODUIT DESC";
}

$marquesAutorisees = ['iPhone', 'Samsung', 'Motorola', 'LG', 'Nokia', 'OnePlus', 'Asus', 'Google', 'Sony', 'Xiaomi'];
$marquesFiltre = isset($_GET['marque']) ? $_GET['marque'] : array();

// Filtrer les marques sélectionnées pour inclure uniquement celles autorisées
$marquesFiltre = array_intersect($marquesFiltre, $marquesAutorisees);

// Requête SQL pour récupérer les produits avec les filtres
$query = "SELECT * FROM produit WHERE 1";

// Ajouter le filtre par marque s'il y a des marques sélectionnées
if (!empty($marquesFiltre)) {
    $query .= " AND MARQUE_TEL IN ('" . implode("', '", $marquesFiltre) . "')";
}

// Appliquez le filtre de tri par prix
if ($triPrix === 'croissant') {
    $query .= " ORDER BY PRIX_PRODUIT ASC";
} else {
    $query .= " ORDER BY PRIX_PRODUIT DESC";
}

$statement = $pdo->prepare($query);
$statement->execute();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
?>



<main>
    <form method="GET"> <!-- Ajout d'un formulaire pour les filtres -->
       <header>
            <label for="triPrix">Trier par prix :</label>
            <select id="triPrix" name="triPrix"> 
                <option value="croissant">Prix Croissant</option>
                <option value="decroissant">Prix Décroissant</option>
            </select>
            <input style="margin: 5px 0 0 50px;" type="submit" value="Appliquer">
            <br></br>
            <label for="triPrix">Filtrer par marque :</label>
            <label id="triPrix"> 
                <input type="checkbox" name="marque[]" value="iPhone"> iPhone</input>
                <input type="checkbox" name="marque[]" value="Samsung"> Samsung</input>
                <input type="checkbox" name="marque[]" value="Motorola"> Motorola</input>
                <input type="checkbox" name="marque[]" value="LG"> LG</input>
                <input type="checkbox" name="marque[]" value="Nokia"> Nokia</input>
                <input type="checkbox" name="marque[]" value="OnePlus"> OnePlus</input>
                <input type="checkbox" name="marque[]" value="Asus"> Asus</input>
                <input type="checkbox" name="marque[]" value="Google"> Google</input>
                <input type="checkbox" name="marque[]" value="Sony"> Sony</input>
                <input type="checkbox" name="marque[]" value="Xiaomi"> Xiaomi</input>
            </label>       
        <input style="margin: 0 0 0 50px;" type="submit" value="Appliquer le filtre par marque">
    </form> <!-- Fin du formulaire -->
    <form method="GET" action="Page_Produit.php">
    <input type="text" name="search" id="searchInput" placeholder="Rechercher des produits">
    <button type="submit">Rechercher</button>
    <a href="Page_Produit.php"><button type="submit">Reset</button></a>
     </form>
          <?php
          // Connexion à la base de données
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "boutique_telephone";
          
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          
          // Récupérer la valeur de recherche depuis l'URL
          $search = isset($_GET['search']) ? $_GET['search'] : '';
          
          // Requête pour récupérer les produits en fonction de la recherche
          $query = "SELECT * FROM produit WHERE NOM_PRODUIT LIKE '%$search%'";
          $statement = $pdo->prepare($query);
          $statement->execute();
          
          $products = array();
          
          ?>
    <h1>Nos Produits</h1>
    <div class="Produit">
    <ul id="productList">
    <!-- Liste de produits sera générée dynamiquement par JavaScript -->
    </ul>
    <ul>
    <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)): ?>
        <li>
        <h2><?= $row['NOM_PRODUIT'] ?></h2>
        <!-- Lien vers la page de détail du produit avec l'ID du produit en paramètre -->
        <a href="detail_produit.php?id_produit=<?= $row['ID_PRODUIT'] ?>">
            <img class="image_produit" src="<?= $row['URL_IMAGE'] ?>" alt="Image du produit">
        </a>
        <div class="description_generale">
        <div class="description_produit">
        <p class="prix_produit"><u>Prix</u> : <?= $row['PRIX_PRODUIT'] ?> €</p>
        <p><u>Stock</u> : <?= $row['STOCK_PRODUIT'] ?></p>
        <p><u>Marque</u> : <?= $row['MARQUE_TEL'] ?></p>
        <p><u>Caractéristique</u> : <?= $row['CARACTERISTIQUE_TEL'] ?></p>
        </div>
        <div class="notation">
        <p><u>Note moyenne</u> :</p>
        </div>
        <?php
        // Génération d'une note aléatoire entre 1 et 5 étoiles
        $averageRating = rand(1, 5);
        // Affichez la note moyenne en tant que symboles d'étoiles
        echo '<p>';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $averageRating) {
                echo '&#9733;'; // Étoile pleine
            } else {
                echo '&#9734;'; // Étoile vide
            }
        }
        echo '</p>';
        ?>
        </div>
        </li>
    <?php endwhile; ?>

    <?php if ($statement->rowCount() === 0): ?>
    <p>Aucun produit trouvé.</p>
    <?php endif; ?>
    </ul>
    </div>
</main>

<?php include '../footer/footer.html'; ?> <!-- Inclure le footer -->

</body>
</html>

<?php
// Fermeture de la connexion à la base de données
$pdo = null;
?>

