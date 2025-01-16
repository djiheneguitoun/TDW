<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Partenaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-white font-poppins min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
                <div>
                    <h1 class="text-[#643869] text-4xl font-bold mb-2 tracking-tight">Liste des Partenaires</h1>
                    <p class="text-gray-600 text-lg">Gérez vos partenaires en toute simplicité</p>
                </div>
           
            </div>
            
            <div class="overflow-x-auto shadow-xl rounded-2xl">
                <table class="w-full bg-white">
                    <thead>
                        <tr>
                            <th class="bg-[#643869] text-white px-3 py-4 text-left text-xs font-semibold uppercase tracking-wider rounded-tl-lg">Ville</th>
                            <th class="bg-[#643869] text-white px-3 py-4 text-left text-xs font-semibold uppercase tracking-wider">Catégorie</th>
                            <th class="bg-[#643869] text-white px-3 py-4 text-left text-xs font-semibold uppercase tracking-wider">Établissement</th>
                            <th class="bg-[#643869] text-white px-3 py-4 text-left text-xs font-semibold uppercase tracking-wider">Remise</th>
                            <th class="bg-[#643869] text-white px-3 py-4 text-left text-xs font-semibold uppercase tracking-wider">Détails</th>
                            <th class="bg-[#643869] text-white px-3 py-4 text-center text-xs font-semibold uppercase tracking-wider rounded-tr-lg">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($partenairesData as $partenaire): ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-3 py-4 text-xs">
                                <div class="flex items-center">
                                    <span class="w-2 h-2 bg-[#643869] rounded-full mr-2"></span>
                                    <span class="font-medium text-[#643869]"><?php echo $partenaire['ville']; ?></span>
                                </div>
                            </td>
                            <td class="px-3 py-4 text-xs">
                                <span class="px-2 py-1 bg-[#FF7C50] bg-opacity-10 rounded text-[#FF7C50] font-medium">
                                    <?php echo $partenaire['categorie_nom']; ?>
                                </span>
                            </td>
                            <td class="px-3 py-4 text-xs">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-2">
                                        <span class="text-[#643869] font-bold"><?php echo substr($partenaire['nom_etabisement'], 0, 1); ?></span>
                                    </div>
                                    <span class="font-medium"><?php echo $partenaire['nom_etabisement']; ?></span>
                                </div>
                            </td>
                            <td class="px-3 py-4 text-xs">
                                <span class="font-bold text-[#FF7C50] text-base"><?php echo $partenaire['remise_percentage']; ?>%</span>
                            </td>
                            <td class="px-3 py-4 text-xs">
                                <p class="line-clamp-2 text-gray-600 italic max-w-xs"><?php echo $partenaire['details']; ?></p>
                            </td>
                            <td class="px-3 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <button onclick="editPartenaire(<?php echo $partenaire['partenaire_id']; ?>)" 
                                            class="group flex items-center justify-center px-4 py-2 rounded-lg text-xs font-medium text-white bg-[#643869] hover:bg-[#7a4580] transition-all duration-200 shadow-sm hover:shadow-md">
                                        <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Modifier
                                    </button>
                                    
                                    <button onclick="deletePartenaire(<?php echo $partenaire['partenaire_id']; ?>)" 
                                            class="group flex items-center justify-center px-4 py-2 rounded-lg text-xs font-medium text-white bg-red-500 hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md">
                                        <svg class="w-4 h-4 mr-1.5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Supprimer
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for editing partner -->
    <div id="editPartenairePopup" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 transform transition-all">
            <div class="px-6 py-4 bg-[#643869] text-white flex items-center justify-between rounded-t-2xl">
                <h2 class="text-xl font-bold flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    Modifier un Partenaire
                </h2>
                <button id="closeEditPopupButton" class="text-white hover:text-gray-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form id="editPartenaireForm" enctype="multipart/form-data" class="p-6">
                <input type="hidden" id="partenaire_id" name="partenaire_id">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="edit_nom_etabisement" class="block text-xs font-medium text-gray-700 mb-2">
                            Nom de l'établissement
                        </label>
                        <input type="text" id="edit_nom_etabisement" name="nom_etabisement" 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200"
                               required>
                    </div>
                    <div>
                        <label for="edit_remise_percentage" class="block text-xs font-medium text-gray-700 mb-2">
                            Remise (%)
                        </label>
                        <input type="number" id="edit_remise_percentage" name="remise_percentage" 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200"
                               required>
                    </div>
                    <div>
                        <label for="edit_categorie_id" class="block text-xs font-medium text-gray-700 mb-2">
                            Catégorie
                        </label>
                        <select id="edit_categorie_id" name="categorie_id" 
                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200"
                                required>
                            <?php
                            $categories = $this->partenaire->getAllCategories();
                            while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $row['categorie_id'] . '">' . $row['nom'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="edit_ville" class="block text-xs font-medium text-gray-700 mb-2">
                            Ville
                        </label>
                        <input type="text" id="edit_ville" name="ville" 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200"
                               required>
                    </div>
                    <div class="col-span-2">
                        <label for="edit_details" class="block text-xs font-medium text-gray-700 mb-2">
                            Détails
                        </label>
                        <textarea id="edit_details" name="details" rows="3"
                                  class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200"
                                  required></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="edit_logo" class="block text-xs font-medium text-gray-700 mb-2">
                            Logo
                        </label>
                        <div class="flex items-center space-x-2">
                            <input type="file" id="edit_logo" name="logo" 
                                   class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#643869] focus:border-transparent transition-all duration-200">
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" id="cancelEditButton"
                            class="px-6 py-2 rounded-lg text-gray-700 bg-gray-100 hover:bg-gray-200 transition-all duration-200 shadow-sm hover:shadow flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Annuler
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 rounded-lg text-white bg-[#FF7C50] hover:bg-[#ff8d69] transition-all duration-200 shadow-sm hover:shadow flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editPartenaire(partenaire_id) {
            fetch('/elmuntada/getPartenaire?id=' + partenaire_id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('partenaire_id').value = data.partenaire_id;
                    document.getElementById('edit_nom_etabisement').value = data.nom_etabisement;
                    document.getElementById('edit_remise_percentage').value = data.remise_percentage;
                    document.getElementById('edit_categorie_id').value = data.categorie_id;
                    document.getElementById('edit_details').value = data.details;
                    document.getElementById('edit_ville').value = data.ville;
                    document.getElementById('editPartenairePopup').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function closeModal() {
            document.getElementById('editPartenairePopup').classList.add('hidden');
        }

        document.getElementById('closeEditPopupButton').addEventListener('click', closeModal);
        document.getElementById('cancelEditButton').addEventListener('click', closeModal);

        document.getElementById('editPartenairePopup').addEventListener('click', (e) => {
            if (e.target.id === 'editPartenairePopup') {
                closeModal();
            }
        });

        document.getElementById('editPartenaireForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('/elmuntada/updatePartenaire', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) {
                    window.location.href = '/elmuntada/admin-dashboard';
                } else {
                    alert('Erreur lors de la modification du partenaire');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        });

        function deletePartenaire(partenaire_id) {
            if (confirm('Voulez-vous vraiment supprimer ce partenaire ?')) {
                fetch('/elmuntada/deletePartenaire', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ partenaire_id: partenaire_id })
                }).then(response => {
                    if (response.ok) {
                        window.location.href = '/elmuntada/admin-dashboard';
                    } else {
                        alert('Erreur lors de la suppression du partenaire');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>
</body>
</html>