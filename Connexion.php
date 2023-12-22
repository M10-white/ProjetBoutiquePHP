<?php
class Connexion {
    private static $pdo = null;

    public static function getPDO() {
        include 'Connect.php'; 

        if (self::$pdo === null) {
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
            try {
                self::$pdo = new PDO($dsn, $user, $pass);
            } catch (PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
                exit();
            }
        }
        return self::$pdo;
    }
}
