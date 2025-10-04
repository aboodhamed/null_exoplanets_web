<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - ExoHunter</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        [x-cloak] { display: none; }
        /* Glassmorphism Effect */
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        /* Particle Background */
        #particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            background: rgba(0, 128, 128, 0.5); /* #008080 */
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        @keyframes float {
            0% { transform: translateY(100vh) scale(0.5); opacity: 0.3; }
            50% { opacity: 0.7; }
            100% { transform: translateY(-100vh) scale(1); opacity: 0.3; }
        }
        /* Fade-In Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        /* Responsive Adjustments */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        @media (max-width: 768px) {
            .container {
                padding: 0 0.5rem;
            }
        }
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(0, 128, 128, 0.2), rgba(255, 255, 255, 0.1));
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-900 font-['Cairo'] flex items-center justify-center">
    <!-- Particle Background -->
    <div id="particles"></div>

    <!-- نموذج تسجيل الدخول -->
    <div class="w-full max-w-md gradient-overlay p-8 rounded-3xl shadow-2xl animate-fade-in">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-white">مرحبًا بك في</h1>
            <p class="text-2xl font-semibold text-[#008080] mt-2">ExoHunter</p>
        </div>

        <!-- رسائل النجاح أو الخطأ -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 flex items-center space-x-2">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 flex items-center space-x-2">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- البريد الإلكتروني -->
            <div>
                <label for="email" class="block text-sm font-medium text-white">البريد الإلكتروني</label>
                <input id="email" name="email" type="email" required
                       class="mt-1 block w-full px-4 py-3 bg-white/10 border border-gray-300 rounded-lg shadow-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] transition-all duration-200 @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}"
                       placeholder="أدخل بريدك الإلكتروني">
                @error('email')
                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>{{ $message }}</span>
                    </p>
                @endError
            </div>

            <!-- كلمة المرور -->
            <div>
                <label for="password" class="block text-sm font-medium text-white">كلمة المرور</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full px-4 py-3 bg-white/10 border border-gray-300 rounded-lg shadow-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#008080] focus:border-[#008080] transition-all duration-200 @error('password') border-red-500 @enderror"
                       placeholder="أدخل كلمة المرور">
                @error('password')
                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>{{ $message }}</span>
                    </p>
                @endError
            </div>

            <!-- زر الإرسال -->
            <div>
                <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#008080] hover:bg-[#006666] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#008080] transform hover:scale-105 transition-all duration-200">
                    تسجيل الدخول
                </button>
            </div>

            <!-- رابط التسجيل -->
            <div class="text-center mt-4">
                <a href="{{ route('register') }}" class="text-sm text-[#008080] hover:text-[#006666] transition-all duration-200">
                    ليس لديك حساب؟ <span class="font-semibold">سجل الآن</span>
                </a>
            </div>
        </form>
    </div>

    <!-- JavaScript للجسيمات -->
    <script>
        // Particle Background
        function createParticles() {
            const particleContainer = document.getElementById('particles');
            const particleCount = 30;
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.width = `${Math.random() * 5 + 5}px`;
                particle.style.height = particle.style.width;
                particle.style.left = `${Math.random() * 100}vw`;
                particle.style.animationDelay = `${Math.random() * 10}s`;
                particleContainer.appendChild(particle);
            }
        }
        window.addEventListener('load', createParticles);
    </script>
</body>
</html>