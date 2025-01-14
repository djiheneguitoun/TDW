<?php require_once 'includes/header.php'; ?>
<div class="container mx-auto p-4">
    <div class="relative mb-16">
        <h1 class="text-[#643869] text-center text-6xl font-bold py-10 tracking-tight relative z-10">
            <span class="bg-gradient-to-r from-[#643869] to-[#FF7C50] bg-clip-text text-transparent">
                Catalogue des Partenaires
            </span>
            <div class="absolute left-1/2 -translate-x-1/2 bottom-0 w-32 h-1 bg-gradient-to-r from-[#643869] to-[#FF7C50] rounded-full"></div>
        </h1>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-[#643869]/5 to-[#FF7C50]/5 rounded-full blur-3xl -z-10"></div>
    </div>

    <div class="mb-4 flex justify-center">
    <div class="relative w-full max-w-xs">
        <select id="ville-filter" class="block w-full p-4 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#643869] focus:border-[#643869] sm:text-sm">
            <option value="">Toutes les villes</option>
            <?php
            $villes = [];
            foreach ($partenairesData as $categoryPartenaires) {
                foreach ($categoryPartenaires as $partenaire) {
                    if (!in_array($partenaire['ville'], $villes)) {
                        $villes[] = $partenaire['ville'];
                        echo '<option value="' . htmlspecialchars($partenaire['ville']) . '">' . htmlspecialchars($partenaire['ville']) . '</option>';
                    }
                }
            }
            ?>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </div>
</div>


    
    <div id="partenaires-container">
        <?php foreach ($categoriesData as $category): ?>
            <div class="mb-16 mx-auto">
                <!-- Category Title with modern styling -->
                <div class="relative mb-10">
                    <h2 class="text-3xl font-bold mb-4 text-center relative">
                        <span class="relative inline-block">
                            <span class="relative z-10  px-4">
                            <?php echo htmlspecialchars($category['nom']); ?>
                            </span>
                            <span class="absolute bottom-2 left-0 w-full h-3 bg-[#FF7C50]/10 -skew-x-6"></span>
                            <div class="absolute -bottom-2 left-0 w-full h-0.5 bg-gradient-to-r from-[#FF7C50] to-transparent rounded-full"></div>
                        </span>
                    </h2>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-[#FF7C50]/5 to-transparent rounded-full blur-2xl -z-10"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2  gap-20">
                    <?php foreach ($partenairesData[$category['categorie_id']] as $partenaire): ?>
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
                            <p class="text-gray-600 mb-2"><strong>Remise:</strong> <?php echo htmlspecialchars($partenaire['nom_etabisement']); ?>%</p>

                            <p class="text-gray-600 mb-2"><strong>Remise:</strong> <?php echo htmlspecialchars($partenaire['remise_percentage']); ?>%</p>
                            <a href="/elmuntada/details?id=<?php echo $partenaire['partenaire_id']; ?>" class=" w-fit flex justify-start mt-4 text-center text-white bg-gradient-to-r from-[#643869] to-[#FF7C50] hover:from-[#FF7C50] hover:to-[#643869] font-bold py-2 px-4 rounded-lg transition-all">
        Voir détails
    </a>

    
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
document.getElementById('ville-filter').addEventListener('change', function() {
    const ville = this.value;
    fetch('/elmuntada/catalogue/filter?ville=' + encodeURIComponent(ville))
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('partenaires-container');
            container.innerHTML = '';
            data.forEach(categoryData => {
                const category = categoryData.category;
                const partenaires = categoryData.partenaires;

                const categoryElement = document.createElement('div');
                categoryElement.classList.add('mb-16', 'mx-auto');
                categoryElement.innerHTML = `
                    <div class="relative mb-10">
                        <h2 class="text-3xl font-bold mb-4 text-center relative">
                            <span class="relative inline-block">
                                <span class="relative z-10  px-4">
                                ${category.nom}
                                </span>
                                <span class="absolute bottom-2 left-0 w-full h-3 bg-[#FF7C50]/10 -skew-x-6"></span>
                                <div class="absolute -bottom-2 left-0 w-full h-0.5 bg-gradient-to-r from-[#FF7C50] to-transparent rounded-full"></div>
                            </span>
                        </h2>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-r from-[#FF7C50]/5 to-transparent rounded-full blur-2xl -z-10"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2  gap-20">
                        ${partenaires.map(partenaire => `
                            <div class="bg-white p-6 rounded-2xl shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                                <div class="relative mb-4 overflow-hidden rounded-2xl bg-gray-200">
                                    ${partenaire.logo ? `<img src="/elmuntada/assets/images/logo.png" alt="${partenaire.nom_etabisement}" class="mx-auto rounded-2xl">` : '<div class="w-full h-full bg-gray-300 rounded-2xl"></div>'}
                                </div>
                                <h3 class="text-2xl font-bold mb-2 bg-gradient-to-r from-[#643869] to-[#FF7C50] bg-clip-text text-transparent">
                                    ${partenaire.nom_etabisement}
                                </h3>
                                <p class="text-gray-600 mb-2"><strong>Ville:</strong> ${partenaire.ville}</p>
                                <p class="text-gray-600 mb-2"><strong>Remise:</strong> ${partenaire.remise_percentage}%</p>
                            </div>
                        `).join('')}
                    </div>
                `;
                container.appendChild(categoryElement);
            });
        });
});
</script>
