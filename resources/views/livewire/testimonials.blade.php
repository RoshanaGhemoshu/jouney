<div class="bg-[#f8fafc] min-h-screen pt-10 lg:pt-14 pb-20">
    <!-- 1. Hero Header Section (Matching Reference Design) -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12 animate-fade-in-up">
        <div class="inline-flex items-center space-x-2 px-4 py-1.5 bg-amber-50 border border-amber-200/80 rounded-full text-amber-800 font-extrabold text-[11px] uppercase tracking-wider mb-4 shadow-sm">
            <span class="text-amber-500">★★★★★</span>
            <span>4.9 / 5 AVERAGE RATING • VERIFIED STORIES</span>
        </div>

        <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl lg:text-6xl text-slate-900 leading-tight tracking-tight">
            Loved by Thousands of Drivers & <br>
            <span class="text-[#FF6800]">Travelers Across Nepal</span>
        </h1>

        <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed mt-4 font-medium">
            Read real experiences from tourists, locals, and corporate clients who chose Journey Begins for highway road trips, EV rentals, and executive travel.
        </p>
    </div>

    <!-- 2. Category Filter Bar + "+ Write a Review" Button -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white/95 backdrop-blur-xl border border-slate-200/80 rounded-2xl p-4 shadow-xl shadow-slate-200/40 flex flex-wrap items-center justify-between gap-4">
            
            <!-- Category Tabs -->
            <div class="flex flex-wrap items-center gap-2">
                <button wire:click="setCategory('all')"
                        class="px-5 py-2.5 rounded-full text-xs font-extrabold transition duration-200 {{ $activeCategory === 'all' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                    🌟 All Reviews
                </button>
                <button wire:click="setCategory('self_drive')"
                        class="px-5 py-2.5 rounded-full text-xs font-extrabold transition duration-200 {{ $activeCategory === 'self_drive' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                    🚗 Self-Drive Cars
                </button>
                <button wire:click="setCategory('ev')"
                        class="px-5 py-2.5 rounded-full text-xs font-extrabold transition duration-200 {{ $activeCategory === 'ev' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                    ⚡ EV Rentals
                </button>
                <button wire:click="setCategory('suv')"
                        class="px-5 py-2.5 rounded-full text-xs font-extrabold transition duration-200 {{ $activeCategory === 'suv' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                    🏔️ 4WD SUVs
                </button>
                <button wire:click="setCategory('with_driver')"
                        class="px-5 py-2.5 rounded-full text-xs font-extrabold transition duration-200 {{ $activeCategory === 'with_driver' ? 'bg-[#FF6800] text-white shadow-md shadow-orange-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' }}">
                    👔 Chauffeur Driven
                </button>
            </div>

            <!-- "+ Write a Review" Button -->
            <div>
                <button wire:click="openModal" class="px-5 py-2.5 rounded-full bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg shadow-orange-500/25 transition duration-200 flex items-center gap-2 transform hover:-translate-y-0.5">
                    <span class="text-base leading-none">+</span>
                    <span>Write a Review</span>
                </button>
            </div>

        </div>
    </div>

    <!-- 3. Success Notification Message -->
    @if ($success_message)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 animate-fade-in-up">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl p-5 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3 font-bold text-sm">
                    <span class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center font-black text-xs">✓</span>
                    <span>Thank you! Your review has been submitted and is now published below.</span>
                </div>
                <button wire:click="$set('success_message', false)" class="text-emerald-600 hover:text-emerald-900 font-bold text-xs">Dismiss</button>
            </div>
        </div>
    @endif

    <!-- 4. Testimonials Cards Grid (Exact Match to Screenshot) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @forelse($testimonials as $item)
                <div wire:key="testimonial-{{ $loop->index }}-{{ $activeCategory }}" class="bg-white border border-slate-200/90 rounded-[2rem] p-6 sm:p-7 shadow-lg hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group animate-fade-in-up" style="animation-delay: {{ min($loop->index, 8) * 60 }}ms">
                    <div class="space-y-4">
                        <!-- Star Rating & Vehicle Badge -->
                        <div class="flex items-center justify-between">
                            <div class="flex text-amber-400 space-x-1">
                                @for($i = 0; $i < $item['rating']; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-extrabold uppercase tracking-wider rounded-lg">
                                {{ strtoupper($item['car']) }}
                            </span>
                        </div>

                        <!-- Review Quote Text -->
                        <p class="text-slate-700 text-xs sm:text-sm leading-relaxed font-medium min-h-[72px]">
                            "{{ $item['review'] }}"
                        </p>
                    </div>

                    <!-- Author Footer -->
                    <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 text-white flex items-center justify-center flex-shrink-0 shadow-sm font-outfit font-bold text-sm" aria-hidden="true">
                                {{ collect(explode(' ', $item['name']))->filter()->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->implode('') }}
                            </div>
                            <div>
                                <h4 class="font-outfit font-extrabold text-xs text-slate-900 leading-tight group-hover:text-[#FF6800] transition duration-200">{{ $item['name'] }}</h4>
                                <p class="text-[10px] text-slate-400 font-medium mt-0.5">{{ $item['role'] }}</p>
                            </div>
                        </div>
                        <span class="text-[10px] text-slate-400 font-bold bg-slate-50 px-2 py-1 rounded-md">{{ $item['date'] }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center bg-white border border-slate-200/90 rounded-[2rem] shadow-sm space-y-4">
                    <svg class="w-14 h-14 text-slate-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.961 0 1.36 1.246.6 1.83l-3.97 2.887a1 1 0 00-.364 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.971-2.887a1 1 0 00-1.17 0l-3.97 2.887c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118L2.05 9.444c-.76-.584-.36-1.83.6-1.83h4.909a1 1 0 00.95-.69l1.518-4.674z"/></svg>
                    <h3 class="font-outfit font-extrabold text-xl text-slate-800">No Reviews Found in This Category</h3>
                    <p class="text-slate-500 text-xs">Be the first traveler to write a review!</p>
                    <button wire:click="openModal" class="px-6 py-2.5 bg-[#FF6800] text-white font-bold text-xs rounded-xl hover:bg-orange-600 transition shadow-md">
                        + Write First Review
                    </button>
                </div>
            @endforelse
        </div>
    </div>

    <!-- 5. Bottom CTA Banner (Matching Reference Screenshot) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-slate-200 via-slate-100 to-amber-50 rounded-[2.5rem] p-8 sm:p-14 text-slate-900 flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl border border-slate-300/70 relative overflow-hidden">
            <div class="space-y-3 text-center md:text-left z-10 max-w-xl">
                <span class="px-3.5 py-1 bg-amber-200/80 text-amber-900 font-extrabold text-[10px] uppercase tracking-widest rounded-full inline-block">
                    SEAMLESS ONLINE BOOKING
                </span>
                <h3 class="font-outfit font-extrabold text-3xl sm:text-4xl leading-tight">Ready for Your Next Road Trip in Nepal?</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Choose your preferred self-drive or driver rental in under 2 minutes with instant confirmation.</p>
            </div>
            
            <div class="flex flex-wrap items-center justify-center gap-4 z-10">
                <a href="{{ route('vehicles.index') }}"
                   class="px-8 py-3.5 bg-[#8B4513] hover:bg-[#6F360E] text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-lg shadow-amber-900/20 flex items-center gap-1.5">
                    <span>Browse All Cars</span>
                    <span>→</span>
                </a>
                <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener"
                   class="px-6 py-3.5 bg-white border border-slate-300 text-slate-800 font-extrabold text-xs rounded-xl transition duration-200 hover:bg-slate-50 flex items-center gap-2 shadow-sm">
                    <span class="text-emerald-500 font-bold">💬</span>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 6. Review Submission Modal Overlay -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in-up">
            <div class="bg-white border border-slate-200 rounded-[2.5rem] p-8 sm:p-10 shadow-2xl max-w-lg w-full relative space-y-6">
                
                <!-- Close Button -->
                <button wire:click="closeModal" class="absolute top-6 right-6 w-9 h-9 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 flex items-center justify-center font-bold text-base transition">
                    ✕
                </button>

                <div class="space-y-1">
                    <span class="text-[10px] font-extrabold text-orange-600 uppercase tracking-widest block">SHARE YOUR EXPERIENCE</span>
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Write Your Review</h3>
                    <p class="text-slate-500 text-xs">Your honest feedback helps thousands of travelers in Nepal.</p>
                </div>

                <div class="space-y-4 text-left">
                    <!-- FULL NAME -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">YOUR NAME *</label>
                        <input type="text" wire:model="name" placeholder="e.g. Suman Thapa" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                        @error('name') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- ROLE / LOCATION -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">ROLE / LOCATION *</label>
                        <input type="text" wire:model="role" placeholder="e.g. Software Engineer, Kathmandu or Tourist from UK" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                        @error('role') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- VEHICLE RENTED -->
                        <div class="space-y-1">
                            <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">VEHICLE RENTED *</label>
                            <input type="text" wire:model="car_model" placeholder="e.g. BYD Atto 3 EV" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                            @error('car_model') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- CATEGORY -->
                        <div class="space-y-1">
                            <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">CATEGORY *</label>
                            <select wire:model="category" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                                <option value="self_drive">Self-Drive Cars</option>
                                <option value="ev">EV Rentals</option>
                                <option value="suv">4WD SUVs</option>
                                <option value="with_driver">Chauffeur Driven</option>
                            </select>
                            @error('category') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- STAR RATING SELECTOR -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">YOUR RATING *</label>
                        <div class="flex items-center space-x-2 text-2xl text-amber-400">
                            @for($star = 1; $star <= 5; $star++)
                                <button type="button" wire:click="setRating({{ $star }})" class="focus:outline-none transition transform hover:scale-125">
                                    {{ $star <= $rating ? '★' : '☆' }}
                                </button>
                            @endfor
                        </div>
                    </div>

                    <!-- REVIEW TEXT -->
                    <div class="space-y-1">
                        <label class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest block">YOUR REVIEW *</label>
                        <textarea wire:model="review" rows="4" placeholder="Tell us about your experience, vehicle condition, highway performance, driver support..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition"></textarea>
                        @error('review') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end space-x-3 pt-2">
                    <button wire:click="closeModal" type="button" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold text-xs hover:bg-slate-100 transition">
                        Cancel
                    </button>
                    <button wire:click="submitReview" type="button" class="px-6 py-2.5 rounded-xl bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg shadow-orange-500/25 transition">
                        Submit Review →
                    </button>
                </div>

            </div>
        </div>
    @endif
</div>
