<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Careo - Rejoignez notre communauté</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
      body {
        font-family: "Poppins", sans-serif;
      }
      .wave-shape {
        border-radius: 0 0 50% 50% / 100px;
      }
    </style>
  </head>
  <body >
<div class="min-h-screen bg-gradient-to-br from-[#643869] to-[#FD7A4E]/20 py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-2xl">
        <h1 class="text-4xl font-bold mb-8 text-center text-white drop-shadow-lg">
            Formulaire d'Inscription des Utilisateurs
        </h1>

        <form action="/elmuntada/inscription-handle" method="POST"
              class="backdrop-blur-sm bg-white/90 p-8 rounded-2xl shadow-2xl space-y-6 ">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <label for="nom" class="block text-[#643869] font-semibold">Nom</label>
                    <input type="text" id="nom" name="nom"
                           class=" w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                           required>
                </div>

                <div class="space-y-4">
                    <label for="prenom" class="block text-[#643869] font-semibold">Prénom</label>
                    <input type="text" id="prenom" name="prenom"
                           class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                           required>
                </div>
            </div>

            <div class="space-y-4">
                <label for="email" class="block text-[#643869] font-semibold">Email</label>
                <input type="email" id="email" name="email"
                       class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                       required>
            </div>

            <div class="space-y-4">
                <label for="mot_de_passe" class="block text-[#643869] font-semibold">Mot de Passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe"
                       class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                       required>
            </div>

            <div class="pt-6">
                <button type="submit"
                        class="w-full bg-gradient-to-r from-[#643869] to-[#FD7A4E] text-white font-bold py-3 px-6 rounded-lg transform hover:scale-105 transition-all duration-300 hover:shadow-lg">
                    S'inscrire
                </button>
            </div>
        </form>
    </div>
</div>
                    </body >
