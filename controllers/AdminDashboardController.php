<?php
class AdminDashboardController {
    private $commandeModel;
    
    public function __construct($commandeModel) {
        $this->commandeModel = $commandeModel;
    }

    public function showDashboard() {
        $totalCommands = $this->commandeModel->getTotalCommands();
        $latestOrder = $this->commandeModel->getLatestOrder();
        $allOrders = $this->commandeModel->getAllOrders();
        
        include 'views/adminDashboardView.php';
    }
}
?>
