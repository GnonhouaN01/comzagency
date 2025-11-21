@extends('partials.app')
@section('title','La page contacte')
@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

       
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

        /* Contact Cards */
        .contact-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            background: var(--dark-light);
            border: 1px solid rgba(255, 107, 0, 0.1);
            border-radius: 12px;
        }

        .contact-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(255, 107, 0, 0.15);
        }

        .contact-icon {
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

        .contact-card:hover .contact-icon {
            transform: scale(1.2) rotate(10deg);
            background: var(--primary);
            color: var(--light);
            box-shadow: 0 8px 25px rgba(255, 107, 0, 0.3);
        }

        /* Form Styles */
        .form-input {
            transition: all 0.3s ease;
            background: var(--dark-light);
            border: 1px solid var(--gray);
            color: var(--light);
            border-radius: 8px;
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.25);
            border-color: var(--primary);
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

        /* FAQ Styles */
        .faq-item {
            border-bottom: 1px solid var(--gray);
            margin-bottom: 1rem;
        }

        .faq-question {
            cursor: pointer;
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            padding: 0 1rem;
        }

        .faq-answer.active {
            max-height: 500px;
            padding-bottom: 1rem;
        }

        .faq-toggle {
            transition: transform 0.3s ease;
        }

        .faq-toggle.active {
            transform: rotate(45deg);
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

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                height: 40vh;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
        }
    </style>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif
    <!-- Hero Section -->
    
    <section class="hero-section text-light">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6 fade-in">
                Un <span class="text-primary">besoin</span> ?
            </h1>
            <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto fade-in delay-100">
                Alors renseignez ce formulaire
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="fade-in">
                    <div class="p-8 rounded-xl shadow-lg bg-dark-light border border-gray">
                        <h2 class="text-2xl font-bold mb-6 text-light">Contactez-nous</h2>
                        <form class="space-y-6" action="{{route('email.contact')}}" method="POST">
                            <div>
                                <label for="name" class="block text-sm font-medium text-light mb-1">Nom complet *</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-3 form-input"
                                    placeholder="Votre nom complet" required>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-light mb-1">Email *</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 form-input"
                                    placeholder="votre@email.com" required>
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-light mb-1">Votre numéro de téléphone *</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 form-input"
                                    placeholder="+225 XX XX XX XX" required>
                            </div>

                            <div>
                                <label for="need" class="block text-sm font-medium text-light mb-1">Votre besoin *</label>
                                <textarea id="need" name="need" rows="4"
                                    class="w-full px-4 py-3 form-input"
                                    placeholder="Saisissez votre besoin..." required></textarea>
                            </div>

                            <div>
                                <button type="submit"
                                    class="w-full cta-button font-medium py-4 px-4 rounded-lg flex items-center justify-center text-lg">
                                    S O U M E T T R E
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="fade-in delay-100" id="contact">
                    <h2 class="text-2xl font-bold mb-8 text-light">Nos Coordonnées</h2>
                    
                    <div class="space-y-8">
                        <!-- Téléphone -->
                        <div class="contact-card p-6">
                            <div class="contact-icon">
                                <i class="fas fa-phone text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-4 text-light text-center">Téléphone</h3>
                            <div class="space-y-2 text-center">
                                <p class="text-lg text-gray-light">+225 05 94 94 65 65</p>
                                <p class="text-lg text-gray-light">+225 27 22 30 48 19</p>
                                <p class="text-lg text-gray-light">+33 5 54 54 31 71</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="contact-card p-6">
                            <div class="contact-icon">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-4 text-light text-center">Email</h3>
                            <div class="space-y-2 text-center">
                                <p class="text-lg text-gray-light">service.client@comzagency.com</p>
                                <p class="text-lg text-gray-light">service.client@comzagency.com</p>
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="contact-card p-6">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-4 text-light text-center">Adresse</h3>
                            <p class="text-lg text-gray-light text-center">
                                Abidjan, Cocody,Palmeraie Carréfour Guiraud
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-light">Questions <span class="text-primary">fréquentes</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-2xl mx-auto fade-in delay-100 text-content">
                    Retrouvez les réponses aux questions les plus courantes
                </p>
            </div>

            <div class="space-y-4 fade-in delay-200">
                <!-- FAQ 1 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3 class="text-lg font-medium text-light">MA MARQUE EST NOUVELLE, QUEL ACCOMPAGNEMENT POUVEZ-VOUS ME PROPOSER ?</h3>
                        <span class="faq-toggle text-primary">
                            <i data-feather="plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p class="text-gray-light text-content">
                            Pour les nouvelles marques, nous proposons un accompagnement complet incluant la création d'identité visuelle, le développement de stratégie digitale, la gestion des réseaux sociaux et la production de contenu adapté. Nous vous aidons à construire une image forte et cohérente dès le départ.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3 class="text-lg font-medium text-light">MON ENTREPRISE N'EST PAS VISIBLE, COMMENT POUVEZ-VOUS NOUS AIDER ?</h3>
                        <span class="faq-toggle text-primary">
                            <i data-feather="plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p class="text-gray-light text-content">
                            Nous développons des stratégies de référencement (SEO), de publicité en ligne (SEA) et de présence sur les réseaux sociaux pour augmenter votre visibilité. Nous identifions les canaux les plus pertinents pour votre activité et créons du contenu optimisé pour attirer votre public cible.
                        </p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3 class="text-lg font-medium text-light">JE VEUX ÊTRE RÉFÉRENCÉ EN PREMIÈRE POSITION SUR GOOGLE, COMMENT FAIRE ?</h3>
                        <span class="faq-toggle text-primary">
                            <i data-feather="plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p class="text-gray-light text-content">
                            Le référencement en première position nécessite une stratégie SEO complète incluant l'optimisation technique, la création de contenu de qualité, l'obtention de backlinks et une présence locale optimisée. Nous analysons votre secteur et mettons en place un plan d'action personnalisé pour améliorer votre positionnement.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3 class="text-lg font-medium text-light">COMBIEN ÇA COÛTE DE FAIRE APPEL À VOTRE AGENCE DE COMMUNICATION ?</h3>
                        <span class="faq-toggle text-primary">
                            <i data-feather="plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p class="text-gray-light text-content">
                            Nos tarifs varient selon la complexité du projet, la durée de l'accompagnement et les services requis. Nous proposons des packs adaptés à différents budgets, allant de 250 000 FCFA pour nos formules de base. Contactez-nous pour obtenir un devis personnalisé gratuit.
                        </p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3 class="text-lg font-medium text-light">COMBIEN DE TEMPS POUR OBTENIR UN DEVIS ?</h3>
                        <span class="faq-toggle text-primary">
                            <i data-feather="plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p class="text-gray-light text-content">
                            Nous nous engageons à vous fournir un devis détaillé sous 48 heures maximum après notre premier échange. Pour les projets complexes, nous pouvons nécessiter jusqu'à 72 heures pour une étude approfondie et une proposition adaptée à vos besoins spécifiques.
                        </p>
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
        
        // FAQ Toggle functionality
        function initFAQ() {
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const answer = question.nextElementSibling;
                    const toggle = question.querySelector('.faq-toggle');
                    
                    // Toggle active class
                    answer.classList.toggle('active');
                    toggle.classList.toggle('active');
                    
                    // Change icon
                    const icon = toggle.querySelector('i');
                    if (answer.classList.contains('active')) {
                        icon.setAttribute('data-feather', 'minus');
                    } else {
                        icon.setAttribute('data-feather', 'plus');
                    }
                    feather.replace();
                });
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

        // Form submission handling
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                // Usually, you would send form data to your server here
                alert('Merci pour votre message ! Nous vous contacterons bientôt.');
                form.reset();
            });
        }

        // Initialize everything when DOM is loaded
        // document.addEventListener('DOMContentLoaded', () => {
        //     initAnimations();
        //     initFAQ();
        // });

        initAnimations();
            initFAQ();
    </script>
@endsection