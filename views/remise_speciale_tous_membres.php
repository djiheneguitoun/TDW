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

        <!-- Add Button -->
        <div class="mb-4">
            <button id="openModal" class="bg-[#643869] text-white px-4 py-2 rounded-md hover:bg-[#5a3260]">Ajouter un avantage</button>
        </div>

        <!-- Enhanced Table Section -->
        <div class="bg-white/80 rounded-2xl overflow-hidden custom-shadow hover-scale backdrop-blur-xl">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-[#643869] text-white">
                            <th class="py-5 px-6 text-left font-semibold text-xs">Ville</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Partenaire</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Nom</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Description</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Conditions</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Valeur</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Statut</th>
                            <th class="py-5 px-6 text-left font-semibold text-xs">Date Fin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php
                        foreach ($avantagesData as $avantage):
                        ?>
                            <tr class="hover:bg-[#643869]/5 transition-colors duration-300">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs bg-[#FF7C50]/10 text-[#FF7C50] font-medium">
                                        <?= htmlspecialchars($avantage['ville']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-xs text-[#643869]">
                                    <?= htmlspecialchars($avantage['nom_etabisement']) ?>
                                </td>
                                <td class="py-4 px-6 text-xs">
                                    <?= htmlspecialchars($avantage['nom_avantage']) ?>
                                </td>
                                <td class="py-4 px-6 text-xs text-gray-600">
                                    <?= htmlspecialchars($avantage['description']) ?>
                                </td>
                                <td class="py-4 px-6 text-xs">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs bg-[#643869]/10 text-[#643869] font-medium">
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
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs bg-green-100 text-green-800 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-600 mr-1.5"></span>
                                            Actif
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs bg-gray-100 text-gray-800 font-medium">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-500 mr-1.5"></span>
                                            Inactif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-4 px-6 text-xs">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs bg-[#643869]/10 text-[#643869] font-medium">
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

    <!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden">
    <div class="bg-white p-8 rounded-2xl w-full max-w-2xl mx-4 shadow-2xl transform transition-all">
        <!-- Modal Header -->
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold text-[#643869] flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Ajouter un avantage
            </h2>
        </div>

        <form action="/elmuntada/addRemise" method="POST" class="space-y-6">
            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <label for="nom_avantage" class="block text-xs font-medium text-gray-700 mb-1">Nom de l'avantage</label>
                        <input type="text" id="nom_avantage" name="nom_avantage" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                            required>
                    </div>

                    <div>
                        <label for="type_carte_id" class="block text-xs font-medium text-gray-700 mb-1">Type de carte</label>
                        <select id="type_carte_id" name="type_carte_id" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                            required>
                            <?php foreach ($typesCarte as $typeCarte): ?>
                                <option value="<?= $typeCarte['type_carte_id'] ?>"><?= $typeCarte['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="partenaire_id" class="block text-xs font-medium text-gray-700 mb-1">Partenaire</label>
                        <select id="partenaire_id" name="partenaire_id" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                            required>
                            <?php foreach ($partenaires as $partenaire): ?>
                                <option value="<?= $partenaire['partenaire_id'] ?>"><?= $partenaire['nom_etabisement'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="valeur_remise" class="block text-xs font-medium text-gray-700 mb-1">Valeur de la remise</label>
                        <input type="text" id="valeur_remise" name="valeur_remise" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                            required>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <label for="conditions" class="block text-xs font-medium text-gray-700 mb-1">Conditions</label>
                        <input type="text" id="conditions" name="conditions" 
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                            required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="date_debut" class="block text-xs font-medium text-gray-700 mb-1">Date de début</label>
                            <input type="date" id="date_debut" name="date_debut" 
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                                required>
                        </div>
                        <div>
                            <label for="date_fin" class="block text-xs font-medium text-gray-700 mb-1">Date de fin</label>
                            <input type="date" id="date_fin" name="date_fin" 
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all"
                                required>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all resize-none"
                            required></textarea>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-6 border-t">
                <button type="button" id="closeModal" 
                    class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors duration-300">
                    Annuler
                </button>
                <button type="submit" 
                    class="px-6 py-2.5 rounded-lg bg-[#643869] text-white hover:bg-[#4f2c53] transition-colors duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Add smooth transitions for modal */
    #modal {
        transition: opacity 0.3s ease-in-out;
    }
    
    #modal.hidden {
        opacity: 0;
        pointer-events: none;
    }
    
    #modal:not(.hidden) {
        opacity: 1;
    }
    
    /* Custom scrollbar for description */
    textarea {
        scrollbar-width: thin;
        scrollbar-color: #643869 #f3f4f6;
    }
    
    textarea::-webkit-scrollbar {
        width: 8px;
    }
    
    textarea::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 4px;
    }
    
    textarea::-webkit-scrollbar-thumb {
        background-color: #643869;
        border-radius: 4px;
    }
</style>

    <script>
        document.getElementById('openModal').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        window.addEventListener('click', function(event) {
            if (event.target === document.getElementById('modal')) {
                document.getElementById('modal').classList.add('hidden');
            }
        });
    </script>
</body>
</html>
