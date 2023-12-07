<?php
session_start();
?>

<?php

require_once '../../vendor/autoload.php';
require_once '../../vendor/secret.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1ODTaZIo9ERN19EjQJmCQqK2',
    'quantity' => $_GET['montant'],
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/boutique_telephone/Panier/paiement/paiementOK.php',
  'cancel_url' => $YOUR_DOMAIN . '/boutique_telephone/Panier/paiement/paiementKO.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);