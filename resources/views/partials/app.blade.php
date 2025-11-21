<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comZ - Agence de Marketing Digital & Communication</title>
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body >
    <!-- Vanta.js Background -->
    <div id="vanta-bg" class="fixed top-0 left-0 w-full h-full -z-10"></div>
     <!-- header -->
    @include('layouts.header')
    
    <!-- espace réservé pour le contenu -->
    
    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

    <!-- WhatsApp Chat Button -->
    @include('whatsapp')
    <!-- le javaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Scripts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            feather.replace();

            const menuButton = document.getElementById("mobile-menu-button");
            const mobileMenu = document.getElementById("mobile-menu");
            let menuOpen = false;

            menuButton.addEventListener("click", () => {
                menuOpen = !menuOpen;

                if (menuOpen) {
                    // Animation d'ouverture : fade-in + slide-down
                    mobileMenu.classList.remove("hidden");
                    setTimeout(() => {
                        mobileMenu.classList.remove("opacity-0", "scale-y-0");
                        mobileMenu.classList.add("opacity-100", "scale-y-100");
                    }, 10);
                    menuButton.innerHTML = '<i data-feather="x"></i>';
                } else {
                    // Animation de fermeture : fade-out + slide-up
                    mobileMenu.classList.remove("opacity-100", "scale-y-100");
                    mobileMenu.classList.add("opacity-0", "scale-y-0");

                    // Attend la fin de la transition avant de cacher le menu
                    setTimeout(() => {
                        mobileMenu.classList.add("hidden");
                    }, 500);

                    menuButton.innerHTML = '<i data-feather="menu"></i>';
                }

                feather.replace();
            });
        });
    </script>
</body>

</html>
