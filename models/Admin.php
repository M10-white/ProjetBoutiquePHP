<?php
class Admin {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function checkAdmin($username, $password) {
        $stmt = $this->pdo->prepare("SELECT id_admin FROM admin WHERE admin_username = :username AND admin_password = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
