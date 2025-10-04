<x-layout>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A platform for discovering exoplanets using artificial intelligence">
        <title>ExoHunter - Discover Exoplanets</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-center py-32 px-4 overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1447433819943-74a20887a81e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
            <!-- Overlay for readability -->
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent animate-pulse"></div>
            <!-- Decorative Elements -->
            <div class="absolute top-20 left-20 w-16 h-16 rounded-full bg-gradient-to-br from-teal-500 to-teal-700 shadow-2xl opacity-70 animate-bounce"></div>
            <div class="absolute bottom-40 right-40 w-10 h-10 rounded-full bg-gradient-to-br from-teal-500 to-teal-700 shadow-2xl opacity-50 animate-bounce" style="animation-delay: 2s;"></div>
            <div class="relative z-10 max-w-5xl mx-auto">
                <div class="inline-block mb-6 px-6 py-3 bg-teal-500/20 rounded-full border border-teal-300/30 backdrop-blur-sm">
                    <span class="text-teal-300 font-medium"><i class="fas fa-star mr-2" aria-label="Star"></i>A leading platform for exoplanet discovery</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 animate-slide-in tracking-tight">
                    Discover <span class="bg-gradient-to-r from-teal-500 to-teal-300 bg-clip-text text-transparent drop-shadow-lg">Exoplanets</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-10 leading-relaxed max-w-3xl mx-auto animate-slide-in">
                    Embark on a journey through the cosmos using AI to analyze data from <strong class="text-teal-300">Kepler</strong> and <strong class="text-teal-300">TESS</strong> to discover new worlds!
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center animate-slide-in">
                    <a href="/classify" class="inline-flex items-center bg-gradient-to-r from-teal-500 to-teal-300 text-white px-10 py-5 rounded-full font-semibold text-xl shadow-lg hover:shadow-teal-300/50 hover:scale-110 transition-all duration-500" aria-label="Start Classification">
                        <i class="fas fa-rocket mr-3 text-lg" aria-hidden="true"></i>Start Classification Now
                    </a>
                    <a href="#features" class="inline-flex items-center border-2 border-teal-300 text-teal-300 px-8 py-4 rounded-full font-medium text-lg hover:bg-teal-300/10 transition-all duration-300" aria-label="Learn More">
                        <i class="fas fa-info-circle mr-2" aria-hidden="true"></i>Learn More
                    </a>
                </div>
                <div class="mt-16 flex flex-wrap justify-center gap-8 text-gray-200 animate-slide-in">
                    <div class="flex items-center">
                        <i class="fas fa-globe-americas text-teal-300 text-xl mr-2" aria-hidden="true"></i>
                        <span>Over 5,000 Exoplanets</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-chart-line text-teal-300 text-xl mr-2" aria-hidden="true"></i>
                        <span>Up to 92% Analysis Accuracy</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users text-teal-300 text-xl mr-2" aria-hidden="true"></i>
                        <span>Active Scientific Community</span>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0 pointer-events-none">
                <div class="star-field">
                    <div class="absolute w-1 h-1 bg-white rounded-full shadow-lg top-[10%] left-[20%] animate-pulse"></div>
                    <div class="absolute w-1 h-1 bg-white rounded-full shadow-lg top-[30%] left-[60%] animate-pulse" style="animation-delay: 1s;"></div>
                    <div class="absolute w-1 h-1 bg-white rounded-full shadow-lg top-[50%] leftWorkers
                    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                        <a href="#features" class="text-teal-300 text-2xl" aria-label="Scroll Down">
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-24 px-4 bg-gray-900">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="text-4xl font-bold text-white mb-4 animate-slide-in">
                        Why Choose <span class="bg-gradient-to-r from-teal-500 to-teal-300 bg-clip-text text-transparent">ExoHunter</span>?
                    </h2>
                    <p class="text-xl text-gray-200 max-w-2xl mx-auto animate-slide-in">
                        We provide cutting-edge tools to explore the universe and analyze astronomical data with ease and efficiency
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 p-10 rounded-2xl shadow-xl hover:shadow-teal-500/50 hover:scale-105 transition-all duration-500 animate-slide-in group border border-gray-700">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-teal-500/20 mb-6 group-hover:bg-teal-500/30 transition-colors duration-300">
                            <i class="fas fa-satellite text-teal-300 text-3xl transform group-hover:rotate-12 transition-transform duration-300" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Comprehensive Kepler Data</h3>
                        <p class="text-gray-200 leading-relaxed mb-6">Analyze thousands of discovered planets using transit technology with a database of over 150,000 stars.</p>
                        <div class="flex items-center text-teal-300 font-medium">
                            <span>Explore Data</span>
                            <i class="fas fa-arrow-right mr-2 transform group-hover:translate-x-1 transition-transform duration-300" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 p-10 rounded-2xl shadow-xl hover:shadow-teal-300/50 hover:scale-105 transition-all duration-500 animate-slide-in group border border-gray-700">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-teal-300/20 mb-6 group-hover:bg-teal-300/30 transition-colors duration-300">
                            <i class="fas fa-telescope text-teal-300 text-3xl transform group-hover:rotate-12 transition-transform duration-300" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Advanced TESS Mission</h3>
                        <p class="text-gray-200 leading-relaxed mb-6">Continuous discoveries of nearby stars since 2018 with 85% sky coverage.</p>
                        <div class="flex items-center text-teal-300 font-medium">
                            <span>Browse Discoveries</span>
                            <i class="fas fa-arrow-right mr-2 transform group-hover:translate-x-1 transition-transform duration-300" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 p-10 rounded-2xl shadow-xl hover:shadow-teal-500/50 hover:scale-105 transition-all duration-500 animate-slide-in group border border-gray-700">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-teal-500/20 mb-6 group-hover:bg-teal-500/30 transition-colors duration-300">
                            <i class="fas fa-brain text-teal-300 text-3xl transform group-hover:rotate-12 transition-transform duration-300" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Advanced Artificial Intelligence</h3>
                        <p class="text-gray-200 leading-relaxed mb-6">Automatic classification with up to 92% accuracy using advanced machine learning algorithms.</p>
                        <div class="flex items-center text-teal-300 font-medium">
                            <span>Try the Model</span>
                            <i class="fas fa-arrow-right mr-2 transform group-hover:translate-x-1 transition-transform duration-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center p-6 bg-gray-800/50 rounded-xl border border-gray-700 animate-slide-in">
                        <div class="text-4xl font-bold text-teal-300 mb-2">5,000+</div>
                        <div class="text-gray-200">Confirmed Exoplanets</div>
                    </div>
                    <div class="text-center p-6 bg-gray-800/50 rounded-xl border border-gray-700 animate-slide-in">
                        <div class="text-4xl font-bold text-teal-300 mb-2">92%</div>
                        <div class="text-gray-200">Classification Accuracy</div>
                    </div>
                    <div class="text-center p-6 bg-gray-800/50 rounded-xl border border-gray-700 animate-slide-in">
                        <div class="text-4xl font-bold text-teal-300 mb-2">150K+</div>
                        <div class="text-gray-200">Stars Under Observation</div>
                    </div>
                    <div class="text-center p-6 bg-gray-800/50 rounded-xl border border-gray-700 animate-slide-in">
                        <div class="text-4xl font-bold text-teal-300 mb-2">24/7</div>
                        <div class="text-gray-200">Continuous Analysis</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="py-24 px-4 bg-gray-800">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="text-4xl font-bold text-white mb-4 animate-slide-in">How It Works</h2>
                    <p class="text-xl text-gray-200 max-w-2xl mx-auto animate-slide-in">Three simple steps to start your exoplanet discovery journey</p>
                </div>
                <div class="flex flex-col md:flex-row gap-12 items-center">
                    <div class="flex-1 space-y-12">
                        <div class="flex items-start animate-slide-in">
                            <div class="flex-shrink-0 w-14 h-14 rounded-full bg-teal-500/30 flex items-center justify-center text-teal-300 text-xl font-bold mr-4">1</div>
                            <div>
                                <h3 class="text-2xl font-semibold text-white mb-2">Upload Data</h3>
                                <p class="text-gray-200">Upload light data from Kepler or TESS telescopes or use our ready-to-use datasets.</p>
                            </div>
                        </div>
                        <div class="flex items-start animate-slide-in">
                            <div class="flex-shrink-0 w-14 h-14 rounded-full bg-teal-300/30 flex items-center justify-center text-teal-300 text-xl font-bold mr-4">2</div>
                            <div>
                                <h3 class="text-2xl font-semibold text-white mb-2">AI Analysis</h3>
                                <p class="text-gray-200">Our system analyzes the data using advanced algorithms.</p>
                            </div>
                        </div>
                        <div class="flex items-start animate-slide-in">
                            <div class="flex-shrink-0 w-14 h-14 rounded-full bg-teal-500/30 flex items-center justify-center text-teal-300 text-xl font-bold mr-4">3</div>
                            <div>
                                <h3 class="text-2xl font-semibold text-white mb-2">Get Results</h3>
                                <p class="text-gray-200">Review a detailed report of the results with charts and explanations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 relative">
                        <div class="relative w-80 h-80 mx-auto">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-40 h-40 rounded-full bg-gradient-to-br from-teal-500 to-teal-300 shadow-2xl animate-pulse"></div>
                            </div>
                            <div class="absolute inset-0 animate-spin">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-teal-300 to-teal-500 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-16 animate-slide-in">
                    <a href="/classify" class="inline-flex items-center bg-gradient-to-r from-teal-500 to-teal-300 text-white px-10 py-4 rounded-full font-semibold text-lg shadow-lg hover:shadow-teal-300/50 hover:scale-105 transition-all duration-300" aria-label="Start Your Journey">
                        <i class="fas fa-play mr-3" aria-hidden="true"></i>Start Your Journey Now
                    </a>
                </div>
            </div>
        </section>

        @push('scripts')
        <script>
            // Intersection Observer for Animations
            const animateElements = document.querySelectorAll('.animate-slide-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-10');
                    }
                });
            }, { threshold: 0.1 });

            animateElements.forEach(el => {
                el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-1000');
                observer.observe(el);
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
        @endpush
    </body>
    </html>
</x-layout>