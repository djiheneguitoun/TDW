<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les Dons</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold mb-2 text-[#643869] tracking-tight">Tous les Dons</h1>
        <p class="text-gray-600 mb-8 text-lg">Gérez vos donations en toute simplicité</p>

        <?php if (isset($_SESSION['success_message'])): ?>
        <div class="p-4 mb-6 rounded-lg bg-green-100 text-green-700 border border-green-200 flex items-center">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
        <div class="p-4 mb-6 rounded-lg bg-red-100 text-red-700 border border-red-200 flex items-center">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
        </div>
        <?php endif; ?>

        <div class="overflow-hidden shadow-xl rounded-xl border border-gray-100">
            <table class="w-full text-left">
                <thead class="bg-[#643869] text-white">
                    <tr>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">ID</th>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">Utilisateur ID</th>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">Montant</th>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">Date du Don</th>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">Reçu de Paiement</th>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-5 font-semibold text-sm uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php foreach ($dons as $don): ?>
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-5 text-sm"><?php echo $don['don_id']; ?></td>
                        <td class="px-6 py-5 text-sm"><?php echo $don['utilisateur_id']; ?></td>
                        <td class="px-6 py-5 text-sm font-medium text-[#FF7C50]"><?php echo $don['montant']; ?> €</td>
                        <td class="px-6 py-5 text-sm text-gray-600"><?php echo $don['date_don']; ?></td>
                        <td class="px-6 py-5 text-sm">
                            <a href="<?php echo $don['recu_paiement']; ?>" 
                               target="_blank" 
                               class="inline-flex items-center text-[#643869] hover:text-[#FF7C50] font-medium transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Voir
                            </a>
                        </td>
                        <td class="px-6 py-5 text-sm">
                            <?php if ($don['valide'] == 'pending'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                En attente
                            </span>
                            <?php else: ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Validé
                            </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-5 text-sm">
                            <?php if ($don['valide'] == 'pending'): ?>
                            <a href="/elmuntada/validate-don?don_id=<?php echo $don['don_id']; ?>" 
                               class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium text-white bg-[#643869] hover:bg-[#FF7C50] transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Valider
                            </a>
                            <?php else: ?>
                            <span class="text-gray-400 italic">Validé</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>