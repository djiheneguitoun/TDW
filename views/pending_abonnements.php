<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Abonnements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF7C50',
                        secondary: '#643869',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-secondary/5 to-primary/5 min-h-screen p-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-12">
            <h1 class="text-4xl font-bold text-secondary">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-secondary to-primary">
                    Pending Abonnements
                </span>
            </h1>
            <div class="h-1 flex-grow mx-6 bg-gradient-to-r from-secondary to-primary rounded-full"></div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-primary/10">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-secondary to-primary">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Prénom</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Code QR</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($pendingAbonnements as $abonnement): ?>
                            <tr class="transition-all duration-200 hover:bg-gradient-to-r hover:from-primary/5 hover:to-secondary/5">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-secondary"><?php echo $abonnement['nom']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-secondary"><?php echo $abonnement['prenom']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600"><?php echo $abonnement['email']; ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="p-1 bg-white rounded-lg shadow-md inline-block">
                                        <img src="uploads/<?php echo $abonnement['code_qr']; ?>" alt="QR Code" class="h-20 w-20 object-contain rounded-lg">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                    <form method="post" action="" class="inline-flex space-x-3">
                                        <input type="hidden" name="abonnement_id" value="<?php echo $abonnement['abonnement_id']; ?>">
                                        <button type="submit" name="action" value="validate" 
                                            class="bg-primary text-white px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 
                                            hover:shadow-lg hover:shadow-primary/30 hover:translate-y-[-1px]">
                                            Valider
                                        </button>
                                        <button type="button" onclick="showReceipt('<?php echo $abonnement['abonnement_id']; ?>')" 
                                            class="bg-secondary text-white px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 
                                            hover:shadow-lg hover:shadow-secondary/30 hover:translate-y-[-1px]">
                                            Voir Reçu
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Enhanced Modal -->
    <div id="receiptModal" class="hidden fixed inset-0 bg-secondary/50 backdrop-blur-sm overflow-y-auto h-full w-full transition-all duration-300">
        <div class="relative top-20 mx-auto p-8 border w-4/5 shadow-2xl rounded-2xl bg-white transform transition-all duration-300">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-secondary to-primary">Reçu</h3>
                <button class="close text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="embed-container rounded-xl overflow-hidden border-2 border-primary/10">
                <embed id="receiptEmbed" src="" type="application/pdf" class="w-full h-[600px]">
            </div>
        </div>
    </div>

    <script>
        function showReceipt(abonnement_id) {
            fetch('/elmuntada/pending-abonnements', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'abonnement_id=' + abonnement_id + '&action=show_receipt'
            })
            .then(response => response.json())
            .then(data => {
                if (data.path) {
                    document.getElementById('receiptEmbed').src = data.path;
                    const modal = document.getElementById('receiptModal');
                    modal.classList.remove('hidden');
                    setTimeout(() => modal.classList.add('opacity-100'), 50);
                } else {
                    alert('Receipt not found');
                }
            });
        }

        const modal = document.getElementById('receiptModal');
        const closeBtn = document.querySelector('.close');

        closeBtn.onclick = function() {
            modal.classList.add('opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('opacity-0');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }
        }
    </script>
</body>
</html>