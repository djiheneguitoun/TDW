<div class="container p-4" id="avantages-section">
    <h1 class="text-[#643869] text-center text-5xl font-bold py-10">Avantages Membres</h1>
    <div class="mx-auto">
        <table class="max-w-7xl bg-white text-sm mx-auto rounded-3xl overflow-hidden border-collapse">
            <thead>
                <tr class="bg-[#643869] text-white">
                    <th class="py-2 px-4 border-y border-white">Ville</th>
                    <th class="py-2 px-4 border-y border-white">Partenaire</th>
                    <th class="py-2 px-4 border-y border-white">Type de Carte</th>
                    <th class="py-2 px-4 border-y border-white">Nom</th>
                    <th class="py-2 px-4 border-y border-white">Description</th>
                    <th class="py-2 px-4 border-y border-white">Type</th>
                    <th class="py-2 px-4 border-y border-white">Conditions</th>
                    <th class="py-2 px-4 border-y border-white">Valeur Remise</th>
                    <th class="py-2 px-4 border-y border-white">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                usort($avantagesData, function($a, $b) {
                    $villeCompare = strcmp($a['ville'], $b['ville']);
                    if ($villeCompare === 0) {
                        $partnerCompare = strcmp($a['nom_etabisement'], $b['nom_etabisement']);
                        if ($partnerCompare === 0) {
                            return strcmp($a['type_carte_nom'], $b['type_carte_nom']);
                        }
                        return $partnerCompare;
                    }
                    return $villeCompare;
                });

                $currentVille = null;
                $currentPartner = null;
                $currentType = null;
                $rowspanVille = 0;
                $rowspanPartner = 0;
                $rowspanType = 0;
                $villeCount = [];
                $partnerCount = [];
                $typeCount = [];

                foreach ($avantagesData as $avantage) {
                    if (!isset($villeCount[$avantage['ville']])) {
                        $villeCount[$avantage['ville']] = 0;
                    }
                    $villeCount[$avantage['ville']]++;

                    $villePartnerKey = $avantage['ville'] . '-' . $avantage['nom_etabisement'];
                    if (!isset($partnerCount[$villePartnerKey])) {
                        $partnerCount[$villePartnerKey] = 0;
                    }
                    $partnerCount[$villePartnerKey]++;

                    $partnerTypeKey = $villePartnerKey . '-' . $avantage['type_carte_nom'];
                    if (!isset($typeCount[$partnerTypeKey])) {
                        $typeCount[$partnerTypeKey] = 0;
                    }
                    $typeCount[$partnerTypeKey]++;
                }

                foreach ($avantagesData as $index => $avantage):
                    $showVille = false;
                    $showPartner = false;
                    $showType = false;

                    if ($currentVille !== $avantage['ville']) {
                        $currentVille = $avantage['ville'];
                        $showVille = true;
                        $rowspanVille = $villeCount[$currentVille];
                        $currentPartner = null; 
                    }

                    $villePartnerKey = $avantage['ville'] . '-' . $avantage['nom_etabisement'];
                    if ($currentPartner !== $villePartnerKey) {
                        $currentPartner = $villePartnerKey;
                        $showPartner = true;
                        $rowspanPartner = $partnerCount[$villePartnerKey];
                        $currentType = null; 
                    }

                    $partnerTypeKey = $villePartnerKey . '-' . $avantage['type_carte_nom'];
                    if ($currentType !== $partnerTypeKey) {
                        $currentType = $partnerTypeKey;
                        $showType = true;
                        $rowspanType = $typeCount[$partnerTypeKey];
                    }
                ?>
                    <tr class="bg-[#D5CCD6] text-black">
                        <?php if ($showVille): ?>
                            <td class="py-2 px-4 border border-white" rowspan="<?= $rowspanVille ?>" style="border-right: 2px solid white; border-bottom: 2px solid white;">
                                <?= htmlspecialchars($avantage['ville']) ?>
                            </td>
                        <?php endif; ?>

                        <?php if ($showPartner): ?>
                            <td class="py-2 px-4 border border-white" rowspan="<?= $rowspanPartner ?>" style="border-right: 2px solid white; border-bottom: 2px solid white;">
                                <?= htmlspecialchars($avantage['nom_etabisement']) ?>
                            </td>
                        <?php endif; ?>

                        <?php if ($showType): ?>
                            <td class="py-2 px-4 border border-white" rowspan="<?= $rowspanType ?>" style="border-right: 2px solid white; border-bottom: 2px solid white;">
                                <?= htmlspecialchars($avantage['type_carte_nom']) ?>
                            </td>
                        <?php endif; ?>

                        <td class="py-2 px-4 border-y border-white"><?= htmlspecialchars($avantage['nom_avantage']) ?></td>
                        <td class="py-2 px-4 border-y border-white"><?= htmlspecialchars($avantage['description']) ?></td>
                        <td class="py-2 px-4 border-y border-white"><?= htmlspecialchars($avantage['type_avantage']) ?></td>
                        <td class="py-2 px-4 border-y border-white"><?= htmlspecialchars($avantage['conditions']) ?></td>
                        <td class="py-2 px-4 border-y border-white"><?= htmlspecialchars($avantage['valeur_remise']) ?></td>
                        <td class="py-2 px-4 border-y border-white"><?= htmlspecialchars($avantage['statut']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-4 space-x-4">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>#avantages-section" class="pagination-link">
                <span class="pagination-icon">&lt;</span>
                <span class="pagination-text">Précédent</span>
            </a>
        <?php endif; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>#avantages-section" class="pagination-link">
                <span class="pagination-text">Suivant</span>
                <span class="pagination-icon">&gt;</span>
            </a>
        <?php endif; ?>
    </div>
</div>