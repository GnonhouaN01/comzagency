@extends('partials.app')
@section('title','La page contacte')
@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        /* Thème Digit Communication - Couleurs modernes et professionnelles */
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

        /* Packs Section - Design amélioré */
        .pack-card {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: var(--dark-light);
            border: 1px solid rgba(255, 107, 0, 0.3);
            border-radius: 12px;
            height: fit-content;
        }

        .pack-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(255, 107, 0, 0.2);
        }

        .pack-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), #FFA500);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .pack-card:hover::before {
            transform: scaleX(1);
        }

        .pack-header {
            background: linear-gradient(135deg, var(--dark-light), var(--primary));
            color: white;
            padding: 1.5rem;
            text-align: center;
            border-radius: 12px 12px 0 0;
        }

        .pack-price {
            font-size: 1.75rem;
            font-weight: bold;
            margin: 1rem 0;
            color: var(--light);
        }

        .pack-features {
            padding: 1.5rem;
            max-height: 400px;
            overflow-y: auto;
            display: none; /* Masqué par défaut */
        }

        .pack-features.expanded {
            display: block; /* Affiché quand le pack est déplié */
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }

        .feature-icon {
            color: var(--primary);
            margin-right: 0.75rem;
            flex-shrink: 0;
            margin-top: 0.125rem;
        }

        .pack-cta {
            padding: 1.5rem;
            border-top: 1px solid var(--gray);
            text-align: center;
            display: none; /* Masqué par défaut */
        }

        .pack-cta.expanded {
            display: block; /* Affiché quand le pack est déplié */
        }

        .pack-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background: #FFA500;
            color: var(--dark);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            z-index: 10;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .pack-icon {
            transition: all 0.4s ease;
        }

        .pack-card:hover .pack-icon {
            transform: scale(1.1) rotate(10deg);
        }

        /* Bouton Voir Plus */
        .see-more-btn {
            background-color: var(--primary);
            color: var(--light);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            width: 100%;
            font-weight: 600;
        }

        .see-more-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 0, 0.3);
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

        /* Scrollbar personnalisée */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 107, 0, 0.3);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 107, 0, 0.5);
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

        .pack-features ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pack-features li {
            margin-bottom: 0.5rem;
            padding-left: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                height: 40vh;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .pack-features {
                max-height: 300px;
            }
        }
    </style>



    <!-- Hero Section -->
    <section class="hero-section text-light">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6 fade-in">
                Nos <span class="text-primary">Offres</span>
            </h1>
            <p class="text-xl opacity-90 mb-8 max-w-2xl mx-auto fade-in delay-100">
                Des solutions complètes et adaptées à vos besoins en communication digitale
            </p>
        </div>
    </section>

    <!-- Packs Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in">
                <span class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark-light rounded-full">Nos Formules</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title">Packs <span class="text-primary">Communication</span></h2>
               
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 text-content">
                    Trouvez la formule parfaite pour booster votre visibilité. Nos packs sont conçus 
                    pour s'adapter à vos objectifs spécifiques et vous offrir le meilleur retour 
                    sur investissement.
                </p>
            </div>

            <!-- Grille de packs - 6 cartes affichées -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Pack 1 - Starter Pack -->
                <div class="pack-card fade-in">
                    <div class="pack-badge">Populaire</div>
                    <div class="pack-header">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 bg-primary text-light mx-auto pack-icon">
                            <i class="fas fa-bolt text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-light">Starter Pack</h4>
                        <p class="text-sm opacity-90 mt-2 text-content">Pack de lancement pour les jeunes marques et entrepreneurs</p>
                        <div class="pack-price">250 000 FCFA</div>
                    </div>
                    <div class="pack-features custom-scrollbar" id="pack1-features">
                        <ul class="space-y-2 text-sm text-gray-light">
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Amélioration ou création de logo</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Plan marketing et stratégies</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">8 à 10 publications/mois (création visuelle : photo-vidéo + légende + programmation)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">1 séance photo professionnelle (05 photos corporates et 4 vidéos)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">1 mini-vidéo de présentation service ou mini reportage</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Gestion des pages réseaux sociaux (Création ou Optimisation)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Rapport d'analyse mensuel des performances</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Séance de travail chaque 2 semaines avec le client (20 mn)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pack-cta" id="pack1-cta">
                        <div class="text-xs text-primary space-y-1 mb-4">
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-info-circle mr-1"></i>
                                Prévoir un budget publicitaire à partir de 100.000 FCFA selon le nombre de Boost
                            </p>
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-edit mr-1"></i>
                                Le package peut être modifié en fonction des besoins du client
                            </p>
                        </div>
                        <a href="contact.html" class="cta-button w-full py-3 rounded-lg font-medium block text-center">
                            Choisir ce pack
                        </a>
                    </div>
                    <button class="see-more-btn" data-pack="1">
                        Voir plus
                    </button>
                </div>

                <!-- Pack 2 - Pack Boost -->
                <div class="pack-card fade-in delay-100">
                    <div class="pack-header">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 bg-primary text-light mx-auto pack-icon">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-light">Pack Boost</h4>
                        <p class="text-sm opacity-90 mt-2 text-content">« Accélérer la croissance » - Conçu pour renforcer la notoriété et l'engagement</p>
                        <div class="pack-price">À partir de 550 000 FCFA</div>
                    </div>
                    <div class="pack-features custom-scrollbar" id="pack2-features">
                        <ul class="space-y-2 text-sm text-gray-light">
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">12 publications/mois (visuels, photo, vidéos, stories, réels, légende + programmation)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">1 séance photo – vidéo professionnelles (10 vidéos, produits, équipe)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">2 vidéos professionnelles (teaser, interview ou présentation)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Plan marketing et stratégies</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Rebranding de la marque</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Gestion des pages réseaux sociaux (Création ou Optimisation)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Rapport d'analyse mensuel des performances</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Séance de travail chaque 2 semaines avec le client (20 mn)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pack-cta" id="pack2-cta">
                        <div class="text-xs text-primary space-y-1 mb-4">
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-info-circle mr-1"></i>
                                Prévoir un budget publicitaire à partir de 100.000 FCFA selon le nombre de Boost
                            </p>
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-edit mr-1"></i>
                                Le package peut être modifié en fonction des besoins du client
                            </p>
                        </div>
                        <a href="contact.html" class="cta-button w-full py-3 rounded-lg font-medium block text-center">
                            Choisir ce pack
                        </a>
                    </div>
                    <button class="see-more-btn" data-pack="2">
                        Voir plus
                    </button>
                </div>

                <!-- Pack 3 - Pack Premium -->
                <div class="pack-card fade-in delay-200">
                    <div class="pack-header">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 bg-primary text-light mx-auto pack-icon">
                            <i class="fas fa-crown text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-light">Pack Premium</h4>
                        <p class="text-sm opacity-90 mt-2 text-content">Booster vos revenues (Idéal pour les grandes entreprises et marques)</p>
                        <div class="pack-price">À partir de 750 000 FCFA</div>
                    </div>
                    <div class="pack-features custom-scrollbar" id="pack3-features">
                        <ul class="space-y-2 text-sm text-gray-light">
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Audit complet de la communication</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Création d'un site internet vitrine</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">15 publications/mois (photos, vidéos, motion design, stories)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">3 shootings photo (portraits, produits, lifestyle)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Plan marketing et stratégie (storytelling)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">1 séance photo – vidéo professionnelles (produits, équipes)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">3 vidéos pro (teaser présentation, interview, spot publicitaire)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Couverture photo/vidéo d'un événement de l'entreprise</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Gestion des pages réseaux sociaux (Création ou Optimisation)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Rapport d'analyse mensuel des performances</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Séance de travail chaque 2 semaines avec le client (20 mn)</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pack-cta" id="pack3-cta">
                        <div class="text-xs text-primary space-y-1 mb-4">
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-info-circle mr-1"></i>
                                Prévoir un budget publicitaire à partir de 100.000 FCFA selon le nombre de Boost
                            </p>
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-edit mr-1"></i>
                                Le package peut être modifié en fonction des besoins du client
                            </p>
                        </div>
                        <a href="contact.html" class="cta-button w-full py-3 rounded-lg font-medium block text-center">
                            Choisir ce pack
                        </a>
                    </div>
                    <button class="see-more-btn" data-pack="3">
                        Voir plus
                    </button>
                </div>

                <!-- Pack 4 - Branding Commercial -->
                <div class="pack-card fade-in delay-300">
                    <div class="pack-header">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 bg-primary text-light mx-auto pack-icon">
                            <i class="fas fa-box-open text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-light">Branding Commercial</h4>
                        <p class="text-sm opacity-90 mt-2 text-content">Création & impression de supports visuels</p>
                        <div class="pack-price">Sur devis</div>
                    </div>
                    <div class="pack-features" id="pack4-features">
                        <ul class="space-y-2 text-sm text-gray-light">
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Cartes de visite</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Flyers et dépliants</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Brochures et catalogues</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Calendriers, agendas, blocs-notes personnalisés</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Bâches publicitaires (PVC, microperforées, vinyle)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Kakémonos / roll-up / X-banner...</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pack-cta" id="pack4-cta">
                        <div class="text-xs text-primary mb-4">
                            <p class="flex items-center justify-center text-content">
                                <i class="fas fa-edit mr-1"></i>
                                Tarif personnalisé selon vos besoins
                            </p>
                        </div>
                        <a href="contact.html" class="cta-button w-full py-3 rounded-lg font-medium block text-center">
                            Demander un devis
                        </a>
                    </div>
                    <button class="see-more-btn" data-pack="4">
                        Voir plus
                    </button>
                </div>

                <!-- Pack 5 - Pack Événementiel -->
                <div class="pack-card fade-in delay-400">
                    <div class="pack-header">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 bg-primary text-light mx-auto pack-icon">
                            <i class="fas fa-calendar-alt text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-light">Pack Événementiel</h4>
                        <p class="text-sm opacity-90 mt-2 text-content">Organisation complète de tous vos événements</p>
                        <div class="pack-price">Fonction du budget</div>
                    </div>
                    <div class="pack-features" id="pack5-features">
                        <ul class="space-y-2 text-sm text-gray-light">
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Conception globale de l'événement</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Gestion logistique complète</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Communication avant, pendant et après l'événement</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Animation et coordination</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Couverture photo et vidéo</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Rapport post-événement</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pack-cta" id="pack5-cta">
                        <a href="contact.html" class="cta-button w-full py-3 rounded-lg font-medium block text-center">
                            Choisir ce pack
                        </a>
                    </div>
                    <button class="see-more-btn" data-pack="5">
                        Voir plus
                    </button>
                </div>

                <!-- Pack 6 - Pack Web & Digital  -->
                <div class="pack-card fade-in delay-500">
                    <div class="pack-header">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-4 bg-primary text-light mx-auto pack-icon">
                            <i class="fas fa-laptop-code text-xl"></i>
                        </div>
                        <h4 class="text-lg font-semibold text-light">Pack Web & Digital</h4>
                        <p class="text-sm opacity-90 mt-2 text-content">Solution complète pour entreprises</p>
                        <div class="pack-price">À partir de 750 000 FCFA</div>
                    </div>
                    <div class="pack-features" id="pack6-features">
                        <ul class="space-y-2 text-sm text-gray-light">
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Création de site internet responsive</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Référencement naturel (SEO)</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Maintenance technique 2 mois</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Hébergement et nom de domaine inclus 1 an</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Formulation à l'utilisation du backoffice</span>
                            </li>
                            <li class="feature-item">
                                <i class="fas fa-check feature-icon"></i>
                                <span class="text-content">Certificat SSL sécurisé</span>
                            </li>
                        </ul>
                    </div>
                    <div class="pack-cta" id="pack6-cta">
                        <a href="contact.html" class="cta-button w-full py-3 rounded-lg font-medium block text-center">
                            Choisir ce pack
                        </a>
                    </div>
                    <button class="see-more-btn" data-pack="6">
                        Voir plus
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-4xl mx-auto text-center">
            <div class="fade-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-light">Vous ne trouvez pas <span class="text-primary">votre bonheur</span> ?</h2>
                <p class="text-lg text-gray-light mb-8 max-w-2xl mx-auto">
                    Chaque projet est unique. Contactez-nous pour une solution sur mesure adaptée à vos besoins spécifiques.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/#contact') }}" class="cta-button px-8 py-4 rounded-lg font-medium text-lg">
                        Demander un devis
                    </a>
                    <a href="{{ route('contacte') }}" class="border-2 border-primary text-primary px-8 py-4 rounded-lg font-medium hover:bg-primary hover:text-light transform transition-all duration-300 text-lg">
                        Nous contacter
                    </a>
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
        
        // Pack expansion functionality
        function initPackExpansion() {
            const seeMoreButtons = document.querySelectorAll('.see-more-btn');
            
            seeMoreButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const packId = this.getAttribute('data-pack');
                    const features = document.getElementById(`pack${packId}-features`);
                    const cta = document.getElementById(`pack${packId}-cta`);
                    
                    if (features && cta) {
                        // Toggle expanded state
                        features.classList.toggle('expanded');
                        cta.classList.toggle('expanded');
                        
                        // Change button text
                        if (features.classList.contains('expanded')) {
                            this.textContent = 'Voir moins';
                        } else {
                            this.textContent = 'Voir plus';
                        }
                    }
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

        // Initialize everything when DOM is loaded
        // document.addEventListener('DOMContentLoaded', () => {
        //     initAnimations();
        //     initPackExpansion();
        // });
         initAnimations();
            initSkillBars();
    </script>
@endsection