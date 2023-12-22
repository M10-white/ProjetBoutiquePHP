<?php
class AdminController {
    private $adminModel;

    public function __construct($adminModel) {
        $this->adminModel = $adminModel;
    }

    public function showLoginForm() {
        include 'views/adminLoginView.php';
    }

    public function login($username, $password) {
        $admin = $this->adminModel->checkAdmin($username, $password);
        if ($admin) {
            $_SESSION['userId'] = $admin['id_admin'];
            include 'views/adminDashboardView.php';
            exit();
        } else {
            $error_message = "Identifiants incorrects";
            include 'views/adminLoginView.php';
        }
    }
}
?>
