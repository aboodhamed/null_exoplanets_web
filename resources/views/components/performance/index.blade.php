<x-layout>
    <div class="relative max-w-6xl mx-auto py-16 px-6 bg-gray-900/90" style="background-image: url('https://www.nasa.gov/wp-content/uploads/2024/05/stsci-01hx4c6dq3tkd0f3z7x1j3k6d1.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <!-- Star Field Effect -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="w-1 h-1 bg-white rounded-full shadow-lg top-[10%] left-[15%] animate-pulse" style="animation-delay: 0.5s;"></div>
            <div class="w-1 h-1 bg-white rounded-full shadow-lg top-[25%] left-[60%] animate-pulse" style="animation-delay: 1.2s;"></div>
            <div class="w-1 h-1 bg-white rounded-full shadow-lg top-[40%] left-[30%] animate-pulse" style="animation-delay: 1.8s;"></div>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-12 text-center animate-slide-in flex items-center justify-center">
            <i class="fas fa-chart-bar text-teal-400 mr-4 text-3xl" aria-hidden="true"></i>📊 Model Performance
        </h1>

        <!-- Metrics Cards -->
        <div class="grid md:grid-cols-4 gap-6 mb-12">
            <div class="bg-gradient-to-br from-teal-500 to-teal-300 p-6 rounded-xl text-center text-white shadow-lg hover:shadow-teal-400/50 hover:scale-105 transition-all duration-300 animate-slide-in">
                <i class="fas fa-check-circle text-3xl mb-2" aria-hidden="true"></i>
                <h3 class="text-xl font-bold">Accuracy</h3>
                <p class="text-3xl font-bold">{{ number_format($metrics['accuracy'] ?? 94.5, 2) }}%</p>
            </div>
            <div class="bg-gradient-to-br from-teal-500 to-teal-300 p-6 rounded-xl text-center text-white shadow-lg hover:shadow-teal-400/50 hover:scale-105 transition-all duration-300 animate-slide-in" style="animation-delay: 0.2s;">
                <i class="fas fa-bullseye text-3xl mb-2" aria-hidden="true"></i>
                <h3 class="text-xl font-bold">Precision</h3>
                <p class="text-3xl font-bold">{{ number_format($metrics['precision'] ?? 92.8, 2) }}%</p>
            </div>
            <div class="bg-gradient-to-br from-teal-500 to-teal-300 p-6 rounded-xl text-center text-white shadow-lg hover:shadow-teal-400/50 hover:scale-105 transition-all duration-300 animate-slide-in" style="animation-delay: 0.4s;">
                <i class="fas fa-search text-3xl mb-2" aria-hidden="true"></i>
                <h3 class="text-xl font-bold">Recall</h3>
                <p class="text-3xl font-bold">{{ number_format($metrics['recall'] ?? 93.2, 2) }}%</p>
            </div>
            <div class="bg-gradient-to-br from-teal-500 to-teal-300 p-6 rounded-xl text-center text-white shadow-lg hover:shadow-teal-400/50 hover:scale-105 transition-all duration-300 animate-slide-in" style="animation-delay: 0.6s;">
                <i class="fas fa-balance-scale text-3xl mb-2" aria-hidden="true"></i>
                <h3 class="text-xl font-bold">F1-Score</h3>
                <p class="text-3xl font-bold">{{ number_format($metrics['f1_score'] ?? 93.0, 2) }}%</p>
            </div>
        </div>

        <!-- Confusion Matrix Chart and Training Details -->
        <div class="grid md:grid-cols-2 gap-12">
            <div class="bg-gray-800/90 p-8 rounded-xl shadow-xl backdrop-blur-md border border-teal-500/30 animate-slide-in">
                <h3 class="text-2xl font-bold text-white mb-6 text-center">Confusion Matrix</h3>
                <canvas id="confusionChart" width="400" height="300" aria-label="Confusion Matrix for Classification Model"></canvas>
            </div>
            <div class="bg-gray-800/90 p-8 rounded-xl shadow-xl backdrop-blur-md border border-teal-500/30 animate-slide-in">
                <h3 class="text-2xl font-bold text-white mb-6 text-center">Training Details</h3>
                <ul class="space-y-4 text-gray-200">
                    <li><i class="fas fa-database text-teal-400 mr-3" aria-hidden="true"></i>Training Data: 156,000 stars from Kepler and TESS</li>
                    <li><i class="fas fa-brain text-teal-400 mr-3" aria-hidden="true"></i>Algorithm: Deep Neural Network</li>
                    <li><i class="fas fa-clock text-teal-400 mr-3" aria-hidden="true"></i>Training Time: 2.5 hours</li>
                    <li><i class="fas fa-server text-teal-400 mr-3" aria-hidden="true"></i>Accuracy on New Data: 94.2%</li>
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        // Chart.js Bar Chart
        const ctx = document.getElementById('confusionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Confirmed', 'Candidate', 'False Negative'],
                datasets: [{
                    label: 'Number of Cases',
                    data: [
                        {{ $confusionMatrix['confirmed_confirmed'] ?? 5234 }},
                        {{ $confusionMatrix['candidate_candidate'] ?? 1287 }},
                        {{ $confusionMatrix['false_false'] ?? 3456 }}
                    ],
                    backgroundColor: [
                        'rgba(45, 212, 191, 0.8)',
                        'rgba(45, 212, 191, 0.6)',
                        'rgba(45, 212, 191, 0.4)'
                    ],
                    borderColor: 'rgba(45, 212, 191, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Confusion Matrix',
                        color: '#fff',
                        font: { size: 16 }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#fff' },
                        title: {
                            display: true,
                            text: 'Classification',
                            color: '#fff'
                        }
                    },
                    y: {
                        ticks: { color: '#fff' },
                        title: {
                            display: true,
                            text: 'Number of Cases',
                            color: '#fff'
                        }
                    }
                }
            }
        });

        // Intersection Observer for Animations
        const animateElements = document.querySelectorAll('.animate-slide-in');
        animateElements.forEach(el => {
            el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-800');
        });
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target); // Stop observing once animated
                }
            });
        }, { threshold: 0.1 });

        animateElements.forEach(el => observer.observe(el));
    </script>
    @endpush
</x-layout>