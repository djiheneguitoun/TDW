<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Faire un Don - Creative Donation Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-purple-50 flex items-center mx-auto p-4 relative overflow-hidden">

    <div class="mx-auto max-w-xl relative z-10">
      <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl p-8 relative border border-white">
        <div class="text-center mb-10 relative">
          <h1 class="text-4xl font-black text-[#643869] tracking-tight mt-16 mb-2">Faire un Don</h1>
          <p class="text-gray-600">Votre générosité illumine des vies</p>

          <div class="flex items-center justify-center gap-2 mt-4">
            <div class="w-2 h-2 rounded-full bg-[#FF7C50]"></div>
            <div class="w-12 h-0.5 bg-[#FF7C50]"></div>
            <div class="w-2 h-2 rounded-full bg-[#FF7C50]"></div>
          </div>
        </div>

        <?php if (isset($_SESSION['success_message']) ): ?>
    <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline"><?php echo $_SESSION['success_message']; ?></span>
        <?php $_SESSION['success_message']=null; ?>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 close-alert">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.03a1.2 1.2 0 1 1-1.697-1.697L8.303 10.12 5.651 7.469a1.2 1.2 0 0 1 1.697-1.697L10 8.422l2.651-3.03a1.2 1.2 0 0 1 1.697 1.697L11.697 10.12l2.651 3.03z"/>
            </svg>
        </span>
    </div>
    <script>
        const closeAlert = document.querySelector('.close-alert');
        const alertBox = document.getElementById('success-message');

        closeAlert.addEventListener('click', () => {
            alertBox.style.display = 'none'; 
        });
    </script>
<?php endif; ?>

        <form action="/elmuntada/make-donation" method="POST" enctype="multipart/form-data" class="space-y-6">
          <input type="hidden" name="utilisateur_id" value="<?php echo $_SESSION['utilisateur_id']; ?>">

          <div class="space-y-2">
            <label for="montant" class="block text-sm font-semibold text-[#643869] flex items-center gap-2">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
              </svg>
              Montant du don
            </label>
            <div class="relative group">
              <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">€</span>
              <input type="number"
                     step="0.01"
                     name="montant"
                     id="montant"
                     class="w-full pl-10 pr-4 py-4 bg-white border-2 border-purple-100 rounded-2xl focus:border-[#FF7C50] focus:ring-4 focus:ring-[#FF7C50]/10 transition-all outline-none group-hover:border-purple-200"
                     required>
            </div>
          </div>

          <div class="space-y-2">
            <label for="recu_paiement" class="block text-sm font-semibold text-[#643869] flex items-center gap-2">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
              </svg>
              Reçu de Paiement
            </label>
            <div class="relative group">
              <input type="file"
                     name="recu_paiement"
                     id="recu_paiement"
                     class="w-full file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#643869] file:text-white hover:file:bg-[#FF7C50] file:transition-colors text-sm text-gray-500 rounded-2xl border-2 border-purple-100 group-hover:border-purple-200"
                     required>
            </div>
          </div>

          <button type="submit"
                  class="relative w-full bg-[#643869] text-white font-bold py-4 px-6 rounded-2xl hover:bg-[#FF7C50] active:scale-[0.98] transition-all duration-200 shadow-lg hover:shadow-[#FF7C50]/25 overflow-hidden group">
            <span class="relative z-10">Faire un Don</span>
            <div class="absolute inset-0 bg-[#FF7C50] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
          </button>
        </form>

      </div>
    </div>
  </body>
</html>
