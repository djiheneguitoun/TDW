<?php require_once 'includes/header.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-[#643869] text-center text-5xl font-bold py-10">TOUTES NOS ANNONCES</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        <?php foreach ($annoncesData as $annonce): ?>
            <div class="p-3 border border-[#643869] rounded-3xl">
                <div class="relative rounded-lg overflow-hidden h-[400px] shadow-lg group">
                    <div class="absolute inset-0">
                        <?php if (!empty($annonce['image'])): ?>
                            <img
                                src="/elmuntada/assets/images/news.png"
                                alt="<?php echo htmlspecialchars($annonce['titre']); ?>"
                                class="w-full h-full object-cover"
                            />
                        <?php else: ?>
                            <div class="w-full h-full bg-gray-300"></div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/70"></div>
                    </div>
                    <div class="relative h-full flex flex-col p-6">
                        <div class="self-start bg-white/90 text-gray-800 px-4 py-1 rounded-full text-sm font-medium">
                            <?php echo htmlspecialchars($annonce['type_annonce']); ?>
                        </div>
                        <div class="mt-auto">
                            <div class="text-gray-300 text-sm mb-2">
                                Date d'Expiration: <?php echo htmlspecialchars($annonce['date_expiration']); ?>
                            </div>
                            <h2 class="text-white text-xl font-bold leading-tight group-hover:underline">
                                <?php echo htmlspecialchars($annonce['titre']); ?>
                            </h2>
                            <p class="text-gray-200 text-sm mt-2 line-clamp-2">
                                <?php echo htmlspecialchars($annonce['description']); ?>
                            </p>
                        </div>
                    </div>
                    <a href="#" class="absolute inset-0" aria-label="<?php echo htmlspecialchars($annonce['titre']); ?>"></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>