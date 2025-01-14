<?php require_once 'includes/header.php'; ?>
<div class="container mx-auto p-4">
    <div class="relative mb-16">
        <h1 class="text-[#643869] text-center text-6xl font-bold py-10 tracking-tight relative z-10">
            <span class="bg-gradient-to-r from-[#643869] to-[#FF7C50] bg-clip-text text-transparent">
                Détails du Partenaire
            </span>
            <div class="absolute left-1/2 -translate-x-1/2 bottom-0 w-32 h-1 bg-gradient-to-r from-[#643869] to-[#FF7C50] rounded-full"></div>
        </h1>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-[#643869]/5 to-[#FF7C50]/5 rounded-full blur-3xl -z-10"></div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
        <div class="relative mb-4 overflow-hidden rounded-2xl bg-gray-200">
            <?php if (!empty($partenaire['logo'])): ?>
                <img src="/elmuntada/assets/images/logo.png" alt="<?php echo htmlspecialchars($partenaire['nom_etabisement']); ?>" class="mx-auto rounded-2xl">
            <?php else: ?>
                <div class="w-full h-full bg-gray-300 rounded-2xl"></div>
            <?php endif; ?>
        </div>
        <h3 class="text-2xl font-bold mb-2 bg-gradient-to-r from-[#643869] to-[#FF7C50] bg-clip-text text-transparent">
            <?php echo htmlspecialchars($partenaire['nom_etabisement']); ?>
        </h3>
        <p class="text-gray-600 mb-2"><strong>Ville:</strong> <?php echo htmlspecialchars($partenaire['ville']); ?></p>
        <p class="text-gray-600 mb-2"><strong>Remise:</strong> <?php echo htmlspecialchars($partenaire['remise_percentage']); ?>%</p>
        <p class="text-gray-600 mb-2"><strong>Remise:</strong> <?php echo htmlspecialchars($partenaire['nom_etabisement']); ?>%</p>

        <p class="text-gray-600 mb-2"><strong>Détails:</strong> <?php echo htmlspecialchars($partenaire['details']); ?></p>
    </div>
</div>
