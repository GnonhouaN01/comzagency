<nav class="bg-dark/90 backdrop-blur-md shadow-sm fixed w-full z-50 border-b border-primary/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('accueil') }}" class="font-bold text-xl text-light">
                    com<span class="text-primary">Z</span>
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex md:items-center md:space-x-4">
                <a href="{{ route('accueil') }}" class="nav-link text-light {{ request()->routeIs('accueil') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('apropos') }}" class="nav-link text-light {{ request()->routeIs('apropos') ? 'active' : '' }}">A propos</a>
                <a href="{{ route('offres') }}" class="nav-link text-light {{ request()->routeIs('offres') ? 'active' : '' }}">Nos Offres</a>
                <a href="{{ route('contacte') }}" class="nav-link text-light {{ request()->routeIs('contacte') ? 'active' : '' }}">Contact</a>
                <a href="{{ url('/#contact') }}"
                    class="cta-button px-4 py-2 rounded-md text-sm font-medium text-light border border-primary hover:bg-primary hover:text-dark transition">
                    Demander un service
                </a>
            </div>

            <!-- Bouton menu mobile -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-light hover:text-primary focus:outline-none transition">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile (animé, caché par défaut) -->
    <div id="mobile-menu"
        class="hidden md:hidden bg-dark/95 backdrop-blur-md border-t border-primary/20 px-2 pt-2 pb-3 space-y-1 transform transition-all duration-500 ease-in-out opacity-0 scale-y-0 origin-top">
        <a href="{{ route('accueil') }}" class="block px-3 py-2 rounded-md text-base font-medium text-light hover:text-primary {{ request()->routeIs('accueil') ? 'nav-link-active' : '' }}">Accueil</a>
        <a href="{{ route('apropos') }}" class="block px-3 py-2 rounded-md text-base font-medium text-light hover:text-primary {{ request()->routeIs('apropos') ? 'nav-link-active' : '' }}">A propos</a>
        <a href="{{ route('offres') }}" class="block px-3 py-2 rounded-md text-base font-medium text-light hover:text-primary {{ request()->routeIs('offres') ? 'nav-link-active' : '' }}">Nos Offres</a>
        <a href="{{ route('contacte') }}" class="block px-3 py-2 rounded-md text-base font-medium text-light hover:text-primary {{ request()->routeIs('contacte') ? 'nav-link-active' : '' }}">Contact</a>
    </div>
</nav>


