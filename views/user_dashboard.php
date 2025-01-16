<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="/elmuntada/public/css/config.js"></script>
</head>
<body class="bg-gray-50">
<?php if (!isset($_SESSION['utilisateur_id']) || $_SESSION['role'] !== 'user') {
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
                    <p class="text-sm text-white/50">Dashboard utilisateur</p>
                </div>
            </div>
        </div>

        <div class="nav-container px-4 py-2">
            <ul class="space-y-2">
               

                <li>
                    <div data-path="/elmuntada/membership-application"
                         class="menu-item flex items-center gap-4 p-3 rounded-xl hover:bg-white/5">
                        <div class="icon-container p-1.5 rounded-lg bg-white/10">
                            <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-white/90 text-sm font-medium">Devenir Membre</span>
                    </div>
                </li>
                <li>
                    <div data-path="/elmuntada/make-donation" 
                         class="menu-item flex items-center gap-4 p-3 rounded-xl hover:bg-white/5">
                        <div class="icon-container p-1.5 rounded-lg bg-white/10">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <span class="text-white text-sm font-medium">Faire un don</span>
                    </div>
                </li>
              <li>
    <div data-path="/elmuntada/show-demande-aide" 
         class="menu-item flex items-center gap-4 p-3 rounded-xl hover:bg-white/5">
        <div class="icon-container p-1.5 rounded-lg bg-white/10">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M12 21c-4.97-4.32-8-7.15-8-10.4 0-2.5 2-4.6 4.6-4.6 1.56 0 3.04.81 3.8 2.1.76-1.29 2.24-2.1 3.8-2.1 2.6 0 4.6 2.1 4.6 4.6 0 3.25-3.03 6.08-8 10.4z" />
            </svg>
        </div>
        <span class="text-white text-sm font-medium">Demande d'aides</span>
    </div>
</li>

                <li>
                    <div
                         class="menu-item2 flex items-center gap-4 p-3 rounded-xl hover:bg-white/5">
                        <div class="icon-container p-2.5 rounded-lg bg-white/10">
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
            <h1>Bienvenue sur votre tableau de bord utilisateur</h1>
        </div>
    </div>
    <script>
 document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');

        
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


    if (currentPath === '/elmuntada/user-dashboard') {
        loadContent('/elmuntada/membership-application');
    }

        function loadContent(path) {
    fetch(path)
        .then(response => response.text())
        .then(data => {
            document.querySelector('.content').innerHTML = data;

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

            feather.replace();
        })
        .catch(error => console.error('Error loading content:', error));
}
    });


    
</script>
</body>
</html>
