<link rel="icon" type="image/x-icon" href="images/icon.png">
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'Connexion.php';
require 'models/Produit.php';
require 'models/User.php';
require 'models/produitPanier.php';
require 'models/ProduitDetailModel.php';
require 'models/Admin.php';
require 'models/Commande.php';
require 'models/Panier.php';
require 'controllers/AccueilController.php';
require 'controllers/InscriptionController.php';
require 'controllers/ConnexionController.php';
require 'controllers/ProduitController.php';
require 'controllers/PresentationController.php';
require 'controllers/ProduitDetailController.php';
require 'controllers/AdminController.php';
require 'controllers/AdminDashboardController.php';
require 'controllers/PanierController.php';


$pdo = Connexion::getPDO();
$userModel = new User($pdo);
$produitModel = new Produit($pdo);
$produitPanierModel = new ProduitPanier($pdo);
$produitDetailModel = new ProduitDetailModel($pdo);
$adminModel = new Admin($pdo);
$commandeModel = new Commande($pdo);
$panierModel = new Panier($pdo);
$accueilController = new AccueilController($produitModel);
$inscriptionController = new InscriptionController($userModel);
$connexionController = new ConnexionController($userModel);
$produitController = new ProduitController($produitPanierModel);
$presentationController = new PresentationController();
$produitDetailController = new ProduitDetailController($produitDetailModel);
$adminController = new AdminController($adminModel);
$adminDashboardController = new AdminDashboardController($commandeModel);
$panierController = new PanierController($panierModel);


if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'accueil':
            $accueilController->showHomePage();
            break;
            case 'inscription':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $inscriptionController->Inscription($_POST['username'], $_POST['password']);
                } else {
                    $inscriptionController->showInscriptionForm();
                }
                break;
        case 'connexion':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connexionController->Login($_POST['username'], $_POST['password']);
            } else {
                $connexionController->showLoginForm();
            }
            break;

        case 'produits': 
            $produitController->showProductsPage();
            break;

        case 'presentation':
            $presentationController->showPresentationPage();
            break;

        case 'detail_produit':
            $id_produit = $_GET['id_produit'] ?? null;
            $produitDetailController->showProductDetail($id_produit);
            break;

        case 'adminLogin':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $adminController->login($_POST['username'], $_POST['password']);
            } else {
                $adminController->showLoginForm();
            }
            break;

        case 'admin_dashboard':
            $adminDashboardController->showDashboard();
            break;

        case 'panier':
            $idUser = $_SESSION['userId'] ?? null;
                if ($idUser) {
                    $panierController->showPanierPage($idUser);
                } else {
                    $inscriptionController->showInscriptionForm();
                }

    }
} else {
    $accueilController->showHomePage();
}
