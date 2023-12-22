<?php
class InscriptionController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function showInscriptionForm() {
        include 'views/inscriptionView.php';
    }

    public function Inscription($username, $password) {
        try {
            $this->userModel->createUser($username, $password);
            $inscriptionStatus = "Compte créé avec succès.";
        } catch (Exception $e) {
            $inscriptionStatus = "Erreur lors de la création du compte: " . $e->getMessage();
        }
        include 'views/inscriptionView.php';
    }
}

?>