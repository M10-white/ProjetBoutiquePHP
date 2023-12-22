<?php
class Panier {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getPanierItems($idUser) {
        $stmt = $this->pdo->prepare("SELECT produit.NOM_PRODUIT, produit.PRIX_PRODUIT, contenue.quantité, (produit.PRIX_PRODUIT * contenue.quantité) AS total FROM contenue 
        JOIN produit ON contenue.produits_id = produit.ID_PRODUIT
        WHERE contenue.clients_id = :idUser");
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateItemQuantity($idUser, $idProduit, $nouvelleQuantite) {
        $stmt = $this->pdo->prepare("UPDATE contenue SET quantité = :nouvelleQuantite WHERE clients_id = :idUser AND produits_id = :idProduit");
        $stmt->bindParam(':nouvelleQuantite', $nouvelleQuantite, PDO::PARAM_INT);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':idProduit', $idProduit, PDO::PARAM_INT);
        $stmt->execute();
    }

    // m"thdode supp article ou modif
}
?>
