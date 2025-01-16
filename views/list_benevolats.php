<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Bénévolats</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="mb-8 text-center animate-fade-in">
            <h1 class="text-4xl font-bold text-[#643869] mb-4">Liste des Bénévolats</h1>
            <div class="w-32 h-1.5 bg-[#FF7C50] mx-auto rounded-full"></div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-fade-in" style="animation-delay: 100ms;">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-[#643869]">ID Bénévolat</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-[#643869]">Nom Membre</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-[#643869]">Prénom Membre</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-[#643869]">Titre Événement</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-[#643869]">Lieu</th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-[#643869]">Date Inscription</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($benevolats as $benevolat): ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $benevolat['benevolat_id']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium"><?php echo $benevolat['membre_nom']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $benevolat['membre_prenom']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#FF7C50] font-medium"><?php echo $benevolat['evenement_titre']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $benevolat['lieu']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $benevolat['date_inscription']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>