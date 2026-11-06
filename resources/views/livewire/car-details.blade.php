<div class="bg-[#f8fafc] min-h-screen pt-24 pb-20" x-data="{ open: @entangle('show_booking_modal') }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Navigation Link -->
        <div class="mb-6">
            <a href="{{ route('vehicles.index') }}" class="inline-flex items-center space-x-2 text-xs font-extrabold text-[#FF6800] hover:underline uppercase tracking-wider">
                <span>←</span>
                <span>Back to Fleet</span>
            </a>
        </div>

        <!-- Main Detail Grid (Matching Reference Screenshot) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Column: Hero Image, Specs & Tiered Rates -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Hero Car Image Card -->
                <div class="bg-white border border-slate-200/90 rounded-[2rem] overflow-hidden relative shadow-lg">
                    <div class="h-[360px] sm:h-[420px] bg-slate-100 flex items-center justify-center relative">
                        @if($car->image_path && file_exists(public_path('storage/cars/' . $car->image_path)))
                            <img src="{{ asset('storage/cars/' . $car->image_path) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                        @elseif($car->image_path && file_exists(public_path('images/' . $car->image_path)))
                            <img src="{{ asset('images/' . $car->image_path) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('images/hero/hero1.png') }}" class="w-full h-full object-cover" alt="{{ $car->name }}">
                        @endif
                        
                        <!-- Top Left Badges -->
                        <div class="absolute top-5 left-5 flex gap-2">
                            <span class="px-3.5 py-1.5 bg-slate-900/90 backdrop-blur-md text-white text-[10px] font-extrabold uppercase tracking-widest rounded-xl shadow-sm">
                                {{ $car->category }}
                            </span>
                            <span class="px-3.5 py-1.5 bg-emerald-500/90 backdrop-blur-md text-white text-[10px] font-extrabold uppercase tracking-widest rounded-xl shadow-sm flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                <span>AVAILABLE</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Specifications Grid -->
                <div class="space-y-4">
                    <h2 class="font-outfit font-extrabold text-2xl text-slate-900">Specifications</h2>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-slate-100/80 border border-slate-200/70 p-4 rounded-2xl text-center space-y-1">
                            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">TRANSMISSION</span>
                            <span class="font-extrabold text-slate-900 text-sm block">{{ $car->transmission }}</span>
                        </div>
                        <div class="bg-slate-100/80 border border-slate-200/70 p-4 rounded-2xl text-center space-y-1">
                            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">CAPACITY</span>
                            <span class="font-extrabold text-slate-900 text-sm block">{{ $car->seats }} Seats</span>
                        </div>
                        <div class="bg-slate-100/80 border border-slate-200/70 p-4 rounded-2xl text-center space-y-1">
                            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">MILEAGE/RANGE</span>
                            <span class="font-extrabold text-slate-900 text-sm block">{{ $car->mileage_or_range }}</span>
                        </div>
                        <div class="bg-slate-100/80 border border-slate-200/70 p-4 rounded-2xl text-center space-y-1">
                            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">COLOR</span>
                            <span class="font-extrabold text-slate-900 text-sm block">{{ $car->color ?: 'White' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Tiered Rental Rates Box (Matching Reference Design) -->
                <div class="bg-slate-100/80 border border-slate-200/80 rounded-[2rem] p-6 lg:p-7 space-y-4 shadow-sm">
                    <div>
                        <h3 class="font-outfit font-extrabold text-xl text-slate-900">Tiered Rental Rates</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Our rates drop the longer you rent. Dynamic pricing is calculated automatically below.</p>
                    </div>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center pt-2">
                        <!-- DAILY TIER -->
                        <div class="p-4 bg-white border border-slate-200 rounded-2xl space-y-1 shadow-sm">
                            <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider block">DAILY (1-6D)</span>
                            <span class="font-extrabold text-slate-900 text-sm block">Rs. {{ number_format($car->pricingTier->daily_rate ?? 9000) }}</span>
                        </div>

                        <!-- WEEKLY TIER (Highlighted with VALUE Ribbon) -->
                        <div class="p-4 bg-[#FF6800] text-white rounded-2xl space-y-1 shadow-lg relative overflow-hidden">
                            <div class="absolute -right-6 top-2 bg-slate-950 text-white text-[8px] font-black uppercase tracking-widest px-6 py-0.5 rotate-45 shadow-sm">
                                VALUE
                            </div>
                            <span class="text-[9px] font-extrabold text-white/90 uppercase tracking-wider block">WEEKLY (7-14D)</span>
                            <span class="font-extrabold text-white text-sm block">Rs. {{ number_format($car->pricingTier->weekly_rate ?? 7857) }}</span>
                            <span class="text-[9px] font-extrabold text-white/95 block">Save 13%</span>
                        </div>

                        <!-- 15 DAYS TIER -->
                        <div class="p-4 bg-white border border-slate-200 rounded-2xl space-y-1 shadow-sm">
                            <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider block">15 DAYS (15-29D)</span>
                            <span class="font-extrabold text-slate-900 text-sm block">Rs. {{ number_format($car->pricingTier->biweekly_rate ?? 8333) }}</span>
                            <span class="text-[9px] font-extrabold text-amber-700 block">Save 7%</span>
                        </div>

                        <!-- MONTHLY TIER -->
                        <div class="p-4 bg-white border border-slate-200 rounded-2xl space-y-1 shadow-sm">
                            <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider block">MONTHLY (30D+)</span>
                            <span class="font-extrabold text-slate-900 text-sm block">Rs. {{ number_format($car->pricingTier->monthly_rate ?? 6667) }}</span>
                            <span class="text-[9px] font-extrabold text-emerald-600 block">Save 26%</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Sticky Interactive Booking Calculator Card (Exact Reference UI) -->
            <div class="lg:col-span-5">
                <div class="bg-white border border-slate-200/90 rounded-[2rem] p-7 shadow-xl sticky top-24 space-y-6">
                    <div>
                        <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">CAR RENTAL</span>
                        <h1 class="font-outfit font-extrabold text-3xl text-slate-900 mt-0.5">
                            {{ trim(preg_replace('/\s*\([^)]*\)/', '', $car->name)) }}
                        </h1>
                        <p class="text-xs text-slate-400 font-medium mt-1">Model Year: {{ $car->model_year }} &middot; Premium Condition</p>
                    </div>

                    @if($booking_success)
                        <!-- Success State Card -->
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-900 rounded-2xl p-6 text-center space-y-4 shadow-sm animate-fade-in-up">
                            <div class="w-12 h-12 bg-emerald-500 text-white rounded-2xl flex items-center justify-center mx-auto shadow-md font-bold text-lg">
                                ✓
                            </div>
                            <h3 class="font-outfit font-extrabold text-xl text-emerald-900">Booking Reserved!</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">Your reservation for <strong>{{ $car->name }}</strong> is confirmed in system.</p>
                            
                            <a href="{{ $whatsapp_link }}" target="_blank" rel="noopener" class="flex items-center justify-center space-x-2 w-full py-3 bg.emerald-600 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition duration-200 shadow-md">
                                <span>Confirm via WhatsApp</span>
                                <span>→</span>
                            </a>
                            <button wire:click="$set('booking_success', false)" class="text-xs text-slate-500 hover:text-slate-700 underline block mx-auto font-bold pt-1">Book Another Car</button>
                        </div>
                    @else
                        <!-- Booking Inputs & Pricing Form -->
                        <form wire:submit.prevent="openBookingModal" class="space-y-4">
                            
                            <!-- PICKUP LOCATION -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">PICKUP LOCATION</label>
                                <select wire:model="pickup_location" class="w-full bg-slate-100/80 border border-slate-200/70 rounded-xl py-2.5 px-3 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                    <option value="Kathmandu Airport (TIA)">Kathmandu Airport (TIA)</option>
                                    <option value="Bhaktapur Hub (Jagati)">Bhaktapur Hub (Jagati)</option>
                                    <option value="Kathmandu Branch (Lazimpat)">Kathmandu Branch (Lazimpat)</option>
                                    <option value="Doorstep Delivery (Kathmandu Valley)">Doorstep Delivery (Kathmandu Valley)</option>
                                </select>
                                @error('pickup_location') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- DROPOFF LOCATION -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">DROPOFF LOCATION</label>
                                <select wire:model="dropoff_location" class="w-full bg-slate-100/80 border border-slate-200/70 rounded-xl py-2.5 px-3 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                    <option value="Same as pickup">Same as pickup</option>
                                    <option value="Kathmandu Airport (TIA)">Kathmandu Airport (TIA)</option>
                                    <option value="Bhaktapur Hub (Jagati)">Bhaktapur Hub (Jagati)</option>
                                    <option value="Kathmandu Branch (Lazimpat)">Kathmandu Branch (Lazimpat)</option>
                                </select>
                                @error('dropoff_location') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- DATES ROW -->
                            <div class="grid grid-cols-2 gap-3">
                                <div class="space-y-1" x-data x-init="flatpickr($refs.pickup, {dateFormat: 'Y-m-d', minDate: 'today'})">
                                    <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">PICKUP DATE</label>
                                    <input x-ref="pickup" type="text" wire:model.live="pickup_date" min="{{ date('Y-m-d') }}" data-date-role="pickup" data-unavailable-dates='@json($unavailable_dates)' class="flatpickr-input w-full bg-slate-100/80 border border-slate-200/70 rounded-xl py-2 px-3 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                    @error('pickup_date') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                                </div>
                                <div class="space-y-1" x-data x-init="flatpickr($refs.return, {dateFormat: 'Y-m-d', minDate: 'today'})">
                                    <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">RETURN DATE</label>
                                    <input x-ref="return" type="text" wire:model.live="return_date" min="{{ date('Y-m-d', strtotime('+1 day')) }}" data-date-role="return" data-unavailable-dates='@json($unavailable_dates)' class="flatpickr-input w-full bg-slate-100/80 border border-slate-200/70 rounded-xl py-2 px-3 text-xs font-bold text-slate-800 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                                    @error('return_date') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Dynamic Price Calculation Output -->
                            @if($duration_days > 0)
                                <div class="bg-slate-100/80 border border-slate-200/70 rounded-2xl p-4 space-y-2.5">
                                    <div class="flex items-center justify-between text-xs text-slate-500 font-semibold">
                                        <span>Duration:</span>
                                        <span class="font-extrabold text-slate-900">{{ $duration_days }} Days</span>
                                    </div>
                                    <div class="flex items-center justify-between text-xs text-slate-500 font-semibold">
                                        <span>Applied Tier:</span>
                                        <span class="font-extrabold text-[#FF6800] uppercase tracking-wider text-[10px]">{{ $rate_tier_name }}</span>
                                    </div>
                                    <div class="flex items-center justify-between text-xs text-slate-500 font-semibold pt-1 border-t border-slate-200/60">
                                        <span>Rate per day:</span>
                                        <span class="font-extrabold text-slate-800">Rs. {{ number_format($applied_rate) }}</span>
                                    </div>
                                    <div class="flex items-center justify-between pt-2 border-t border-slate-200/60">
                                        <span class="font-extrabold text-slate-800 text-sm">Total Price:</span>
                                        <span class="text-2xl font-extrabold text-[#FF6800] font-outfit">Rs. {{ number_format($total_price) }}</span>
                                    </div>
                                </div>

                                <button type="submit" class="w-full py-3.5 bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-orange-500/25 transition duration-200 flex items-center justify-center gap-1.5">
                                    <span>Proceed to Book</span>
                                    <span>›</span>
                                </button>
                            @else
                                <div class="bg-slate-100/80 border border-slate-200/70 rounded-2xl p-4 text-center text-xs font-semibold text-slate-500">
                                    Please select valid dates to calculate pricing.
                                </div>
                            @endif

                        </form>
                    @endif

                </div>
            </div>

        </div>
    </div>

    <!-- Booking Details Confirmation Modal -->
    @if($show_booking_modal)
        <div class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fade-in-up">
            <div class="bg-white border border-slate-200 rounded-[2.5rem] p-8 sm:p-10 shadow-2xl max-w-lg w-full relative space-y-6">
                
                <button wire:click="$set('show_booking_modal', false)" class="absolute top-6 right-6 w-9 h-9 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 flex items-center justify-center font-bold text-base transition">
                    ✕
                </button>

                <div class="space-y-1">
                    <span class="text-[10px] font-extrabold text-orange-600 uppercase tracking-widest block">FINAL STEP</span>
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Confirm Booking Request</h3>
                    <p class="text-slate-500 text-xs">Enter your contact info to complete the reservation for {{ $car->name }}.</p>
                </div>

                <!-- Booking Summary Card -->
                <div class="bg-slate-50 border border-slate-200 p-4 rounded-2xl text-xs space-y-2 text-slate-600">
                    <div class="flex justify-between"><span>Vehicle:</span><span class="font-extrabold text-slate-900">{{ $car->name }}</span></div>
                    <div class="flex justify-between"><span>Duration:</span><span class="font-extrabold text-slate-900">{{ $duration_days }} Days ({{ $pickup_date }} to {{ $return_date }})</span></div>
                    <div class="flex justify-between"><span>Pickup Location:</span><span class="font-extrabold text-slate-900">{{ $pickup_location }}</span></div>
                    <div class="flex justify-between border-t border-slate-200 pt-2 font-bold text-slate-900"><span>Total Calculated Price:</span><span class="font-extrabold text-[#FF6800] text-sm">Rs. {{ number_format($total_price) }}</span></div>
                </div>

                <form wire:submit.prevent="confirmBooking" class="space-y-4">
                    <!-- FULL NAME -->
                    <div class="space-y-1 text-left">
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">FULL NAME *</label>
                        <input type="text" wire:model="customer_name" placeholder="John Doe" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                        @error('customer_name') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- EMAIL ADDRESS -->
                    <div class="space-y-1 text-left">
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">EMAIL ADDRESS *</label>
                        <input type="email" wire:model="customer_email" placeholder="john@example.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                        @error('customer_email') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- PHONE NUMBER -->
                    <div class="space-y-1 text-left">
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block">PHONE NUMBER *</label>
                        <input type="tel" wire:model="customer_phone" placeholder="+977 9840000000" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-xs font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                        @error('customer_phone') <span class="text-xs font-bold text-red-500 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-3 pt-2">
                        <button type="button" wire:click="$set('show_booking_modal', false)" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold text-xs hover:bg-slate-100 transition">
                            Cancel
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#FF6800] hover:bg-orange-600 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg shadow-orange-500/25 transition">
                            Confirm &amp; Proceed ›
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const unavailableDates = @json($unavailable_dates);

        const blockInvalidDate = (field) => {
            const selectedDate = field.value;
            if (!selectedDate || !unavailableDates.includes(selectedDate)) {
                return;
            }

            field.setCustomValidity('This date is unavailable for this vehicle.');
            field.reportValidity();
            field.value = '';
            return false;
        };

        document.querySelectorAll('[data-date-role]').forEach((field) => {
            field.addEventListener('change', function () {
                if (field.value && unavailableDates.includes(field.value)) {
                    blockInvalidDate(field);
                }
            });
        });
    });
</script>
