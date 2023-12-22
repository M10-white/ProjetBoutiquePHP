<?php
class ProduitPanier {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getFilteredProducts($triPrix, $marquesFiltre) {
        $query = "SELECT * FROM produit WHERE 1";

        // filtrer par marque
        if (!empty($marquesFiltre)) {
            $query .= " AND MARQUE_TEL IN ('" . implode("', '", $marquesFiltre) . "')";
        }

        // trier par prix
        $query .= ($triPrix === 'croissant') ? " ORDER BY PRIX_PRODUIT ASC" : " ORDER BY PRIX_PRODUIT DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
