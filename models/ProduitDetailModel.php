<?php
class ProduitDetailModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getProductById($id_produit) {
        $stmt = $this->pdo->prepare("SELECT * FROM produit WHERE ID_PRODUIT = :id_produit");
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addToCart($idUser, $id_produit) {
        $stmt = $this->pdo->prepare("SELECT * FROM contenue WHERE clients_id = :idUser AND produits_id = :id_produit");
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stmt = $this->pdo->prepare("UPDATE contenue SET quantité = quantité + 1 WHERE clients_id = :idUser AND produits_id = :id_produit");
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO contenue (clients_id, produits_id, quantité) VALUES (:idUser, :id_produit, 1)");
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
}
?>
