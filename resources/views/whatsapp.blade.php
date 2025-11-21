<!-- Container principal des réseaux sociaux -->
<div class="fixed bottom-6 right-0 z-40 flex items-center gap-3 flex-col">
    
    <!-- WhatsApp (toujours visible) -->
    <a href="https://wa.me/2250758727192?text=Bonjour%20Digit%20Communication,%20je%20suis%20intéressé%20par%20vos%20services"
        class="bg-primary text-light w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-primary-dark hover:scale-110 transition-all duration-300 group relative">
        <i data-feather="message-circle" class="w-6 h-6"></i>
        <span
            class="absolute bottom-full mb-2 bg-dark text-light text-xs py-1 px-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            Contact WhatsApp
        </span>
    </a>

    <!-- Bouton principal pour déployer les réseaux -->
    <button id="social-toggle"
        class="bg-primary text-light w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-primary-dark transition-all duration-300">
        <i class="fas fa-share-alt w-5 h-5"></i>
    </button>

    <!-- Réseaux sociaux (masqués par défaut) -->
    <div id="social-networks" class="flex items-center gap-3 opacity-0 transform translate-x-4 transition-all duration-300">
       
        <!-- TikTok -->
        <a href="https://www.tiktok.com/@digitcommunication" target="_blank"
            class="bg-gradient-to-r from-[#00f2ea] to-[#ff0050] text-light w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-all duration-300 group relative">
            <i class="fab fa-tiktok w-4 h-4"></i>
            <span
                class="absolute bottom-full mb-2 bg-dark text-light text-xs py-1 px-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                TikTok
            </span>
        </a>

        <!-- Facebook -->
        <a href="https://www.facebook.com/digitcommunication" target="_blank"
            class="bg-[#1877F2] text-light w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-all duration-300 group relative">
            <i class="fab fa-facebook-f w-4 h-4"></i>
            <span
                class="absolute bottom-full mb-2 bg-dark text-light text-xs py-1 px-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                Facebook
            </span>
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/company/digitcommunication" target="_blank"
            class="bg-[#0A66C2] text-light w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-all duration-300 group relative">
            <i class="fab fa-linkedin-in w-4 h-4"></i>
            <span
                class="absolute bottom-full mb-2 bg-dark text-light text-xs py-1 px-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                LinkedIn
            </span>
        </a>

    </div>

</div>

<script>
   
    document.addEventListener('DOMContentLoaded', function() {
        const socialToggle = document.getElementById('social-toggle');
        const socialNetworks = document.getElementById('social-networks');
        let isOpen = false;

        socialToggle.addEventListener('click', function() {
            isOpen = !isOpen;

            if (isOpen) {
                socialNetworks.style.opacity = '1';
                socialNetworks.style.transform = 'translateX(0)';
                socialToggle.innerHTML = '<i class="fas fa-times w-5 h-5"></i>';
            } else {
                socialNetworks.style.opacity = '0';
                socialNetworks.style.transform = 'translateX(4px)';
                socialToggle.innerHTML = '<i class="fas fa-share-alt w-5 h-5"></i>';
            }
        });
    });

    // Initialiser Feather Icons
    feather.replace();
</script>