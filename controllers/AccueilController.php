<?php
class AccueilController {
    private $produitModel;

    public function __construct($produitModel) {
        $this->produitModel = $produitModel;
    }

    public function showHomePage() {
        $featuredProducts = $this->produitModel->getProducts();
        include 'views/accueilView.php';
    }
}
?>