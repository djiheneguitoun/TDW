<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Original styles remain */
        .custom-shape {
            clip-path: path('M 0 0 L 100% 0 L 100% 100% L 0 100% L 0 0 Z');
        }
        .orange-circle {
            background: #FF7751;
        }
        .purple-bg {
            background: #693B69;
        }
        .curve-shape {
            background: white;
            border-radius: 50% 0 0 50%;
        }
        
        /* Enhanced form styles */
        .glassmorphism {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
        }
        
        .input-glow:focus {
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
        }
        
        .button-gradient {
            background: linear-gradient(135deg, #FFFFFF 0%, #F0F0F0 100%);
        }
        
        .form-background {
            background: radial-gradient(circle at top left, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden bg-[#EAEAEA]">
    <div class="relative h-full w-full grid grid-cols-2">
        <div class="absolute purple-bg w-1/2 h-full z-20 overflow-hidden">
            <!-- Decorative background elements -->
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-white/5"></div>
                <div class="absolute bottom-20 right-10 w-32 h-32 rounded-full bg-white/5"></div>
                <div class="absolute top-1/2 left-1/4 w-16 h-16 rounded-full bg-white/5"></div>
            </div>

            <div class="container mx-auto p-4 relative">
                <!-- Enhanced title section -->
                <div class="text-center mb-12 floating">
                    <h1 class="text-white text-6xl font-bold tracking-wider mb-4">
                        Connexion
                    </h1>
                    <div class="flex items-center justify-center gap-2">
                        <div class="w-16 h-1 bg-white/20 rounded-full"></div>
                        <div class="w-4 h-1 bg-white/40 rounded-full"></div>
                        <div class="w-2 h-1 bg-white/60 rounded-full"></div>
                    </div>
                </div>

                <!-- Enhanced form -->
                <form action="/elmuntada/login-handle" method="POST" 
                    class="max-w-lg mx-auto form-background rounded-3xl p-12 
                    shadow-[0_8px_32px_rgba(0,0,0,0.2)] border border-white/20 
                    glassmorphism relative overflow-hidden">
                    
                    <!-- Email field -->
                    <div class="mb-8 relative group">
                        <label for="email" 
                            class="block text-white/90 text-sm font-medium mb-3 tracking-wider 
                            transform transition-all duration-300 group-focus-within:text-white">
                            Email
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email"
                                placeholder="votreemail@exemple.com"
                                class="w-full px-6 py-4 rounded-2xl bg-white/10 border border-white/20 
                                text-white placeholder-white/30 input-glow
                                focus:outline-none focus:border-white/40 focus:bg-white/15
                                transform transition-all duration-300 ease-out"
                                required>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 
                                text-white/30 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password field -->
                    <div class="mb-10 relative group">
                        <label for="password" 
                            class="block text-white/90 text-sm font-medium mb-3 tracking-wider 
                            transform transition-all duration-300 group-focus-within:text-white">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                placeholder="••••••••"
                                class="w-full px-6 py-4 rounded-2xl bg-white/10 border border-white/20 
                                text-white placeholder-white/30 input-glow
                                focus:outline-none focus:border-white/40 focus:bg-white/15
                                transform transition-all duration-300 ease-out"
                                required>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 
                                text-white/30 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Remember me and Forgot password -->
                    <div class="flex items-center justify-between mb-8 text-sm">
                        <label class="flex items-center text-white/70 hover:text-white 
                            cursor-pointer transition-colors duration-300">
                            <input type="checkbox" class="mr-2 rounded border-white/20 bg-white/10">
                            Se souvenir de moi
                        </label>
                      
                    </div>

                    <!-- Submit button -->
                    <div class="space-y-6">
                        <button type="submit"
                            class="w-full button-gradient text-[#693B69] font-bold py-4 px-6 rounded-2xl
                            hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-white/50
                            transform transition-all duration-300 ease-out hover:-translate-y-1
                            hover:shadow-[0_10px_20px_rgba(0,0,0,0.2)] shadow-lg
                            relative overflow-hidden group">
                            <span class="relative z-10">Se connecter</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0
                                transform translate-x-[-100%] group-hover:translate-x-[100%]
                                transition-transform duration-1000"></div>
                        </button>

                        
                    </div>
                </form>
            </div>
        </div>

        <!-- Rest of the layout remains unchanged -->
        <div class="">
            <div class="absolute right-0 top-0 h-full w-1/2 bg-[#693B69] curve-shape" style="transform: rotate(-40deg) translateX(45%);"></div>
            <div class="absolute right-0 top-0 h-full w-1/2 bg-[#EADFDB] curve-shape" style="transform: rotate(-40deg) translateX(65%);"></div>
            <div class="absolute right-20 top-1/4 h-96 w-96 orange-circle rounded-full"></div>
            <div class="absolute right-0 top-0 h-full w-2/3">
                <svg viewBox="0 0 200 100" class="h-full w-full fill-none stroke-purple-300/20">
                    <path d="M 0,70 Q 50,20 100,70 T 200,70" stroke-width="1"/>
                </svg>
            </div>
        </div>
    </div>
</body>
</html>