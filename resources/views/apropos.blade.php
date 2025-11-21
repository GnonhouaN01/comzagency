@extends('partials.app')
@section('title','La page apropos')
@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        /* Thème comZ - Couleurs modernes et professionnelles */
        :root {
            --primary: #FF6B00;  /* Orange vif pour l'accent */
            --primary-dark: #E55A00;
            --dark: rgba(72, 29, 2,0.2);     /* Noir profond */
            --dark-light: #2D2D2D;
            --gray: #5A5A5A;
            --gray-light: #8A8A8A;
            --light: #FFFFFF;
        }

        body {
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
            background-color: var(--dark);
            color: var(--light);
            scroll-behavior: smooth;
        }

        /* Navigation */
        .nav-link {
            position: relative;
            padding: 8px 16px;
            transition: all 0.3s ease;
            border-radius: 6px;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            background-color: rgba(255, 107, 0, 0.1);
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .scale-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .scale-hover:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(255, 107, 0, 0.2);
        }

        /* Section Hero */
        .hero-section {
            height: 50vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.9) 0%, rgba(45, 45, 45, 0.85) 60%, rgba(255, 107, 0, 0.7) 100%);
            z-index: -1;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            padding: 0 2rem;
            z-index: 2;
        }

        /* Section Titles */
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--primary);
        }

        /* Values Section */
        .value-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            background: var(--dark-light);
            border: 1px solid rgba(255, 107, 0, 0.1);
            border-radius: 12px;
        }

        .value-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(255, 107, 0, 0.15);
        }

        .value-icon {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(255, 107, 0, 0.1);
            color: var(--primary);
            margin: 0 auto 1.5rem;
        }

        .value-card:hover .value-icon {
            transform: scale(1.2) rotate(10deg);
            background: var(--primary);
            color: var(--light);
            box-shadow: 0 8px 25px rgba(255, 107, 0, 0.3);
        }

        /* Team Section */
        .team-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            background: var(--dark-light);
            border: 1px solid rgba(255, 107, 0, 0.1);
            border-radius: 12px;
        }

        .team-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(255, 107, 0, 0.15);
        }

        .team-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        /* Skill Bars */
        .skill-container {
            margin-bottom: 1rem;
        }

        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .skill-bar {
            height: 6px;
            background-color: var(--gray);
            border-radius: 3px;
            overflow: hidden;
        }

        .skill-level {
            height: 100%;
            background-color: var(--primary);
            border-radius: 3px;
            transition: width 1.5s ease-in-out;
        }

        /* CTA Button */
        .cta-button {
            background-color: var(--primary);
            color: var(--light);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .cta-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
            z-index: -1;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 0, 0.3);
        }

        /* Délais d'animation */
        .delay-100 {
            transition-delay: 0.1s;
        }
        .delay-200 {
            transition-delay: 0.2s;
        }
        .delay-300 {
            transition-delay: 0.3s;
        }
        .delay-400 {
            transition-delay: 0.4s;
        }
        .delay-500 {
            transition-delay: 0.5s;
        }

        /* Utilitaires de couleur */
        .text-primary {
            color: var(--primary);
        }
        .text-light {
            color: var(--light);
        }
        .text-gray {
            color: var(--gray);
        }
        .text-gray-light {
            color: var(--gray-light);
        }

        .bg-dark {
            background: var(--dark);
        }
        .bg-dark-light {
            background: var(--dark-light);
        }
        .bg-primary {
            background: var(--primary);
        }

        .border-primary {
            border-color: var(--primary);
        }

        /* Amélioration de l'affichage du texte dans les cadres */
        .text-content {
            line-height: 1.6;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .imgdg{
           height: 600px;
           width: 80%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                height: 60vh;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
        }
    </style>


    <!-- Hero Section -->
    <section class="hero-section text-light">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 fade-in" style="line-height: 5rem;">
                À Propos de <span class="text-primary">comZ</span>
            </h1>
            <p class="text-xl md:text-2xl opacity-90 mb-8 max-w-2xl mx-auto fade-in delay-100">
                Votre partenaire en communication et marketing digital
            </p>
        </div>
    </section>

    <!-- Présentation Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div class="fade-in">
                    <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark-light rounded-full">Notre Histoire</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Qui <span class="text-primary">sommes-nous</span> ?</h2>
                    <p class="text-lg text-gray-light mt-6 mb-6 text-content">
                        comZ est une agence de communication et de marketing spécialisée dans la création de contenus visuels, la stratégie digitale et la production audiovisuelle. Nous accompagnons les entreprises et les marques dans le développement de leur image, de leur notoriété et de leur impact à travers des solutions innovantes, efficaces et sur mesure.
                    </p>
                    <p class="text-lg text-gray-light mb-8 text-content">
                        Trop d'acteurs et d'entreprises ne maîtrisent pas leurs communications et nous voulons les aider à s'améliorer. Notre mission est d'offrir des services complets et cohérents en communication, marketing et production audiovisuelle, afin de valoriser l'identité et les objectifs de chaque client.
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ url('/#contact') }}"
                            class="cta-button px-8 py-4 rounded-lg font-medium text-lg">
                            Travaillons ensemble
                        </a>
                    </div>
                </div>
                <div class="fade-in delay-100">
                    <img src="./images/img/dgFlyfret.webp" 
                         alt="Équipe comZ" 
                         class="rounded-xl shadow-lg scale-hover imgdg">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in">
                <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark rounded-full">Notre Engagement</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Mission & <span class="text-primary">Vision</span></h2>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div class="value-card p-8 text-center fade-in">
                    <div class="value-icon">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-light">Notre Mission</h3>
                    <p class="text-gray-light text-content">
                        Offrir des services complets et cohérents en communication, marketing et production audiovisuelle, afin de valoriser l'identité et les objectifs de chaque client.
                    </p>
                </div>

                <div class="value-card p-8 text-center fade-in delay-100">
                    <div class="value-icon">
                        <i class="fas fa-eye text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-light">Notre Vision</h3>
                    <p class="text-gray-light text-content">
                        Être le partenaire de référence pour toutes entreprises désireuses d'allier créativité, stratégie et performance dans sa communication.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre Équipe Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in">
                <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark-light rounded-full">Notre Équipe</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Rencontrez <span class="text-primary">notre équipe</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 text-content">
                    Une équipe de passionnés dédiée à transformer vos idées en réalité. Chaque membre apporte son expertise unique pour créer des solutions innovantes et sur mesure.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Membre 1 - Jean Batiste -->
                <div class="team-card p-6 text-center fade-in">
                    <div class="w-32 h-32 rounded-full mx-auto mb-6 overflow-hidden border-4 border-primary">
                        <img src="./images/img/dgFlyfret.webp" 
                             alt="Jean Batiste" 
                             class="w-full h-full ">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-light">Jean Batiste</h3>
                    <p class="text-primary font-semibold mb-3">Fondateur et Directeur</p>

                </div>

                <!-- Membre 2 - Stéphanie -->
                <div class="team-card p-6 text-center fade-in delay-100">
                    <div class="w-32 h-32 rounded-full mx-auto mb-6 overflow-hidden border-4 border-primary">
                        <img src="./images/hn.webp" 
                             alt="Kouassi N'sybet Rose Stéphanie" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-light">Kouassi N'sybet Rose Stéphanie</h3>
                    <p class="text-primary font-semibold mb-3">Directrice Stratégie et Digital</p>
                </div>

                <!-- Membre 3 - Emmanuel -->
                <div class="team-card p-6 text-center fade-in delay-200">
                    <div class="w-32 h-32 rounded-full mx-auto mb-6 overflow-hidden border-4 border-primary">
                        <img src="./images/hn.webp" 
                             alt="DABELI Zogba Emmanuel" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-light">DABELI Zogba Emmanuel</h3>
                    <p class="text-primary font-semibold mb-3">Directeur Photo & Vidéo</p>

                </div>

                <!-- Membre 4 - Arnaud -->
                <div class="team-card p-6 text-center fade-in delay-300">
                    <div class="w-32 h-32 rounded-full mx-auto mb-6 overflow-hidden border-4 border-primary">
                        <img src="./images/hn.webp" 
                             alt="Monsieur Arnaud" 
                             class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-light">Monsieur Arnaud</h3>
                    <p class="text-primary font-semibold mb-3">Directeur Finances et Administration</p>
                    
                </div>
            </div>

        </div>
    </section>

    <!-- Pourquoi Nous Choisir Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in">
                <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark rounded-full">Nos Atouts</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Pourquoi <span class="text-primary">nous choisir</span> ?</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="value-card p-6 text-center fade-in">
                    <div class="value-icon">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Équipe Passionnée</h3>
                    <p class="text-gray-light text-content">
                        Une équipe passionnée, créative et innovante qui met son expertise à votre service.
                    </p>
                </div>

                <div class="value-card p-6 text-center fade-in delay-100">
                    <div class="value-icon">
                        <i class="fas fa-tools text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Équipements Modernes</h3>
                    <p class="text-gray-light text-content">
                        Des équipements de dernière génération pour des résultats professionnels et impactants.
                    </p>
                </div>

                <div class="value-card p-6 text-center fade-in delay-200">
                    <div class="value-icon">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Expertise Éprouvée</h3>
                    <p class="text-gray-light text-content">
                        Une expertise éprouvée dans divers secteurs avec des solutions rapides, flexibles et adaptées à chaque budget.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valeurs Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in">
                <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark-light rounded-full">Nos Fondations</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Nos <span class="text-primary">valeurs</span> fondamentales</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="value-card p-6 text-center fade-in">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Créativité Utile</h3>
                    <p class="text-gray-light text-content">
                        Belle, mais surtout efficace. Chaque élément créé doit servir un objectif précis.
                    </p>
                </div>

                <div class="value-card p-6 text-center fade-in delay-100">
                    <div class="value-icon">
                        <i class="fas fa-award text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Exigence</h3>
                    <p class="text-gray-light text-content">
                        Respecter les délais, soigner les détails. La qualité est notre signature.
                    </p>
                </div>

                <div class="value-card p-6 text-center fade-in delay-200">
                    <div class="value-icon">
                        <i class="fas fa-handshake text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Proximité</h3>
                    <p class="text-gray-light text-content">
                        Parler vrai, travailler en équipe avec nos clients. Votre succès est le nôtre.
                    </p>
                </div>

                <div class="value-card p-6 text-center fade-in delay-300">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Intégrité</h3>
                    <p class="text-gray-light text-content">
                        Transparence sur ce qui est possible, sur les coûts et les résultats.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Local Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="fade-in">
                    <img src="./images/img/enga.webp" 
                         alt="Culture ivoirienne" 
                         class="rounded-xl shadow-lg scale-hover">
                </div>
                <div class="fade-in delay-100">
                    <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark rounded-full">Notre Engagement Local</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Impact <span class="text-primary">local</span></h2>
                    <p class="text-lg text-gray-light mt-6 mb-6 text-content">
                        Nous croyons fermement en la richesse de notre culture et de nos talents locaux. Notre engagement est de mettre en avant nos cultures et nos talents ivoiriens à travers nos créations.
                    </p>
                    <p class="text-lg text-gray-light mb-8 text-content">
                        En travaillant avec comZ, vous soutenez non seulement une agence locale mais vous participez également à la valorisation du savoir-faire ivoirien dans le domaine de la communication et du marketing digital.
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ url('/#contact') }}"
                            class="border-2 border-primary text-primary px-8 py-4 rounded-lg font-medium hover:bg-primary hover:text-light transform transition-all duration-300 text-lg">
                            Voir nos réalisations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        // Initialize Vanta.js background
        VANTA.NET({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xFF6B00,
            backgroundColor: 0x1A1A1A,
            points: 12.00,
            maxDistance: 22.00,
            spacing: 18.00
        });
        
        // Initialize Feather Icons
        feather.replace();
        
        // Animation management
        function initAnimations() {
            // Observer for fade-in animations
            const fadeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });
            
            // Observe all fade-in elements
            document.querySelectorAll('.fade-in').forEach(el => {
                fadeObserver.observe(el);
            });
        }
        
        // Animate skill bars when they come into view
        function initSkillBars() {
            const skillObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const skillLevel = entry.target;
                        const level = skillLevel.getAttribute('data-level');
                        skillLevel.style.width = level + '%';
                    }
                });
            }, { threshold: 0.5 });
            
            // Observe all skill level elements
            document.querySelectorAll('.skill-level').forEach(el => {
                skillObserver.observe(el);
            });
        }
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu && mobileMenu.classList.contains('open')) {
                    mobileMenu.classList.remove('open');
                }
            });
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                
                // Change icon based on menu state
                const icon = mobileMenuButton.querySelector('i');
                if (!mobileMenu.classList.contains('hidden')) {
                    icon.setAttribute('data-feather', 'x');
                } else {
                    icon.setAttribute('data-feather', 'menu');
                }
                feather.replace();
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initAnimations();
            initSkillBars();
        });
    </script>
@endsection