<?php
class Commande {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTotalCommands() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM commandes");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['total'] : 0;
    }

    public function getLatestOrder() {
        $stmt = $this->pdo->prepare("SELECT id, date_commande, payer FROM commandes ORDER BY date_commande DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllOrders() {
        $stmt = $this->pdo->prepare("SELECT id, date_commande, payer FROM commandes ORDER BY date_commande DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
