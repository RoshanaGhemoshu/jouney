<x-layouts.app title="Terms & Conditions - Journey Begins Car Rental">
    <div class="bg-[#f8fafc] min-h-screen pt-10 lg:pt-14 pb-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 animate-fade-in-up">
                <span class="text-[11px] font-extrabold text-orange-600 uppercase tracking-widest">Legal</span>
                <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl text-slate-900 mt-2">Terms &amp; Conditions</h1>
                <p class="text-slate-500 text-sm mt-3">Please read these terms before booking a vehicle with Journey Begins.</p>
            </div>

            <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-10 shadow-lg space-y-8 text-sm text-slate-600 leading-relaxed">
                @foreach ([
                    'Eligibility' => 'Self-drive renters must be at least 21 years old and hold a valid driving licence (Nepali or international driving permit) for at least one year. A citizenship card or passport is required at pickup.',
                    'Bookings & Payment' => 'Bookings are confirmed once our team verifies availability and contacts you by phone or WhatsApp. Rates are calculated by rental duration (daily, weekly, bi-weekly or monthly) and are shown before you confirm.',
                    'Security Deposit' => 'A refundable security deposit is collected at pickup and returned after the vehicle is inspected on return, minus any fuel, charging, damage or traffic fine charges.',
                    'Vehicle Use' => 'Vehicles must not be used for racing, off-road driving outside 4x4 models, carrying more passengers than seats, or any unlawful purpose. Smoking is not permitted inside vehicles.',
                    'Fuel & Charging' => 'Petrol and diesel vehicles should be returned with the same fuel level. EVs should be returned with at least 20% battery charge.',
                    'Cancellations' => 'Pending bookings can be cancelled from your dashboard at no cost. Confirmed bookings cancelled less than 24 hours before pickup may incur a one-day charge.',
                    'Insurance & Liability' => 'All vehicles are insured. Renters are responsible for damage caused by negligence, driving under the influence or breach of these terms, up to the deposit amount or as assessed.',
                ] as $heading => $body)
                    <section class="space-y-2">
                        <h2 class="font-outfit font-bold text-lg text-slate-900">{{ $loop->iteration }}. {{ $heading }}</h2>
                        <p>{{ $body }}</p>
                    </section>
                @endforeach

                <p class="pt-6 border-t border-slate-100 text-xs text-slate-500">Questions about these terms? <a href="{{ route('contact') }}" class="text-orange-600 font-semibold hover:underline">Contact our team</a>.</p>
            </div>
        </div>
    </div>
</x-layouts.app>
