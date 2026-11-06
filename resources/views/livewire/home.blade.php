<div class="pb-20 bg-white">
<!-- 1. Hero Section -->
<section class="relative min-h-[90vh] flex items-center pt-28 pb-16 lg:pt-32 lg:pb-20 bg-slate-50 overflow-hidden"
    x-data="{
        activeSlide: 0,
        slides: [
            '{{ asset('images/bydatto3blue.png') }}',
            '{{ asset('images/byd atto3.png') }}',
            '{{ asset('images/bydatto3silver.png') }}',
            '{{ asset('images/hero/hero1.png') }}',
            '{{ asset('images/hero/hero2.png') }}',
        ],
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        },
        init() {
            setInterval(() => this.next(), 6000);
        }
    }">

    <!-- Background Image Slides -->
    <div class="absolute inset-0 w-full h-full z-0 overflow-hidden bg-slate-50">
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 transition-all duration-1000 ease-in-out"
                 x-show="activeSlide === index"
                 x-transition:enter="transition-all duration-1000 ease-out"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition-all duration-1000 ease-in"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-98"
                 style="display: none;">
                <img :src="slide" alt="Premium Car Rental Background" class="w-full h-full object-cover object-[70%_center] lg:object-[80%_center] select-none">
            </div>
        </template>
    </div>

    <!-- Premium Glassmorphic / Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-slate-50/92 via-slate-50/75 to-transparent z-10 pointer-events-none"></div>
    <div class="absolute inset-0 bg-white/30 lg:bg-transparent z-10 pointer-events-none"></div>


    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full z-20 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
        <!-- Hero Text -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left animate-fade-in-up">
            <div class="inline-flex items-center space-x-2 px-3 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-600 text-xs font-semibold uppercase tracking-wider bg-white/85 backdrop-blur-sm font-outfit">
                <span>✨ Premium Car Rental Services</span>
            </div>
           <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl lg:text-6xl leading-[1.1] tracking-tight text-slate-900">
    Drive your perfect journey
    <br class="hidden sm:inline">
    <span class="text-[#FF6800]">With Journey Begins</span>
</h1>
            <p class="text-base sm:text-lg text-slate-700 max-w-xl mx-auto lg:mx-0 font-medium leading-relaxed">
                Explore Nepal with ease, comfort, and reliability. Whether you're headed for a weekend getaway or a business trip, we've got the perfect ride for you.
        </p>
            <div class="flex flex-wrap justify-center lg:justify-start gap-4">
                <a href="{{ route('vehicles.index') }}" class="btn-shine px-8 py-3.5 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 hover:-translate-y-0.5 transition shadow-lg shadow-orange-500/20">
                    Explore Cars
                </a>
                <a href="{{ route('services') }}" class="px-8 py-3.5 bg-white/90 border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-100 transition backdrop-blur-sm">
                    Our Services
                </a>
            </div>
        </div>

        <!-- Spacer to push text to the left and expose background image on the right -->
        <div class="hidden lg:block lg:col-span-5 lg:h-[340px] pointer-events-none"></div>

        <!-- Search Card placed below hero text and spanning full width on large screens -->
        <div class="lg:col-span-12 animate-fade-in-up [animation-delay:150ms]">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white/95 backdrop-blur border border-slate-200 rounded-3xl p-5 sm:p-6 shadow-xl shadow-slate-200/60">
                    <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4 items-end" wire:submit="search">
                        <!-- Pickup Location -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Pickup Location</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                <input type="text" wire:model="pickup_location" placeholder="Enter location" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            </div>
                        </div>

                        <!-- Dropoff Location -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Drop-off Location</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                <input type="text" wire:model="dropoff_location" placeholder="Enter location" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            </div>
                        </div>

                        <!-- Pickup Date -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Pickup Date</label>
                            <div class="relative" x-data x-init="flatpickr($refs.pickup, {dateFormat: 'Y-m-d', minDate: 'today', onChange: (dates) => { const ret = document.querySelector('[x-ref=return]')?._flatpickr; if (ret && dates[0]) ret.set('minDate', new Date(dates[0]).fp_incr(1)); }})">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </span>
                                <input x-ref="pickup" type="text" wire:model.live="pickup_date" placeholder="Select date" class="flatpickr-input w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            </div>
                            @error('pickup_date') <span class="text-xs font-semibold text-red-500 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Return Date -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Return Date</label>
                            <div class="relative" x-data x-init="flatpickr($refs.return, {dateFormat: 'Y-m-d', minDate: 'today'})">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </span>
                                <input x-ref="return" type="text" wire:model.live="return_date" placeholder="Select date" class="flatpickr-input w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            </div>
                            @error('return_date') <span class="text-xs font-semibold text-red-500 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Car Type -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Car Type</label>
                            <select wire:model="car_type" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-sm text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                <option value="">All Types</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="EV">EV (Electric)</option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div class="space-y-1.5 sm:col-span-2 lg:col-span-1">
                            <label class="hidden lg:block text-xs font-semibold text-transparent select-none uppercase tracking-wider">&nbsp;</label>
                            <button type="submit" wire:loading.attr="disabled" class="btn-shine w-full bg-orange-500 hover:bg-orange-600 disabled:opacity-70 text-white font-semibold text-sm rounded-xl py-3 px-4 flex items-center justify-center gap-2 transition duration-200 shadow-lg shadow-orange-500/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                Search Cars
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <button @click="prev()" aria-label="Previous slide" class="hidden lg:flex absolute left-4 top-[38%] -translate-y-1/2 p-3 rounded-2xl bg-white/90 hover:bg-orange-500 hover:text-white text-slate-800 transition duration-300 shadow-lg hover:shadow-orange-500/10 z-20 border border-slate-100">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button @click="next()" aria-label="Next slide" class="hidden lg:flex absolute right-4 top-[38%] -translate-y-1/2 p-3 rounded-2xl bg-white/90 hover:bg-orange-500 hover:text-white text-slate-800 transition duration-300 shadow-lg hover:shadow-orange-500/10 z-20 border border-slate-100">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Slide Indicators -->
    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 z-20 flex space-x-2.5">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index" :aria-label="'Go to slide ' + (index + 1)"
                    class="h-2.5 rounded-full transition-all duration-300 focus:outline-none"
                    :class="activeSlide === index ? 'w-10 bg-orange-500 shadow-md shadow-orange-500/30' : 'w-2.5 bg-slate-400 hover:bg-slate-600'"></button>
        </template>
    </div>
    
