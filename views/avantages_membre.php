<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avantages Membres</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-poppins min-h-screen py-6">
    <div class="container mx-auto px-3 max-w-6xl" id="avantages-section">
        <h1 class="text-[#643869] text-center text-4xl font-bold mb-6 drop-shadow-sm">Avantages Membres</h1>
        
        <div class="p-6 border rounded-xl  mb-4 flex flex-wrap gap-3 items-center justify-between">
            <div class="flex items-center space-x-3">
                <label for="sortSelect" class="text-sm font-medium text-gray-600">Trier par:</label>
                <select id="sortSelect" class="text-sm border border-gray-200 p-1.5 rounded-md focus:ring-2 focus:ring-[#643869]/30 focus:border-[#643869] outline-none bg-white/50">
                    <option value="ville">Ville</option>
                    <option value="nom_etabisement">Partenaire</option>
                    <option value="nom_avantage">Nom</option>
                    <option value="type_avantage">Type</option>
                    <option value="valeur_remise">Valeur Remise</option>
                    <option value="statut">Statut</option>
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
            <table class="w-full text-sm bg-white" id="avantagesTable">
                <thead>
                    <tr class="bg-[#643869] text-white">
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider f">Ville</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Partenaire</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Nom</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Description</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Type</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Conditions</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Valeur</th>
                        <th class="py-6 px-4 text-left font-semibold text-sm  tracking-wider">Statut</th>

                    </tr>
                </thead>
            <tbody id="avantagesTableBody">
                <?php
                $filteredAvantagesData = array_filter($avantagesData, function($avantage) {
                    return is_null($avantage['date_fin']);
                });
                // Tri par ville, puis partenaire
                usort($filteredAvantagesData, function($a, $b) {
                    $villeCompare = strcmp($a['ville'], $b['ville']);
                    if ($villeCompare === 0) {
                        return strcmp($a['nom_etabisement'], $b['nom_etabisement']);
                    }
                    return $villeCompare;
                });

                $currentVille = null;
                $currentPartner = null;
                $rowspanVille = 0;
                $rowspanPartner = 0;
                $villeCount = [];
                $partnerCount = [];

                // Calculer les rowspans
                foreach ($filteredAvantagesData as $avantage) {
                    // Compter par ville
                    if (!isset($villeCount[$avantage['ville']])) {
                        $villeCount[$avantage['ville']] = 0;
                    }
                    $villeCount[$avantage['ville']]++;

                    // Compter par partenaire dans une ville
                    $villePartnerKey = $avantage['ville'] . '-' . $avantage['nom_etabisement'];
                    if (!isset($partnerCount[$villePartnerKey])) {
                        $partnerCount[$villePartnerKey] = 0;
                    }
                    $partnerCount[$villePartnerKey]++;
                }

                foreach ($filteredAvantagesData as $index => $avantage):
                    $showVille = false;
                    $showPartner = false;

                    // Vérifier nouvelle ville
                    if ($currentVille !== $avantage['ville']) {
                        $currentVille = $avantage['ville'];
                        $showVille = true;
                        $rowspanVille = $villeCount[$currentVille];
                        $currentPartner = null; // Réinitialiser partenaire pour nouvelle ville
                    }

                    // Vérifier nouveau partenaire dans cette ville
                    $villePartnerKey = $avantage['ville'] . '-' . $avantage['nom_etabisement'];
                    if ($currentPartner !== $villePartnerKey) {
                        $currentPartner = $villePartnerKey;
                        $showPartner = true;
                        $rowspanPartner = $partnerCount[$villePartnerKey];
                    }
                ?>
                    <tr class="bg-white text-black">
                        <?php if ($showVille): ?>
                            <td class="py-4 px-6 text-sm border border-[#D5CCD6]" rowspan="<?= $rowspanVille ?>" style="border-right: 1px solid #D5CCD6; border-bottom: 1px solid #D5CCD6;">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-[#FF7C50]/10 text-[#FF7C50] font-medium">
                                        <?= htmlspecialchars($avantage['ville']) ?>
                                    </span>
                                                            </td>
                        <?php endif; ?>

                        <?php if ($showPartner): ?>
                            <td class="py-4 px-6 text-sm border-y border-[#D5CCD6] text-[#643869]" rowspan="<?= $rowspanPartner ?>" style="border-right: 1px solid #D5CCD6; border-bottom: 1px solid #D5CCD6;">
                                <?= htmlspecialchars($avantage['nom_etabisement']) ?>
                            </td>
                        <?php endif; ?>

                        <td class="py-4 px-6 text-sm border-y border-[#D5CCD6]"><?= htmlspecialchars($avantage['nom_avantage']) ?></td>
                        <td class="py-4 px-6 text-sm border-y border-[#D5CCD6] text-gray-600"><?= htmlspecialchars($avantage['description']) ?></td>
                        <td class="py-4 px-6 text-sm border-y border-[#D5CCD6]"><?= htmlspecialchars($avantage['type_avantage']) ?></td>
                        <td class="py-4 px-6 text-sm border-y border-[#D5CCD6]">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm bg-[#643869]/10 text-[#643869] font-medium">
                                        <?= htmlspecialchars($avantage['conditions']) ?>
                                    </span>
                        </td>
                        <td class="py-4 px-6 text-sm border-y border-[#D5CCD6]">
                        <div class="flex items-center space-x-2">
                                        <div class="w-2 h-2 rounded-full bg-[#FF7C50] animate-pulse"></div>
                                        <span class="font-bold text-[#FF7C50]">
                                            <?= htmlspecialchars($avantage['valeur_remise']) ?>
                                        </span>
                                    </div>
                        </td>
                        <td class="py-4 px-6 text-sm border-y border-[#D5CCD6]">
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
  const filteredAvantagesData = <?php echo json_encode($filteredAvantagesData); ?>;

console.log(filteredAvantagesData); // Debugging statement to check the data structure

function renderTable(data) {
    const tableBody = document.getElementById('avantagesTableBody');
    tableBody.innerHTML = '';

    let currentVille = null;
    let currentPartner = null;
    let rowspanVille = 0;
    let rowspanPartner = 0;
    let villeCount = {};
    let partnerCount = {};

    // Calculer les rowspans
    data.forEach(avantage => {
        // Compter par ville
        if (!villeCount[avantage.ville]) {
            villeCount[avantage.ville] = 0;
        }
        villeCount[avantage.ville]++;

        // Compter par partenaire dans une ville
        const villePartnerKey = avantage.ville + '-' + avantage.nom_etabisement;
        if (!partnerCount[villePartnerKey]) {
            partnerCount[villePartnerKey] = 0;
        }
        partnerCount[villePartnerKey]++;
    });

    data.forEach(avantage => {
        let showVille = false;
        let showPartner = false;

        // Vérifier nouvelle ville
        if (currentVille !== avantage.ville) {
            currentVille = avantage.ville;
            showVille = true;
            rowspanVille = villeCount[currentVille];
            currentPartner = null; // Réinitialiser partenaire pour nouvelle ville
        }

        // Vérifier nouveau partenaire dans cette ville
        const villePartnerKey = avantage.ville + '-' + avantage.nom_etabisement;
        if (currentPartner !== villePartnerKey) {
            currentPartner = villePartnerKey;
            showPartner = true;
            rowspanPartner = partnerCount[villePartnerKey];
        }

        const row = document.createElement('tr');
        row.classList.add('bg-white', 'text-black');

        if (showVille) {
            const villeCell = document.createElement('td');
villeCell.classList.add('py-4', 'px-6', 'border', 'border-[#D5CCD6]');
villeCell.setAttribute('rowspan', rowspanVille);
villeCell.style.borderRight = '1px solid #D5CCD6';
villeCell.style.borderBottom = '1px solid #D5CCD6';

const villeSpan = document.createElement('span');
villeSpan.textContent = avantage.ville;
villeSpan.classList.add( 'font-meduim', 'bg-[#FF7C50]/10','text-[#FF7C50]','rounded-lg','px-3','py-1'); // Add any specific Tailwind classes for styling

villeCell.appendChild(villeSpan);

row.appendChild(villeCell);

        }

        if (showPartner) {
            const partnerCell = document.createElement('td');
            partnerCell.classList.add('py-4', 'px-6', 'border', 'border-[#D5CCD6]','text-[#643869]');
            partnerCell.setAttribute('rowspan', rowspanPartner);
            partnerCell.style.borderRight = '1px solid #D5CCD6';
            partnerCell.style.borderBottom = '1px solid #D5CCD6';
            partnerCell.textContent = avantage.nom_etabisement;
            row.appendChild(partnerCell);
        }

        const nomCell = document.createElement('td');
        nomCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');
        nomCell.textContent = avantage.nom_avantage;
        row.appendChild(nomCell);

        const descriptionCell = document.createElement('td');
        descriptionCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]','text-gray-600');
        descriptionCell.textContent = avantage.description;
        row.appendChild(descriptionCell);

        const typeCell = document.createElement('td');
        typeCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');
        typeCell.textContent = avantage.type_avantage;
        row.appendChild(typeCell);

        const conditionsCell = document.createElement('td');
conditionsCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');

// Create a span for the conditions text
const conditionsSpan = document.createElement('span');
conditionsSpan.textContent = avantage.conditions;
conditionsSpan.classList.add(
     'rounded-lg', 'text-sm', 
    'bg-[#643869]/10', 'text-[#643869]', 'font-medium'
);

// Append the span to the conditionsCell
conditionsCell.appendChild(conditionsSpan);

// Append the conditionsCell to the row
row.appendChild(conditionsCell);


     const valeurRemiseCell = document.createElement('td');
valeurRemiseCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');

// Create a wrapper div with flex layout
const wrapperDiv = document.createElement('div');
wrapperDiv.classList.add('flex', 'items-center', 'space-x-2');

// Create the small animated dot
const dotDiv = document.createElement('div');
dotDiv.classList.add('w-2', 'h-2', 'rounded-full', 'bg-[#FF7C50]', 'animate-pulse');

// Create the span for the valeur_remise text
const valeurRemiseSpan = document.createElement('span');
valeurRemiseSpan.textContent = avantage.valeur_remise;
valeurRemiseSpan.classList.add('font-bold', 'text-[#FF7C50]');

// Append the dot and span to the wrapper div
wrapperDiv.appendChild(dotDiv);
wrapperDiv.appendChild(valeurRemiseSpan);

// Append the wrapper div to the cell
valeurRemiseCell.appendChild(wrapperDiv);

// Append the cell to the row
row.appendChild(valeurRemiseCell);


 const statutCell = document.createElement('td');
statutCell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');

// Determine status and set up classes and text
const isActive = avantage.statut === 'actif';
const statusSpan = document.createElement('span');
statusSpan.classList.add(
    'inline-flex', 'items-center', 'px-3', 'py-1', 'rounded-lg', 'text-sm', 
    'font-medium',
    isActive ? 'bg-green-100' : 'bg-gray-100',
    isActive ? 'text-green-800' : 'text-gray-800'
);

// Create the small status dot
const statusDot = document.createElement('span');
statusDot.classList.add(
    'w-1.5', 'h-1.5', 'rounded-full', 'mr-1.5',
    isActive ? 'bg-green-600' : 'bg-gray-500'
);

// Add the status text
statusSpan.textContent = isActive ? 'Actif' : 'Inactif';

// Prepend the dot to the span
statusSpan.prepend(statusDot);

// Append the span to the cell
statutCell.appendChild(statusSpan);

// Append the cell to the row
row.appendChild(statutCell);

  
        tableBody.appendChild(row);
    });
}

function renderSimpleTable(data) {
    const tableBody = document.getElementById('avantagesTableBody');
    tableBody.innerHTML = '';

    data.forEach(avantage => {
        const row = document.createElement('tr');
        row.classList.add('bg-white', 'text-black');

        // Create all cells without rowspan logic
        const cells = [
            { content: avantage.ville },
            { content: avantage.nom_etabisement },
            { content: avantage.nom_avantage },
            { content: avantage.description },
            { content: avantage.type_avantage },
            { content: avantage.conditions },
            { content: avantage.valeur_remise },
            { content: avantage.statut },
           // Ensure this field is correctly accessed
        ];

        cells.forEach(cellData => {
            const cell = document.createElement('td');
            cell.classList.add('py-4', 'px-6', 'border-y', 'border-[#D5CCD6]');
            cell.textContent = cellData.content;
            row.appendChild(cell);
        });

        tableBody.appendChild(row);
    });
}

function sortData(data, sortBy) {
    const sortedData = [...data]; // Create a copy to avoid modifying original data

    if (sortBy === 'ville') {
        // Special handling for ville sorting to maintain partner grouping
        return sortedData.sort((a, b) => {
            const villeCompare = a.ville.localeCompare(b.ville);
            if (villeCompare === 0) {
                return a.nom_etabisement.localeCompare(b.nom_etabisement);
            }
            return villeCompare;
        });
    } else {
        // Regular sorting for other columns
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
    const sortedData = sortData(filteredAvantagesData, event.target.value);
    if (event.target.value === 'ville') {
        renderTable(sortedData); // Use original grouped rendering for ville sorting
    } else {
        renderSimpleTable(sortedData); // Use simple rendering for other sorts
    }
});

document.getElementById('filterInput').addEventListener('input', (event) => {
    const filteredData = filterData(filteredAvantagesData, event.target.value);
    renderTable(filteredData);
});

// Initial render
renderTable(filteredAvantagesData);
console.log(filteredAvantagesData);

</script>

</body>
</html>
