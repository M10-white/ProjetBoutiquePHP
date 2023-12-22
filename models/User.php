<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createUser($username, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
    }

    public function checkUser($username, $password) {
        // vérifier si un utilisateur avec le username et le mdp donnés existe.
        $sql = "SELECT id FROM users WHERE username = :username AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
        
            // Vérifier si les champs de mot de passe sont vides
            if (!empty($password) && !empty($confirm_password)) {
                // Vérifier si les mots de passe correspondent
                if ($password == $confirm_password) {
                    // Hasher le mot de passe
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
                    // Insérer l'utilisateur dans la base de données
                    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                    $stmt->execute([$username, $hashed_password]);
                    echo "<div class='avert'>&#128275 Compte crée ! &#128275</div>";
                } else {
                    echo "<div class='avert'>&#128680 Les mots de passe ne correspondent pas ! &#128680</div>";
                }
            } else {
                echo "Veuillez entrer un mot de passe et le confirmer.";
            }
        }
    }
}
?>