</section>

    <!-- 3. Our Services Section -->
    <div class="bg-[#f4f6fa] border-y border-slate-100 py-20 overflow-hidden">
        <section id="services" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12 gsap-reveal">
                <div class="space-y-2 text-left">
                    <h2 class="font-outfit font-extrabold text-4xl text-slate-900">Our Services</h2>
                    <p class="text-slate-500 text-sm">We provide comprehensive car rental solutions for all your transportation needs.</p>
                </div>
                <a href="{{ route('services') }}" class="group/btn px-6 py-3 bg-white border border-slate-200 text-slate-800 font-extrabold text-xs uppercase tracking-wider rounded-xl hover:bg-[#FF6800] hover:text-white hover:border-orange-500 transition duration-200 shadow-sm flex items-center gap-1.5 w-fit">
                    <span>View All Services</span>
                    <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12 gsap-stagger-container">
                <!-- Service 1 -->
                <div class="relative bg-white border border-slate-100 rounded-3xl p-8 hover:border-orange-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(249,115,22,0.1)] hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 shadow-[0_10px_20px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] flex items-center justify-center transform group-hover:-translate-y-1 group-hover:scale-105 group-hover:shadow-[0_15px_25px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] transition-all duration-500 mb-6 z-10">
                        <svg class="w-7 h-7 text-white drop-shadow-md transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    
                    <h3 class="font-outfit font-bold text-xl text-slate-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 relative z-10">Self Drive Car Rental</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 group-hover:text-slate-600 transition-colors duration-300">Choose from our wide range of vehicles and drive yourself to your destination with complete freedom.</p>
                </div>
                
                <!-- Service 2 -->
                <div class="relative bg-white border border-slate-100 rounded-3xl p-8 hover:border-orange-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(249,115,22,0.1)] hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 shadow-[0_10px_20px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] flex items-center justify-center transform group-hover:-translate-y-1 group-hover:scale-105 group-hover:shadow-[0_15px_25px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] transition-all duration-500 mb-6 z-10">
                        <svg class="w-7 h-7 text-white drop-shadow-md transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    
                    <h3 class="font-outfit font-bold text-xl text-slate-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 relative z-10">Car With Driver</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 group-hover:text-slate-600 transition-colors duration-300">Relax and enjoy your journey with our experienced and professional drivers who know the local routes well.</p>
                </div>

                <!-- Service 3 -->
                <div class="relative bg-white border border-slate-100 rounded-3xl p-8 hover:border-orange-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(249,115,22,0.1)] hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 shadow-[0_10px_20px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] flex items-center justify-center transform group-hover:-translate-y-1 group-hover:scale-105 group-hover:shadow-[0_15px_25px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] transition-all duration-500 mb-6 z-10">
                        <svg class="w-7 h-7 text-white drop-shadow-md transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    
                    <h3 class="font-outfit font-bold text-xl text-slate-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 relative z-10">Event Transportation</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 group-hover:text-slate-600 transition-colors duration-300">Premium transportation solutions for weddings, corporate meetings, parties, and special occasions.</p>
                </div>

                <!-- Service 4 -->
                <div class="relative bg-white border border-slate-100 rounded-3xl p-8 hover:border-orange-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(249,115,22,0.1)] hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 shadow-[0_10px_20px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] flex items-center justify-center transform group-hover:-translate-y-1 group-hover:scale-105 group-hover:shadow-[0_15px_25px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] transition-all duration-500 mb-6 z-10">
                        <svg class="w-7 h-7 text-white drop-shadow-md transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    
                    <h3 class="font-outfit font-bold text-xl text-slate-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 relative z-10">Business Car With Driver</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 group-hover:text-slate-600 transition-colors duration-300">Dedicated executive transport with executive drivers to help you run meetings on the move.</p>
                </div>

                <!-- Service 5 -->
                <div class="relative bg-white border border-slate-100 rounded-3xl p-8 hover:border-orange-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(249,115,22,0.1)] hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 shadow-[0_10px_20px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] flex items-center justify-center transform group-hover:-translate-y-1 group-hover:scale-105 group-hover:shadow-[0_15px_25px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] transition-all duration-500 mb-6 z-10">
                        <svg class="w-7 h-7 text-white drop-shadow-md transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </div>
                    
                    <h3 class="font-outfit font-bold text-xl text-slate-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 relative z-10">Airport Transfer</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 group-hover:text-slate-600 transition-colors duration-300">Timely and comfortable airport pickup and drop-off services, operating 24 hours a day.</p>
                </div>

                <!-- Service 6 -->
                <div class="relative bg-white border border-slate-100 rounded-3xl p-8 hover:border-orange-500/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(249,115,22,0.1)] hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 shadow-[0_10px_20px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] flex items-center justify-center transform group-hover:-translate-y-1 group-hover:scale-105 group-hover:shadow-[0_15px_25px_-10px_rgba(249,115,22,0.8),inset_0_2px_0_rgba(255,255,255,0.4),inset_0_-2px_0_rgba(0,0,0,0.2)] transition-all duration-500 mb-6 z-10">
                        <svg class="w-7 h-7 text-white drop-shadow-md transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    
                    <h3 class="font-outfit font-bold text-xl text-slate-800 mb-3 group-hover:text-orange-600 transition-colors duration-300 relative z-10">Corporate Car Rental</h3>
                    <p class="text-slate-500 text-sm leading-relaxed relative z-10 group-hover:text-slate-600 transition-colors duration-300">Flexible long-term rental contract rates tailored for corporate logistics and team travel needs.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- 4. Featured Cars Scrollable Section -->
    <section id="vehicles" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 overflow-hidden relative">
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-8">
            <div class="space-y-2 text-left md:sticky md:top-24 z-30 gsap-reveal">
                <h2 class="font-outfit font-extrabold text-4xl text-slate-900">Featured Cars</h2>
                <p class="text-slate-500 text-sm">Explore our collection of premium vehicles available for rent.</p>
            </div>

            <div class="flex items-center gap-3 ml-auto">
                <a href="{{ route('vehicles.index') }}" class="inline-flex items-center justify-center px-6 py-4 bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-sm uppercase tracking-wider rounded-2xl shadow-lg shadow-orange-500/25 transition duration-200 min-w-[220px] h-[58px]">
                    <span>View All Cars</span>
                </a>

                <div class="flex items-center gap-2">
                    <button @click="scrollLeft()" class="w-12 h-12 rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm hover:bg-slate-100 transition duration-200 flex items-center justify-center" aria-label="Scroll left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button @click="scrollRight()" class="w-12 h-12 rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm hover:bg-slate-100 transition duration-200 flex items-center justify-center" aria-label="Scroll right">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Livewire Dynamic Filter State message -->
        @if($pickup_location || $dropoff_location)
            <div class="mt-8 bg-slate-50 border border-slate-150 rounded-2xl p-4 text-sm text-slate-600 max-w-xl mx-auto text-center flex items-center justify-center space-x-2">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Showing available vehicles for <strong>{{ $pickup_location ?: 'Any' }}</strong> to <strong>{{ $dropoff_location ?: 'Any' }}</strong></span>
            </div>
        @endif

        <!-- Scrollable Slider container using Alpine -->
        <div class="relative mt-12" x-data="{
            scrollLeft() { $refs.scrollContainer.scrollBy({ left: -360, behavior: 'smooth' }) },
            scrollRight() { $refs.scrollContainer.scrollBy({ left: 360, behavior: 'smooth' }) }
        }">
            <!-- Scrollable Row -->
            <div x-ref="scrollContainer" class="flex overflow-x-auto gap-8 pb-6 snap-x snap-mandatory scroll-smooth scrollbar-none">
                @forelse($cars as $car)
                    <div class="flex-shrink-0 w-[290px] sm:w-[340px] snap-start bg-white border border-slate-150 rounded-[2rem] overflow-hidden hover:scale-[1.01] hover:shadow-lg transition duration-350 flex flex-col group shadow-md">
                        <!-- Image container -->
                        <div class="h-52 bg-slate-50 relative overflow-hidden flex items-center justify-center border-b border-slate-100">
                            <img src="{{ $car->image_url }}" alt="{{ $car->name }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 group-hover:translate-x-3 group-hover:-translate-y-1 transition-transform duration-500">
                            
                            <!-- Badges overlay -->
                            <div class="absolute top-4 left-4 flex space-x-2">
                                <span class="px-2.5 py-1 bg-white/90 backdrop-blur border border-slate-100 text-[10px] font-bold text-orange-500 uppercase tracking-widest rounded-lg shadow-sm">
                                    {{ $car->category }}
                                </span>
                            </div>
                        </div>

                        <!-- Car details -->
                        <div class="p-6 space-y-6 flex-grow flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-outfit font-bold text-xl text-slate-800 leading-tight">{{ $car->name }}</h3>
                                    <span class="text-xs font-semibold text-slate-400">{{ $car->model_year }}</span>
                                </div>
                                
                                <!-- Specs details -->
                                <div class="grid grid-cols-3 gap-2 py-4 border-y border-slate-100 text-xs text-slate-500">
                                    <div class="flex items-center space-x-1.5 justify-center">
                                        <svg class="w-4 h-4 text-orange-500/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                        <span>{{ $car->seats }} Seats</span>
                                    </div>
                                    <div class="flex items-center space-x-1.5 justify-center border-x border-slate-100">
                                        <svg class="w-4 h-4 text-orange-500/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        <span>{{ $car->transmission }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1.5 justify-center">
                                        <svg class="w-4 h-4 text-orange-500/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        <span>{{ $car->mileage_or_range }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Price & CTA -->
                            <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                                <div class="space-y-0.5">
                                    <span class="text-[10px] text-slate-400 uppercase tracking-wider block">Price per day</span>
                                    <div class="flex items-baseline">
                                        <span class="text-lg font-extrabold text-slate-900 font-outfit">Rs. {{ number_format($car->pricingTier->daily_rate) }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('cars.show', $car->id) }}" class="px-4 py-2.5 bg-slate-100 hover:bg-orange-500 border border-slate-200 hover:border-orange-500 text-slate-700 hover:text-white font-semibold text-xs rounded-xl transition duration-200">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center py-12 bg-slate-50 border border-slate-150 rounded-[2.5rem]">
                        <svg class="w-12 h-12 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800 mt-4">No Cars Available</h3>
                        <p class="text-slate-400 text-sm mt-1">Try changing your search parameters or category filter.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 5. Why Choose Us Section -->
    <section class="bg-[#fdf4e9] border-y border-orange-100/50 py-24 mt-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto space-y-4 gsap-reveal">
                <h2 class="font-outfit font-extrabold text-4xl text-slate-900">Why Choose Us</h2>
                <p class="text-slate-600">Experience the best car rental service with unmatched benefits.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-16 gsap-stagger-container">
                <!-- Feature 1 -->
                <div class="flex items-start space-x-4 gsap-stagger-item">
                    <div class="p-3 bg-orange-500/10 rounded-xl text-orange-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800">Best Price Guarantee</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">We offer highly competitive rates with tiered rental discounts matching your duration.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="flex items-start space-x-4 gsap-stagger-item">
                    <div class="p-3 bg-orange-500/10 rounded-xl text-orange-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800">24/7 Customer Support</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Our support helpline and WhatsApp channels are active 24 hours a day to assist you.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="flex items-start space-x-4 gsap-stagger-item">
                    <div class="p-3 bg-orange-500/10 rounded-xl text-orange-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <div>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800">Wide Range of Vehicles</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Choose from our diverse fleet of hatchback runabouts, family SUVs, pickups, and modern EVs.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="flex items-start space-x-4 gsap-stagger-item">
                    <div class="p-3 bg-orange-500/10 rounded-xl text-orange-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800">Easy Online Booking</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Book a car in seconds with dynamic price updates, checkout, and instant notifications.</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="flex items-start space-x-4 gsap-stagger-item">
                    <div class="p-3 bg-orange-500/10 rounded-xl text-orange-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800">No Hidden Charges</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">Our pricing is transparent and includes fuel surcharge policies clearly defined beforehand.</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="flex items-start space-x-4 gsap-stagger-item">
                    <div class="p-3 bg-orange-500/10 rounded-xl text-orange-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-outfit font-semibold text-lg text-slate-800">Fully Insured Cars</h3>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">All our cars are comprehensively insured to guarantee peace of mind during your journeys.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Testimonials Section -->
    <section id="testimonials" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 overflow-hidden">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12 gsap-reveal">
            <div class="space-y-2 text-left">
                <h2 class="font-outfit font-extrabold text-4xl text-slate-900">What Our Customers Say</h2>
                <p class="text-slate-500 text-sm">Read real reviews from our satisfied travelers and corporate clients across Nepal.</p>
            </div>
            <a href="{{ route('testimonials') }}" class="group/btn px-6 py-3 bg-white border border-slate-200 text-slate-800 font-extrabold text-xs uppercase tracking-wider rounded-xl hover:bg-[#FF6800] hover:text-white hover:border-orange-500 transition duration-200 shadow-sm flex items-center gap-1.5 w-fit">
                <span>View All Testimonials</span>
                <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 gsap-stagger-container">
            <!-- Review 1 -->
            <div class="relative bg-white border border-slate-100 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                <div class="absolute -top-8 -right-4 text-9xl text-slate-50 font-serif leading-none select-none z-0 group-hover:text-orange-50 transition-colors duration-500">"</div>
                <div class="relative z-10">
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-slate-600 text-base leading-relaxed italic group-hover:text-slate-800 transition-colors duration-300">"Excellent service and clean cars. Booking was quick and easy. The customer support team was incredibly helpful throughout my journey!"</p>
                </div>
                <div class="flex items-center space-x-4 mt-8 relative z-10 pt-6 border-t border-slate-100 group-hover:border-orange-100 transition-colors duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 text-white flex items-center justify-center font-bold font-outfit text-sm shadow-md group-hover:scale-110 transition-transform duration-500">MJ</div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-800 font-outfit group-hover:text-orange-600 transition-colors duration-300">Michael Johnson</h4>
                        <span class="text-slate-400 text-xs">Corporate Client</span>
                    </div>
                </div>
            </div>
            
            <!-- Review 2 -->
            <div class="relative bg-white border border-slate-100 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                <div class="absolute -top-8 -right-4 text-9xl text-slate-50 font-serif leading-none select-none z-0 group-hover:text-orange-50 transition-colors duration-500">"</div>
                <div class="relative z-10">
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-slate-600 text-base leading-relaxed italic group-hover:text-slate-800 transition-colors duration-300">"I've rented cars from many companies, but this is by far the best experience. Clean cars, great vehicles, and professional service."</p>
                </div>
                <div class="flex items-center space-x-4 mt-8 relative z-10 pt-6 border-t border-slate-100 group-hover:border-orange-100 transition-colors duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 text-white flex items-center justify-center font-bold font-outfit text-sm shadow-md group-hover:scale-110 transition-transform duration-500">SW</div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-800 font-outfit group-hover:text-orange-600 transition-colors duration-300">Sarah Williams</h4>
                        <span class="text-slate-400 text-xs">Frequent Traveler</span>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="relative bg-white border border-slate-100 rounded-3xl p-8 flex flex-col justify-between shadow-sm hover:shadow-2xl hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500 group overflow-hidden gsap-stagger-item">
                <div class="absolute -top-8 -right-4 text-9xl text-slate-50 font-serif leading-none select-none z-0 group-hover:text-orange-50 transition-colors duration-500">"</div>
                <div class="relative z-10">
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-slate-600 text-base leading-relaxed italic group-hover:text-slate-800 transition-colors duration-300">"Hassle-free booking and pickup. The car was in perfect condition, fully dynamic app. I'll use them again for my next trip!"</p>
                </div>
                <div class="flex items-center space-x-4 mt-8 relative z-10 pt-6 border-t border-slate-100 group-hover:border-orange-100 transition-colors duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 text-white flex items-center justify-center font-bold font-outfit text-sm shadow-md group-hover:scale-110 transition-transform duration-500">DC</div>
                    <div>
                        <h4 class="font-bold text-sm text-slate-800 font-outfit group-hover:text-orange-600 transition-colors duration-300">David Chen</h4>
                        <span class="text-slate-400 text-xs">Local Resident</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Quick Booking Banner -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 lg:mt-24">
        <div class="bg-gradient-to-tr from-[#0a1b2d] to-[#0f294a] rounded-[2.5rem] p-8 sm:p-12 lg:p-16 relative overflow-hidden shadow-2xl gsap-reveal">
            <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-orange-500/20 blur-3xl animate-pulse-glow pointer-events-none"></div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center relative z-10">
                <div class="space-y-6 text-left">
                    <span class="inline-block px-3.5 py-1 rounded-full bg-orange-500/15 text-orange-300 text-[11px] font-extrabold uppercase tracking-widest">Book in under 2 minutes</span>
                    <h2 class="font-outfit font-extrabold text-3xl sm:text-5xl text-white leading-tight">
                        Your car is one message away
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed max-w-lg">
                        Pick a car online or simply message us on WhatsApp. We confirm availability instantly and deliver to the airport, your hotel or your doorstep.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <a href="{{ route('vehicles.index') }}" class="btn-shine px-6 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm rounded-xl shadow-lg shadow-orange-500/30 transition hover:-translate-y-0.5">Browse the Fleet</a>
                        <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener" class="px-6 py-3.5 bg-white/10 border border-white/15 hover:bg-white/15 text-white font-bold text-sm rounded-xl transition flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            Chat on WhatsApp
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3 sm:gap-4">
                    @foreach ([['13+', 'Cars in fleet'], ['24/7', 'Roadside support'], ['4.9', 'Average rating']] as [$stat, $label])
                        <div class="rounded-2xl bg-white/5 border border-white/10 p-4 sm:p-6 text-center hover:bg-white/10 hover:-translate-y-1 transition duration-300">
                            <div class="font-outfit font-extrabold text-2xl sm:text-4xl text-white">{{ $stat }}</div>
                            <div class="text-[11px] sm:text-xs text-slate-400 mt-1">{{ $label }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Special Offers Section -->
    <section id="offers" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24">
        <div class="text-center max-w-2xl mx-auto space-y-4">
            <h2 class="font-outfit font-extrabold text-4xl text-slate-900">Special Offers</h2>
            <p class="text-slate-500">Take advantage of our exclusive deals and save on your next rental.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
            <!-- Offer 1 -->
            <div class="bg-orange-50/60 border border-orange-100 rounded-3xl p-8 lg:p-12 relative overflow-hidden group shadow-sm hover:shadow-md transition">
                <div class="space-y-4 relative z-10">
                    <span class="px-2.5 py-1 bg-orange-500 text-white text-[10px] font-extrabold uppercase tracking-widest rounded-lg">Weekend Discount</span>
                    <h3 class="font-outfit font-extrabold text-3xl text-slate-900">20% OFF</h3>
                    <p class="text-slate-600 text-sm max-w-md">Rent any car on weekends and enjoy 20% off. Perfect for your short weekend getaways and adventures.</p>
                    <a href="{{ route('vehicles.index') }}" class="inline-flex items-center space-x-1.5 text-xs font-bold text-orange-650 hover:text-orange-550 transition pt-4">
                        <span>Book Weekend Trip</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
            
            <!-- Offer 2 -->
            <div class="bg-blue-50/60 border border-blue-100 rounded-3xl p-8 lg:p-12 relative overflow-hidden group shadow-sm hover:shadow-md transition">
                <div class="space-y-4 relative z-10">
                    <span class="px-2.5 py-1 bg-blue-500 text-white text-[10px] font-extrabold uppercase tracking-widest rounded-lg">First Booking Offer</span>
                    <h3 class="font-outfit font-extrabold text-3xl text-slate-900">15% OFF</h3>
                    <p class="text-slate-600 text-sm max-w-md">New to Journey Begins? Register an account today and grab a flat 15% discount on your very first rental booking.</p>
                    <a href="{{ route('register') }}" class="inline-flex items-center space-x-1.5 text-xs font-bold text-blue-600 hover:text-blue-500 transition pt-4">
                        <span>Get Started Now</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

<!-- 9. Follow Us Section -->
<section id="follow-us" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-24"
         x-data="{
             activeIgPost: null,
             activeTikTokVideo: null,
             activeFbPost: null
         }">
    <div class="text-center max-w-2xl mx-auto space-y-4">
        <h2 class="font-outfit font-extrabold text-4xl text-slate-900">Follow Us</h2>
        <p class="text-slate-500">Stay updated with our latest cars, offers, and behind-the-scenes moments.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">

        {{-- Facebook Widget Card --}}
        <div class="bg-white border border-slate-100 rounded-[2rem] p-6 shadow-md hover:shadow-lg transition duration-300 flex flex-col justify-between h-[600px]">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <a href="https://www.facebook.com/people/Journey-Begins/61568721061263/" target="_blank" rel="noopener" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 rounded-full border border-slate-200 overflow-hidden flex items-center justify-center bg-slate-50 flex-shrink-0 group-hover:scale-105 transition">
                        <img src="{{ asset('images/logoo.png') }}" class="w-10 h-10 object-contain" alt="Journey Begins Logo">
                    </div>
                    <div>
                        <div class="flex items-center space-x-1">
                            <h3 class="font-outfit font-bold text-base text-slate-800 leading-tight group-hover:text-[#1877F2] transition">Journey Begins</h3>
                            <svg class="w-4 h-4 text-[#1877F2] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $facebookData['followers'] ?? 552 }} Followers • {{ $facebookData['following'] ?? 4 }} Following</p>
                    </div>
                </a>
                <div class="w-9 h-9 rounded-full bg-[#1877F2]/10 flex items-center justify-center text-[#1877F2] flex-shrink-0">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                </div>
            </div>

            <div class="flex-grow overflow-y-auto py-3 space-y-3.5 pr-1.5 max-h-[440px] scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                @foreach(($facebookData['posts'] ?? []) as $post)
                    <a href="{{ $post['permalink'] ?? 'https://www.facebook.com/people/Journey-Begins/61568721061263/' }}" target="_blank" rel="noopener" class="border border-slate-100 rounded-2xl p-4 space-y-3 bg-slate-50/50 hover:bg-slate-100/80 transition duration-200 block group">
                        <div class="flex items-center space-x-2 text-xs text-slate-400">
                            <span class="font-semibold text-slate-700">Journey Begins</span>
                            <span>• {{ $post['date'] ?? 'Recent' }}</span>
                        </div>
                        <p class="text-xs text-slate-700 leading-relaxed line-clamp-3 group-hover:text-slate-900 transition font-medium whitespace-pre-line">
                            {{ $post['text'] ?? '' }}
                        </p>
                        @if(!empty($post['image']))
                            <div class="h-36 w-full rounded-xl overflow-hidden bg-slate-150 relative">
                                <img src="{{ asset($post['image']) }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Facebook post image">
                            </div>
                        @endif
                        <div class="flex items-center justify-between text-xs text-slate-400 pt-1 border-t border-slate-100">
                            <span>👍 {{ $post['likes'] ?? 0 }} Likes • {{ $post['comments'] ?? 0 }} Comments</span>
                            <span class="text-[#1877F2] font-semibold text-xs group-hover:underline">View Post &rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="pt-3 border-t border-slate-100">
                <a href="https://www.facebook.com/people/Journey-Begins/61568721061263/" target="_blank" rel="noopener"
                   class="w-full py-3.5 bg-[#1877F2] hover:bg-[#1565C0] text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition duration-200 shadow-md shadow-[#1877F2]/10">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                    Visit Facebook Page
                </a>
            </div>
        </div>

        {{-- TikTok Widget Card --}}
        <div class="bg-white border border-slate-100 rounded-[2rem] p-6 shadow-md hover:shadow-lg transition duration-300 flex flex-col justify-between h-[600px]">
            <div class="pb-4 border-b border-slate-100">
                <a href="https://www.tiktok.com/@journey_begins3" target="_blank" rel="noopener" class="flex items-start space-x-3.5 group">
                    <div class="w-12 h-12 rounded-full border border-slate-200 overflow-hidden flex items-center justify-center bg-slate-50 flex-shrink-0 group-hover:scale-105 transition">
                        <img src="{{ asset('images/logoo.png') }}" class="w-10 h-10 object-contain" alt="Journey Begins Logo">
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-outfit font-extrabold text-base text-slate-900 leading-tight group-hover:text-[#FE2C55] transition">journey_begins3</h3>
                        <div class="flex items-center space-x-3 text-xs text-slate-500">
                            <div><span class="font-bold text-slate-800">{{ $tikTokData['following'] ?? 0 }}</span> <span class="text-[10px] text-slate-400">Following</span></div>
                            <div><span class="font-bold text-slate-800">{{ $tikTokData['followers'] ?? 603 }}</span> <span class="text-[10px] text-slate-400">Followers</span></div>
                            <div><span class="font-bold text-slate-800">{{ $tikTokData['likes'] ?? 3692 }}</span> <span class="text-[10px] text-slate-400">Likes</span></div>
                        </div>
                    </div>
                </a>
                <div class="mt-2.5 text-xs text-slate-500 space-y-0.5">
                    <div class="flex items-center space-x-1.5 text-slate-600 font-medium">
                        <svg class="w-3.5 h-3.5 text-[#FE2C55]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+977 9840002796</span>
                    </div>
                    <div class="text-[11px] leading-tight text-slate-500 font-medium whitespace-pre-line">
                        {{ $tikTokData['bio'] ?? 'Your Driving Partner in Nepal. 🚘🇳🇵' }}
                    </div>
                </div>
            </div>

            <div class="flex-grow overflow-y-auto py-3 pr-1 max-h-[440px] scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                <div class="grid grid-cols-2 gap-3">
                    @foreach(($tikTokData['videos'] ?? []) as $video)
                        <a href="{{ $video['url'] ?? 'https://www.tiktok.com/@journey_begins3' }}" target="_blank" rel="noopener" class="aspect-[3/4] bg-slate-100 rounded-2xl relative overflow-hidden group/video shadow-sm cursor-pointer block">
                            <img src="{{ asset($video['cover'] ?? '/images/bydatto3blue.png') }}" class="w-full h-full object-cover group-hover/video:scale-105 transition duration-300" alt="TikTok video cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent"></div>
                            
                            @if(!empty($video['is_pinned']))
                                <div class="absolute top-2 left-2 bg-[#FE2C55] text-white text-[9px] font-extrabold px-2 py-0.5 rounded-full uppercase tracking-wider shadow">
                                    Pinned
                                </div>
                            @endif

                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover/video:opacity-100 transition duration-350 bg-black/25">
                                <div class="w-9 h-9 rounded-full bg-white/95 flex items-center justify-center text-slate-900 shadow-md">
                                    <svg class="w-4 h-4 fill-current ml-0.5 text-[#FE2C55]" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="absolute bottom-2 left-2 right-2 text-white">
                                <div class="flex items-center justify-between text-[10px] font-semibold">
                                    <span>▷ {{ $video['views'] ?? 0 }}</span>
                                    <span>❤️ {{ $video['likes'] ?? 0 }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                <div>
                    <h4 class="font-bold text-sm text-slate-800 tracking-tight">TikTok</h4>
                    <a href="https://www.tiktok.com/legal/privacy-policy" target="_blank" rel="noopener" class="text-[10px] text-slate-450 hover:underline">View Privacy Policy</a>
                </div>
                <a href="https://www.tiktok.com/@journey_begins3?_r=1&_t=ZS-981tZsRKJgA" target="_blank" rel="noopener"
                   class="px-5 py-3 bg-[#FE2C55] hover:bg-[#E0224C] text-white font-bold text-xs rounded-xl transition duration-200 shadow-md shadow-[#FE2C55]/10">
                    Open TikTok
                </a>
            </div>
        </div>

        {{-- Instagram Widget Card --}}
        <div class="bg-white border border-slate-100 rounded-[2rem] p-6 shadow-md hover:shadow-lg transition duration-300 flex flex-col justify-between h-[600px]">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <a href="https://www.instagram.com/jour.neybegins0?igsh=Mjhxc3kxN2pwNG80" target="_blank" rel="noopener" class="flex items-center space-x-3.5 group">
                    <div class="w-12 h-12 rounded-full p-[2.5px] bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition">
                        <div class="w-full h-full rounded-full border-2 border-white overflow-hidden flex items-center justify-center bg-white">
                            <img src="{{ asset('images/logoo.png') }}" class="w-9 h-9 object-contain" alt="Journey Begins Logo">
                        </div>
                    </div>
                    <div>
                        <h3 class="font-outfit font-extrabold text-sm text-slate-900 leading-tight group-hover:text-[#dc2743] transition">jour.neybegins0</h3>
                        <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $instagramData['followers'] ?? 64 }} Followers • {{ $instagramData['posts_count'] ?? 31 }} Posts</p>
                    </div>
                </a>
                <div class="text-[#bc1888] flex-shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                </div>
            </div>

            <div class="flex-grow overflow-y-auto py-3 space-y-3.5 pr-1.5 max-h-[440px] scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                @foreach(($instagramData['posts'] ?? []) as $post)
                    <a href="{{ $post['link'] ?? 'https://www.instagram.com/jour.neybegins0/' }}" target="_blank" rel="noopener" class="border border-slate-100 rounded-2xl p-4 space-y-3 bg-slate-50/50 hover:bg-slate-100/80 transition duration-200 block group">
                        <div class="flex items-center space-x-2 text-xs text-slate-400">
                            <span class="font-semibold text-slate-700">jour.neybegins0</span>
                            <span>• {{ $post['date'] ?? 'Recent' }}</span>
                            @if(($post['type'] ?? '') === 'reel')
                                <span class="bg-[#dc2743]/10 text-[#dc2743] font-bold text-[9px] px-2 py-0.5 rounded-full ml-auto">REEL</span>
                            @endif
                        </div>
                        <p class="text-xs text-slate-700 leading-relaxed line-clamp-3 group-hover:text-slate-900 transition font-medium whitespace-pre-line">
                            {{ $post['caption'] ?? '' }}
                        </p>
                        @if(!empty($post['image']))
                            <div class="h-36 w-full rounded-xl overflow-hidden bg-slate-150 relative">
                                <img src="{{ asset($post['image']) }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="Instagram post image">
                            </div>
                        @endif
                        <div class="flex items-center justify-between text-xs text-slate-400 pt-1 border-t border-slate-100">
                            <span class="text-[#dc2743] font-semibold">❤️ {{ $post['likes'] ?? 0 }} Likes</span>
                            <span class="text-[#dc2743] font-semibold text-xs group-hover:underline">View Post &rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="pt-3 border-t border-slate-100">
                <a href="https://www.instagram.com/jour.neybegins0?igsh=Mjhxc3kxN2pwNG80" target="_blank" rel="noopener"
                   class="w-full py-3.5 bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] hover:opacity-95 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition duration-200 shadow-md shadow-[#dc2743]/10">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                    Follow on Instagram
                </a>
            </div>
        </div>

    </div>

    {{-- Modals Backdrop Container --}}
    <div x-show="activeIgPost || activeTikTokVideo || activeFbPost"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/70 backdrop-blur-md z-[9999] flex items-center justify-center p-4"
         x-cloak>

        {{-- Instagram Modal --}}
        <template x-if="activeIgPost">
            <div @click.away="activeIgPost = null"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="bg-white rounded-[2rem] max-w-4xl w-full overflow-hidden shadow-2xl flex flex-col md:flex-row h-[85vh] md:h-[550px] relative max-h-[700px]">

                <button @click="activeIgPost = null" class="absolute top-4 right-4 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full w-8 h-8 flex items-center justify-center transition z-10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="w-full md:w-1/2 bg-slate-950 flex items-center justify-center h-1/2 md:h-full relative overflow-hidden">
                    <img :src="activeIgPost.image" class="w-full h-full object-cover" alt="Instagram Post Image">
                    <div x-show="activeIgPost.type === 'reel'" class="absolute top-4 left-4 bg-black/60 text-white rounded-full px-2.5 py-1 text-[10px] font-semibold flex items-center gap-1.5 backdrop-blur-sm">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 16c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V8c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2v8zm2-6.5l4-3.5v12l-4-3.5v-5z"/></svg>
                        Reel
                    </div>
                </div>

                <div class="w-full md:w-1/2 p-6 md:p-8 flex flex-col justify-between h-1/2 md:h-full border-t md:border-t-0 md:border-l border-slate-100 bg-white">
                    <div class="space-y-4 overflow-y-auto max-h-[80%] pr-1 scrollbar-thin">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full p-[2px] bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] flex items-center justify-center">
                                <div class="w-full h-full rounded-full border-2 border-white overflow-hidden bg-white flex items-center justify-center">
                                    <img src="{{ asset('images/logoo.png') }}" class="w-8 h-8 object-contain" alt="Journey Begins Logo">
                                </div>
                            </div>
                            <div>
                                <h4 class="font-outfit font-extrabold text-sm text-slate-900 leading-tight">jour.neybegins0</h4>
                                <p class="text-[10px] text-slate-400">Journey Begins Car Rental</p>
                            </div>
                        </div>

                        <p class="text-slate-650 text-xs sm:text-sm leading-relaxed whitespace-pre-wrap font-medium" x-text="activeIgPost.caption"></p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 space-y-4">
                        <div class="flex items-center justify-between text-xs text-slate-500 font-bold">
                            <span class="flex items-center gap-1 text-[#bc1888]">
                                <span>❤️</span> <span x-text="activeIgPost.likes"></span> Likes
                            </span>
                            <span x-text="'Posted ' + activeIgPost.date"></span>
                        </div>

                        <a :href="activeIgPost.link" target="_blank" rel="noopener"
                           class="w-full py-3 bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition hover:opacity-95 shadow-md shadow-[#dc2743]/15">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                            </svg>
                            View Post on Instagram
                        </a>
                    </div>
                </div>
            </div>
        </template>

        {{-- TikTok Video Modal --}}
        <template x-if="activeTikTokVideo">
            <div @click.away="activeTikTokVideo = null"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="bg-slate-950 rounded-[2.5rem] max-w-md w-full overflow-hidden shadow-2xl relative border border-slate-800 flex flex-col h-[85vh] max-h-[750px]">

                <button @click="activeTikTokVideo = null" class="absolute top-4 right-4 bg-black/60 hover:bg-black/80 text-white rounded-full w-8 h-8 flex items-center justify-center transition z-[100] backdrop-blur-sm border border-slate-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="relative flex-grow flex flex-col justify-between p-6">
                    <div class="flex items-center justify-center space-x-2 text-white/70 text-xs py-2">
                        <span class="font-bold text-white">Following</span>
                        <span class="w-1 h-1 bg-white/70 rounded-full"></span>
                        <span class="font-bold text-white border-b-2 border-white pb-0.5">For You</span>
                    </div>

                    <div class="absolute inset-0 z-0">
                        <img :src="activeTikTokVideo.cover" class="w-full h-full object-cover opacity-85 filter blur-xs scale-105" alt="Background Cover Blur">
                        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/20 to-black/80"></div>
                        <img :src="activeTikTokVideo.cover" class="absolute inset-x-0 top-1/2 -translate-y-1/2 max-h-[480px] w-full object-contain z-1" alt="TikTok Video Cover">
                    </div>

                    <a :href="activeTikTokVideo.url" target="_blank" rel="noopener" class="absolute inset-0 flex items-center justify-center z-10 group/play">
                        <div class="w-16 h-16 rounded-full bg-white/20 border-2 border-white flex items-center justify-center text-white backdrop-blur-md group-hover/play:scale-110 transition duration-300 shadow-lg">
                            <svg class="w-8 h-8 fill-current ml-1" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </a>

                    <div class="absolute right-4 bottom-24 flex flex-col items-center space-y-5 z-20">
                        <div class="w-10 h-10 rounded-full border-2 border-white overflow-hidden bg-white shadow-md flex items-center justify-center relative">
                            <img src="{{ asset('images/logoo.png') }}" class="w-8 h-8 object-contain" alt="Logo">
                            <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-4 h-4 bg-[#FE2C55] rounded-full flex items-center justify-center text-white text-[9px] font-bold">+</div>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-black/40 backdrop-blur-md flex items-center justify-center text-white hover:text-[#FE2C55] cursor-pointer transition">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            </div>
                            <span class="text-white text-[10px] font-bold mt-1" x-text="activeTikTokVideo.likes"></span>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-black/40 backdrop-blur-md flex items-center justify-center text-white hover:text-cyan-400 cursor-pointer transition">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/></svg>
                            </div>
                            <span class="text-white text-[10px] font-bold mt-1" x-text="activeTikTokVideo.comments"></span>
                        </div>

                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-black/40 backdrop-blur-md flex items-center justify-center text-white hover:text-green-400 cursor-pointer transition">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.8 2.04.8 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/></svg>
                            </div>
                            <span class="text-white text-[10px] font-bold mt-1">Share</span>
                        </div>
                    </div>

                    <div class="mt-auto z-10 space-y-3.5 pt-4 text-white">
                        <div class="space-y-1">
                            <h4 class="font-outfit font-extrabold text-sm flex items-center gap-1.5">
                                @journey_begins3
                                <span class="bg-cyan-400 text-slate-950 font-extrabold text-[8px] px-1.5 py-0.5 rounded-full uppercase tracking-wider">Creator</span>
                            </h4>
                            <p class="text-xs text-white/90 leading-relaxed font-medium" x-text="activeTikTokVideo.caption"></p>
                        </div>

                        <div class="h-1 bg-white/20 rounded-full overflow-hidden relative">
                            <div class="absolute top-0 bottom-0 left-0 w-1/3 bg-[#FE2C55]"></div>
                        </div>

                        <a :href="activeTikTokVideo.url" target="_blank" rel="noopener"
                           class="w-full py-3 bg-[#FE2C55] hover:bg-[#E0224C] text-white font-extrabold text-xs rounded-xl flex items-center justify-center gap-2 transition duration-200 shadow-lg shadow-[#FE2C55]/30">
                            Play & Open on TikTok
                        </a>
                    </div>
                </div>
            </div>
        </template>

        {{-- Facebook Modal --}}
        <template x-if="activeFbPost">
            <div @click.away="activeFbPost = null"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="bg-white rounded-[2rem] max-w-2xl w-full overflow-hidden shadow-2xl relative flex flex-col max-h-[85vh]">

                <button @click="activeFbPost = null" class="absolute top-4 right-4 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full w-8 h-8 flex items-center justify-center transition z-10">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="overflow-y-auto p-6 md:p-8 space-y-6">
                    <div class="flex items-center space-x-3.5">
                        <div class="w-12 h-12 rounded-full border border-slate-200 overflow-hidden flex items-center justify-center bg-slate-50 flex-shrink-0">
                            <img src="{{ asset('images/logoo.png') }}" class="w-10 h-10 object-contain" alt="Journey Begins Logo">
                        </div>
                        <div>
                            <div class="flex items-center space-x-1">
                                <h4 class="font-outfit font-extrabold text-sm text-slate-900 leading-tight">Journey Begins</h4>
                                <svg class="w-4 h-4 text-[#1877F2] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                            <p class="text-[10px] text-slate-450 mt-0.5" x-text="'Posted on ' + activeFbPost.date"></p>
                        </div>
                    </div>

                    <p class="text-slate-700 text-sm sm:text-base leading-relaxed whitespace-pre-wrap font-medium" x-text="activeFbPost.text"></p>

                    <template x-if="activeFbPost.image">
                        <div class="rounded-2xl overflow-hidden bg-slate-100 max-h-[350px] flex items-center justify-center">
                            <img :src="activeFbPost.image" class="w-full h-full object-cover" alt="Facebook Feed Full Image">
                        </div>
                    </template>
                </div>

                <div class="p-6 md:px-8 border-t border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-xs text-slate-500 font-bold">
                        👍 <span x-text="activeFbPost.likes"></span> Likes • <span x-text="activeFbPost.comments"></span> Comments
                    </div>
                    <a :href="activeFbPost.permalink || 'https://www.facebook.com/people/Journey-Begins/61568721061263/'" target="_blank" rel="noopener"
                       class="w-full sm:w-auto px-6 py-3 bg-[#1877F2] hover:bg-[#1565C0] text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition duration-200 shadow-md shadow-[#1877F2]/10">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                        View Post on Facebook
                    </a>
                </div>
            </div>
        </template>
    </div>
</section>

    <!-- 9. Contact / Inquiry Section -->
    <section id="contact" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-24">
        <div class="bg-slate-50 border border-slate-250/60 rounded-[2rem] p-8 sm:p-12 shadow-md">
            <div class="text-center max-w-xl mx-auto space-y-4 mb-10">
                <h2 class="font-outfit font-extrabold text-3xl text-slate-900">Have Questions? Get in Touch</h2>
                <p class="text-slate-500 text-sm">Send us a message and our support team will reach out to you shortly.</p>
            </div>
            
            @if ($inquiry_success)
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl p-6 text-center space-y-3">
                    <svg class="w-8 h-8 text-emerald-500 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h3 class="font-bold text-lg">Thank You!</h3>
                    <p class="text-sm">Your message has been submitted. Our team will get back to you shortly.</p>
                </div>
            @else
                <form wire:submit.prevent="submitInquiry" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Full Name</label>
                            <input type="text" wire:model="contact_name" placeholder="John Doe" class="w-full bg-white border border-slate-200 rounded-xl py-3 px-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 transition duration-200">
                            @error('contact_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Email Address</label>
                            <input type="email" wire:model="contact_email" placeholder="john@example.com" class="w-full bg-white border border-slate-200 rounded-xl py-3 px-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 transition duration-200">
                            @error('contact_email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Phone Number</label>
                        <input type="tel" wire:model="contact_phone" placeholder="+977-9801234567" class="w-full bg-white border border-slate-200 rounded-xl py-3 px-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 transition duration-200">
                        @error('contact_phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Message -->
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Your Message</label>
                        <textarea wire:model="contact_message" rows="4" placeholder="How can we help you?" class="w-full bg-white border border-slate-200 rounded-xl py-3 px-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 transition duration-200"></textarea>
                        @error('contact_message') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-8 py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl transition shadow-lg shadow-orange-500/10">
                            Send Message
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </section>

</div>
