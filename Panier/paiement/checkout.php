<?php
session_start();
require_once '../../vendor/autoload.php';
require_once '../../vendor/secret.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);

$YOUR_DOMAIN = 'http://localhost/dashboard';

$montant = isset($_GET['montant']) ? $_GET['montant'] : 0;

try {
    $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => 'Total du Panier',
                ],
                'unit_amount' => $montant,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . '/boutique_telephone2/Panier/paiement/paiementOK.php',
        'cancel_url' => $YOUR_DOMAIN . '/boutique_telephone2/Panier/paiement/paiementKO.php',
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    header("Location: " . $YOUR_DOMAIN . '/boutique_telephone2/Panier/paiement/paiementKO.php');
    exit();
}
?>
