<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-orange': '#FF7C50',
                        'custom-purple': '#643869',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen font-['Poppins']">
    <div class="py-20 ">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-custom-purple mb-4 animate-fade-in">Membres Validés</h1>
                <div class="h-1 w-32 bg-custom-orange mx-auto rounded-full"></div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 animate-fade-in">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" id="filterInput" placeholder="Rechercher un membre..." 
                               class="pl-10 w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent transition-all duration-200">
                    </div>

                    <div>
                        <select id="cardTypeFilter" class=" text-sm w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent appearance-none bg-white transition-all duration-200">
                            <option value="">Type de Carte</option>
                            <option value="jeune">Jeune</option>
                            <option value="classique">Classique</option>
                            <option value="premium">Premium</option>
                        </select>
                    </div>

                    <div>
                        <select id="sortSelect" class=" text-sm w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent appearance-none bg-white transition-all duration-200">
                            <option value="">Trier par</option>
                            <option value="nom">Nom</option>
                            <option value="prenom">Prénom</option>
                            <option value="email">Email</option>
                            <option value="date">Date d'inscription</option>
                        </select>
                    </div>

                    <div>
                        <button id="sortDirection" class=" text-sm w-full px-4 py-3 bg-custom-purple text-white rounded-xl hover:bg-opacity-90 transition-all duration-200 flex items-center justify-center gap-2">
                            <span>Ordre Croissant</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in">
                <table class="min-w-full">
                    <thead class="bg-custom-purple text-white">
                        <tr>
                            <th class="py-4 px-6 text-sm text-left font-semibold rounded-tl-xl">Nom</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Prénom</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Email</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Téléphone</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Adresse</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Type de Carte</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Date de création</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold">Code QR</th>
                            <th class="py-4 px-6 text-sm text-left font-semibold rounded-tr-xl">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="membresTableBody" class="divide-y divide-gray-100">
                        <?php foreach ($membres as $membre) : ?>
                        <tr class="hover:bg-gray-50 transition-all duration-200">
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['nom']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['prenom']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['email']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['telephone']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['adresse']); ?></td>
                            <td class="text-sm py-4 px-6">
    <?php 
        $cardClass = 'bg-gray-100 text-gray-800'; 
        
        if ($membre['type_carte_nom'] === 'premium') {
            $cardClass = 'bg-purple-100 text-purple-800';
        } elseif ($membre['type_carte_nom'] === 'jeune') {
            $cardClass = 'bg-green-100 text-green-800';
        } elseif ($membre['type_carte_nom'] === 'classique') {
            $cardClass = 'bg-blue-100 text-blue-800';
        }
    ?>
    <span class="px-3 py-1 rounded-full text-sm font-semibold <?php echo $cardClass; ?>">
        <?php echo htmlspecialchars($membre['type_carte_nom']); ?>
    </span>
</td>
                            <td class="text-sm py-4 px-6">
                                <?php
                                    $date = new DateTime($membre['date_inscription']);
                                    echo $date->format('d/m/Y');
                                ?>
                            </td>
                            <td class="text-sm py-4 px-6">
                                <div class="p-1 bg-white rounded-lg shadow-sm inline-block hover:shadow-md transition-shadow duration-200">
                                    <img src="uploads/<?php echo $membre['code_qr']; ?>" alt="QR Code" class="h-16 w-16 object-contain rounded-lg">
                                </div>
                            </td>
                            <td class="text-sm py-4 px-6">
                                <button class="bg-custom-purple hover:bg-opacity-90 text-white py-2 px-4 rounded-xl transition-all duration-200 transform hover:scale-105 view-more-btn" 
                                        data-membre-id="<?php echo htmlspecialchars($membre['membre_id']); ?>">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Voir plus
                                    </span>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="membrePopup" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-4xl w-full mx-4 relative transform transition-all duration-300">
            <button id="closePiiiiw" class="absolute top-4 right-4 text-gray-500 hover:text-custom-purple transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div id="membreDetails" class="space-y-8">
                <div class="border-b border-gray-200 pb-6">
                    <h2 class="text-2xl font-bold text-custom-purple mb-2">
                        <?php echo htmlspecialchars($membre['nom']); ?> <?php echo htmlspecialchars($membre['prenom']); ?>
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600">
                        <p class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-custom-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <?php echo htmlspecialchars($membre['adresse']); ?>
                        </p>
                        <p class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-custom-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <?php echo htmlspecialchars($membre['telephone']); ?>
                        </p>
                        <p class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-custom-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <?php echo htmlspecialchars($membre['email']); ?>
                        </p>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-custom-purple">Documents du membre</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-3">
                            <div class="aspect-square rounded-xl overflow-hidden shadow-lg border-4 border-custom-orange">
                                <img src="uploads/<?php echo htmlspecialchars($membre['photo']); ?>" alt="Photo de profil" class="w-full h-full object-cover">
                            </div>
                            <p class="text-center font-medium text-custom-purple">Photo de profil</p>
                        </div>

                        <div class="space-y-3">
                            <div class="aspect-square rounded-xl overflow-hidden shadow-lg border-4 border-custom-purple">
                                <img src="uploads/<?php echo htmlspecialchars($membre['piece_identite']); ?>" alt="Carte d'identité" class="w-full h-full object-cover">
                            </div>
                            <p class="text-center font-medium text-custom-purple">Carte d'identité</p>
                        </div>

                        <div class="space-y-3">
                            <div class="aspect-square rounded-xl overflow-hidden shadow-lg border-4 border-custom-orange">
                                <img src="uploads/<?php echo htmlspecialchars($membre['recu_paiement']); ?>" alt="Reçu de paiement" class="w-full h-full object-cover">
                            </div>
                            <p class="text-center font-medium text-custom-purple">Reçu de paiement</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
