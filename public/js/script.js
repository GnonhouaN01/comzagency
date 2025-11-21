
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
        
        // Carousel functionality
        class Carousel {
            constructor() {
                this.currentSlide = 0;
                this.slides = document.querySelectorAll('.carousel-slide');
                this.indicators = document.querySelectorAll('.carousel-indicator');
                this.prevBtn = document.querySelector('.carousel-prev');
                this.nextBtn = document.querySelector('.carousel-next');
                this.autoPlayInterval = null;
                
                this.init();
            }
            
            init() {
                // Event listeners
                this.prevBtn.addEventListener('click', () => this.prev());
                this.nextBtn.addEventListener('click', () => this.next());
                
                // Indicator clicks
                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goToSlide(index));
                });
                
                // Auto-play
                this.startAutoPlay();
                
                // Pause on hover
                const carousel = document.querySelector('.carousel');
                carousel.addEventListener('mouseenter', () => this.stopAutoPlay());
                carousel.addEventListener('mouseleave', () => this.startAutoPlay());
            }
            
            goToSlide(index) {
                this.currentSlide = index;
                this.updateCarousel();
            }
            
            next() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                this.updateCarousel();
            }
            
            prev() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.updateCarousel();
            }
            
            updateCarousel() {
                // Update slides
                document.querySelector('.carousel-inner').style.transform = `translateX(-${this.currentSlide * 100}%)`;
                
                // Update indicators
                this.indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === this.currentSlide);
                });
            }
            
            startAutoPlay() {
                this.autoPlayInterval = setInterval(() => this.next(), 5000);
            }
            
            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            }
        }

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
        
        // Portfolio filtering
        function initPortfolioFilter() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    btn.classList.add('active');
                    
                    const filter = btn.getAttribute('data-filter');
                    
                    portfolioItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
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
                mobileMenu.classList.toggle('open');
                
                // Change icon based on menu state
                const icon = mobileMenuButton.querySelector('i');
                if (mobileMenu.classList.contains('open')) {
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
                alert('Merci pour votre demande ! Nous vous contacterons bientôt.');
                form.reset();
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

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new Carousel();
            initAnimations();
            initPortfolioFilter();
            initPackExpansion();
        });
