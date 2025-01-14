<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'Aide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body class="bg-gray-50 font-[Poppins]">
    <div class="min-h-screen flex items-center justify-center px-4 py-12 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        <div class="w-full max-w-2xl bg-white/90 backdrop-blur-md rounded-2xl shadow-[0_20px_50px_rgba(100,56,105,0.15)] p-10">
            <div class="relative mb-12 text-center">
                <h1 class="text-4xl font-bold text-[#643869] mb-2">Demande d'Aide</h1>
                <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-[#FF7C50] rounded-full"></div>
            </div>
            
            <form action="/elmuntada/demande-aide" method="POST" enctype="multipart/form-data" class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="group relative">
                        <input type="text" id="nom" name="nom" required 
                               class="peer w-full px-4 pt-8 pb-2 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:border-[#FF7C50] focus:ring-0 focus:outline-none transition-all duration-300">
                        <label for="nom" 
                               class="absolute left-4 top-5 text-gray-500 transition-all duration-300 transform 
                                      peer-focus:-translate-y-4 peer-focus:text-sm peer-focus:text-[#FF7C50]
                                      peer-valid:-translate-y-4 peer-valid:text-sm">
                            Nom
                        </label>
                    </div>
                    
                    <div class="group relative">
                        <input type="text" id="prenom" name="prenom" required 
                               class="peer w-full px-4 pt-8 pb-2 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:border-[#FF7C50] focus:ring-0 focus:outline-none transition-all duration-300">
                        <label for="prenom" 
                               class="absolute left-4 top-5 text-gray-500 transition-all duration-300 transform 
                                      peer-focus:-translate-y-4 peer-focus:text-sm peer-focus:text-[#FF7C50]
                                      peer-valid:-translate-y-4 peer-valid:text-sm">
                            Prénom
                        </label>
                    </div>
                </div>

                <div class="group relative">
                    <input type="date" id="date_naissance" name="date_naissance" required 
                           class="peer w-full px-4 pt-8 pb-2 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:border-[#FF7C50] focus:ring-0 focus:outline-none transition-all duration-300">
                    <label for="date_naissance" 
                           class="absolute left-4 top-5 text-gray-500 transition-all duration-300 transform 
                                  peer-focus:-translate-y-4 peer-focus:text-sm peer-focus:text-[#FF7C50]
                                  peer-valid:-translate-y-4 peer-valid:text-sm">
                        Date de Naissance
                    </label>
                </div>

                <div class="group relative">
                    <select id="type_aide" name="type_aide" required 
                            class="peer w-full px-4 pt-8 pb-2 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:border-[#FF7C50] focus:ring-0 focus:outline-none transition-all duration-300 appearance-none">
                        <option value="" disabled selected></option>
                        <?php foreach ($typesAide as $type): ?>
                            <option value="<?php echo $type['type_aide_id']; ?>"><?php echo $type['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="type_aide" 
                           class="absolute left-4 top-5 text-gray-500 transition-all duration-300 transform 
                                  peer-focus:-translate-y-4 peer-focus:text-sm peer-focus:text-[#FF7C50]
                                  peer-valid:-translate-y-4 peer-valid:text-sm">
                        Type d'Aide
                    </label>
                    <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="group relative">
                    <textarea id="description" name="description" required rows="4"
                              class="peer w-full px-4 pt-8 pb-2 bg-gray-50/50 border-2 border-gray-200 rounded-xl focus:border-[#FF7C50] focus:ring-0 focus:outline-none transition-all duration-300 resize-none"></textarea>
                    <label for="description" 
                           class="absolute left-4 top-5 text-gray-500 transition-all duration-300 transform 
                                  peer-focus:-translate-y-4 peer-focus:text-sm peer-focus:text-[#FF7C50]
                                  peer-valid:-translate-y-4 peer-valid:text-sm">
                        Description
                    </label>
                </div>

                <div class="relative group">
                    <input type="file" id="fichier" name="fichier" accept=".zip" required class="hidden">
                    <label for="fichier" 
                           class="flex items-center justify-center w-full px-4 py-4 bg-gray-50/50 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-[#FF7C50] transition-all duration-300">
                        <div class="flex items-center space-x-2 text-gray-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <span>Déposer votre fichier ZIP ici ou cliquer pour parcourir</span>
                        </div>
                    </label>
                    <div id="file-name" class="mt-2 text-sm text-gray-500"></div>
                </div>

                <button type="submit" 
                        class="w-full bg-[#FF7C50] text-white py-4 px-6 rounded-xl hover:bg-[#643869] transform hover:scale-[1.02] transition-all duration-300 font-medium shadow-lg hover:shadow-xl">
                    <span class="flex items-center justify-center space-x-2">
                        <span>Soumettre</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                </button>
            </form>
        </div>
    </div>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div id="success-message" 
             class="fixed top-4 right-4 bg-green-500 text-white px-8 py-4 rounded-xl shadow-2xl transform transition-all duration-500 ease-out animate-[slideIn_0.5s_ease-out]">
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?php echo $_SESSION['success_message']; ?></span>
                <button class="ml-4 hover:text-gray-200 transition-colors duration-300" 
                        onclick="this.parentElement.parentElement.style.display='none'">
                    &times;
                </button>
            </div>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <script>
        document.getElementById('fichier').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const fileNameDisplay = document.getElementById('file-name');
            if (fileName) {
                fileNameDisplay.textContent = `Fichier sélectionné: ${fileName}`;
            } else {
                fileNameDisplay.textContent = '';
            }
        });
    </script>
</body>
</html>