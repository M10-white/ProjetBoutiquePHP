<?php
class ConnexionController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function showLoginForm() {
        include 'views/connexionView.php';
    }

    public function Login($username, $password) {
        $user = $this->userModel->checkUser($username, $password);
        if ($user) {
            $_SESSION['userId'] = $user['id']; //stocke l'ID de l'utilisateur dans la session
            $loginStatus = "Connexion réussie. ID de l'utilisateur: " . $_SESSION['userId'];
        } else {
            
            $loginStatus = "Identifiants incorrects.";
        }
        include 'views/connexionView.php'; 
    }
}
?>