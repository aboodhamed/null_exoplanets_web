<x-layout>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Classify exoplanets using artificial intelligence">
        <title>ExoHunter - Exoplanet Classification</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
            body {
                font-family: 'Tajawal', sans-serif;
                background: linear-gradient(to bottom, #0f172a, #1e293b);
            }
            .animate-slide-in {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.8s ease, transform 0.8s ease;
            }
            .animate-slide-in.visible {
                opacity: 1;
                transform: translateY(0);
            }
            .star-field {
                position: absolute;
                inset: 0;
                pointer-events: none;
            }
            .star-field div {
                position: absolute;
                background: white;
                border-radius: 50%;
                box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-900" style="background-image: url('https://www.nasa.gov/wp-content/uploads/2023/04/PIA25776_orig.jpg'); background-size: cover; background-attachment: fixed; background-position: center;">
        <div class="relative max-w-4xl mx-auto py-16 px-6">
            <!-- Star Field Effect -->
            <div class="star-field">
                <div class="w-1 h-1 top-[10%] left-[15%] animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-1 h-1 top-[25%] left-[60%] animate-pulse" style="animation-delay: 1.2s;"></div>
                <div class="w-1 h-1 top-[40%] left-[30%] animate-pulse" style="animation-delay: 1.8s;"></div>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-12 text-center animate-slide-in flex items-center justify-center">
                <i class="fas fa-rocket text-teal-400 mr-4 text-3xl" aria-hidden="true"></i>Exoplanet Classification
            </h1>

            <!-- Form -->
            <form action="{{ route('classify.post') }}" method="POST" enctype="multipart/form-data" class="relative bg-gray-800/95 p-8 rounded-2xl shadow-xl mb-12 backdrop-blur-md animate-slide-in border border-teal-500/30">
                @csrf
                <div class="mb-8">
                    <label class="block text-white font-semibold mb-4 text-lg" for="csv_file">
                        <i class="fas fa-upload mr-2" aria-hidden="true"></i>Upload CSV File
                    </label>
                    <input type="file" id="csv_file" name="csv_file" accept=".csv" class="w-full p-4 bg-gray-700/90 text-white rounded-xl border-2 border-teal-500 hover:border-teal-400 transition duration-300 focus:ring-2 focus:ring-teal-400 focus:outline-none" aria-label="Upload CSV File">
                </div>
                <h4 class="text-xl text-gray-200 mb-6 font-medium"><i class="fas fa-pen mr-2" aria-hidden="true"></i>Or Enter Data Manually</h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-white font-semibold mb-3" for="orbital_period">Orbital Period (Days)</label>
                        <input type="number" id="orbital_period" step="any" name="orbital_period" required class="w-full p-4 bg-gray-700/90 text-white rounded-xl border border-teal-500 focus:ring-2 focus:ring-teal-400 focus:outline-none transition duration-300" aria-label="Orbital Period">
                    </div>
                    <div>
                        <label class="block text-white font-semibold mb-3" for="transit_duration">Transit Duration (Hours)</label>
                        <input type="number" id="transit_duration" step="any" name="transit_duration" required class="w-full p-4 bg-gray-700/90 text-white rounded-xl border border-teal-500 focus:ring-2 focus:ring-teal-400 focus:outline-none transition duration-300" aria-label="Transit Duration">
                    </div>
                    <div>
                        <label class="block text-white font-semibold mb-3" for="transit_depth">Transit Depth</label>
                        <input type="number" id="transit_depth" step="any" name="transit_depth" required class="w-full p-4 bg-gray-700/90 text-white rounded-xl border border-teal-500 focus:ring-2 focus:ring-teal-400 focus:outline-none transition duration-300" aria-label="Transit Depth">
                    </div>
                    <div>
                        <label class="block text-white font-semibold mb-3" for="snr">Signal-to-Noise Ratio (SNR)</label>
                        <input type="number" id="snr" step="any" name="snr" required class="w-full p-4 bg-gray-700/90 text-white rounded-xl border border-teal-500 focus:ring-2 focus:ring-teal-400 focus:outline-none transition duration-300" aria-label="Signal-to-Noise Ratio">
                    </div>
                </div>
                <button type="submit" class="w-full mt-8 bg-gradient-to-r from-teal-500 to-teal-300 text-white py-4 rounded-xl font-bold text-lg hover:shadow-teal-400/50 hover:scale-105 transition-all duration-300 flex items-center justify-center" aria-label="Classify Now">
                    <i class="fas fa-magic mr-2" aria-hidden="true"></i>🚀 Classify Now
                </button>
            </form>

            <!-- Results -->
            @if (isset($predictions) && count($predictions) > 0)
                <div class="relative bg-gray-800/95 p-8 rounded-2xl shadow-xl animate-slide-in backdrop-blur-md border border-teal-500/30">
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 text-center flex items-center justify-center">
                        <i class="fas fa-chart-bar mr-2 text-teal-400" aria-hidden="true"></i>Classification Results
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left bg-gray-800/90 rounded-xl shadow-md border border-teal-500/20">
                            <thead class="bg-gradient-to-r from-teal-500 to-teal-300 text-white">
                                <tr>
                                    <th class="p-4 font-semibold">Input Data</th>
                                    <th class="p-4 font-semibold">Classification</th>
                                    <th class="p-4 font-semibold">Probability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($predictions as $pred)
                                    <tr class="border-b border-gray-700/50 hover:bg-gray-700/70 transition duration-300">
                                        <td class="p-4 text-gray-200">{{ $pred['input'] }}</td>
                                        <td class="p-4">
                                            <span class="px-4 py-2 rounded-full text-sm font-bold
                                                @if($pred['result'] == 'Confirmed') bg-green-600 text-white
                                                @elseif($pred['result'] == 'Candidate') bg-yellow-600 text-white
                                                @else bg-red-600 text-white @endif">
                                                {{ $pred['result'] }}
                                            </span>
                                        </td>
                                        <td class="p-4 font-semibold text-teal-300">{{ number_format($pred['probability'] * 100, 2) }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        @push('scripts')
        <script>
            // Intersection Observer for Animations
            const animateElements = document.querySelectorAll('.animate-slide-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            animateElements.forEach(el => observer.observe(el));
        </script>
        @endpush
    </body>
    </html>
</x-layout>