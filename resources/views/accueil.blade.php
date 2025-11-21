@extends('partials.app')
@section('title', 'La page d\'accueil')
@section('content')

    @if (session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mt-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Hero Carousel Section -->
    <section class="carousel text-light" id="home">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-slide" style="background:url('./images/img/equipee.webp') center/cover;">
                <div class="carousel-content">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 fade-in scroll-animate" style="line-height: 5rem;">
                        Équipe <span class="text-primary">Créative & Dynamique</span>
                    </h1>
                    <p class="text-xl md:text-2xl opacity-90 mb-8 max-w-2xl mx-auto fade-in delay-100 scroll-animate">
                        Avec notre expertise en communication 360° en Côte d'Ivoire
                    </p>
                    <div class="flex space-x-4 justify-center fade-in delay-200 scroll-animate">
                        <a href="#contact" class="cta-button px-8 py-4 rounded-lg font-medium text-lg">
                            Commencer un projet
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-slide" style="background: url('./images/img/37132.webp') center/cover;">
                <div class="carousel-content">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 fade-in scroll-animate" style="line-height: 5rem;">
                        Identités <span class="text-primary">fortes & Création de Marque</span>
                    </h1>
                    <p class="text-xl md:text-2xl opacity-90 mb-8 max-w-2xl mx-auto fade-in delay-100 scroll-animate">
                        Nous créons des marques qui marquent les esprits
                    </p>
                    <div class="flex space-x-4 justify-center fade-in delay-200 scroll-animate">
                        <a href="#services"
                            class="border-2 border-primary text-primary px-8 py-4 rounded-lg font-medium hover:bg-primary hover:text-light transform transition-all duration-300 text-lg">
                            Découvrir nos services
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-slide"
                style="background: url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80') center/cover;">
                <div class="carousel-content">
                    <h1 class="text-xl md:text-6xl  font-bold leading-tight mb-6 fade-in scroll-animate" style="line-height: 5rem;">
                        Contenus <span class="text-primary">impactants & Stratégie Digitale</span>
                    </h1>
                    <p class="text-xl md:text-2xl opacity-90 mb-8 max-w-2xl mx-auto fade-in delay-100 scroll-animate">
                        Qui font grandir les marques et personnalités
                    </p>
                    <div class="flex space-x-4 justify-center fade-in delay-200 scroll-animate">
                        <a href="#offers" class="cta-button px-8 py-4 rounded-lg font-medium text-lg">
                            Découvrir nos offres
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button class="carousel-nav carousel-prev">
            <i data-feather="chevron-left"></i>
        </button>
        <button class="carousel-nav carousel-next">
            <i data-feather="chevron-right"></i>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            <div class="carousel-indicator active" data-slide="0"></div>
            <div class="carousel-indicator" data-slide="1"></div>
            <div class="carousel-indicator" data-slide="2"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in scroll-animate">
                <span
                    class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark rounded-full scroll-animate zoom">Nos
                    Domaines d'Expertise</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title scroll-animate">Nos <span
                        class="text-primary">services</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 scroll-animate text-content">
                    Une agence de communication globale couvrant un large spectre de services, du conseil et stratégies au
                    développement web et applications mobiles
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="service-card p-6 text-center fade-in scroll-animate">
                    <div class="service-icon mx-auto mb-6 scroll-animate zoom">
                        <i class="fas fa-bullhorn text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Marketing Digital</h3>
                    <p class="text-gray-light text-content">
                        Social Media Marketing, SEO, Publicité digitale, E-mailing, Marketing d'influence
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="service-card p-6 text-center fade-in delay-100 scroll-animate">
                    <div class="service-icon mx-auto mb-6 scroll-animate zoom">
                        <i class="fas fa-laptop-code text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Développement Web</h3>
                    <p class="text-gray-light text-content">
                        Conception de site web, site e-commerce, application web, etc.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="service-card p-6 text-center fade-in delay-200 scroll-animate">
                    <div class="service-icon mx-auto mb-6 scroll-animate zoom">
                        <i class="fas fa-palette text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Design & Vidéos</h3>
                    <p class="text-gray-light text-content">
                        Identité visuelle, charte graphique, logo, Audiovisuelle, etc.
                    </p>
                </div>

                <!-- Service 4 -->
                <div class="service-card p-6 text-center fade-in delay-300 scroll-animate">
                    <div class="service-icon mx-auto mb-6 scroll-animate zoom">
                        <i class="fas fa-calendar-alt text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-light">Événementiel</h3>
                    <p class="text-gray-light text-content">
                        Conception et promotion d'événements innovants, créatifs et à votre image
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section - Notre Processus Gagnant -->
    <section id="process" class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in scroll-animate">
                <span
                    class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark-light rounded-full scroll-animate zoom">Notre
                    Méthodologie</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title scroll-animate">Notre <span
                        class="text-primary">processus</span> gagnant</h2>
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 scroll-animate text-content">
                    Une danse harmonieuse entre notre vision et notre expertise en 5 étapes
                </p>
            </div>

            <div class="process-container">
                <!-- Step 1 -->
                <div class="process-step fade-in scroll-animate">
                    <div class="process-number scroll-animate zoom" tabindex="0" role="button" aria-label="Étape 1">1</div>
                    <h3 class="text-xl font-bold text-light mb-3">Écouter</h3>
                    <p class="text-gray-light text-sm text-content">
                        Nous plongeons dans l'univers de votre marque à travers des échanges authentiques.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="process-step fade-in delay-100 scroll-animate">
                    <div class="process-number scroll-animate zoom" tabindex="0" role="button" aria-label="Étape 2">2</div>
                    <h3 class="text-xl font-bold text-light mb-3">Planifier</h3>
                    <p class="text-gray-light text-sm text-content">
                        Nous concevons une stratégie de communication sur mesure adaptée à vos objectifs.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="process-step fade-in delay-200 scroll-animate">
                    <div class="process-number scroll-animate zoom" tabindex="0" role="button" aria-label="Étape 3">3</div>
                    <h3 class="text-xl font-bold text-light mb-3">Concevoir</h3>
                    <p class="text-gray-light text-sm text-content">
                        Notre équipe créative façonne des messages percutants et des solutions digitales.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="process-step fade-in delay-300 scroll-animate">
                    <div class="process-number scroll-animate zoom" tabindex="0" role="button" aria-label="Étape 4">4</div>
                    <h3 class="text-xl font-bold text-light mb-3">Déployer</h3>
                    <p class="text-gray-light text-sm text-content">
                        Nous faisons vibrer votre message à travers des campagnes omnicanales.
                    </p>
                </div>

                <!-- Step 5 -->
                <div class="process-step fade-in delay-400 scroll-animate">
                    <div class="process-number scroll-animate zoom" tabindex="0" role="button" aria-label="Étape 5">5</div>
                    <h3 class="text-xl font-bold text-light mb-3">Améliorer</h3>
                    <p class="text-gray-light text-sm text-content">
                        Nous mesurons l'impact et optimisons continuellement nos stratégies.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section avec Filtres et Cards -->
    <section id="portfolio" class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in scroll-animate">
                <span
                    class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark rounded-full scroll-animate zoom">Nos
                    Réalisations</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title scroll-animate">Quelques <span
                        class="text-primary">réalisations</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 scroll-animate text-content">
                    Découvrez nos projets dans différents domaines d'expertise
                </p>
            </div>

            <!-- Filtres -->
            <div class="portfolio-filters fade-in scroll-animate">
                <button class="filter-btn active scroll-animate zoom" data-filter="all">Tous les projets</button>
                <button class="filter-btn scroll-animate zoom" data-filter="web">Développement Web</button>
                <button class="filter-btn scroll-animate zoom" data-filter="branding">Branding</button>
                <button class="filter-btn scroll-animate zoom" data-filter="digital">Communication Digitale</button>
            </div>

            <!-- Grille de projets -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Projet 1 - Web -->
                <div class="portfolio-item bg-dark scroll-animate" data-category="web">
                    <img src="./images/img/flyfret.webp" alt="Site flyfret" class="portfolio-image">
                    <div class="portfolio-content">
                        <span class="portfolio-category">Web</span>
                        <h3 class="text-xl font-bold text-light mb-2">Site E-commerce Ecobank</h3>
                        <p class="text-gray-light text-content">Plateforme de vente en ligne sécurisée avec système de
                            paiement intégré</p>
                    </div>
                </div>

                <!-- Projet 2 - Branding -->
                <div class="portfolio-item bg-dark scroll-animate" data-category="branding">
                    <img src="./images/img/flyfret.webp" alt="Identité Visuelle Flyfet" class="portfolio-image">
                    <div class="portfolio-content">
                        <span class="portfolio-category">Branding</span>
                        <h3 class="text-xl font-bold text-light mb-2">Identité Visuelle Flyfret</h3>
                        <p class="text-gray-light text-content">Refonte complète de l'identité de marque avec charte
                            graphique</p>
                    </div>
                </div>

                <!-- Projet 3 - Digital -->
                <div class="portfolio-item bg-dark scroll-animate" data-category="digital">
                    <img src="./images/img/flyfret.webp" alt="Campagne Digitale Flyfret" class="portfolio-image">
                    <div class="portfolio-content">
                        <span class="portfolio-category">Digital</span>
                        <h3 class="text-xl font-bold text-light mb-2">Campagne Digitale Flyfret</h3>
                        <p class="text-gray-light text-content">Stratégie social media et publicité digitale
                            multi-plateformes</p>
                    </div>
                </div>

                <!-- Projet 4 - Web -->
                <div class="portfolio-item bg-dark scroll-animate" data-category="web">
                    <img src="./images/img/flyfret.webp" alt="Application Flyfret" class="portfolio-image"
                        style="object-fit: cover">
                    <div class="portfolio-content">
                        <span class="portfolio-category">Web</span>
                        <h3 class="text-xl font-bold text-light mb-2">Application Flyfret</h3>
                        <p class="text-gray-light text-content">Solution bancaire mobile innovante avec interface
                            utilisateur avancée</p>
                    </div>
                </div>

                <!-- Projet 5 - Branding -->
                <div class="portfolio-item bg-dark scroll-animate" data-category="branding">
                    <img src="./images/img/flyfret.webp" alt="" class="portfolio-image">
                    <div class="portfolio-content">
                        <span class="portfolio-category">Branding</span>
                        <h3 class="text-xl font-bold text-light mb-2">Charte Graphique Flyfret</h3>
                        <p class="text-gray-light text-content">Identité visuelle corporate moderne et professionnelle</p>
                    </div>
                </div>

                <!-- Projet 6 - Digital -->
                <div class="portfolio-item bg-dark scroll-animate" data-category="digital">
                    <img src="./images/img/flyfret.webp" alt="Stratégie Social Media Flyfret" class="portfolio-image">
                    <div class="portfolio-content">
                        <span class="portfolio-category">Digital</span>
                        <h3 class="text-xl font-bold text-light ">Stratégie Social Media Flyfret</h3>
                        <p class="text-gray-light text-content">Gestion complète des réseaux sociaux et contenu stratégique
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Section - ALIGNEMENT  -->
    <section id="clients" class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 fade-in scroll-animate">
                <span
                    class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark-light rounded-full scroll-animate zoom">Ils
                    Nous Font Confiance</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title scroll-animate">Nos <span
                        class="text-primary">clients</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 scroll-animate text-content">
                    Nous collaborons avec des entreprises et organisations de premier plan
                </p>
            </div>

            <div class="clients-grid">
                <!-- Client 1 -->
                <div
                    class="client-item bg-white p-4 rounded-xl flex items-center justify-center scale-hover fade-in scroll-animate">
                    <img src="{{ asset('images/logo.webp') }}" alt="flyfret international group" />
                </div>

                <!-- Client 2 -->
                <div
                    class="client-item bg-white p-4 rounded-xl flex items-center justify-center scale-hover fade-in delay-100 scroll-animate">
                    <img src="{{ asset('images/logo.webp') }}" alt="flyfret international group" />
                </div>

                <!-- Client 3 -->
                <div
                    class="client-item bg-white p-4 rounded-xl flex items-center justify-center scale-hover fade-in delay-200 scroll-animate">
                    <img src="{{ asset('images/logo.webp') }}" alt="flyfret international group" />
                </div>

                <!-- Client 4 -->
                <div
                    class="client-item bg-white p-4 rounded-xl flex items-center justify-center scale-hover fade-in delay-300 scroll-animate">
                    <img src="{{ asset('images/logo.webp') }}" alt="flyfret international group" />
                </div>

                <!-- Client 5 -->
                <div
                    class="client-item bg-white p-4 rounded-xl flex items-center justify-center scale-hover fade-in delay-400 scroll-animate">
                    <img src="{{ asset('images/logo.webp') }}" alt="flyfret international group" />
                </div>

                <!-- Client 6 -->
                <div
                    class="client-item bg-white p-4 rounded-xl flex items-center justify-center scale-hover fade-in delay-500 scroll-animate">
                    <img src="{{ asset('images/logo.webp') }}" alt="flyfret international group" />
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-dark-light" id="contact">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16 fade-in scroll-animate">
                <span
                    class="inline-block px-3 py-1 text-sm font-semibold mb-4 text-primary bg-dark rounded-full scroll-animate zoom">Contact</span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title scroll-animate">Demander un <span
                        class="text-primary">service</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-2xl mx-auto fade-in delay-100 scroll-animate text-content">
                    Partagez-nous votre projet et nous vous recontacterons rapidement
                </p>
            </div>

            <div class="p-8 rounded-xl shadow-lg bg-dark border border-gray fade-in scroll-animate scale-hover">
                <form class="space-y-6" action="{{ route('email.demande') }}" method="post">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="scroll-animate">
                            <label for="name" class="block text-sm font-medium text-light mb-1">Nom complet *</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-3 rounded-lg form-input" placeholder="Votre nom" required>
                        </div>
                        <div class="scroll-animate">
                            <label for="email" class="block text-sm font-medium text-light mb-1">Email *</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 rounded-lg form-input" placeholder="votre@email.com" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="scroll-animate">
                            <label for="phone" class="block text-sm font-medium text-light mb-1">Téléphone</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 rounded-lg form-input" placeholder="+225 XX XX XX XX">
                        </div>
                        <div class="scroll-animate">
                            <label for="company" class="block text-sm font-medium text-light mb-1">Entreprise /
                                Organisation</label>
                            <input type="text" id="company" name="company"
                                class="w-full px-4 py-3 rounded-lg form-input" placeholder="Votre entreprise">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="scroll-animate">
                            <label for="client-type" class="block text-sm font-medium text-light mb-1">Type de client
                                *</label>
                            <select id="client-type" name="client-type" class="w-full px-4 py-3 rounded-lg form-input"
                                required>
                                <option value="">Sélectionnez...</option>
                                <option value="pme">PME / Commerce</option>
                                <option value="personnalite">Personnalité publique</option>
                                <option value="institution">Institution / ONG</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="scroll-animate">
                            <label for="budget" class="block text-sm font-medium text-light mb-1">Budget estimé (F
                                CFA)</label>
                            <select id="budget" name="budget" class="w-full px-4 py-3 rounded-lg form-input">
                                <option value="">Sélectionnez...</option>
                                <option value="0-100k">0 - 100 000 F CFA</option>
                                <option value="100k-500k">100 000 - 500 000 F CFA</option>
                                <option value="500k-1m">500 000 - 1 000 000 F CFA</option>
                                <option value="1m+">Plus de 1 000 000 F CFA</option>
                            </select>
                        </div>
                    </div>

                    <div class="scroll-animate">
                        <label class="block text-sm font-medium text-light mb-3">Services souhaités *</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            <div class="flex items-center">
                                <input type="checkbox" id="service1" name="services" value="community" class="mr-2">
                                <label for="service1" class="text-sm text-light">Community Management</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="service2" name="services" value="branding" class="mr-2">
                                <label for="service2" class="text-sm text-light">Branding & Identité</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="service3" name="services" value="photo" class="mr-2">
                                <label for="service3" class="text-sm text-light">Production Photo</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="service4" name="services" value="video" class="mr-2">
                                <label for="service4" class="text-sm text-light">Production Vidéo</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="service5" name="services" value="web" class="mr-2">
                                <label for="service5" class="text-sm text-light">Site Web</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="service6" name="services" value="pack" class="mr-2">
                                <label for="service6" class="text-sm text-light">Pack complet</label>
                            </div>
                        </div>
                    </div>

                    <div class="scroll-animate">
                        <label for="deadline" class="block text-sm font-medium text-light mb-1">Délai souhaité</label>
                        <input type="text" id="deadline" name="deadline"
                            class="w-full px-4 py-3 rounded-lg form-input" placeholder="Ex: 2 semaines, 1 mois...">
                    </div>

                    <div class="scroll-animate">
                        <label for="message" class="block text-sm font-medium text-light mb-1">Description du projet
                            *</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg form-input"
                            placeholder="Décrivez votre projet, vos objectifs, vos attentes..." required></textarea>
                    </div>

                    <div class="scroll-animate">
                        <button type="submit"
                            class="w-full cta-button font-medium py-3 px-4 rounded-lg flex items-center justify-center">
                            <i data-feather="send" class="mr-2 w-4 h-4"></i>
                            Envoyer la demande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Section Localisation Élégante -->
    <section id="location" class="py-20 px-4 sm:px-6 lg:px-8 bg-dark">
        <div class="max-w-7xl mx-auto">
            <div class="location-header fade-in scroll-animate">
                <span class="location-badge scroll-animate slide-left">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    Nous Trouver
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-light section-title scroll-animate">Notre <span
                        class="text-primary">localisation</span></h2>
                <p class="text-lg text-gray-light mt-6 max-w-3xl mx-auto fade-in delay-100 scroll-animate text-content">
                    Venez nous rencontrer dans nos locaux modernes et conviviaux au cœur d'Abidjan
                </p>
            </div>

            <!-- Grande Carte -->
            <div class="large-map fade-in scroll-animate">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1986.143899044!2d-3.957496865248128!3d5.37300992843106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ecd03698f1d1%3A0x7380eeecc43658cd!2s266%20Rue%20I133%2C%20Abidjan!5e0!3m2!1sfr!2sci!4v1762966807496!5m2!1sfr!2sci"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="map-overlay"></div>
            </div>
        </div>
    </section>

    <script>
        // Animation management
        function initAnimations() {
            // Observer for fade-in animations
            const fadeObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        entry.target.classList.add('animated');
                    }
                });
            }, { threshold: 0.1 });
            
            // Observe all fade-in and scroll-animate elements
            document.querySelectorAll('.fade-in, .scroll-animate').forEach(el => {
                fadeObserver.observe(el);
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initAnimations();
        });
    </script>
@endsection