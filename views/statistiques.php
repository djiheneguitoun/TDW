<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques sur les dons et bénévolat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <header class="mb-16 text-center animate-fade-in">
            <h1 class="text-4xl font-bold text-[#643869] mb-4">Statistiques sur les dons et bénévolat</h1>
            <div class="w-32 h-1.5 bg-[#FF7C50] mx-auto rounded-full"></div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 transform transition-all duration-300 hover:scale-105 hover:shadow-xl animate-fade-in">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#FF7C50]/10 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#FF7C50]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-3">Total des dons</h3>
                    <p class="text-4xl font-bold text-[#FF7C50]">
                        <?php 
                        $total = 0;
                        foreach ($dons as $don) {
                            $total += $don['montant'];
                        }
                        echo number_format($total, 0, ',', ' ') . '€';
                        ?>
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 transform transition-all duration-300 hover:scale-105 hover:shadow-xl animate-fade-in" style="animation-delay: 100ms;">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#643869]/10 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#643869]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-3">Nombre de donateurs</h3>
                    <p class="text-4xl font-bold text-[#643869]">
                        <?php echo count($dons); ?>
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 transform transition-all duration-300 hover:scale-105 hover:shadow-xl animate-fade-in" style="animation-delay: 200ms;">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#FF7C50]/10 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#FF7C50]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-3">Bénévoles actifs</h3>
                    <p class="text-4xl font-bold text-[#FF7C50]">
                        <?php echo count($benevolats); ?>
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 transform transition-all duration-300 hover:scale-105 hover:shadow-xl animate-fade-in" style="animation-delay: 300ms;">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#643869]/10 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#643869]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-3">Don moyen</h3>
                    <p class="text-4xl font-bold text-[#643869]">
                        <?php echo number_format($total/count($dons), 0, ',', ' ') . '€'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>