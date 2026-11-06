<x-layouts.app title="Privacy Policy - Journey Begins Car Rental">
    <div class="bg-[#f8fafc] min-h-screen pt-10 lg:pt-14 pb-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 animate-fade-in-up">
                <span class="text-[11px] font-extrabold text-orange-600 uppercase tracking-widest">Legal</span>
                <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl text-slate-900 mt-2">Privacy Policy</h1>
                <p class="text-slate-500 text-sm mt-3">How Journey Begins collects, uses and protects your information.</p>
            </div>

            <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-10 shadow-lg space-y-8 text-sm text-slate-600 leading-relaxed">
                @foreach ([
                    'Information We Collect' => 'When you book a car, create an account or send an inquiry we collect your name, email address, phone number, pickup and drop-off details, and rental dates.',
                    'How We Use It' => 'We use your information only to process bookings, contact you about your rental, provide customer support and improve our services. We never sell your personal data.',
                    'Communication' => 'We may contact you by phone, email or WhatsApp about your booking. You can ask us to stop non-essential messages at any time.',
                    'Data Security' => 'Your account password is encrypted and access to booking data is limited to authorised staff. We retain booking records only as long as required for business and legal purposes.',
                    'Your Rights' => 'You can request a copy of your data, ask us to correct it, or request deletion of your account by contacting us.',
                ] as $heading => $body)
                    <section class="space-y-2">
                        <h2 class="font-outfit font-bold text-lg text-slate-900">{{ $loop->iteration }}. {{ $heading }}</h2>
                        <p>{{ $body }}</p>
                    </section>
                @endforeach

                <p class="pt-6 border-t border-slate-100 text-xs text-slate-500">Have a privacy question? <a href="{{ route('contact') }}" class="text-orange-600 font-semibold hover:underline">Get in touch</a>.</p>
            </div>
        </div>
    </div>
</x-layouts.app>
