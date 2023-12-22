<?php
class ProduitController {
    private $produitPanierModel;

    public function __construct($produitPanierModel) {
        $this->produitPanierModel = $produitPanierModel;
    }

    public function showProductsPage() {
        $triPrix = isset($_GET['triPrix']) ? $_GET['triPrix'] : 'croissant';
        $marquesFiltre = isset($_GET['marque']) ? $_GET['marque'] : array();

        $products = $this->produitPanierModel->getFilteredProducts($triPrix, $marquesFiltre);
        include 'views/produitsView.php';
    }
}
?>
