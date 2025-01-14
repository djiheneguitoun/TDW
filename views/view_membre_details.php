<div class="flex items-center gap-4 mb-4">
    <div class="w-24 h-24 rounded-full overflow-hidden shadow-lg">
        <img src="uploads/<?php echo htmlspecialchars($membre['photo']); ?>" alt="Photo" class="w-full h-full object-cover">
    </div>
    <div class="w-24 h-24 rounded-full overflow-hidden shadow-lg">
        <img src="uploads/<?php echo htmlspecialchars($membre['piece_identite']); ?>" alt="Photo" class="w-full h-full object-cover">
    </div>
    <div class="w-24 h-24 rounded-full overflow-hidden shadow-lg">
        <img src="uploads/<?php echo htmlspecialchars($membre['recu_paiement']); ?>" alt="Photo" class="w-full h-full object-cover">
    </div>
    <div>
        <h2 class="text-xl font-bold tracking-wider mb-2"><?php echo htmlspecialchars($membre['nom']); ?> <?php echo htmlspecialchars($membre['prenom']); ?></h2>
        <p class="text-sm font-medium"><?php echo htmlspecialchars($membre['adresse']); ?></p>
    </div>
</div>
<div class="mb-4">
    <label class="block text-gray-700">Téléphone :</label>
    <p class="text-sm font-medium"><?php echo htmlspecialchars($membre['telephone']); ?></p>
</div>
<div class="mb-4">
    <label class="block text-gray-700">Email :</label>
    <p class="text-sm font-medium"><?php echo htmlspecialchars($membre['email']); ?></p>
</div>
