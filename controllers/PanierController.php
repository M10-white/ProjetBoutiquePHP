<?php
class PanierController {
    private $panierModel;

    public function __construct($panierModel) {
        $this->panierModel = $panierModel;
    }

    public function showPanierPage($idUser) {
        $panierItems = $this->panierModel->getPanierItems($idUser);
        include 'views/panierView.php';
    }

    public function updateQuantity($idUser, $idProduit, $nouvelleQuantite) {
        $this->panierModel->updateItemQuantity($idUser, $idProduit, $nouvelleQuantite);

    }

    // autre méthode supp etc
}
?>
