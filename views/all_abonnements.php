<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-50 min-h-screen" style="background-color: #f9fafb;">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center" style="color: #643869;">
            Historique des Abonnements
        </h1>

        <!-- Table Container -->
        <div class="rounded-lg shadow-lg overflow-hidden bg-white">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead style="background-color: #643869;">
                        <tr>
                            <th class="px-6 py-4 text-center text-white">Nom</th>
                            <th class="px-6 py-4 text-center text-white">Prénom</th>
                            <th class="px-6 py-4 text-center text-white">Date de création</th>
                            <th class="px-6 py-4 text-center text-white">Statut</th>
                            <th class="px-6 py-4 text-center text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($abonnements as $abonnement): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-center"><?php echo htmlspecialchars($abonnement['nom']); ?></td>
                                <td class="px-6 py-4 text-center"><?php echo htmlspecialchars($abonnement['prenom']); ?></td>
                                <td class="px-6 py-4 text-center">
                                    <?php
                                        $date = new DateTime($abonnement['created_at']);
                                        echo $date->format('d/m/Y');
                                    ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold"
                                          style="background-color: <?php echo $abonnement['status'] === 'Actif' ? '#dcfce7' : '#fee2e2'; ?>;
                                                 color: <?php echo $abonnement['status'] === 'Actif' ? '#166534' : '#991b1b'; ?>">
                                        <?php echo htmlspecialchars($abonnement['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button
                                        onclick="showReceipt(<?php echo $abonnement['abonnement_id']; ?>)"
                                        class="px-4 py-2 rounded-lg text-white transition-colors duration-200"
                                        style="background-color: #FF7C50;">
                                        Voir reçu
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background-color: rgba(0, 0, 0, 0.5);">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl">
                <div class="flex justify-between items-center p-6 border-b">
                    <h3 class="text-xl font-semibold" style="color: #643869;">Reçu d'abonnement</h3>
                    <button class="close text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <embed id="receiptEmbed" src="" type="application/pdf" class="w-full" style="height: 600px;" />
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        const modal = document.getElementById("myModal");
        const closeBtn = document.querySelector(".close");

        function showReceipt(abonnement_id) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/elmuntada/get-receipt-path?abonnement_id=' + abonnement_id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('receiptEmbed').src = xhr.responseText;
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            };
            xhr.send();
        }

        closeBtn.onclick = function() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }

        // Add hover effect to buttons
        const buttons = document.querySelectorAll('button');
        buttons.forEach(button => {
            if (button.style.backgroundColor === '#FF7C50') {
                button.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#ff6937';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '#FF7C50';
                });
            }
        });

        // Add hover effect to table rows
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#f9fafb';
            });
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
            });
        });
    </script>
</body>
