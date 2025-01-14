<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Événements à venir</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-attachment: fixed;
        }
      
        .glass-effect {
            backdrop-filter: blur(12px);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
        }
        .title-gradient {
            background: linear-gradient(to right, #643869, #9b6b9d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .table-header {
            background: linear-gradient(135deg, rgba(100, 56, 105, 0.08), rgba(100, 56, 105, 0.03));
        }
      
    </style>
</head>
<body class="min-h-screen  py-16 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12 float-animation">
            <h1 class="text-xl md:text-4xl font-bold title-gradient mb-3 tracking-tight">
                Événements à venir
            </h1>
            <div class="h-1 w-24 mx-auto bg-gradient-to-r from-[#643869] to-[#9b6b9d] rounded-full"></div>
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="mb-6 glass-effect border-l-4 border-green-400 p-4 rounded-xl custom-shadow" role="alert">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 p-2 rounded-lg">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-green-800"><?php echo $_SESSION['success_message']; ?></p>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="mb-6 glass-effect border-l-4 border-red-400 p-4 rounded-xl custom-shadow" role="alert">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-red-100 p-2 rounded-lg">
                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-red-800"><?php echo $_SESSION['error_message']; ?></p>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <div class="glass-effect rounded-2xl custom-shadow overflow-hidden hover-scale">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full">
                    <thead>
                        <tr class="table-header">
                            <th class="px-6 py-5 text-sm font-semibold text-white bg-[#643869] text-left">Titre</th>
                            <th class="px-6 py-5 text-sm font-semibold text-white bg-[#643869] text-left">Description</th>
                            <th class="px-6 py-5 text-sm font-semibold text-white bg-[#643869] text-left">Date</th>
                            <th class="px-6 py-5 text-sm font-semibold text-white bg-[#643869] text-left">Lieu</th>
                            <th class="px-6 py-5 text-sm font-semibold text-white bg-[#643869] text-left">Places</th>
                            <th class="px-6 py-5 text-sm font-semibold text-white bg-[#643869] text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-100/30">
                        <?php foreach ($events as $event): ?>
                            <tr class="hover:bg-white/40 transition-colors duration-300">
                                <td class="px-6 py-4 text-sm font-medium text-[#643869]"><?php echo htmlspecialchars($event['titre']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?php echo htmlspecialchars($event['description']); ?></td>
                                <td class="px-6 py-4">
                                    <div class="space-y-1">
                                        <div class="text-sm px-2 py-1 bg-purple-50 rounded-md inline-block">
                                            <span class="font-medium text-[#643869]">Début:</span> 
                                            <span class="text-gray-600"><?php echo htmlspecialchars($event['date_debut']); ?></span>
                                        </div>
                                        <div class="text-sm px-2 py-1 bg-purple-50 rounded-md inline-block">
                                            <span class="font-medium text-[#643869]">Fin:</span> 
                                            <span class="text-gray-600"><?php echo htmlspecialchars($event['date_fin']); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?php echo htmlspecialchars($event['lieu']); ?></td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo $event['nb_benevolat'] >= $event['nb_benevolat_max'] ? 'bg-red-100 text-red-800 border border-red-200' : 'bg-green-100 text-green-800 border border-green-200'; ?>">
                                        <?php echo htmlspecialchars($event['nb_benevolat']); ?>/<?php echo htmlspecialchars($event['nb_benevolat_max']); ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($event['nb_benevolat'] < $event['nb_benevolat_max'] && !$this->evenement->isMemberRegistered($_SESSION['membre_id'], $event['evenement_id'])): ?>
                                        <form action="/elmuntada/register-for-event" method="POST">
                                            <input type="hidden" name="membre_id" value="<?php echo htmlspecialchars($_SESSION['membre_id']); ?>">
                                            <input type="hidden" name="evenement_id" value="<?php echo htmlspecialchars($event['evenement_id']); ?>">
                                            <button type="submit" class="group inline-flex items-center px-4 py-2 text-sm font-medium text-[#643869] bg-[#643869]/5 rounded-lg hover:bg-[#643869] hover:text-white transition-all duration-300 hover:shadow-lg hover:shadow-[#643869]/20">
                                                <span>S'inscrire</span>
                                                <svg class="ml-2 h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                                </svg>
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <button disabled class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed border border-gray-200">
                                            <span>Complet</span>
                                            <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v2m0-2h2m-2 0H10"/>
                                            </svg>
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
</body>
</html>