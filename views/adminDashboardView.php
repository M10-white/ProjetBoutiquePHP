<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin - GemsPhones</title>
    <link rel="stylesheet" href="connexionInscription/css.css">
</head>
<body>

<?php include "header/header.html"; ?>

<div class="form-container2">
    <h1>Tableau de bord Admin</h1>
    <p>Bienvenue, administrateur!</p>

    <div class="form-container">
        <h2>Résumé des commandes</h2>
        <p>Total des commandes : <?= $totalCommands ?></p>
        <p>Dernière commande : <?= $latestOrder['id'] ?? 'Aucune commande' ?></p>
        <p>Date de la dernière commande : <?= $latestOrder['date_commande'] ?? 'N/A' ?></p>
        <p>Statut de paiement de la dernière commande : <?= $latestOrder['payer'] ?? 'N/A' ?></p>
    </div>

    <div class="form-container">
        <h2>Détails des commandes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>Date de commande</th>
                    <th>Statut de paiement</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allOrders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['id']) ?></td>
                        <td><?= htmlspecialchars($order['date_commande']) ?></td>
                        <td><?= htmlspecialchars($order['payer']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <br><br>
</div>

<?php include "footer/footer.html"; ?>

</body>
</html>