if (!window.viewMoreBtnss) {
    window.viewMoreBtnss = document.querySelectorAll('.view-more-btn');
}

if (!window.membrePopup) {
    window.membrePopup = document.getElementById('membrePopup');
}

if (!window.closePopup) {
    window.closePopup = document.getElementById('closePiiiiw');
}

if (!window.filterInput) {
    window.filterInput = document.getElementById('filterInput');
}

if (!window.cardTypeFilter) {
    window.cardTypeFilter = document.getElementById('cardTypeFilter');
}

if (!window.sortSelect) {
    window.sortSelect = document.getElementById('sortSelect');
}

if (!window.sortDirectionBtn) {
    window.sortDirectionBtn = document.getElementById('sortDirection');
}

if (!window.membresTableBody) {
    window.membresTableBody = document.getElementById('membresTableBody');
}

if (!window.isAscending) {
    window.isAscending = true;
}

            sortDirectionBtn.addEventListener('click', function() {
                isAscending = !isAscending;
                this.querySelector('span').textContent = isAscending ? 'Ordre Croissant' : 'Ordre Décroissant';
                applyFiltersAndSort();
            });

            function applyFiltersAndSort() {
                const filterValue = filterInput.value.toLowerCase();
                const cardType = cardTypeFilter.value.toLowerCase();
                const sortBy = sortSelect.value;
                const rows = Array.from(membresTableBody.querySelectorAll('tr'));

                rows.forEach(row => {
                    const nom = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                    const prenom = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    const type = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
                    
                    const matchesFilter = (nom.includes(filterValue) || prenom.includes(filterValue));
                    const matchesCardType = !cardType || type.includes(cardType);
                    
                    row.style.display = (matchesFilter && matchesCardType) ? '' : 'none';
                });

                if (sortBy) {
                    rows.sort((a, b) => {
                        let aValue = a.querySelector(`td:nth-child(${getColumnIndex(sortBy)})`).textContent;
                        let bValue = b.querySelector(`td:nth-child(${getColumnIndex(sortBy)})`).textContent;
                        
                        if (sortBy === 'date') {
                            aValue = new Date(aValue.split('/').reverse().join('-'));
                            bValue = new Date(bValue.split('/').reverse().join('-'));
                        }
                        
                        if (aValue < bValue) return isAscending ? -1 : 1;
                        if (aValue > bValue) return isAscending ? 1 : -1;
                        return 0;
                    });

                    rows.forEach(row => membresTableBody.appendChild(row));
                }
            }

            filterInput.addEventListener('input', applyFiltersAndSort);
            cardTypeFilter.addEventListener('change', applyFiltersAndSort);
            sortSelect.addEventListener('change', applyFiltersAndSort);

            function getColumnIndex(sortValue) {
                const indices = {
                    'nom': 1,
                    'prenom': 2,
                    'email': 3,
                    'date': 7
                };
                return indices[sortValue] || 1;
            }

            viewMoreBtnss.forEach(button => {
                button.addEventListener('click', function() {
                    const membreId = this.getAttribute('data-membre-id');
                    fetch(`/elmuntada/membre-details?id=${membreId}`)
                        .then(response => response.text())
                        .then(data => {
                            membrePopup.classList.remove('hidden');
                            membrePopup.classList.add('flex');
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            closePopup.addEventListener('click', closeModal);
            membrePopup.addEventListener('click', function(event) {
                if (event.target === membrePopup) closeModal();
            });

            function closeModal() {
                membrePopup.classList.add('hidden');
                membrePopup.classList.remove('flex');
            }
    </script>
</body>
</html>