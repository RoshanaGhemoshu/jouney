<div class="bg-[#f8fafc] min-h-screen pt-10 lg:pt-14 pb-20">
    <!-- 1. Hero Section (Split Grid Layout with Fading Left Border Image) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Hero Left Content -->
            <div class="lg:col-span-6 space-y-6 text-left animate-fade-in-up">
                <div class="inline-flex items-center space-x-2 px-4 py-1.5 bg-orange-50 border border-orange-200/80 rounded-full text-orange-600 font-extrabold text-[11px] uppercase tracking-wider shadow-sm">
                    <span>⚡ EXPLORE OUR FLEET</span>
                </div>

                <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl lg:text-6xl text-slate-900 leading-[1.15] tracking-tight">
                    Choose Your Ride for <br>
                    <span class="text-[#FF6800]">Unforgettable Journeys</span>
                </h1>

                <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl font-medium">
                    From luxury 5-seater EVs to spacious 7-seater SUVs, discover a fleet built for comfort, performance, and efficiency.
                </p>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <span class="px-4 py-2 bg-white border border-slate-200/80 text-slate-700 text-xs font-bold rounded-full shadow-sm inline-flex items-center gap-1.5">
                        <span class="text-orange-500">🛡️</span>
                        <span>Fully Insured</span>
                    </span>
                    <span class="px-4 py-2 bg-white border border-slate-200/80 text-slate-700 text-xs font-bold rounded-full shadow-sm inline-flex items-center gap-1.5">
                        <span class="text-orange-500">🎧</span>
                        <span>24/7 Support</span>
                    </span>
                    <span class="px-4 py-2 bg-white border border-slate-200/80 text-slate-700 text-xs font-bold rounded-full shadow-sm inline-flex items-center gap-1.5">
                        <span class="text-orange-500">🚀</span>
                        <span>Instant Delivery</span>
                    </span>
                </div>
            </div>

            <!-- Hero Right Image with Left Border Fading Effect -->
            <div class="lg:col-span-6 relative">
                <div class="relative overflow-hidden rounded-3xl shadow-2xl border border-slate-200/80 h-[320px] sm:h-[380px] group">
                    <img src="{{ asset('images/hero/hero1.png') }}" class="w-full h-full object-cover object-center select-none group-hover:scale-105 transition duration-700" alt="Journey Begins Fleet Hero">
                    
                    <!-- Fading effect on left border -->
                    <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#f8fafc] via-[#f8fafc]/70 to-transparent pointer-events-none"></div>
                    
                    <!-- Subtle top & bottom vignette for depth -->
                    <div class="absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-slate-900/30 to-transparent pointer-events-none"></div>
                </div>
            </div>

        </div>
    </div>

    <!-- 2. Search & Filter Controls Bar (Exact Match to Reference Design) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-14">
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xl shadow-slate-200/40 space-y-4 lg:space-y-0 lg:flex lg:items-center lg:justify-between lg:gap-6">
            
            <!-- SEARCH FLEET WITH SEARCH BUTTON AT END -->
            <div class="flex-1 min-w-[260px]">
                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block mb-1.5">SEARCH FLEET</label>
                <form wire:submit.prevent="searchFleet" class="relative flex items-center w-full">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                    <input type="text" 
                           wire:model.live.debounce.300ms="search" 
                           placeholder="Search by name (e.g. BYD, Hilux, Scorpio)..." 
                           class="w-full bg-slate-100/80 border border-slate-200/70 rounded-xl py-2.5 pl-10 pr-24 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                    
                    <button type="submit" 
                            class="absolute right-1 inset-y-1 my-auto px-4 bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-[11px] uppercase tracking-wider rounded-lg shadow-sm transition duration-200 flex items-center gap-1.5 h-8">
                        <span>Search</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                </form>
            </div>

            <!-- CATEGORY PILLS -->
            <div>
                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block mb-1.5">CATEGORY</label>
                <div class="flex items-center gap-2 flex-wrap">
                    <button wire:click="selectCategory('All')" 
                            class="px-5 py-2.5 rounded-xl text-xs font-extrabold transition duration-200 {{ $category === '' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                        ALL
                    </button>
                    <button wire:click="selectCategory('EV')" 
                            class="px-5 py-2.5 rounded-xl text-xs font-extrabold transition duration-200 {{ $category === 'EV' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                        EV
                    </button>
                    <button wire:click="selectCategory('Petrol')" 
                            class="px-5 py-2.5 rounded-xl text-xs font-extrabold transition duration-200 {{ $category === 'Petrol' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                        Petrol
                    </button>
                    <button wire:click="selectCategory('Diesel')" 
                            class="px-5 py-2.5 rounded-xl text-xs font-extrabold transition duration-200 {{ $category === 'Diesel' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                        Diesel
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- 3. Section Title & Navigation Arrow Header -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-outfit font-extrabold text-3xl text-slate-900">Our Premium Fleet</h2>
                <p class="text-slate-500 text-sm mt-0.5">Top-tier vehicles for every type of journey in Nepal.</p>
            </div>
            <div class="flex items-center space-x-2">
                <button type="button" class="w-9 h-9 rounded-full border border-slate-200 bg-white text-slate-600 flex items-center justify-center text-xs font-bold hover:bg-slate-100 transition shadow-sm" aria-label="Previous">
                    ‹
                </button>
                <button type="button" class="w-9 h-9 rounded-full border border-slate-200 bg-white text-slate-600 flex items-center justify-center text-xs font-bold hover:bg-slate-100 transition shadow-sm" aria-label="Next">
                    ›
                </button>
            </div>
        </div>
    </div>

    <!-- 4. Vehicles Grid (All Cars Shown with Curved Image Corners on All Edges) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($cars as $car)
                <div class="bg-white border border-slate-200/90 rounded-[2rem] p-4 shadow-lg hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                    
                    <div>
                        <!-- Car image container CURVED ON ALL EDGES (rounded-2xl) -->
                        <div class="relative h-56 rounded-2xl overflow-hidden bg-slate-100 mb-5 border border-slate-100">
                            <img src="{{ $car->image_url }}" alt="{{ trim(preg_replace('/\s*\([^)]*\)/', '', $car->name)) }}" loading="lazy" class="w-full h-full object-cover rounded-2xl group-hover:scale-105 group-hover:translate-x-3 group-hover:-translate-y-1 transition-transform duration-500">

                            <!-- Badges on image top left -->
                            <div class="absolute top-3 left-3 flex items-center space-x-1.5">
                                <span class="px-2.5 py-1 bg-white/95 backdrop-blur-md border border-slate-200/80 text-[10px] font-extrabold text-orange-600 uppercase tracking-wider rounded-lg shadow-sm">
                                    {{ $car->category }}
                                </span>
                                <span class="px-2.5 py-1 bg-slate-900/85 backdrop-blur-md text-[10px] font-extrabold text-white uppercase tracking-wider rounded-lg shadow-sm">
                                    {{ $car->transmission }}
                                </span>
                            </div>
                        </div>

                        <!-- Title + Year Pill (No Color Displayed) -->
                        <div class="px-2 flex items-center justify-between">
                            <div>
                                <h3 class="font-outfit font-extrabold text-xl text-slate-900 group-hover:text-[#FF6800] transition duration-200">
                                    {{ trim(preg_replace('/\s*\([^)]*\)/', '', $car->name)) }}
                                </h3>
                                <p class="text-xs text-slate-400 font-medium mt-0.5">
                                    {{ $car->category === 'EV' ? 'Superior Efficiency & Comfort' : ($car->category === 'Diesel' ? 'The Ultimate Workhorse' : 'Future of Mobility & Style') }}
                                </p>
                            </div>
                            <span class="px-2.5 py-1 bg-amber-50 border border-amber-200/60 text-amber-800 text-[11px] font-extrabold rounded-lg">
                                {{ $car->model_year }}
                            </span>
                        </div>

                        <!-- 3 Quick Specs Columns -->
                        <div class="grid grid-cols-3 gap-2 py-4 border-y border-slate-100 text-xs text-slate-600 my-4 px-2">
                            <div class="flex flex-col items-center justify-center p-2 bg-slate-50/80 rounded-xl text-center">
                                <span class="text-[10px] font-bold text-slate-800 flex items-center gap-1">
                                    <span>👤</span>
                                    <span>{{ $car->seats }} Seater</span>
                                </span>
                            </div>
                            <div class="flex flex-col items-center justify-center p-2 bg-slate-50/80 rounded-xl text-center">
                                <span class="text-[10px] font-bold text-slate-800 flex items-center gap-1">
                                    <span>⚙️</span>
                                    <span>{{ $car->transmission }}</span>
                                </span>
                            </div>
                            <div class="flex flex-col items-center justify-center p-2 bg-slate-50/80 rounded-xl text-center">
                                <span class="text-[10px] font-bold text-slate-800 flex items-center gap-1">
                                    <span>🔋</span>
                                    <span>{{ $car->mileage_or_range }}</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Price & Book Now Button -->
                    <div class="px-2 pt-1 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Daily Rate</span>
                            <span class="font-outfit font-extrabold text-xl text-slate-900">
                                Rs. {{ number_format($car->pricingTier->daily_rate ?? 12000) }}
                            </span>
                        </div>
                        
                        <a href="{{ route('cars.show', $car->id) }}" 
                           class="group/btn px-6 py-2.5 bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-md shadow-orange-500/20 transition duration-200 flex items-center gap-1.5">
                            <span>BOOK NOW</span>
                            <svg class="w-5 h-5 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-16 text-center bg-white border border-slate-200/90 rounded-[2rem] shadow-sm space-y-4">
                    <svg class="w-16 h-16 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-800">No Vehicles Found</h3>
                    <p class="text-slate-500 text-sm max-w-md mx-auto">Try clearing your filters or search keywords to view all available cars in our fleet.</p>
                    <button wire:click="selectCategory('All')" class="px-6 py-2.5 bg-[#FF6800] text-white font-bold text-xs rounded-xl hover:bg-orange-600 transition shadow-md">
                        View Full Fleet
                    </button>
                </div>
            @endforelse
        </div>

        @if(count($cars) > 0)
            <div class="text-center mt-10">
                <span class="px-6 py-3 bg-white border border-slate-200 text-slate-700 font-extrabold text-xs rounded-full shadow-sm inline-flex items-center gap-2">
                    <span>Showing All {{ count($cars) }} Vehicles in Fleet</span>
                    <span class="text-emerald-500 font-black">✓</span>
                </span>
            </div>
        @endif
    </div>

    <!-- 5. Bottom Callout Banner (Matching Reference Image) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
        <div class="bg-slate-950 rounded-[2.5rem] p-8 sm:p-14 text-white flex flex-col lg:flex-row items-center justify-between gap-10 shadow-2xl relative overflow-hidden">
            <div class="space-y-3 max-w-xl text-center lg:text-left z-10">
                <h3 class="font-outfit font-extrabold text-3xl sm:text-4xl leading-tight">
                    Plan Your Journey <br class="hidden sm:inline"> With Confidence.
                </h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Subscribe for exclusive fleet updates, special weekend rates, and loyalty rewards delivered straight to your inbox.
                </p>
            </div>

            <div class="w-full lg:w-auto z-10 bg-slate-900/90 border border-slate-800 p-6 rounded-3xl shadow-xl max-w-md space-y-3">
                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">EMAIL ADDRESS</label>
                <input type="email" placeholder="you@company.com" class="w-full bg-slate-800 border border-slate-700 rounded-xl py-3 px-4 text-xs font-medium text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition">
                <button type="button" class="w-full py-3 bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-orange-500/25 transition">
                    JOIN THE ELITE CLUB
                </button>
            </div>
        </div>
    </div>
</div>
