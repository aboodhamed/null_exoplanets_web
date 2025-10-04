<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ExoHunter') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,700|roboto:400,500&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Chart.js for visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/halls.css'])

    <style>
        /* Global Box Sizing */
        *, *:before, *:after {
            box-sizing: border-box;
        }

        /* Particle Background */
        #particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .particle {
            position: absolute;
            background: rgba(0, 128, 128, 0.5); /* #008080 */
            border-radius: 50%;
            opacity: 0.3;
            animation: float 15s infinite linear;
        }
        @keyframes float {
            0% { transform: translateY(100%); opacity: 0.3; }
            50% { opacity: 0.7; }
            100% { transform: translateY(-100%); opacity: 0.3; }
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .particle {
                width: 3px !important;
                height: 3px !important;
                animation-duration: 10s !important;
            }
            main {
                padding: 1rem !important;
            }
            footer .text-lg {
                font-size: 1rem;
            }
            footer .text-base {
                font-size: 0.875rem;
            }
            footer .space-y-3 > * + * {
                margin-top: 0.5rem;
            }
        }
        @media (min-width: 641px) and (max-width: 1024px) {
            .particle {
                width: 4px !important;
                height: 4px !important;
                animation-duration: 12s !important;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col bg-gradient-to-r from-[#008080]/10 to-[#00CED1]/10">
        <!-- Mobile Menu Backdrop -->
        <div id="mobile-menu-bg" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden opacity-0 transition-all duration-300"></div>

        <!-- Header (Navbar) -->
        <header class="bg-gray-900 shadow-lg sticky top-0 z-50 border-b-2 border-[#008080]">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-button" class="focus:outline-none text-white hover:text-[#008080] transition duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                     
                    <!-- User Section -->
                    <div class="flex items-center">
                        <div class="relative" id="user-menu-container">
                            <button id="user-menu-button" class="flex items-center space-x-2 group">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-[#008080] to-[#008080] flex items-center justify-center text-white font-medium text-sm">
                                    @auth {{ strtoupper(substr(auth()->user()->name, 0, 1)) }} @endauth
                                </div>
                                <span class="text-white font-medium text-sm group-hover:text-[#008080] transition duration-200">
                                    @auth {{ auth()->user()->name }} @endauth
                                </span>
                                <svg class="w-4 h-4 text-[#008080] transition-transform duration-200 transform group-[.dropdown-open]:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="user-menu" class="hidden absolute left-0 mt-2 w-56 bg-gray-900 rounded-lg shadow-xl py-2 z-50 border border-gray-700 transition-all duration-200 origin-top">
                                <a href="/account" class="flex items-center px-4 py-3 text-gray-200 hover:bg-gray-700 transition duration-200 group">
                                    <i class="fas fa-user-circle text-[#008080] group-hover:text-[#008080] transition duration-200"></i>
                                    <span class="ml-3">My Account</span>
                                </a>
                                <div class="border-t border-gray-700 my-1"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full px-4 py-3 text-gray-200 hover:bg-gray-700 transition duration-200 group">
                                        <i class="fas fa-sign-out-alt text-red-400 group-hover:text-red-300 transition duration-200"></i>
                                        <span class="ml-3">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Main Navigation (Centered) -->
                    <div class="hidden md:flex flex-1 justify-center items-center space-x-8 mx-8">
                        <x-nav-link href="/" :active="request()->is('/')">
                            <i class="fas fa-home mr-3 text-[#008080] w-5 text-center"></i>Home
                        </x-nav-link>
                        <x-nav-link href="/classify" :active="request()->is('classify')">
                            <i class="fas fa-rocket mr-3 text-[#008080] w-5 text-center"></i>Planet Classification
                        </x-nav-link>
                        <x-nav-link href="/performance" :active="request()->is('performance')">
                            <i class="fas fa-chart-bar mr-3 text-[#008080] w-5 text-center"></i>Model Performance
                        </x-nav-link>
                        <x-nav-link id="security-button" :active="request()->is('security*')">
                            <i class="fas fa-shield-alt mr-3 text-[#008080] w-5 text-center"></i>Security
                            <x-slot name="dropdown">
                                <div id="security-dropdown" class="hidden absolute left-0 mt-2 w-56 bg-gray-900 rounded-lg shadow-xl py-2 z-50 border border-gray-700 transition-all duration-200 origin-top">
                                    <a href="/system-module" class="block px-4 py-3 text-sm text-gray-200 hover:bg-gray-700 hover:text-[#008080] transition duration-200 group rounded-t-lg">
                                        <i class="fas fa-cogs mr-2 text-[#008080] group-hover:text-[#008080]"></i>System Module
                                    </a>
                                    <a href="/role-rights" class="block px-4 py-3 text-sm text-gray-200 hover:bg-gray-700 hover:text-[#008080] transition duration-200 group">
                                        <i class="fas fa-user-shield mr-2 text-[#008080] group-hover:text-[#008080]"></i>Roles and Permissions
                                    </a>
                                    <a href="/users" class="block px-4 py-3 text-sm text-gray-200 hover:bg-gray-700 hover:text-[#008080] transition duration-200 group rounded-b-lg">
                                        <i class="fas fa-users mr-2 text-[#008080] group-hover:text-[#008080]"></i>Users
                                    </a>
                                </div>
                            </x-slot>
                        </x-nav-link>
                    </div>

                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="/">
                            <img src="{{ asset('images/Logo.png') }}" alt="ExoHunter Logo" class="w-16 h-16 mb-1">
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="fixed top-0 left-0 w-72 h-full bg-gray-900 text-gray-200 shadow-2xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">
                    <div class="sticky top-0 bg-gray-800 flex justify-between items-center p-5 border-b border-gray-700 z-10">
                        <span class="text-xl font-poppins font-semibold text-[#008080]">Main Menu</span>
                        <button id="mobile-menu-close" class="p-1 rounded-full hover:bg-gray-700 transition duration-200">
                            <svg class="w-6 h-6 text-gray-400 hover:text-[#008080]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-5 space-y-3">
                        <a href="/" class="flex items-center py-3 px-4 text-lg font-medium rounded-lg transition duration-200 hover:bg-gray-700 text-gray-300">
                            <i class="fas fa-home mr-3 text-[#008080] w-5 text-center"></i>Home
                        </a>
                        <a href="/classify" class="flex items-center py-3 px-4 text-lg font-medium rounded-lg transition duration-200 hover:bg-gray-700 text-gray-300">
                            <i class="fas fa-rocket mr-3 text-[#008080] w-5 text-center"></i>Planet Classification
                        </a>
                        <a href="/performance" class="flex items-center py-3 px-4 text-lg font-medium rounded-lg transition duration-200 hover:bg-gray-700 text-gray-300">
                            <i class="fas fa-chart-bar mr-3 text-[#008080] w-5 text-center"></i>Model Performance
                        </a>
                        <div class="relative">
                            <button id="mobile-security-button" class="flex items-center py-3 px-4 text-lg font-medium rounded-lg transition duration-200 hover:bg-gray-700 text-gray-300 w-full text-left">
                                <i class="fas fa-shield-alt mr-3 text-[#008080] w-5 text-center"></i>Security
                                <svg class="ml-auto h-4 w-4 text-[#008080] transition-transform duration-200 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="mobile-security-dropdown" class="hidden mt-1">
                                <a href="/system-module" class="block py-2 px-4 text-base font-medium rounded-lg transition duration-200 hover:bg-gray-700 hover:text-[#008080] text-gray-300">System Module</a>
                                <a href="/role-rights" class="block py-2 px-4 text-base font-medium rounded-lg transition duration-200 hover:bg-gray-700 hover:text-[#008080] text-gray-300">Roles and Permissions</a>
                                <a href="/users" class="block py-2 px-4 text-base font-medium rounded-lg transition duration-200 hover:bg-gray-700 hover:text-[#008080] text-gray-300">Users</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
  
        <!-- Page Content -->
        <main class="relative flex-grow px-0 sm:px-0 lg:px-0 py-0 bg-gray-900 overflow-x-hidden">
            <div class="max-w-full sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full mx-auto w-full box-border break-words whitespace-normal relative z-10 rounded-lg p-4 transition-all duration-500 hover:shadow-2xl">
                <div id="particles"></div>
                {{ $slot }}
            </div>
        </main>
               
        <!-- Footer -->
        <footer class="bg-gray-900 text-white pt-12 pb-6 border-t-2 border-[#008080]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-poppins font-semibold mb-4 text-[#008080] relative inline-block">
                            Quick Links
                            <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-[#008080] to-[#008080] rounded-full"></span>
                        </h3>
                        <div class="space-y-3">
                            <a href="/" class="block text-gray-300 hover:text-[#008080] transition duration-200 font-roboto">
                                <i class="fas fa-arrow-right mr-2 text-sm"></i>Home
                            </a>
                            <a href="/classify" class="block text-gray-300 hover:text-[#008080] transition duration-200 font-roboto">
                                <i class="fas fa-arrow-right mr-2 text-sm"></i>Planet Classification
                            </a>
                            <a href="/performance" class="block text-gray-300 hover:text-[#008080] transition duration-200 font-roboto">
                                <i class="fas fa-arrow-right mr-2 text-sm"></i>Model Performance
                            </a>
                            <a href="/system-module" class="block text-gray-300 hover:text-[#008080] transition duration-200 font-roboto">
                                <i class="fas fa-arrow-right mr-2 text-sm"></i>System Module
                            </a>
                            <a href="/role-rights" class="block text-gray-300 hover:text-[#008080] transition duration-200 font-roboto">
                                <i class="fas fa-arrow-right mr-2 text-sm"></i>Roles and Permissions
                            </a>
                            <a href="/users" class="block text-gray-300 hover:text-[#008080] transition duration-200 font-roboto">
                                <i class="fas fa-arrow-right mr-2 text-sm"></i>Users
                            </a>
                        </div>
                    </div>

                    <!-- Development Team -->
                    <div>
                        <h3 class="text-lg font-poppins font-semibold mb-4 text-[#008080] relative inline-block">
                            Development Team
                            <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-[#008080] to-[#008080] rounded-full"></span>
                        </h3>
                        <div class="space-y-3 text-gray-300 font-roboto text-base">
                            <div class="flex justify-center items-start">
                                <span class="text-[#008080] hover:text-[#008080] transition duration-200">Abdulrahman Hamed</span>
                                <span class="font-medium text-white min-w-[100px]"> :Project Manager & Back-end</span>
                            </div>
                            <!-- Add team members here if desired -->
                        </div>
                    </div>

                    <!-- About Section -->
                    <div>
                        <h3 class="text-lg font-poppins font-semibold mb-4 text-[#008080] relative inline-block">
                            About the Project
                            <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-[#008080] to-[#008080] rounded-full"></span>
                        </h3>
                        <p class="text-gray-300 font-roboto text-sm leading-relaxed mb-4">
                            ExoHunter is a project for NASA Space Apps Hackathon 2025, utilizing artificial intelligence to classify exoplanets from Kepler and TESS data. Discover new planets with ease!
                        </p>
                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#" class="text-gray-300 hover:text-[#008080] transition duration-200">
                                <i class="fab fa-instagram text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-300 hover:text-[#008080] transition duration-200">
                                <i class="fab fa-github text-lg"></i>
                            </a>
                            <a href="#" class="text-gray-300 hover:text-[#008080] transition duration-200">
                                <i class="fab fa-youtube text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 font-roboto text-sm">
                    <p>© 2025 ExoHunter - All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- JavaScript -->
    <script>
        // Particle Background
        function createParticles() {
            const particleContainer = document.getElementById('particles');
            if (!particleContainer) {
                console.error('Particle container not found!');
                return;
            }
            const particleCount = window.innerWidth < 640 ? 15 : 30; // Fewer particles on small screens
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                const size = Math.random() * 5 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.animationDelay = `${Math.random() * 10}s`;
                particle.style.animationDuration = `${Math.random() * 10 + 5}s`;
                particleContainer.appendChild(particle);
            }
        }

        // Ensure particles are created after the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
        });

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuBg = document.getElementById('mobile-menu-bg');

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            mobileMenu.classList.toggle('translate-x-0');
            mobileMenuBg.classList.toggle('hidden');
            mobileMenuBg.classList.toggle('opacity-0');
            mobileMenuBg.classList.toggle('opacity-100');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        mobileMenuClose.addEventListener('click', toggleMobileMenu);
        mobileMenuBg.addEventListener('click', toggleMobileMenu);

        // Dropdown Toggle Function
        function setupDropdown(buttonId, dropdownId) {
            const button = document.getElementById(buttonId);
            const dropdown = document.getElementById(dropdownId);
            if (button && dropdown) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    dropdown.classList.toggle('hidden');
                    button.setAttribute('aria-expanded', dropdown.classList.contains('hidden') ? 'false' : 'true');
                });
                window.addEventListener('click', function(event) {
                    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                        button.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        }

        // Initialize Dropdowns
        setupDropdown('user-menu-button', 'user-menu');
        setupDropdown('security-button', 'security-dropdown');
        setupDropdown('mobile-security-button', 'mobile-security-dropdown');

        // Highlight current page link
        document.addEventListener('DOMContentLoaded', () => {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('a[href]');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('text-[#008080]', 'bg-white/10');
                    link.querySelector('span')?.classList.add('text-[#008080]');
                    const underline = link.querySelector('span:last-child');
                    if (underline) underline.classList.add('w-1/2');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>