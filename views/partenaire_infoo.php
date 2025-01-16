<!-- views/partenaire_info.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Partenaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-poppins min-h-screen py-6">
    <div class="container mx-auto px-3 max-w-6xl">
        <h1 class="text-[#643869] text-center text-4xl font-bold mb-6 drop-shadow-sm">Modifier Partenaire</h1>
        <form id="updatePartenaireForm" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="hidden" name="partenaire_id" value="<?= $partenaire['partenaire_id'] ?>">
            <div class="mb-4">
                <label for="nom_etabisement" class="block text-gray-700">Nom de l'établissement</label>
                <input type="text" id="nom_etabisement" name="nom_etabisement" class="w-full border border-gray-300 p-2 rounded-md" value="<?= $partenaire['nom_etabisement'] ?>" required>
            </div>
            <div class="mb-4">
                <label for="remise_percentage" class="block text-gray-700">Remise (%)</label>
                <input type="number" id="remise_percentage" name="remise_percentage" class="w-full border border-gray-300 p-2 rounded-md" value="<?= $partenaire['remise_percentage'] ?>" required>
            </div>
            <div class="mb-4">
                <label for="categorie_id" class="block text-gray-700">Catégorie</label>
                <select id="categorie_id" name="categorie_id" class="w-full border border-gray-300 p-2 rounded-md" required>
                    <?php
                    $categories = $this->partenaire->getAllCategories();
                    while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($row['categorie_id'] == $partenaire['categorie_id']) ? 'selected' : '';
                        echo '<option value="' . $row['categorie_id'] . '" ' . $selected . '>' . $row['nom'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="details" class="block text-gray-700">Détails</label>
                <textarea id="details" name="details" class="w-full border border-gray-300 p-2 rounded-md" required><?= $partenaire['details'] ?></textarea>
            </div>
            <div class="mb-4">
                <label for="ville" class="block text-gray-700">Ville</label>
                <input type="text" id="ville" name="ville" class="w-full border border-gray-300 p-2 rounded-md" value="<?= $partenaire['ville'] ?>" required>
            </div>
            <div class="mb-4">
                <label for="logo" class="block text-gray-700">Logo</label>
                <input type="file" id="logo" name="logo" class="w-full border border-gray-300 p-2 rounded-md">
            </div>
            <div class="flex justify-end col-span-2">
                <button type="submit" class="bg-[#643869] text-white px-4 py-2 rounded-md">Modifier</button>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('updatePartenaireForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('/elmuntada/updatePartenaire', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) {
                    window.location.href = '/elmuntada/partenaire-admin';
                } else {
                    alert('Erreur lors de la modification du partenaire');
                }
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
