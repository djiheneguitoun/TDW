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
                },
            },
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-[#643869] mb-4 animate-fade-in">Membres à Valider</h1>
                <div class="h-1 w-32 bg-[#FF7C50] mx-auto rounded-full"></div>
            </div>
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-custom-purple text-white">
                        <tr>
                            <th class="text-sm py-4 px-6 text-left font-semibold">Nom</th>
                            <th class="text-sm py-4 px-6 text-left font-semibold">Prénom</th>
                            <th class="text-sm py-4 px-6 text-left font-semibold">Email</th>
                            <th class="text-sm py-4 px-6 text-left font-semibold">Téléphone</th>
                            <th class="text-sm py-4 px-6 text-left font-semibold">Adresse</th>
                            <th class="text-sm py-4 px-6 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($membres as $membre) : ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['nom']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['prenom']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['email']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['telephone']); ?></td>
                            <td class="text-sm py-4 px-6"><?php echo htmlspecialchars($membre['adresse']); ?></td>
                            <td class="text-sm py-4 px-6 space-x-2">
                                <form action="/elmuntada/validate-membre" method="POST" class="inline">
                                    <input type="hidden" name="membre_id" value="<?php echo htmlspecialchars($membre['membre_id']); ?>">
                                    <button type="submit" class="bg-custom-orange hover:bg-opacity-90 text-white py-2 px-4 rounded-lg transition-all duration-200 transform hover:scale-105">Valider</button>
                                </form>
                                <button class="bg-custom-purple hover:bg-opacity-90 text-white py-2 px-4 rounded-lg transition-all duration-200 transform hover:scale-105 view-more ml-2" data-membre-id="<?php echo htmlspecialchars($membre['membre_id']); ?>">
                                    Voir plus
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="membrePop" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-4xl w-full mx-4 relative transform transition-all duration-300">
            <button id="closePopup" class="absolute top-4 right-4 text-gray-500 hover:text-custom-purple transition-colors">
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
    


            document.querySelectorAll('.view-more').forEach(button => {
                button.addEventListener('click', function() {
                    const membreId = this.getAttribute('data-membre-id');
                    fetch(`/elmuntada/membre-details?id=${membreId}`)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('membrePop').classList.remove('hidden');
                            document.getElementById('membrePop').classList.add('flex');
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.getElementById('closePopup').addEventListener('click', closeModal);
            document.getElementById('membrePop').addEventListener('click', function(event) {
                if (event.target === document.getElementById('membrePop')) closeModal();
            });

            function closeModal() {
                document.getElementById('membrePop').classList.add('hidden');
                document.getElementById('membrePop').classList.remove('flex');
            }
    </script>
</body>
</html>