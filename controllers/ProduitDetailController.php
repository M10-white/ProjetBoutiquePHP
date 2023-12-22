<?php
class ProduitDetailController {
    private $produitDetailModel;

    public function __construct($produitDetailModel) {
        $this->produitDetailModel = $produitDetailModel;
    }

    public function showProductDetail($id_produit) {
        $product = $this->produitDetailModel->getProductById($id_produit);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'ajouter_au_panier') {
            if (isset($_SESSION['userId'])) {
                $this->handleAddToCart($_SESSION['userId'], $id_produit);
                $addToCartSuccess = true;
            }
        }

        include 'views/produitDetailView.php';
    }

    public function handleAddToCart($idUser, $id_produit) {
        $this->produitDetailModel->addToCart($idUser, $id_produit);
    }
}
?>
