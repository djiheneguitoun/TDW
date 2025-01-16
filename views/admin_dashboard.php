<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views\style.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-50">
<?php 
echo $_SESSION['utilisateur_id'];
if (!isset($_SESSION['utilisateur_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /elmuntada/login');
    
    exit();
}?>
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
             <li>
    <div data-path="/elmuntada/validate-membres" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M9 11l3 3L22 4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Demandes d’adhésion</span>
    </div>
</li>

              
<li>
    <div data-path="/elmuntada/pending-abonnements" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 7v5l3 3"></path>
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Abonnements en attente</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/all_abonnements" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Tous les abonnements</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/validated_membres" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Membres validés</span>
    </div>
</li>

<li>
    <div data-path="/elmuntada/partenaire-admin" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12a4 4 0 100-8 4 4 0 000 8zM15 12a4 4 0 100-8 4 4 0 000 8zM6 14h12a4 4 0 014 4v2H2v-2a4 4 0 014-4z" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Nos partenaires</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/partenaire-gestion" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11a4 4 0 10-8 0 4 4 0 008 0zM4 21v-2a4 4 0 014-4h8a4 4 0 014 4v2M12 11v2m-4-2v2m8-2v2" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Gestion des partenaires</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/avantage_admin" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2a4 4 0 00-4 4h8a4 4 0 00-4-4zM8 6H4a2 2 0 00-2 2v4a2 2 0 002 2h16a2 2 0 002-2V8a2 2 0 00-2-2h-4M12 6v14m-8-6h16" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Gestion des avantages</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/all_remise" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M17 9l-10 10M9 7h.01M15 17h.01M7.5 7.5l9 9M12 2a10 10 0 110 20 10 10 0 010-20z" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Tous les remises</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/view-all-dons" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6.42 3.42 5 5.5 5c1.54 0 3.04.99 3.57 2.36h1.87C15.46 5.99 16.96 5 18.5 5 20.58 5 22 6.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Gestions des dons</span>
    </div>
</li>

<li>
    <div data-path="/elmuntada/stat" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M3 10h4v11H3V10zm7-4h4v15h-4V6zm7 8h4v7h-4v-7z" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">Statistiques</span>
    </div>
</li>
<li>
    <div data-path="/elmuntada/list_benevolats" 
         class="menu-item flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M17 20c0-2.21-3.58-4-8-4s-8 1.79-8 4m16 0V9m0-4a4 4 0 11-8 0 4 4 0 018 0zm-4 6c3.87 0 7 1.79 7 4M3 9a4 4 0 118 0" />
            </svg>
        </div>
        <span class="text-white/90 text-sm font-medium">List benevolats</span>
    </div>
</li>



                <li>
                    <div 
                         class="menu-item2 flex items-center gap-4 py-2 px-3 rounded-xl hover:bg-white/5">
                        <div class="icon-container p-1 rounded-lg bg-white/10">
                            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <a href="/elmuntada/logout" class="text-white text-sm font-medium group-hover:text-white">Déconnexion</a>
                        </div>
                </li>

                
            </ul>
        </div>
    </div>

    <div class="flex">
        <div class="content ml-80 p-4 w-full">
        </div>
    </div>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');

        // Initialize Feather icons on page load
        
        const currentPath = window.location.pathname;
        menuItems.forEach(item => {
            if(item.getAttribute('data-path') === currentPath) {
                item.classList.add('active-menu-item');
            }
            
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active-menu-item'));
                this.classList.add('active-menu-item');
                const path = this.getAttribute('data-path');
                loadContent(path);
            });
        });


         // Load the update profile page by default
    if (currentPath === '/elmuntada/admin-dashboard') {
        loadContent('/elmuntada/validate-membres');
    }

        function loadContent(path) {
    fetch(path)
        .then(response => response.text())
        .then(data => {
            // Set the inner HTML of the content div
            document.querySelector('.content').innerHTML = data;

            // Extract and execute any script tags in the loaded content
            const scripts = document.querySelector('.content').querySelectorAll('script');
            scripts.forEach(script => {
                const newScript = document.createElement('script');
                if (script.src) {
                    console.log("hello")
                    newScript.src = script.src;
                } else {
                    console.log("hello2")

                    newScript.textContent = script.textContent;
                    console.log(script.textContent)

                }
                console.log("hello3")

                document.body.appendChild(newScript).remove();
            });

            // Replace Feather icons
            feather.replace();
        })
        .catch(error => console.error('Error loading content:', error));
}
    });


    
</script>
</body>
</html>