<div class="bg-[#f8fafc] min-h-screen pt-10 lg:pt-14 pb-20">
    <!-- 1. Hero Header Section (Matching Reference Screenshot) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-5 text-left animate-fade-in-up">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 bg-orange-50 border border-orange-200/80 rounded-full text-orange-600 font-extrabold text-[10px] uppercase tracking-wider shadow-sm">
                    <span>SUPPORT CENTER</span>
                </div>

                <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl lg:text-6xl text-slate-900 leading-[1.15] tracking-tight">
                    We're Here to Keep <br>
                    <span class="text-[#FF6800]">Your Journey Moving.</span>
                </h1>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed font-medium max-w-xl">
                    Our dedicated support team is available 24/7 to assist with bookings, vehicle inquiries, and roadside emergencies across Nepal.
                </p>

                <!-- Live Agents Status Strip -->
                <div class="flex items-center space-x-3 pt-2">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[10px] font-bold text-slate-700 shadow-sm">💬</div>
                        <div class="w-8 h-8 rounded-full bg-orange-100 border-2 border-white flex items-center justify-center text-[10px] font-bold text-orange-600 shadow-sm">🎧</div>
                        <div class="w-8 h-8 rounded-full bg-[#FF6800] border-2 border-white flex items-center justify-center text-[10px] font-bold text-white shadow-sm">⚡</div>
                    </div>
                    <div class="text-xs">
                        <span class="font-extrabold text-slate-900 block">15+ Agents online now</span>
                        <span class="text-slate-400 font-medium">Average response time: <strong class="text-[#FF6800]">2 mins</strong></span>
                    </div>
                </div>
            </div>

            <!-- Right Hero Floating Feature Card -->
            <div class="lg:col-span-5 relative">
                <div class="bg-white border border-slate-200/90 rounded-3xl p-8 shadow-xl text-center space-y-4 max-w-sm ml-auto relative overflow-hidden group">
                    <div class="w-14 h-14 rounded-2xl bg-orange-50 text-[#FF6800] border border-orange-200/80 flex items-center justify-center mx-auto shadow-sm group-hover:scale-110 transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-outfit font-extrabold text-xl text-slate-900">Verified Support</h3>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed">Industry-leading response times and roadside protection across Nepal.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- 2. Main Contact Grid (3 Quick Cards on Left, Form on Right) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Contact Info Cards -->
            <div class="lg:col-span-5 space-y-4">
                
                <!-- WhatsApp Card -->
                <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener"
                   class="bg-white border border-slate-200/90 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition duration-200 block group relative">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500 group-hover:text-white transition duration-200 shadow-sm">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.5-5.739-1.451L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.57 1.986 14.105.965 11.486.965c-5.44 0-9.866 4.372-9.87 9.802 0 1.634.45 3.228 1.302 4.62l-.37 1.354-.74 2.704.03.03 2.77-.723.95-.248zm12.355-6.666c-.33-.164-1.94-.954-2.24-1.063-.3-.11-.52-.164-.74.164-.22.328-.85 1.063-1.04 1.281-.19.219-.38.246-.71.082-.33-.164-1.39-.512-2.648-1.633-.98-.873-1.64-1.952-1.83-2.28-.19-.328-.02-.505.14-.668.15-.148.33-.328.5-.492.17-.164.22-.273.33-.45.11-.18.05-.328-.02-.492-.08-.164-.74-1.782-1.01-2.434-.27-.65-.54-.56-.74-.57l-.63-.01c-.22 0-.58.082-.88.41-.3.328-1.15 1.12-1.15 2.732 0 1.612 1.17 3.17 1.33 3.388.16.219 2.3 3.511 5.57 4.92.78.336 1.39.537 1.86.685.78.247 1.49.212 2.05.128.62-.093 1.94-.793 2.22-1.557.27-.764.27-1.42.19-1.557-.08-.137-.3-.219-.63-.383z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-outfit font-extrabold text-base text-slate-900 leading-tight">WhatsApp</h3>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">Fast response support</p>
                                <p class="text-xs font-extrabold text-slate-900 mt-1">+977 9840002796</p>
                            </div>
                        </div>
                        <span class="text-slate-400 group-hover:text-emerald-600 group-hover:translate-x-1 transition font-bold">→</span>
                    </div>
                </a>

                <!-- Direct Call Card -->
                <a href="tel:+9779840002796"
                   class="bg-white border border-slate-200/90 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition duration-200 block group relative">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 group-hover:text-white transition duration-200 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-outfit font-extrabold text-base text-slate-900 leading-tight">Direct Call</h3>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">24/7 Hotline support</p>
                                <p class="text-xs font-extrabold text-slate-900 mt-1">+977 9840002796</p>
                            </div>
                        </div>
                        <span class="text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition font-bold">→</span>
                    </div>
                </a>

                <!-- Email Support Card -->
                <a href="mailto:rosnaghemoshu18@gmail.com"
                   class="bg-white border border-slate-200/90 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition duration-200 block group relative">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-11 h-11 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 group-hover:bg-[#FF6800] group-hover:text-white transition duration-200 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-outfit font-extrabold text-base text-slate-900 leading-tight">Email Support</h3>
                                <p class="text-[11px] text-slate-400 font-medium mt-0.5">Corporate & Fleet inquiries</p>
                                <p class="text-xs font-extrabold text-slate-900 mt-1">rosnaghemoshu18@gmail.com</p>
                            </div>
                        </div>
                        <span class="text-slate-400 group-hover:text-[#FF6800] group-hover:translate-x-1 transition font-bold">→</span>
                    </div>
                </a>

            </div>

            <!-- Right Interactive Contact Form (Matching Reference Screenshot) -->
            <div class="lg:col-span-7 bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-10 shadow-xl relative">
                <h2 class="font-outfit font-extrabold text-2xl text-slate-900 mb-1">Send a Message</h2>
                <p class="text-xs text-slate-400 font-medium mb-6">Fill out the form below and our team will get back to you within 2 business hours.</p>

                @if($success_message)
                    <div class="p-8 bg-emerald-50 border border-emerald-200 rounded-2xl text-emerald-800 space-y-3 text-center animate-fade-in-up">
                        <div class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center mx-auto shadow-md font-extrabold text-xl">
                            ✓
                        </div>
                        <h3 class="font-outfit font-extrabold text-2xl text-emerald-900">Message Received!</h3>
                        <p class="text-slate-600 text-sm max-w-md mx-auto leading-relaxed">Thank you for getting in touch with Journey Begins Car Rental. Our team will review your message and reply via phone or email shortly.</p>
                    </div>
                @else
                    <form wire:submit.prevent="submit" class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- FULL NAME -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">FULL NAME *</label>
                                <input type="text" wire:model="name" placeholder="e.g. John Doe" class="w-full bg-slate-50 border border-slate-200/80 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                @error('name') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- EMAIL ADDRESS -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">EMAIL ADDRESS *</label>
                                <input type="email" wire:model="email" placeholder="john@company.com" class="w-full bg-slate-50 border border-slate-200/80 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                @error('email') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- PHONE NUMBER -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">PHONE NUMBER *</label>
                                <input type="text" wire:model="phone" placeholder="+977 98XXXXXXX" class="w-full bg-slate-50 border border-slate-200/80 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                @error('phone') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- SUBJECT -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">SUBJECT</label>
                                <select wire:model="subject" class="w-full bg-slate-50 border border-slate-200/80 rounded-xl py-2.5 px-3 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                    <option value="General Inquiry">General Inquiry</option>
                                    <option value="Car Rental Reservation">Car Rental Reservation</option>
                                    <option value="Wedding Convoy & Decor">Wedding Convoy & Decor</option>
                                    <option value="Corporate Fleet Leasing">Corporate Fleet Leasing</option>
                                    <option value="Airport Pickup Transfer">Airport Pickup Transfer</option>
                                </select>
                                @error('subject') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- HOW CAN WE HELP? -->
                        <div class="space-y-1">
                            <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">HOW CAN WE HELP? *</label>
                            <textarea wire:model="message" rows="4" placeholder="Share your thoughts or questions here..." class="w-full bg-slate-50 border border-slate-200/80 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200"></textarea>
                            @error('message') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Black Submit Button Matching Reference Screenshot -->
                        <div class="pt-2">
                            <button type="submit" wire:loading.attr="disabled" class="btn-shine w-full sm:w-auto justify-center px-8 py-3.5 bg-slate-900 hover:bg-orange-500 disabled:opacity-70 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg transition duration-200 flex items-center gap-2">
                                <span wire:loading.remove wire:target="submit">SEND MESSAGE</span><span wire:loading wire:target="submit">SENDING...</span>
                                <span class="text-[10px]">⯈</span>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <!-- 3. Bottom "Visit our Hubs" & Map Section (Matching Reference Screenshot) -->
        <div class="mt-16 bg-slate-100/70 border border-slate-200/80 rounded-[2.5rem] p-6 sm:p-10 lg:p-12 shadow-sm gsap-reveal">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left Text Content -->
                <div class="lg:col-span-5 space-y-6 text-left">
                    <div>
                        <h2 class="font-outfit font-extrabold text-3xl text-slate-900">Visit our Hubs</h2>
                        <p class="text-slate-500 text-xs sm:text-sm font-medium mt-1">Our physical branches are equipped with our latest fleet for on-site inspection and personalized consultation.</p>
                    </div>

                    <div class="space-y-5">
                        <!-- Bhaktapur Main Hub -->
                        <div class="flex items-start space-x-3.5">
                            <div class="w-9 h-9 rounded-xl bg-orange-100/80 text-orange-600 flex items-center justify-center flex-shrink-0 mt-0.5 text-base shadow-sm">
                                📍
                            </div>
                            <div>
                                <h4 class="font-outfit font-extrabold text-base text-slate-900">Bhaktapur Main Hub</h4>
                                <p class="text-xs text-slate-500 font-medium mt-0.5">Near Siddhapokhari, Bhaktapur 44800, Nepal</p>
                                <span class="inline-block mt-1 text-[#FF6800] text-[10px] font-extrabold">▪ 09:00 AM - 08:00 PM</span>
                            </div>
                        </div>

                        <!-- Kathmandu City Branch -->
                        <div class="flex items-start space-x-3.5">
                            <div class="w-9 h-9 rounded-xl bg-orange-100/80 text-orange-600 flex items-center justify-center flex-shrink-0 mt-0.5 text-base shadow-sm">
                                📍
                            </div>
                            <div>
                                <h4 class="font-outfit font-extrabold text-base text-slate-900">Kathmandu City Branch</h4>
                                <p class="text-xs text-slate-500 font-medium mt-0.5">Lazimpat, Kathmandu 44600, Nepal</p>
                                <span class="inline-block mt-1 text-[#FF6800] text-[10px] font-extrabold">▪ 09:00 AM - 07:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Interactive Map Frame (Matching Reference Screenshot) -->
                <div class="lg:col-span-7 relative">
                    <div class="bg-slate-200 border-4 border-white shadow-2xl rounded-3xl overflow-hidden relative h-[360px] group">
                        <iframe 
                            src="https://maps.google.com/maps?q=Siddhapokhari%2C%20Bhaktapur%2C%20Nepal&z=13&output=embed"
                            title="Journey Begins hubs map" 
                            class="w-full h-full border-0 filter contrast-105 group-hover:scale-[1.02] transition duration-700" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                        <!-- Bottom-right status badge overlay -->
                        <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-md border border-slate-200/80 rounded-xl px-3.5 py-1.5 shadow-lg text-[10px] font-extrabold text-slate-800 flex items-center gap-2 z-10">
                            <span class="relative flex w-2 h-2"><span class="absolute inline-flex w-full h-full rounded-full bg-emerald-400 animate-ping"></span><span class="relative inline-flex w-2 h-2 rounded-full bg-emerald-500"></span></span>
                            <span>ALL BRANCHES ACTIVE</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- 4. FAQ -->
    <section id="faq" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-28">
        <div class="text-center mb-10 gsap-reveal">
            <span class="text-[11px] font-extrabold text-orange-600 uppercase tracking-widest">Good to know</span>
            <h2 class="font-outfit font-extrabold text-3xl sm:text-4xl text-slate-900 mt-2">Frequently Asked Questions</h2>
            <p class="text-slate-500 text-sm mt-3">Quick answers about renting with Journey Begins.</p>
        </div>
        <div class="space-y-3 gsap-stagger-container">
                <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition gsap-stagger-item" x-data="{ open: true }">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-4 text-left px-5 sm:px-6 py-4" :aria-expanded="open">
                        <span class="font-outfit font-bold text-sm sm:text-base text-slate-900">What documents do I need to rent a self-drive car?</span>
                        <span class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open && 'rotate-45 bg-orange-500 text-white'">+</span>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 sm:px-6 pb-5 text-sm text-slate-600 leading-relaxed">A valid driving licence (Nepali or international permit), a citizenship card or passport, and a refundable security deposit. We confirm everything on WhatsApp before pickup.</p>
                    </div>
                </div>
                <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition gsap-stagger-item" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-4 text-left px-5 sm:px-6 py-4" :aria-expanded="open">
                        <span class="font-outfit font-bold text-sm sm:text-base text-slate-900">Can I rent a car with a driver?</span>
                        <span class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open && 'rotate-45 bg-orange-500 text-white'">+</span>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 sm:px-6 pb-5 text-sm text-slate-600 leading-relaxed">Yes. Every vehicle in our fleet can be booked with an experienced, English-speaking driver for city trips, highway tours and airport transfers.</p>
                    </div>
                </div>
                <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition gsap-stagger-item" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-4 text-left px-5 sm:px-6 py-4" :aria-expanded="open">
                        <span class="font-outfit font-bold text-sm sm:text-base text-slate-900">How do long-term discounts work?</span>
                        <span class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open && 'rotate-45 bg-orange-500 text-white'">+</span>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 sm:px-6 pb-5 text-sm text-slate-600 leading-relaxed">Rates are applied automatically by duration: daily, weekly (7+ days), bi-weekly (15+ days) and monthly (30+ days). The booking calculator shows your exact total before you confirm.</p>
                    </div>
                </div>
                <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition gsap-stagger-item" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-4 text-left px-5 sm:px-6 py-4" :aria-expanded="open">
                        <span class="font-outfit font-bold text-sm sm:text-base text-slate-900">Do you deliver cars to the airport or my hotel?</span>
                        <span class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open && 'rotate-45 bg-orange-500 text-white'">+</span>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 sm:px-6 pb-5 text-sm text-slate-600 leading-relaxed">We offer pickup and drop-off at Tribhuvan International Airport and across Kathmandu, Lalitpur and Bhaktapur. Delivery to other cities can be arranged on request.</p>
                    </div>
                </div>
                <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition gsap-stagger-item" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-4 text-left px-5 sm:px-6 py-4" :aria-expanded="open">
                        <span class="font-outfit font-bold text-sm sm:text-base text-slate-900">What is your cancellation policy?</span>
                        <span class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open && 'rotate-45 bg-orange-500 text-white'">+</span>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 sm:px-6 pb-5 text-sm text-slate-600 leading-relaxed">Pending bookings can be cancelled for free from your dashboard. For confirmed bookings, contact us at least 24 hours before pickup and we will help you reschedule or cancel.</p>
                    </div>
                </div>
                <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm hover:shadow-md transition gsap-stagger-item" x-data="{ open: false }">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between gap-4 text-left px-5 sm:px-6 py-4" :aria-expanded="open">
                        <span class="font-outfit font-bold text-sm sm:text-base text-slate-900">How do I charge an EV during my trip?</span>
                        <span class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center flex-shrink-0 transition-transform duration-300" :class="open && 'rotate-45 bg-orange-500 text-white'">+</span>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms x-cloak>
                        <p class="px-5 sm:px-6 pb-5 text-sm text-slate-600 leading-relaxed">Our EVs come fully charged with a charging cable. We share a list of fast-charging stations along your route so you never run out of range.</p>
                    </div>
                </div>
        </div>
    </section>
</div>
