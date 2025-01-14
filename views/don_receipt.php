<?php require_once 'includes/header.php'; ?>
<div class="container mx-auto p-4">
    <h1 class="text-center text-3xl font-bold py-10">Reçu de Don</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p><strong>ID du Don:</strong> <?php echo htmlspecialchars($receipt['don_id']); ?></p>
        <p><strong>Membre ID:</strong> <?php echo htmlspecialchars($receipt['membre_id']); ?></p>
        <p><strong>Montant:</strong> <?php echo htmlspecialchars($receipt['montant']); ?></p>
        <p><strong>Date du Don:</strong> <?php echo htmlspecialchars($receipt['date_don']); ?></p>
        <p><strong>Reçu de Paiement:</strong> <a href="<?php echo htmlspecialchars($receipt['recu_paiement']); ?>" target="_blank">Télécharger le reçu</a></p>
    </div>
</div>
