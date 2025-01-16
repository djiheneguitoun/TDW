<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Partner Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">
    <?php if ($partenaire): ?>
    <div class="w-full max-w-md mx-auto perspective my-auto">
        <!-- Main Card Container with improved vertical spacing -->
        <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden transform hover:scale-105 transition-transform duration-300 my-8">
            <!-- Decorative Elements -->
            <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full border-8 border-[#FF7C50] opacity-10"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 rounded-full border-8 border-[#643869] opacity-10"></div>
            
            <!-- Top Banner with adjusted padding -->
            <div class="relative px-8 pt-10 pb-6">
                <div class="flex justify-between items-start">
                    <!-- Logo Section -->
                    <div class="relative z-10">
                        <div class="w-20 h-20 rounded-2xl bg-white shadow-lg p-1 rotate-3 hover:rotate-0 transition-transform duration-300">
                            <img src="uploads/<?php echo htmlspecialchars($partenaire['logo']); ?>"
                                 alt="Partner Logo"
                                 class="w-full h-full object-cover rounded-xl">
                        </div>
                    </div>
                    <!-- Premium Badge -->
                    <div class="flex items-center space-x-2 bg-[#643869] text-white px-4 py-2 rounded-full text-sm">
                        <span class="w-2 h-2 bg-[#FF7C50] rounded-full"></span>
                        <span>Premium Partner</span>
                    </div>
                </div>
                
                <!-- Company Name with adjusted margins -->
                <h2 class="text-[#643869] text-3xl font-bold mt-8 tracking-tight"><?php echo htmlspecialchars($partenaire['nom_etabisement']); ?></h2>
            </div>

            <!-- Modern Card Pattern -->
            <div class="px-8 py-6">
                <div class="flex items-center space-x-3">
                    <?php for($i = 0; $i < 12; $i++): ?>
                        <div class="w-2 h-2 rounded-full <?php echo $i % 3 === 0 ? 'bg-[#FF7C50]' : 'bg-gray-200'; ?>"></div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Stats Section with improved spacing -->
            <div class="px-8 py-8">
                <div class="flex justify-between items-stretch">
                    <div class="flex-1 text-center p-4 rounded-2xl bg-gray-50">
                        <p class="text-sm text-gray-500 mb-1">Remise</p>
                        <p class="text-2xl font-bold text-[#FF7C50]"><?php echo htmlspecialchars($partenaire['remise_percentage']); ?>%</p>
                    </div>
                    <div class="w-px bg-gray-100 mx-4"></div>
                    <div class="flex-1 text-center p-4 rounded-2xl bg-gray-50">
                        <p class="text-sm text-gray-500 mb-1">Ville</p>
                        <p class="text-2xl font-bold text-[#643869]"><?php echo htmlspecialchars($partenaire['ville']); ?></p>
                    </div>
                    <div class="w-px bg-gray-100 mx-4"></div>
                    <div class="flex-1 text-center p-4 rounded-2xl bg-gray-50">
                        <p class="text-sm text-gray-500 mb-1">Catégorie</p>
                        <p class="text-2xl font-bold text-[#643869]"><?php echo htmlspecialchars($partenaire['categorie_nom']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Details Section with consistent spacing -->
            <div class="px-8 py-8">
                <div class="relative">
                    <h3 class="text-lg font-semibold text-[#643869] mb-4 flex items-center">
                        <span class="w-2 h-8 bg-[#FF7C50] rounded-r absolute -left-8"></span>
                        Détails
                    </h3>
                    <p class="text-gray-600 leading-relaxed"><?php echo htmlspecialchars($partenaire['details']); ?></p>
                </div>
            </div>

            <!-- Footer with adjusted padding -->
            <div class="px-8 py-8 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="w-3 h-3 rounded-full bg-[#FF7C50]"></span>
                        <span class="w-3 h-3 rounded-full bg-[#643869]"></span>
                        <span class="w-3 h-3 rounded-full bg-[#FF7C50]"></span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">Valid until</span>
                        <span class="text-lg font-bold text-[#643869]">12/25</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-white p-8 rounded-3xl shadow-lg text-center">
        <div class="w-20 h-20 bg-gray-50 rounded-2xl mx-auto flex items-center justify-center mb-4 rotate-3">
            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </div>
        <p class="text-gray-600">Aucun partenaire trouvé pour cet utilisateur.</p>
    </div>
    <?php endif; ?>
</body>
</html>