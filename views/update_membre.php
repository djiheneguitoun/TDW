

<div class=" w-full bg-gradient-to-br  from-gray-50 to-gray-100 min-h-full p-8 relative overflow-hidden">
    <div class="fixed inset-0 z-[10] ">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-gradient-to-r from-primary/20 to-secondary/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-float"></div>
        <div class="absolute top-[40%] right-0 w-[400px] h-[400px] bg-gradient-to-l from-accent/20 to-secondary/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-0 left-[20%] w-[600px] h-[600px] bg-gradient-to-t from-primary/20 to-accent/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-float" style="animation-delay: -4s;"></div>
    </div>
    <div class="max-w-xl mx-auto relative z-40">
        <!-- Glass Card -->
        <div class="bg-white/80 backdrop-blur-xl p-10 rounded-3xl shadow-[0_8px_32px_rgba(100,56,105,0.15)] relative overflow-hidden group">
            <!-- Permanent Card Background Animation -->
            <div class="absolute inset-0 bg-gradient-to-r from-primary/5 via-secondary/5 to-accent/5 animate-gradient"></div>
            
            <!-- Decorative Corner Elements -->
            <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-primary/20 to-transparent rounded-br-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-secondary/20 to-transparent rounded-tl-3xl animate-pulse-slow" style="animation-delay: -2s;"></div>

            <!-- Header -->
            <div class="mb-10 text-center relative">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-primary via-accent to-primary bg-[length:200%_auto] animate-gradient bg-clip-text text-transparent">
                    Update Profile
                </h2>
                <p class="text-gray-500 mt-3 text-sm tracking-wide">Enhance your account information</p>
            </div>

            <form action="/elmuntada/membre-dashboard/update-handle" method="POST" class="space-y-6">
                <!-- Name Fields Group -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur opacity-30"></div>
                        <div class="relative">
                            <i data-feather="user" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-primary/70 transition-all duration-300 group-hover:scale-110"></i>
                            <input type="text" id="nom" name="nom"  value="<?php echo htmlspecialchars($user['nom']); ?>"  placeholder="Last Name" 
                                class="w-full pl-10 pr-4 py-3.5 text-sm bg-white/90 border-0 rounded-xl shadow-[inset_0_2px_4px_rgba(100,56,105,0.1)] focus:shadow-[0_0_0_2px_rgba(100,56,105,0.3),0_4px_12px_rgba(100,56,105,0.1)] outline-none transition-all duration-300 hover:bg-white"
                                required>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur opacity-30"></div>
                        <div class="relative">
                            <i data-feather="user" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-primary/70 transition-all duration-300"></i>
                            <input type="text" id="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>"  name="prenom" placeholder="First Name"
                                class="w-full pl-10 pr-4 py-3.5 text-sm bg-white/90 border-0 rounded-xl shadow-[inset_0_2px_4px_rgba(100,56,105,0.1)] focus:shadow-[0_0_0_2px_rgba(100,56,105,0.3),0_4px_12px_rgba(100,56,105,0.1)] outline-none transition-all duration-300 hover:bg-white"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur opacity-30"></div>
                    <div class="relative">
                        <i data-feather="mail" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-primary/70 transition-all duration-300"></i>
                        <input type="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>"  name="email" placeholder="Email address"
                            class="w-full pl-10 pr-4 py-3.5 text-sm bg-white/90 border-0 rounded-xl shadow-[inset_0_2px_4px_rgba(100,56,105,0.1)] focus:shadow-[0_0_0_2px_rgba(100,56,105,0.3),0_4px_12px_rgba(100,56,105,0.1)] outline-none transition-all duration-300 hover:bg-white"
                            required>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur opacity-30"></div>
                    <div class="relative">
                        <i data-feather="lock" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-primary/70 transition-all duration-300"></i>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Password"
                            class="w-full pl-10 pr-4 py-3.5 text-sm bg-white/90 border-0 rounded-xl shadow-[inset_0_2px_4px_rgba(100,56,105,0.1)] focus:shadow-[0_0_0_2px_rgba(100,56,105,0.3),0_4px_12px_rgba(100,56,105,0.1)] outline-none transition-all duration-300 hover:bg-white"
                            required>
                    </div>
                </div>

                <!-- Address Field -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur opacity-30"></div>
                    <div class="relative">
                        <i data-feather="home" class="absolute left-3 top-3 w-4 h-4 text-primary/70 transition-all duration-300"></i>
                        <input id="adresse" value="<?php echo htmlspecialchars($membre['adresse']); ?>" name="adresse" placeholder="Address" rows="3"
                            class="w-full pl-10 pr-4 py-3.5 text-sm bg-white/90 border-0 rounded-xl shadow-[inset_0_2px_4px_rgba(100,56,105,0.1)] focus:shadow-[0_0_0_2px_rgba(100,56,105,0.3),0_4px_12px_rgba(100,56,105,0.1)] outline-none transition-all duration-300 hover:bg-white"
                            required>
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl blur opacity-30"></div>
                    <div class="relative">
                        <i data-feather="phone" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-primary/70 transition-all duration-300"></i>
                        <input type="tel"  value="<?php echo htmlspecialchars($membre['telephone']); ?>"  id="telephone" name="telephone" placeholder="Phone number"
                            class="w-full pl-10 pr-4 py-3.5 text-sm bg-white/90 border-0 rounded-xl shadow-[inset_0_2px_4px_rgba(100,56,105,0.1)] focus:shadow-[0_0_0_2px_rgba(100,56,105,0.3),0_4px_12px_rgba(100,56,105,0.1)] outline-none transition-all duration-300 hover:bg-white"
                            required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-4">
                    <button type="submit" 
                        class="group relative px-8 py-3.5 bg-gradient-to-r from-primary via-secondary to-primary bg-[length:200%_auto] animate-gradient text-white rounded-xl overflow-hidden transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_8px_24px_rgba(100,56,105,0.3)]">
                        <div class="absolute inset-0 bg-[length:10px_10px] bg-[radial-gradient(circle,_rgba(255,255,255,0.25)_1px,_transparent_1px)] opacity-25"></div>
                        <span class="relative flex items-center gap-2 text-sm font-medium">
                            <i data-feather="check" class="w-4 h-4"></i>
                            Update Profile
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
<script>
       feather.replace();
       tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#643869',
                secondary: '#8B4B8E',
                accent: '#9E5EA1'
            },
            animation: {
                'gradient': 'gradient 8s linear infinite',
                'float': 'float 6s ease-in-out infinite',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            keyframes: {
                gradient: {
                    '0%, 100%': {
                        'background-size': '200% 200%',
                        'background-position': 'left center'
                    },
                    '50%': {
                        'background-size': '200% 200%',
                        'background-position': 'right center'
                    }
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' }
                }
            }
        }
    }
}

</script>
</div>