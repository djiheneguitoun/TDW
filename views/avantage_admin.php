<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avantages Membres</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-poppins min-h-screen py-12">
    <div class="container mx-auto px-4" id="avantages-section">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-[#643869] text-center text-5xl font-bold mb-12 tracking-tight">
                Gestion des avantages
            </h1>
            
            <div class="overflow-x-auto shadow-xl rounded-2xl">
                <table class="w-full bg-white">
                    <thead>
                        <tr>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider rounded-tl-lg">Ville</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Partenaire</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Type de Carte</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Nom</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Description</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Type</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Conditions</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Valeur Remise</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider">Statut</th>
                            <th class="bg-[#643869] text-white px-2 py-4 text-center text-xs font-semibold uppercase tracking-wider rounded-tr-lg">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($avantagesData as $avantage): ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-2 py-4 text-xs ">
                                    <div class="flex items-center">
                                        <span class="font-medium text-[#643869] text-center"><?= htmlspecialchars($avantage['ville']) ?></span>
                                    </div>
                                </td>
                                <td class="px-2 py-4 text-xs w-full text-center">
                                    <span class="font-medium text-[#FF7C50]"><?= htmlspecialchars($avantage['nom_etabisement']) ?></span>
                                </td>
                                <td class="px-2 py-4 text-xs bg-gray-50">
                                    <span class="px-2 py-1 bg-[#643869] bg-opacity-10 rounded text-[#643869] font-medium">
                                        <?= htmlspecialchars($avantage['type_carte_nom']) ?>
                                    </span>
                                </td>
                                <td class="px-2 py-4 text-xs text-gray-700 w-full text-center"><?= htmlspecialchars($avantage['nom_avantage']) ?></td>
                                <td class="px-2 py-4 text-xs">
                                    <p class="line-clamp-2 text-gray-600 italic"><?= htmlspecialchars($avantage['description']) ?></p>
                                </td>
                                <td class="px-2 py-4 text-xs">
                                    <span class="px-2 py-1 bg-[#FF7C50] bg-opacity-10 rounded text-[#FF7C50] font-medium">
                                        <?= htmlspecialchars($avantage['type_avantage']) ?>
                                    </span>
                                </td>
                                <td class=" py-4 text-xs max-w-64 text-center">
                                    <div class=" overflow-hidden">
                                        <p class="text-gray-600 truncate"><?= htmlspecialchars($avantage['conditions']) ?></p>
                                    </div>
                                </td>
                                <td class="px-2 py-4 text-xs">
                                    <span class="font-bold text-[#FF7C50]"><?= htmlspecialchars($avantage['valeur_remise']) ?></span>
                                </td>
                                <td class="px-2 py-4 text-xs">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium 
                                        <?= $avantage['statut'] === 'actif' 
                                            ? 'bg-green-100 text-green-800 border border-green-200' 
                                            : 'bg-red-100 text-red-800 border border-red-200' ?>">
                                        <span class="w-1.5 h-1.5 rounded-full 
                                            <?= $avantage['statut'] === 'actif' ? 'bg-green-600' : 'bg-red-600' ?> 
                                            mr-1.5"></span>
                                        <?= htmlspecialchars($avantage['statut']) ?>
                                    </span>
                                </td>
                                <td class="px-2 py-4 text-xs">
                                    <?php if ($avantage['type_avantage'] === 'remise'): ?>
                                        <button class="bg-[#FF7C50] hover:bg-[#ff8d69] text-white px-4 py-2 rounded-lg transition-colors duration-200 shadow-sm flex items-center space-x-1" onclick="editRemise(<?= $avantage['avantage_id'] ?>, '<?= htmlspecialchars($avantage['valeur_remise']) ?>')">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            <span>Modifier</span>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="editRemisePopup" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md transform transition-all">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-[#643869] mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Modifier la Valeur de la Remise
                </h2>
                <form id="editRemiseForm" class="space-y-6">
                    <input type="hidden" id="avantage_id" name="avantage_id">
                    <div>
                        <label for="valeur_remise" class="block text-xs font-medium text-gray-700 mb-2">Valeur de la Remise</label>
                        <input type="text" id="valeur_remise" name="valeur_remise" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200"
                               required>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="closeEditRemisePopupButton" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Annuler
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-[#FF7C50] text-white rounded-lg hover:bg-[#ff8d69] transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editRemise(avantage_id, current_value) {
            document.getElementById('avantage_id').value = avantage_id;
            document.getElementById('valeur_remise').value = current_value;
            document.getElementById('editRemisePopup').classList.remove('hidden');
        }

        document.getElementById('closeEditRemisePopupButton').addEventListener('click', () => {
            document.getElementById('editRemisePopup').classList.add('hidden');
        });

        document.getElementById('editRemisePopup').addEventListener('click', (e) => {
            if (e.target.id === 'editRemisePopup') {
                document.getElementById('editRemisePopup').classList.add('hidden');
            }
        });

        document.getElementById('editRemiseForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('/elmuntada/updateRemise', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Erreur lors de la modification de la remise');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>