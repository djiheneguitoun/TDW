<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Partenaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-poppins min-h-screen py-6">
    <div class="container mx-auto px-3 max-w-6xl" id="partenaires-section">
        <h1 class="text-[#643869] text-center text-4xl font-bold mb-6 drop-shadow-sm">Liste des Partenaires</h1>
        <button id="addPartenaireButton" class="bg-[#643869] text-white px-4 py-2 rounded-md mb-4">Ajouter Partenaire</button>
        <div class="p-6 border rounded-xl mb-4 flex flex-wrap gap-3 items-center justify-between">
            <div class="flex items-center space-x-3">
                <label for="sortSelect" class="text-sm font-medium text-gray-600">Trier par:</label>
                <select id="sortSelect" class="text-sm border border-gray-200 p-1.5 rounded-md focus:ring-2 focus:ring-[#643869]/30 focus:border-[#643869] outline-none bg-white/50">
                    <option value="ville">Ville</option>
                    <option value="categorie_nom">Catégorie</option>
                    <option value="nom_etabisement">Nom de l'établissement</option>
                    <option value="remise_percentage">Remise (%)</option>
                </select>
            </div>
            <div class="relative">
                <input type="text" id="filterInput" placeholder="Rechercher..."
                    class="text-sm w-64 border border-gray-200 p-1.5 pl-8 rounded-md focus:ring-2 focus:ring-[#643869]/30 focus:border-[#643869] outline-none bg-white/50"
                >
                <svg class="absolute left-2.5 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <div class="table-container overflow-x-auto rounded-xl">
            <table class="w-full text-sm bg-white" id="partenairesTable">
                <thead>
                    <tr class="bg-[#643869] text-white">
                        <th class="py-6 px-4 text-left font-semibold text-sm tracking-wider">Ville</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm tracking-wider">Catégorie</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm tracking-wider">Nom de l'établissement</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm tracking-wider">Remise (%)</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm tracking-wider">Détails</th>
                    </tr>
                </thead>
                <tbody id="partenairesTableBody"></tbody>
            </table>
        </div>
    </div>
    <div id="addPartenairePopup" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-full max-w-3xl">
            <h2 class="text-xl font-bold mb-4">Ajouter un Partenaire</h2>
            <form id="addPartenaireForm" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="nom" class="block text-gray-700">Nom</label>
                    <input type="text" id="nom" name="nom" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="prenom" class="block text-gray-700">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="mot_de_passe" class="block text-gray-700">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="nom_etabisement" class="block text-gray-700">Nom de l'établissement</label>
                    <input type="text" id="nom_etabisement" name="nom_etabisement" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="remise_percentage" class="block text-gray-700">Remise (%)</label>
                    <input type="number" id="remise_percentage" name="remise_percentage" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="categorie_id" class="block text-gray-700">Catégorie</label>
                    <select id="categorie_id" name="categorie_id" class="w-full border border-gray-300 p-2 rounded-md" required>
                        <?php
                        $categories = $this->partenaire->getAllCategories();
                        while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['categorie_id'] . '">' . $row['nom'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="details" class="block text-gray-700">Détails</label>
                    <textarea id="details" name="details" class="w-full border border-gray-300 p-2 rounded-md" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="ville" class="block text-gray-700">Ville</label>
                    <input type="text" id="ville" name="ville" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label for="logo" class="block text-gray-700">Logo</label>
                    <input type="file" id="logo" name="logo" class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div class="flex justify-end col-span-2">
                    <button type="button" id="closePopupButton" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">Annuler</button>
                    <button type="submit" class="bg-[#643869] text-white px-4 py-2 rounded-md">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('addPartenaireButton').addEventListener('click', () => {
            document.getElementById('addPartenairePopup').classList.remove('hidden');
        });

        document.getElementById('closePopupButton').addEventListener('click', () => {
            document.getElementById('addPartenairePopup').classList.add('hidden');
        });

        document.getElementById('addPartenaireForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('/elmuntada/addPartenaire', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) {
                    window.location.href = '/elmuntada/admin-dashboard';
                } else {
                    alert('Erreur lors de l\'ajout du partenaire');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        });

        window.partenairesData = window.partenairesData || <?php echo json_encode($partenairesData); ?>;

        function renderTable(data) {
            const tableBody = document.getElementById('partenairesTableBody');
            tableBody.innerHTML = '';

            let groupedData = {};
            data.forEach(partenaire => {
                const ville = partenaire.ville;
                const categorie = partenaire.categorie_nom;

                if (!groupedData[ville]) {
                    groupedData[ville] = {};
                }
                if (!groupedData[ville][categorie]) {
                    groupedData[ville][categorie] = [];
                }
                groupedData[ville][categorie].push(partenaire);
            });

            let villeRowspans = {};
            let categorieRowspans = {};
            Object.keys(groupedData).forEach(ville => {
                let villeTotal = 0;
                Object.keys(groupedData[ville]).forEach(categorie => {
                    const count = groupedData[ville][categorie].length;
                    categorieRowspans[ville] = categorieRowspans[ville] || {};
                    categorieRowspans[ville][categorie] = count;
                    villeTotal += count;
                });
                villeRowspans[ville] = villeTotal;
            });

            Object.keys(groupedData).forEach(ville => {
                let firstVille = true;
                Object.keys(groupedData[ville]).forEach(categorie => {
                    let firstCategorie = true;
                    groupedData[ville][categorie].forEach(partenaire => {
                        const row = document.createElement('tr');
                        row.classList.add('bg-white', 'text-black');

                        if (firstVille) {
                            const villeCell = document.createElement('td');
                            villeCell.classList.add('py-4', 'px-6', 'border', 'border-[#D5CCD6]');
                            villeCell.setAttribute('rowspan', villeRowspans[ville]);
                            villeCell.style.borderRight = '1px solid #D5CCD6';
                            villeCell.style.borderBottom = '1px solid #D5CCD6';

                            const villeSpan = document.createElement('span');
                            villeSpan.textContent = ville;
                            villeSpan.classList.add('inline-flex', 'items-center', 'px-3', 'py-1', 'rounded-lg', 'text-sm', 'bg-[#FF7C50]/10', 'text-[#FF7C50]', 'font-medium');

                            villeCell.appendChild(villeSpan);
                            row.appendChild(villeCell);
                        }

                        if (firstCategorie) {
                            const categorieCell = document.createElement('td');
                            categorieCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]', 'text-[#643869]');
                            categorieCell.setAttribute('rowspan', categorieRowspans[ville][categorie]);
                            categorieCell.style.borderRight = '1px solid #D5CCD6';
                            categorieCell.style.borderBottom = '1px solid #D5CCD6';
                            categorieCell.textContent = categorie;
                            row.appendChild(categorieCell);
                        }

                        const nomCell = document.createElement('td');
                        nomCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');
                        nomCell.textContent = partenaire.nom_etabisement;
                        row.appendChild(nomCell);

                        const remiseCell = document.createElement('td');
                        remiseCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');
                        remiseCell.textContent = partenaire.remise_percentage;
                        row.appendChild(remiseCell);

                        const detailsCell = document.createElement('td');
                        detailsCell.classList.add('py-4', 'px-6', 'border-y', 'border-l','border-[#D5CCD6]');
                        detailsCell.textContent = partenaire.details;
                        row.appendChild(detailsCell);

                        tableBody.appendChild(row);

                        firstVille = false;
                        firstCategorie = false;
                    });
                });
            });
        }

        function sortData(data, sortBy) {
            const sortedData = [...data];

            if (sortBy === 'ville') {
                return sortedData.sort((a, b) => {
                    const villeCompare = a.ville.localeCompare(b.ville);
                    if (villeCompare === 0) {
                        return a.categorie_nom.localeCompare(b.categorie_nom);
                    }
                    return villeCompare;
                });
            } else {
                return sortedData.sort((a, b) => {
                    if (typeof a[sortBy] === 'string') {
                        return a[sortBy].localeCompare(b[sortBy]);
                    }
                    return a[sortBy] - b[sortBy];
                });
            }
        }

        function filterData(data, filterText) {
            return data.filter(item => {
                return Object.values(item).some(value =>
                    String(value).toLowerCase().includes(filterText.toLowerCase())
                );
            });
        }

        document.getElementById('sortSelect').addEventListener('change', (event) => {
            const sortedData = sortData(partenairesData, event.target.value);
            renderTable(sortedData);
        });

        document.getElementById('filterInput').addEventListener('input', (event) => {
            const filteredData = filterData(partenairesData, event.target.value);
            renderTable(filteredData);
        });

        renderTable(partenairesData);
    </script>
</body>
</html>
