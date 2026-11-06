<div class="bg-[#f8fafc] min-h-screen pt-24 pb-20">
    <!-- 1. Hero Header Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16 animate-fade-in-up">
        <div class="inline-flex items-center space-x-2 px-4 py-1.5 bg-orange-50 border border-orange-200/80 rounded-full text-orange-600 font-extrabold text-[11px] uppercase tracking-wider mb-4 shadow-sm">
            <span>⚡ PREMIUM MOBILITY SOLUTIONS</span>
        </div>

        <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl lg:text-6xl text-slate-900 leading-tight tracking-tight">
            Tailored Mobility for <br>
            <span class="text-[#FF6800]">Every Journey in Nepal</span>
        </h1>

        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed mt-4 font-medium">
            Whether you need self-drive independence, VIP executive chauffeurs, or custom floral convoys for your wedding, we deliver unmatched perfection.
        </p>

        <div class="flex flex-wrap justify-center gap-3 mt-6">
            <span class="px-4 py-2 bg-white border border-slate-200/80 text-slate-700 text-xs font-bold rounded-full shadow-sm inline-flex items-center gap-1.5">
                <span class="text-orange-500">🛡️</span>
                <span>100% Insured Fleet</span>
            </span>
            <span class="px-4 py-2 bg-white border border-slate-200/80 text-slate-700 text-xs font-bold rounded-full shadow-sm inline-flex items-center gap-1.5">
                <span class="text-orange-500">🚗</span>
                <span>Doorstep Delivery</span>
            </span>
            <span class="px-4 py-2 bg-white border border-slate-200/80 text-slate-700 text-xs font-bold rounded-full shadow-sm inline-flex items-center gap-1.5">
                <span class="text-orange-500">🎧</span>
                <span>24/7 Assistance</span>
            </span>
        </div>
    </div>

    <!-- 2. Section Header & Grid Controls -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-outfit font-extrabold text-3xl text-slate-900">Our Premium Offerings</h2>
                <p class="text-slate-500 text-sm mt-0.5">Carefully curated services designed to meet the diverse needs of modern travelers, corporate entities, and special occasions.</p>
            </div>
            <div class="flex items-center space-x-2">
                <button type="button" class="w-9 h-9 rounded-xl border border-slate-200 bg-white text-slate-600 flex items-center justify-center text-xs font-bold hover:bg-slate-100 transition shadow-sm">
                    ≡
                </button>
                <button type="button" class="w-9 h-9 rounded-xl border border-slate-200 bg-white text-slate-600 flex items-center justify-center text-xs font-bold hover:bg-slate-100 transition shadow-sm">
                    ⊞
                </button>
            </div>
        </div>
    </div>

    <!-- 3. Service Cards Grid (Inquire Now Button links to Contact Us Page) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $srv)
                <div class="bg-white border border-slate-200/90 rounded-[2rem] p-7 shadow-lg hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Icon Box -->
                        <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center mb-5 group-hover:bg-[#FF6800] group-hover:text-white transition duration-300 shadow-sm">
                            @if($srv['icon'] === 'heart')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            @elseif($srv['icon'] === 'map-pin')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            @elseif($srv['icon'] === 'shield')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            @elseif($srv['icon'] === 'steering-wheel')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @elseif($srv['icon'] === 'user-check')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            @elseif($srv['icon'] === 'briefcase')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            @elseif($srv['icon'] === 'plane')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            @elseif($srv['icon'] === 'mountain')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M3 10l5-7 5 7 5-4 4 4v7H3z"/></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            @endif
                        </div>

                        <h3 class="font-outfit font-extrabold text-xl text-slate-900 group-hover:text-[#FF6800] transition duration-200 mb-2">
                            {{ $srv['title'] }}
                        </h3>

                        <p class="text-xs text-slate-500 leading-relaxed mb-4 min-h-[48px]">
                            {{ $srv['description'] }}
                        </p>

                        <!-- Bullet Feature Checklist -->
                        <ul class="space-y-2 py-4 border-t border-slate-100 text-xs font-semibold text-slate-700">
                            @foreach($srv['features'] as $feat)
                                <li class="flex items-center gap-2">
                                    <span class="text-emerald-500 font-bold">✓</span>
                                    <span>{{ $feat }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Inquire Now Button linking directly to Contact Us Page -->
                    <div class="pt-4">
                        <a href="{{ route('contact', ['service' => $srv['title']]) }}" 
                           class="w-full py-2.5 bg-white border border-orange-200 text-orange-600 hover:bg-[#FF6800] hover:border-[#FF6800] hover:text-white font-extrabold text-xs rounded-xl transition duration-200 flex items-center justify-center gap-1.5 shadow-sm group/btn">
                            <span>Inquire Now</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 4. Feature Showcase Section ("Why Choose Us") -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
        <div class="bg-white border border-slate-200/90 rounded-[2.5rem] p-8 sm:p-12 shadow-xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Image Box with Badge -->
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-xl border border-slate-200/80 h-[320px] group">
                        <img src="{{ asset('images/hero/hero1.png') }}" class="w-full h-full object-cover select-none group-hover:scale-105 transition duration-500" alt="Quality You Can Trust">
                        
                        <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md border border-slate-200/80 rounded-2xl p-4 shadow-lg text-left">
                            <span class="text-[10px] font-extrabold text-orange-600 uppercase tracking-wider block">OUR GUARANTEE</span>
                            <h4 class="font-outfit font-extrabold text-slate-900 text-base">Quality You Can Trust</h4>
                        </div>
                    </div>
                </div>

                <!-- Right Feature Content -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    <span class="text-[11px] font-extrabold text-orange-600 uppercase tracking-widest block">WHY CHOOSE US</span>

                    <h2 class="font-outfit font-extrabold text-3xl sm:text-4xl text-slate-900 leading-tight">
                        Hospitality & Reliability at the Core of Every Mile
                    </h2>

                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                        Journey Begins provides full service car rental with fully insured vehicles, verified local drivers, transparent billing, and 24/7 support throughout Nepal. We aren't just a rental service; we are your mobility partner.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="bg-slate-50 border border-slate-200/70 rounded-2xl p-4">
                            <div class="flex items-center gap-2 mb-1">
                                <span>🚚</span>
                                <h4 class="font-outfit font-bold text-slate-900 text-sm">Doorstep Delivery</h4>
                            </div>
                            <p class="text-slate-500 text-xs leading-relaxed">Vehicles delivered directly to your location in Kathmandu & Bhaktapur.</p>
                        </div>

                        <div class="bg-slate-50 border border-slate-200/70 rounded-2xl p-4">
                            <div class="flex items-center gap-2 mb-1">
                                <span>🧾</span>
                                <h4 class="font-outfit font-bold text-slate-900 text-sm">Instant VAT Billing</h4>
                            </div>
                            <p class="text-slate-500 text-xs leading-relaxed">Transparent, corporate-friendly billing with zero hidden costs.</p>
                        </div>

                        <div class="bg-slate-50 border border-slate-200/70 rounded-2xl p-4">
                            <div class="flex items-center gap-2 mb-1">
                                <span>🛠️</span>
                                <h4 class="font-outfit font-bold text-slate-900 text-sm">24/7 Breakdown Help</h4>
                            </div>
                            <p class="text-slate-500 text-xs leading-relaxed">Immediate roadside assistance or replacement vehicle provision.</p>
                        </div>

                        <div class="bg-slate-50 border border-slate-200/70 rounded-2xl p-4">
                            <div class="flex items-center gap-2 mb-1">
                                <span>👨‍✈️</span>
                                <h4 class="font-outfit font-bold text-slate-900 text-sm">Polite Chauffeurs</h4>
                            </div>
                            <p class="text-slate-500 text-xs leading-relaxed">Professional drivers who understand protocols and route navigation.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- 5. Custom Service Inquiry Form (Fully Working Form with Direct Actions) -->
    <div id="services-inquiry-box" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-slate-200/80 rounded-[2.5rem] p-8 sm:p-14 shadow-2xl relative">
            
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="px-3.5 py-1 bg-orange-50 text-orange-600 font-extrabold text-[10px] uppercase tracking-widest rounded-full inline-block mb-3">
                    CONNECT WITH US
                </span>
                <h2 class="font-outfit font-extrabold text-3xl sm:text-4xl text-slate-900">Custom Service Inquiry</h2>
                <p class="text-slate-500 text-sm mt-1">Tell us your dates, vehicle preferences, or special requirements. Our service team will contact you within 30 minutes.</p>
            </div>

            @if ($inquiry_success)
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-3xl p-10 text-center space-y-4 shadow-sm animate-fade-in-up">
                    <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center mx-auto shadow-md">
                        ✓
                    </div>
                    <h3 class="font-outfit font-extrabold text-2xl text-emerald-900">Request Submitted Successfully!</h3>
                    <p class="text-slate-600 text-sm max-w-md mx-auto leading-relaxed">Thank you for choosing Journey Begins. Our service team has received your inquiry for <strong>{{ $service_type }}</strong> and will reach out to you immediately.</p>
                </div>
            @else
                <form wire:submit.prevent="submitInquiry" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- FULL NAME -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">FULL NAME *</label>
                            <input type="text" wire:model="contact_name" placeholder="John Doe" class="w-full bg-slate-50 border border-slate-200/70 rounded-xl py-3 px-4 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            @error('contact_name') <span class="text-xs font-bold text-red-500 block mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- EMAIL ADDRESS -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">EMAIL ADDRESS *</label>
                            <input type="email" wire:model="contact_email" placeholder="john@example.com" class="w-full bg-slate-50 border border-slate-200/70 rounded-xl py-3 px-4 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            @error('contact_email') <span class="text-xs font-bold text-red-500 block mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- PHONE NUMBER -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">PHONE NUMBER *</label>
                            <input type="text" wire:model="contact_phone" placeholder="+977 9840000000" class="w-full bg-slate-50 border border-slate-200/70 rounded-xl py-3 px-4 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                            @error('contact_phone') <span class="text-xs font-bold text-red-500 block mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- SERVICE TYPE -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">SERVICE TYPE *</label>
                            <select wire:model="service_type" class="w-full bg-slate-50 border border-slate-200/70 rounded-xl py-3 px-4 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                <option value="General Inquiry">General Inquiry</option>
                                @foreach($services as $srv)
                                    <option value="{{ $srv['title'] }}">{{ $srv['title'] }}</option>
                                @endforeach
                            </select>
                            @error('service_type') <span class="text-xs font-bold text-red-500 block mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- MESSAGE DETAILS -->
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">MESSAGE DETAILS *</label>
                        <textarea wire:model="contact_message" rows="4" placeholder="Tell us more about your requirements..." class="w-full bg-slate-50 border border-slate-200/70 rounded-xl py-3 px-4 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200"></textarea>
                        @error('contact_message') <span class="text-xs font-bold text-red-500 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <!-- Centered Submit Button -->
                    <div class="text-center pt-2">
                        <button type="submit" wire:click="submitInquiry" class="w-full sm:w-auto px-10 py-3.5 bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider rounded-full shadow-lg shadow-orange-500/25 transition duration-200 inline-flex items-center justify-center gap-1.5">
                            <span>SEND INQUIRY</span>
                            <span>→</span>
                        </button>
                        <p class="text-[11px] text-slate-400 text-center mt-3 font-medium">We respect your privacy. No spam, just professional support.</p>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>
