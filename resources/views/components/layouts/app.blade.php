<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<script>document.documentElement.classList.add('js')</script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Journey Begins | Best Car Rental in Nepal - 5 & 7 Seater Cars' }}</title>
    
    <!-- Meta Descriptions & Search Keywords -->
    <meta name="description" content="Affordable & comfortable car rental in Nepal. Rent 5 seater & 7 seater cars, SUVs, EVs & Hatchbacks in Kathmandu with best daily & long term rental rates.">
    <meta name="keywords" content="car, rental, car rental, comfortable car, 5 seater, 7 seater, 5 seater car rental, 7 seater car rental, car rental nepal, rent a car kathmandu, pokhara car rental, suv rental, ev rental, luxury car rental, affordable car rental nepal, self drive car rental nepal">
    <meta name="author" content="Journey Begins Car Rental">
    
    <!-- Canonical URL & Indexing Directives -->
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    
    <!-- OpenGraph Social Meta Tags -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Journey Begins | Best Car Rental in Nepal - 5 & 7 Seater Cars' }}">
    <meta property="og:description" content="Affordable & comfortable car rental in Nepal. Rent 5 seater & 7 seater cars, SUVs, EVs & Hatchbacks in Kathmandu with best daily & long term rental rates.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Journey Begins Car Rental">
    <meta property="og:image" content="{{ asset('images/logoo.png') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Journey Begins | Best Car Rental in Nepal - 5 & 7 Seater Cars' }}">
    <meta name="twitter:description" content="Affordable & comfortable car rental in Nepal. Rent 5 seater & 7 seater cars, SUVs, EVs & Hatchbacks in Kathmandu with best daily & long term rental rates.">
    <meta name="twitter:image" content="{{ asset('images/logoo.png') }}">
    
    <!-- Structured Data (JSON-LD) for Search Engine Rich Snippets -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "AutoRental",
      "name": "Journey Begins Car Rental",
      "image": "{{ asset('images/logoo.png') }}",
      "@@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "telephone": "+9779840002796",
      "priceRange": "NRs",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Bhaktapur & Kathmandu",
        "addressLocality": "Kathmandu",
        "addressCountry": "NP"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": 27.7172,
        "longitude": 85.3240
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
        ],
        "opens": "00:00",
        "closes": "23:59"
      }
    }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar { font-family: 'Inter', sans-serif; border: 1px solid #f1f5f9; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); border-radius: 1rem; }
        .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay {
            background: #f97316;
            border-color: #f97316;
        }
    </style>
    
    <!-- CSS / JS Vite assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-slate-800 min-h-screen flex flex-col selection:bg-orange-500 selection:text-white">
    
    @php
        $isHome = request()->routeIs('home');
        $isAdmin = request()->routeIs('admin.*') || request()->is('admin*');
    @endphp

    @if(!$isAdmin)
    <!-- Header / Navbar -->
    <header class="{{ $isHome ? 'fixed top-0 inset-x-0 z-50 transition-all duration-300' : 'sticky top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm transition-all duration-300' }}"
            :class="(window.location.pathname === '/' && !scrolled && !mobileMenuOpen) ? 'bg-transparent border-transparent' : 'bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm'"
            x-data="{ mobileMenuOpen: false, scrolled: false }"
            x-on:scroll.window="scrolled = (window.scrollY > 80)"
            x-init="scrolled = (window.scrollY > 80)">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 transition duration-300 hover:scale-[1.02]">
                        <img src="{{ asset('images/logoo.png') }}" class="h-14 w-auto object-contain" alt="Journey Begins">
                    </a>
                </div>
                
                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                       @class(['text-sm font-extrabold tracking-wide transition-colors duration-200 py-1', 'text-orange-500' => request()->routeIs('home'), 'text-slate-900 hover:text-orange-500' => ! request()->routeIs('home')])>
                        Home
                    </a>
                    <a href="{{ route('vehicles.index') }}"
                       @class(['text-sm font-extrabold tracking-wide transition-colors duration-200 py-1', 'text-orange-500' => request()->routeIs('vehicles.index'), 'text-slate-900 hover:text-orange-500' => ! request()->routeIs('vehicles.index')])>
                        Vehicles
                    </a>
                    <a href="{{ route('services') }}"
                       @class(['text-sm font-extrabold tracking-wide transition-colors duration-200 py-1', 'text-orange-500' => request()->routeIs('services'), 'text-slate-900 hover:text-orange-500' => ! request()->routeIs('services')])>
                        Services
                    </a>
                    <a href="{{ route('testimonials') }}"
                       @class(['text-sm font-extrabold tracking-wide transition-colors duration-200 py-1', 'text-orange-500' => request()->routeIs('testimonials'), 'text-slate-900 hover:text-orange-500' => ! request()->routeIs('testimonials')])>
                        Testimonials
                    </a>
                    <a href="{{ route('contact') }}"
                       @class(['text-sm font-extrabold tracking-wide transition-colors duration-200 py-1', 'text-orange-500' => request()->routeIs('contact'), 'text-slate-900 hover:text-orange-500' => ! request()->routeIs('contact')])>
                        Contact
                    </a>
                </nav>
                
                <!-- Right Header Actions (CTA) -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('vehicles.index') }}"
                       class="btn-shine px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-md shadow-orange-500/20 transform hover:-translate-y-0.5">
                        Book Now
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="focus:outline-none p-2 text-slate-900" aria-label="Toggle menu">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" x-show="!mobileMenuOpen" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" x-show="mobileMenuOpen" style="display: none;" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Dropdown Menu -->
        <div class="md:hidden border-b border-slate-200 bg-white text-slate-800" x-show="mobileMenuOpen" x-transition style="display: none;">
            <div class="px-4 pt-3 pb-5 space-y-2">
                <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-xl text-base font-bold {{ request()->routeIs('home') ? 'text-orange-500 bg-orange-50' : 'text-slate-700 hover:bg-slate-50' }}">Home</a>
                <a href="{{ route('vehicles.index') }}" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-xl text-base font-bold {{ request()->routeIs('vehicles.index') ? 'text-orange-500 bg-orange-50' : 'text-slate-700 hover:bg-slate-50' }}">Vehicles</a>
                <a href="{{ route('services') }}" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-xl text-base font-bold {{ request()->routeIs('services') ? 'text-orange-500 bg-orange-50' : 'text-slate-700 hover:bg-slate-50' }}">Services</a>
                <a href="{{ route('testimonials') }}" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-xl text-base font-bold {{ request()->routeIs('testimonials') ? 'text-orange-500 bg-orange-50' : 'text-slate-700 hover:bg-slate-50' }}">Testimonials</a>
                <a href="{{ route('contact') }}" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-xl text-base font-bold {{ request()->routeIs('contact') ? 'text-orange-500 bg-orange-50' : 'text-slate-700 hover:bg-slate-50' }}">Contact</a>
                
                <div class="border-t border-slate-100 my-3 pt-3"></div>
                
                <a href="{{ route('vehicles.index') }}" @click="mobileMenuOpen = false" class="block text-center px-4 py-3 bg-orange-500 text-white font-extrabold rounded-xl hover:bg-orange-600 shadow-md transition duration-200">
                    Book Now
                </a>
            </div>
        </div>
    </header>
    @endif

    <!-- Main Content Slot -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    @if(!$isAdmin)
    <!-- Footer -->
    <footer class="bg-[#edf3f8] border-t border-slate-200 text-slate-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Branding Col -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="inline-block transition duration-300 hover:scale-[1.03]">
                            <img src="{{ asset('images/logoo.png') }}" class="h-12 w-auto object-contain" alt="Journey Begins">
                        </a>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-600">
                        Comfortable, reliable and fully insured car rentals across Nepal, with transparent rates that get better the longer you drive.
                    </p>
                    <!-- Social icons -->
                    <div class="flex gap-3 pt-2">
                        <a href="{{ config('services.social_links.facebook') }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-orange-500 hover:border-orange-500 hover:-translate-y-0.5 transition duration-200">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                        <a href="{{ config('services.social_links.instagram') }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-orange-500 hover:border-orange-500 hover:-translate-y-0.5 transition duration-200">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="{{ config('services.social_links.tiktok') }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-orange-500 hover:border-orange-500 hover:-translate-y-0.5 transition duration-200">
                            <span class="sr-only">TikTok</span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.6 6.7a4.8 4.8 0 0 1-3.8-4.2V2h-3.4v13.7a2.9 2.9 0 1 1-2-2.7V9.5a6.3 6.3 0 1 0 5.4 6.2V8.8a8.2 8.2 0 0 0 4.8 1.5V6.9l-1-.2Z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-outfit font-semibold text-slate-900 text-base mb-4">Quick Links</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-orange-500 transition duration-200">Home</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-orange-500 transition duration-200">Our Fleet</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-orange-500 transition duration-200">Services</a></li>
                        <li><a href="{{ route('testimonials') }}" class="hover:text-orange-500 transition duration-200">Customer Testimonials</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="font-outfit font-semibold text-slate-900 text-base mb-4">Support</h3>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('contact') }}" class="hover:text-orange-500 transition duration-200">Help Center</a></li>
                        <li><a href="{{ route('contact') }}#faq" class="hover:text-orange-500 transition duration-200">FAQs &amp; Inquiry</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-orange-500 transition duration-200">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-orange-500 transition duration-200">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-3 text-sm">
                    <h3 class="font-outfit font-semibold text-slate-900 text-base mb-4">Contact Info</h3>
                    <div class="flex items-start space-x-2.5">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <a href="tel:+9779840002796" class="text-slate-700 font-medium hover:text-orange-500 transition">+977 9840002796</a>
                    </div>
                    <div class="flex items-start space-x-2.5">
                        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.5-5.739-1.451L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.57 1.986 14.105.965 11.486.965c-5.44 0-9.866 4.372-9.87 9.802 0 1.634.45 3.228 1.302 4.62l-.37 1.354-.74 2.704.03.03 2.77-.723.95-.248zm12.355-6.666c-.33-.164-1.94-.954-2.24-1.063-.3-.11-.52-.164-.74.164-.22.328-.85 1.063-1.04 1.281-.19.219-.38.246-.71.082-.33-.164-1.39-.512-2.648-1.633-.98-.873-1.64-1.952-1.83-2.28-.19-.328-.02-.505.14-.668.15-.148.33-.328.5-.492.17-.164.22-.273.33-.45.11-.18.05-.328-.02-.492-.08-.164-.74-1.782-1.01-2.434-.27-.65-.54-.56-.74-.57l-.63-.01c-.22 0-.58.082-.88.41-.3.328-1.15 1.12-1.15 2.732 0 1.612 1.17 3.17 1.33 3.388.16.219 2.3 3.511 5.57 4.92.78.336 1.39.537 1.86.685.78.247 1.49.212 2.05.128.62-.093 1.94-.793 2.22-1.557.27-.764.27-1.42.19-1.557-.08-.137-.3-.219-.63-.383z"/>
                        </svg>
                        <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener" class="text-slate-700 font-medium hover:text-emerald-500 transition">WhatsApp: +977 9840002796</a>
                    </div>
                    <div class="flex items-start space-x-2.5">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <a href="mailto:rosnaghemoshu18@gmail.com" class="text-slate-700 font-medium hover:text-orange-500 transition">rosnaghemoshu18@gmail.com</a>
                    </div>
                    <div class="flex items-start space-x-2.5">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <a href="{{ route('contact') }}" class="text-slate-700 font-medium hover:text-orange-500 transition">Bhaktapur &amp; Kathmandu, Nepal</a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-slate-200 mt-12 pt-8 pb-16 md:pb-0 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Journey Begins Car Rental. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="{{ route('terms') }}" class="hover:text-orange-500 transition">Terms of Service</a>
                    <a href="{{ route('privacy') }}" class="hover:text-orange-500 transition">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener"
       aria-label="Chat with us on WhatsApp"
       class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 bg-[#25D366] hover:bg-[#20bd5a] text-white p-3 sm:p-3.5 rounded-full shadow-xl shadow-emerald-500/30 z-[9990] flex items-center gap-2 group transition duration-300 hover:scale-105">
        <span class="absolute inset-0 rounded-full bg-[#25D366] animate-ping-soft -z-10" aria-hidden="true"></span>
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.5-5.739-1.451L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.57 1.986 14.105.965 11.486.965c-5.44 0-9.866 4.372-9.87 9.802 0 1.634.45 3.228 1.302 4.62l-.37 1.354-.74 2.704.03.03 2.77-.723.95-.248zm12.355-6.666c-.33-.164-1.94-.954-2.24-1.063-.3-.11-.52-.164-.74.164-.22.328-.85 1.063-1.04 1.281-.19.219-.38.246-.71.082-.33-.164-1.39-.512-2.648-1.633-.98-.873-1.64-1.952-1.83-2.28-.19-.328-.02-.505.14-.668.15-.148.33-.328.5-.492.17-.164.22-.273.33-.45.11-.18.05-.328-.02-.492-.08-.164-.74-1.782-1.01-2.434-.27-.65-.54-.56-.74-.57l-.63-.01c-.22 0-.58.082-.88.41-.3.328-1.15 1.12-1.15 2.732 0 1.612 1.17 3.17 1.33 3.388.16.219 2.3 3.511 5.57 4.92.78.336 1.39.537 1.86.685.78.247 1.49.212 2.05.128.62-.093 1.94-.793 2.22-1.557.27-.764.27-1.42.19-1.557-.08-.137-.3-.219-.63-.383z"/>
        </svg>
        <span class="font-bold text-xs pr-1 hidden sm:inline">WhatsApp Us</span>
    </a>
    @endif

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        // Livewire re-renders reset GSAP inline styles; keep already revealed elements visible.
        document.addEventListener('livewire:init', () => {
            Livewire.hook('morph.updating', ({ el, toEl }) => {
                if (el.hasAttribute?.('data-revealed')) toEl.setAttribute('data-revealed', '');
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            if (typeof gsap === 'undefined' || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                document.documentElement.classList.remove('js');
                return;
            }

            {
                gsap.registerPlugin(ScrollTrigger);

                const markRevealed = (el) => el.setAttribute('data-revealed', '');
                
                // Slide up reveal animation for single text/elements
                gsap.utils.toArray('.gsap-reveal').forEach(elem => {
                    gsap.fromTo(elem, 
                        { y: 40, opacity: 0 }, 
                        { 
                            y: 0, 
                            opacity: 1, 
                            duration: 0.8, 
                            ease: "power2.out", 
                            scrollTrigger: {
                                trigger: elem,
                                start: "top 90%",
                                once: true
                            },
                            onComplete: () => markRevealed(elem)
                        }
                    );
                });

                // Staggered reveal for grid items (showing one by one)
                gsap.utils.toArray('.gsap-stagger-container').forEach(container => {
                    const items = container.querySelectorAll('.gsap-stagger-item');
                    gsap.fromTo(items, 
                        { y: 60, opacity: 0 }, 
                        { 
                            y: 0, 
                            opacity: 1, 
                            duration: 0.7,
                            stagger: 0.15, 
                            ease: "back.out(1.2)", 
                            scrollTrigger: {
                                trigger: container,
                                start: "top 90%",
                                once: true
                            },
                            onComplete: () => items.forEach(markRevealed)
                        }
                    );
                });
            }
        });
    </script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</body>
</html>
