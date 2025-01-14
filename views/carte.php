<div class="py-40 px-4">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
 
    <div class="w-full md:w-1/2 flex justify-center items-start">
      <div
        class="w-[480px] h-[300px] relative rounded-2xl overflow-hidden shadow-2xl"
        style="background: linear-gradient(135deg, #643869, #ff7c50)"
      >
        <div
          class="absolute inset-0 w-full h-full backdrop-blur-[1px]"
          style="
            background: linear-gradient(
              135deg,
              rgba(100, 56, 105, 0.95),
              rgba(255, 124, 80, 0.95)
            );
          "
        >
          <div
            class="absolute inset-0 w-full h-full opacity-5"
            style="
              background-image: repeating-linear-gradient(
                  45deg,
                  #fff 0,
                  #fff 1px,
                  transparent 0,
                  transparent 50%
                ),
                repeating-linear-gradient(
                  135deg,
                  #fff 0,
                  #fff 1px,
                  transparent 0,
                  transparent 50%
                );
              background-size: 30px 30px;
            "
          ></div>

          <div
            class="absolute top-[25px] left-[25px] w-[45px] h-[35px] rounded-[5px] border border-white/20"
            style="background: linear-gradient(135deg, #ffd700, #ffa500)"
          >
            <div class="absolute top-1/3 w-full h-[1px] bg-white/30"></div>
            <div class="absolute top-2/3 w-full h-[1px] bg-white/30"></div>
          </div>

          <div
            class="absolute top-[25px] right-[25px] w-[50px] h-[50px] rounded-full backdrop-blur-sm"
            style="
              background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.4),
                rgba(255, 255, 255, 0.1)
              );
            "
          ></div>

          <div class="absolute top-6 left-[100px] right-[100px] text-center">
            <h2
              class="text-white text-2xl font-bold tracking-wider drop-shadow-lg"
            >
              CARTE DE MEMBRE
            </h2>
            <div class="w-16 h-0.5 bg-white/50 mx-auto mt-2"></div>
          </div>

          <!-- Member Photo -->
          <div
            class="absolute top-[80px] left-[25px] w-[100px] h-[120px] border-2 border-white/50 overflow-hidden shadow-xl rounded-lg"
          >
            <img
              src="uploads/<?php echo htmlspecialchars($carte['photo']); ?>"
              alt="Photo"
              class="w-full h-full object-cover"
            />
          </div>

          <!-- QR Code -->
          <div
            class="absolute top-[80px] right-[25px] w-[80px] h-[80px] bg-white p-[5px] rounded-lg shadow-xl"
          >
            <img
              src="uploads/<?php echo htmlspecialchars($carte['code_qr']); ?>"
              alt="QR Code"
              class="w-full h-full"
            />
          </div>

          <div
            class="absolute bottom-[45px] left-0 w-full h-[40px] bg-black/10 backdrop-blur-sm"
          ></div>

          <div
            class="mx-auto mt-20 w-2/5 text-white p-4 rounded-lg bg-black/20 backdrop-blur-sm"
          >
            <p class="text-sm font-bold tracking-wider mb-2 drop-shadow-lg">
              <?php echo htmlspecialchars($carte['nom']);echo' '; echo htmlspecialchars($carte['prenom']); ?>
            </p>
            <p class="text-sm font-medium drop-shadow">
              adresse:
              <?php echo htmlspecialchars($carte['adresse']); ?>
            </p>
            <p class="text-sm font-medium drop-shadow">
              expire le:
              <?php echo htmlspecialchars($carte['date_expiration']); ?>
            </p>
          </div>

          <div
            class="absolute bottom-[20px] right-[25px] w-[60px] h-[60px] border-2 border-white/50 rounded-full flex items-center justify-center text-[10px] text-white text-center leading-tight bg-white/10 backdrop-blur-sm shadow-lg"
            style="transform: rotate(-15deg)"
          >
            <span class="drop-shadow-lg font-semibold"
              >MEMBRE<br />OFFICIEL</span
            >
          </div>
        </div>
      </div>
    </div>

    <div class="w-full md:w-1/2">
      <div
        class="max-w-md mx-auto bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden"
      >
        <?php if (strtotime($carte['date_expiration']) >
        time()) : ?>
        <!-- Active Status -->
        <div class="p-6 bg-gray-50 border-b border-gray-100">
          <div class="flex items-center gap-4">
            <div
              class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center"
            >
              <svg
                class="w-5 h-5 text-emerald-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"
                ></path>
              </svg>
            </div>
            <div>
              <h3 class="text-base font-medium text-gray-900">
                Abonnement Actif
              </h3>
              <p class="text-sm text-gray-500">
                Votre abonnement est actuellement valide
              </p>
            </div>
          </div>
        </div>
        <?php else : ?>
        <div class="p-6 bg-gray-50 border-b border-gray-100">
          <div class="flex items-center gap-4">
            <div
              class="w-10 h-10 rounded-full bg-amber-50 flex items-center justify-center"
            >
              <svg
                class="w-5 h-5 text-amber-500"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                ></path>
              </svg>
            </div>
            <div>
              <h3 class="text-base font-medium text-gray-900">
                Abonnement Expiré
              </h3>
              <p class="text-sm text-gray-500">
                Veuillez renouveler votre abonnement
              </p>
            </div>
          </div>
        </div>

        <div class="p-6">
          <form
            action="/elmuntada/renew-abonnement"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
          >
            <input
              type="hidden"
              name="membre_id"
              value="<?php echo htmlspecialchars($membre_id); ?>"
            />

            <div class="relative group">
              <label
                for="type_carte_id"
                class="block text-sm font-medium text-gray-700"
                >Type de Carte</label
              >
              <select
                name="type_carte_id"
                id="type_carte_id"
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
              >
                <?php foreach ($typesCarte as $typeCarte) : ?>
                <option
                  value="<?php echo htmlspecialchars($typeCarte['type_carte_id']); ?>"
                >
                  <?php echo htmlspecialchars($typeCarte['nom']); ?>
                </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="relative group">
              <input
                type="file"
                name="recu_paiement"
                id="recu_paiement"
                class="hidden"
                accept="image/*,.pdf"
                onchange="updateFileName(this)"
              />
              <label
                for="recu_paiement"
                class="relative block w-full h-[160px] border-2 border-dashed rounded-lg transition-all duration-300 group-hover:border-gray-400 cursor-pointer border-gray-200 bg-gray-50"
              >
                <div
                  class="absolute inset-0 flex flex-col items-center justify-center"
                >
                  <div
                    class="w-12 h-12 mb-3 rounded-full bg-white shadow-sm flex items-center justify-center group-hover:scale-110 transition-transform duration-300"
                  >
                    <svg
                      class="w-6 h-6 text-gray-400 group-hover:text-gray-600"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                      />
                    </svg>
                  </div>
                  <div class="text-center px-6">
                    <h3 class="text-sm font-medium text-gray-700">
                      Reçu de Paiement
                    </h3>
                    <p class="mt-1 text-xs text-gray-500">
                      Glissez votre fichier ici ou
                      <span class="text-gray-700 font-medium">parcourir</span>
                    </p>
                    <p class="mt-2 text-[11px] text-gray-400">
                      PNG, JPG ou PDF (max. 10MB)
                    </p>
                  </div>
                  <div
                    id="fileInfo"
                    class="absolute bottom-2 left-0 right-0 flex items-center justify-center opacity-0 transition-opacity duration-300"
                  >
                    <div class="bg-gray-100 px-3 py-1 rounded-full">
                      <p
                        id="fileName"
                        class="text-xs font-medium text-gray-600"
                      ></p>
                    </div>
                  </div>
                </div>
              </label>
            </div>

            <button
              type="submit"
              class="w-full bg-gray-900 relative group overflow-hidden text-white py-3 px-4 rounded-lg text-sm font-medium hover:bg-gray-800 transition-all duration-300"
            >
              <div class="relative flex items-center justify-center">
                <span class="flex items-center gap-2">
                  <svg
                    class="w-4 h-4 transition-transform duration-500 group-hover:rotate-180"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                    />
                  </svg>
                  Renouveler Abonnement
                </span>
              </div>
              <div
                class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
              ></div>
            </button>
          </form>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script>
      console.log("hhhhhhhhhhhhhhh")

    function updateFileName(input) {
      const fileInfo = document.getElementById("fileInfo");
      const fileNameElement = document.getElementById("fileName");
      const file = input.files[0];

      if (file) {
        const fileName = file.name;
        const fileSize = (file.size / (1024 * 1024)).toFixed(2); // Convert to MB
        fileNameElement.textContent = `${fileName} (${fileSize}MB)`;
        fileInfo.classList.remove("opacity-0");
        fileInfo.classList.add("opacity-100");
      } else {
        fileNameElement.textContent = "";
        fileInfo.classList.remove("opacity-100");
        fileInfo.classList.add("opacity-0");
      }
    }
  </script>
</div>
