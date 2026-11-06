<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Dashboard Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10 pb-6 border-b border-slate-900">
        <div>
            <h1 class="font-outfit font-black text-3xl text-white">My Dashboard</h1>
            <p class="text-xs text-slate-500 mt-1">Logged in as: <strong class="text-slate-300">{{ Auth::user()->name }}</strong> ({{ Auth::user()->email }})</p>
        </div>
        
        <div>
            <a href="{{ route('home') }}#vehicles" class="px-5 py-2.5 bg-gradient-to-r from-orange-600 to-amber-500 text-slate-950 font-bold text-xs rounded-xl hover:from-orange-500 hover:to-amber-400 transition transform hover:-translate-y-0.5 shadow-md shadow-orange-500/10">
                Rent Another Car
            </a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl p-4 text-sm flex items-center space-x-2">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <!-- Bookings Table/List -->
    <div class="bg-slate-900 border border-slate-900 rounded-[2rem] p-6 lg:p-8 shadow-xl">
        <h2 class="font-outfit font-bold text-xl text-white mb-6">Booking History</h2>
        
        @if($bookings->isEmpty())
            <div class="text-center py-12 border border-dashed border-slate-800 rounded-2xl">
                <svg class="w-12 h-12 text-slate-700 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h3 class="font-semibold text-white mt-4">No Bookings Yet</h3>
                <p class="text-slate-500 text-xs mt-1">Your rental reservations will show up here once you make them.</p>
            </div>
        @else
            <!-- Desktop Layout Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-400">
                    <thead class="text-xs uppercase tracking-wider text-slate-500 border-b border-slate-950">
                        <tr>
                            <th class="py-4 px-4">Car</th>
                            <th class="py-4 px-4">Duration</th>
                            <th class="py-4 px-4">Locations</th>
                            <th class="py-4 px-4">Total Cost</th>
                            <th class="py-4 px-4">Status</th>
                            <th class="py-4 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-950">
                        @foreach($bookings as $booking)
                            <tr class="hover:bg-slate-950/30 transition">
                                <td class="py-4 px-4">
                                    <div class="font-bold text-white">{{ $booking->car->name }}</div>
                                    <div class="text-[10px] text-slate-500">Year: {{ $booking->car->model_year }}</div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-medium text-slate-300">{{ $booking->start_date }} to {{ $booking->end_date }}</div>
                                    <div class="text-[10px] text-slate-500">{{ $booking->duration_days }} days</div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="text-xs">Pickup: <span class="text-slate-300 font-medium">{{ $booking->pickup_location }}</span></div>
                                    <div class="text-xs">Dropoff: <span class="text-slate-300 font-medium">{{ $booking->dropoff_location }}</span></div>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-white font-outfit">Rs. {{ number_format($booking->total_price) }}</div>
                                </td>
                                <td class="py-4 px-4">
                                    @if($booking->status == 'pending')
                                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending</span>
                                    @elseif($booking->status == 'confirmed')
                                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Confirmed</span>
                                    @elseif($booking->status == 'cancelled')
                                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg bg-red-500/10 text-red-400 border border-red-500/20">Cancelled</span>
                                    @else
                                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg bg-slate-800 text-slate-400">{{ $booking->status }}</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        @if($booking->status == 'pending')
                                            <!-- WhatsApp Chat CTA -->
                                            <a href="{{ $this->getWhatsappLink($booking) }}" target="_blank" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs rounded-lg transition flex items-center space-x-1.5">
                                                <span>Verify</span>
                                            </a>
                                            <!-- Cancel button -->
                                            <button wire:click="cancelBooking({{ $booking->id }})" wire:confirm="Are you sure you want to cancel this booking?" class="text-xs text-red-400 hover:text-red-300 font-medium transition">
                                                Cancel
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Layout Grid cards -->
            <div class="md:hidden space-y-4">
                @foreach($bookings as $booking)
                    <div class="bg-slate-950 border border-slate-900 rounded-2xl p-5 space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-900 pb-3">
                            <div>
                                <h3 class="font-bold text-white text-base leading-tight">{{ $booking->car->name }}</h3>
                                <span class="text-[10px] text-slate-500">Year: {{ $booking->car->model_year }}</span>
                            </div>
                            
                            @if($booking->status == 'pending')
                                <span class="px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider rounded bg-amber-500/10 text-amber-400 border border-amber-500/10">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/10">Confirmed</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="px-2 py-0.5 text-[9px] font-bold uppercase tracking-wider rounded bg-red-500/10 text-red-400 border border-red-500/10">Cancelled</span>
                            @endif
                        </div>

                        <div class="space-y-1.5 text-xs text-slate-400">
                            <div>Dates: <span class="text-slate-200 font-medium">{{ $booking->start_date }} to {{ $booking->end_date }}</span> ({{ $booking->duration_days }} days)</div>
                            <div>Pickup: <span class="text-slate-200 font-medium">{{ $booking->pickup_location }}</span></div>
                            <div>Dropoff: <span class="text-slate-200 font-medium">{{ $booking->dropoff_location }}</span></div>
                            <div class="pt-2 border-t border-slate-900 flex justify-between items-baseline">
                                <span>Total Price:</span>
                                <span class="font-bold text-white font-outfit text-base">Rs. {{ number_format($booking->total_price) }}</span>
                            </div>
                        </div>

                        @if($booking->status == 'pending')
                            <div class="grid grid-cols-2 gap-3 pt-2">
                                <a href="{{ $this->getWhatsappLink($booking) }}" target="_blank" class="w-full py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-center text-xs rounded-lg transition block">
                                    Verify on WhatsApp
                                </a>
                                <button wire:click="cancelBooking({{ $booking->id }})" wire:confirm="Are you sure you want to cancel this booking?" class="w-full py-2 bg-slate-900 border border-slate-800 text-red-400 hover:text-red-300 font-bold text-xs rounded-lg transition">
                                    Cancel Booking
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
