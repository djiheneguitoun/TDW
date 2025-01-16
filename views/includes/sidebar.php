<!-- sidebar.php -->
<?php
include 'MenuItem.php';

$menuItems = [
    new MenuItem('/elmuntada/validate-membres', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 11l3 3L22 4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>', 'Demandes d’adhésion'),
    new MenuItem('/elmuntada/pending-abonnements', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7v5l3 3"></path></svg>', 'Abonnements en attente'),
    new MenuItem('/elmuntada/all_abonnements', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" /></svg>', 'Tous les abonnements'),
    new MenuItem('/elmuntada/validated_membres', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" /></svg>', 'Membres validés'),
    new MenuItem('/elmuntada/partenaire-admin', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12a4 4 0 100-8 4 4 0 000 8zM15 12a4 4 0 100-8 4 4 0 000 8zM6 14h12a4 4 0 014 4v2H2v-2a4 4 0 014-4z" /></svg>', 'Nos partenaires'),
    new MenuItem('/elmuntada/partenaire-gestion', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11a4 4 0 10-8 0 4 4 0 008 0zM4 21v-2a4 4 0 014-4h8a4 4 0 014 4v2M12 11v2m-4-2v2m8-2v2" /></svg>', 'Gestion des partenaires'),
    new MenuItem('/elmuntada/avantage_admin', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2a4 4 0 00-4 4h8a4 4 0 00-4-4zM8 6H4a2 2 0 00-2 2v4a2 2 0 002 2h16a2 2 0 002-2V8a2 2 0 00-2-2h-4M12 6v14m-8-6h16" /></svg>', 'Gestion des avantages'),
    new MenuItem('/elmuntada/all_remise', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 9l-10 10M9 7h.01M15 17h.01M7.5 7.5l9 9M12 2a10 10 0 110 20 10 10 0 010-20z" /></svg>', 'Tous les remises'),
    new MenuItem('/elmuntada/view-all-dons', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6.42 3.42 5 5.5 5c1.54 0 3.04.99 3.57 2.36h1.87C15.46 5.99 16.96 5 18.5 5 20.58 5 22 6.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" /></svg>', 'Gestions des dons'),
    new MenuItem('/elmuntada/stat', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h4v11H3V10zm7-4h4v15h-4V6zm7 8h4v7h-4v-7z" /></svg>', 'Statistiques'),
    new MenuItem('/elmuntada/list_benevolats', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20c0-2.21-3.58-4-8-4s-8 1.79-8 4m16 0V9m0-4a4 4 0 11-8 0 4 4 0 018 0zm-4 6c3.87 0 7 1.79 7 4M3 9a4 4 0 118 0" /></svg>', 'List benevolats'),
    new MenuItem('/elmuntada/logout', '<svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>', 'Déconnexion')
];
?>

<div class="sidebar w-80 fixed left-0 top-0 h-screen z-50 shadow-2xl">
    <div class="p-6 border-b border-white/5">
        <div class="flex items-center gap-4">
            <div class="relative">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#FF7C50] to-[#643869] flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-[#FF7C50] rounded-full border-2 border-[#1a1a1a] animate-pulse"></div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white tracking-wide">Menu</h2>
                <p class="text-sm text-white/50">Dashboard membre</p>
            </div>
        </div>
    </div>

    <div class="nav-container px-4 py-2">
        <ul class="space-y-2">
            <?php foreach ($menuItems as $item): ?>
                <?php echo $item->render(); ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
