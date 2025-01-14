<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dons du Membre</title>
    <script src="https://cdn.tailwindcss.com"></script>
  
</head>
<body class="min-h-screen">
    

    <div class="max-w-6xl mx-auto px-4 ">
        <!-- Enhanced Header Section -->
        <div class="mb-12">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="bg-white/50 p-6 rounded-2xl custom-shadow hover-scale">
                    <h1 class="text-4xl font-bold text-[#643869] mb-2">Dons du Membre</h1>
                    <p class="text-gray-500">Gérez vos contributions en toute simplicité</p>
                </div>
                <div class="bg-white/50 p-6 rounded-2xl custom-shadow hover-scale">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-[#FF7C50]/10 rounded-xl">
                            <svg class="w-6 h-6 text-[#FF7C50]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total des dons</p>
                            <p class="text-2xl font-bold text-[#643869]">
                                <?php 
                                    $total = 0;
                                    foreach ($dons as $don) {
                                        $total += floatval($don['montant']);
                                    }
                                    echo number_format($total, 2);
                                ?>€
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Main Content -->
        <div class="bg-white/80 rounded-2xl custom-shadow overflow-hidden hover-scale backdrop-blur-lg">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-300">
                            <th class="px-8 py-5 text-sm font-semibold text-white text-left bg-[#643869]">Montant</th>
                            <th class="px-8 py-5 text-sm font-semibold text-white text-left bg-[#643869]">Date du Don</th>
                            <th class="px-8 py-5 text-sm font-semibold text-white text-left bg-[#643869]">Reçu</th>
                            <th class="px-8 py-5 text-sm font-semibold text-white text-left bg-[#643869]">Statut</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        <?php foreach ($dons as $don): ?>
                            <tr class="hover:bg-[#643869]/5 transition-colors duration-300">
                                <td class="px-8 py-4 text-sm">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 rounded-full bg-[#FF7C50] animate-pulse"></div>
                                        <span class="font-semibold text-[#FF7C50] ">
                                            <?php echo number_format(floatval($don['montant']), 2); ?>€
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-sm">
                                    <span class="text-gray-600 bg-gray-50 px-3 py-1 rounded-lg ">
                                        <?php 
                                            $date = new DateTime($don['date_don']);
                                            echo $date->format('d M Y');
                                        ?>
                                    </span>
                                </td>
                                <td class="px-8 py-4 text-sm">
                                    <button 
                                        onclick="openPopup('<?php echo htmlspecialchars($don['recu_paiement']); ?>')"
                                        class="group inline-flex items-center px-4 py-2 text-sm font-medium text-[#643869] bg-[#643869]/5 rounded-lg hover:bg-[#643869] hover:text-white transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Voir le reçu
                                    </button>
                                </td>
                                <td class="px-8 py-4 text-sm">
                                    <?php if ($don['valide']==='approuve'): ?>
                                        <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm bg-green-50 text-green-700 border border-green-100">
                                            <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                                            Validé
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm bg-yellow-50 text-yellow-700 border border-yellow-100">
                                            <span class="w-2 h-2 rounded-full bg-yellow-500 mr-2 animate-pulse"></span>
                                            En attente
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Enhanced Modal with Glass Effect -->
    <div id="popupModal" class="fixed inset-0 flex items-center justify-center hidden z-50">
        <div class="absolute inset-0 bg-[#643869]/30 backdrop-blur-sm transition-opacity duration-300"></div>
        <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-xl p-8 max-w-xl w-full mx-4 relative z-10 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <div class="absolute top-4 right-4 flex space-x-2">
                <button id="downloadReceipt" class="p-2 text-gray-400 hover:text-[#643869] hover:bg-[#643869]/10 rounded-lg transition-colors duration-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </button>
                <button id="closePopup" class="p-2 text-gray-400 hover:text-[#643869] hover:bg-[#643869]/10 rounded-lg transition-colors duration-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="mt-2">
                <img id="popupImage" src="" alt="Reçu de Paiement" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
    </div>

    <script>
        function openPopup(imageUrl) {
            const modal = document.getElementById('popupModal');
            const modalContent = document.getElementById('modalContent');
            const image = document.getElementById('popupImage');
            
            image.src = imageUrl;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Animation
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);

            // Set download link
            document.getElementById('downloadReceipt').onclick = function() {
                const link = document.createElement('a');
                link.href = imageUrl;
                link.download = 'recu-paiement.jpg';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        }

        function closeModal() {
            const modal = document.getElementById('popupModal');
            const modalContent = document.getElementById('modalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        document.getElementById('closePopup').addEventListener('click', closeModal);

        document.getElementById('popupModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('popupModal').classList.contains('hidden')) {
                closeModal();
            }
        });
    </script>
</body>
</html>