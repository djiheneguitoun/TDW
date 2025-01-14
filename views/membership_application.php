<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Careo - Demande de Membre</title>
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
            Formulaire de Demande de Membre
        </h1>

        <form action="/elmuntada/membership-application-handle" method="POST" enctype="multipart/form-data"
              class="backdrop-blur-sm bg-white/90 p-8 rounded-2xl shadow-2xl space-y-6 ">

            <div class="space-y-4">
                <label for="telephone" class="block text-[#643869] font-semibold">Téléphone</label>
                <input type="tel" id="telephone" name="telephone"
                       class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                       required>
            </div>

            <div class="space-y-4">
                <label for="ville" class="block text-[#643869] font-semibold">Ville</label>
                <input type="text" id="ville" name="ville"
                       class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                       required>
            </div>

            <div class="space-y-4">
                <label class="block text-[#643869] font-semibold">Photo</label>
                <div class="relative">
                    <input type="file" id="photo" name="photo"
                           class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#643869] file:text-white hover:file:bg-[#FD7A4E]"
                           required>
                </div>
            </div>

            <div class="space-y-4">
                <label class="block text-[#643869] font-semibold">Pièce d'Identité</label>
                <div class="relative">
                    <input type="file" id="piece_identite" name="piece_identite"
                           class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#643869] file:text-white hover:file:bg-[#FD7A4E]"
                           required>
                </div>
            </div>

            <div class="space-y-4">
                <label class="block text-[#643869] font-semibold">Reçu de Paiement</label>
                <div class="relative">
                    <input type="file" id="recu_paiement" name="recu_paiement"
                           class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#643869] file:text-white hover:file:bg-[#FD7A4E]"
                           required>
                </div>
            </div>

            <div class="space-y-4">
                <label for="type_carte" class="block text-[#643869] font-semibold">Type de Carte</label>
                <select id="type_carte" name="type_carte"
                        class="w-full px-4 py-3 rounded-lg border-2 border-[#643869]/20 focus:border-[#FD7A4E] focus:ring-2 focus:ring-[#FD7A4E]/20 transition-all duration-300"
                        required>
                    <?php foreach ($typesCarteData as $type) { ?>
                        <option value="<?php echo $type['type_carte_id']; ?>"><?php echo $type['nom']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="pt-6">
                <button type="submit"
                        class="w-full bg-gradient-to-r from-[#643869] to-[#FD7A4E] text-white font-bold py-3 px-6 rounded-lg transform hover:scale-105 transition-all duration-300 hover:shadow-lg">
                    Soumettre la demande
                </button>
            </div>
        </form>
    </div>
</div>
                    </body >
