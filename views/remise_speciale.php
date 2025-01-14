<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remises Speciales</title>
    <script src="https://cdn.tailwindcss.com"></script>
 
</head>
<body class="bg-[#fafafa] min-h-screen py-12">
   

    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Enhanced Header -->
        <div class="mb-12 text-center relative">
            <div class="inline-block">
                <div class="bg-white/50 p-8 rounded-2xl custom-shadow hover-scale backdrop-blur-xl">
                    <h1 class="text-[#643869] text-4xl font-bold mb-4">
                        Remises Speciales
                    </h1>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                        Découvrez nos offres exclusives et avantages spéciaux pour nos membres
                    </p>
                </div>
            </div>
        </div>

        <!-- Enhanced Table Section -->
        <div class="bg-white/80 rounded-2xl overflow-hidden custom-shadow hover-scale backdrop-blur-xl">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-[#643869] text-white">
                            <th class="py-5 px-6 text-left font-semibold text-sm">Ville</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Partenaire</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Nom</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Description</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Conditions</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Valeur</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Statut</th>
                            <th class="py-5 px-6 text-left font-semibold text-sm">Date Fin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php
                        $filteredAvantages = array_filter($avantagesData, function($avantage) {
                            return !is_null($avantage['date_fin']) && $avantage['type_avantage'] === 'remise';
                        });

                        foreach ($filteredAvantages as $avantage):
                        ?>
                            <tr class="hover:bg-[#643869]/5 transition-colors duration-300">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-[#FF7C50]/10 text-[#FF7C50] font-medium">
                                        <?= htmlspecialchars($avantage['ville']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-[#643869]">
                                    <?= htmlspecialchars($avantage['nom_etabisement']) ?>
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    <?= htmlspecialchars($avantage['nom_avantage']) ?>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600">
                                    <?= htmlspecialchars($avantage['description']) ?>
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-[#643869]/10 text-[#643869] font-medium">
                                        <?= htmlspecialchars($avantage['conditions']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-2 h-2 rounded-full bg-[#FF7C50] animate-pulse"></div>
                                        <span class="font-bold text-[#FF7C50]">
                                            <?= htmlspecialchars($avantage['valeur_remise']) ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <?php if ($avantage['statut'] === 'actif'): ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-green-100 text-green-800 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-600 mr-1.5"></span>
                                            Actif
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-gray-100 text-gray-800 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-500 mr-1.5"></span>
                                            Inactif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-[#643869]/10 text-[#643869] font-medium">
                                        <?php 
                                            $date = new DateTime($avantage['date_fin']);
                                            echo $date->format('d M Y');
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>