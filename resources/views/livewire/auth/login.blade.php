<div class="min-h-[85vh] flex items-center justify-center bg-gradient-to-br from-slate-50 via-orange-50/30 to-white relative overflow-hidden py-12 px-4 sm:px-6 lg:px-8">
    
    <!-- Background subtle shapes -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-orange-400/10 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-blue-400/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl w-full bg-white border border-slate-200/80 rounded-[2.5rem] shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 relative z-10">
        
        <!-- Left Side Feature Column -->
        <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-8 sm:p-10 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="space-y-8 z-10">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logoo.png') }}" class="h-12 w-auto object-contain brightness-0 invert" alt="Journey Begins">
                </div>

                <div class="space-y-3 pt-4">
                    <span class="px-3 py-1 bg-orange-500/20 text-orange-400 text-[10px] font-extrabold tracking-wider uppercase rounded-full border border-orange-500/30">
                        Welcome Back
                    </span>
                    <h3 class="font-outfit font-extrabold text-2xl sm:text-3xl leading-snug">
                        Ready for Your Next Destination?
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Sign in to view active bookings, track trip status, download rental invoices, and manage your profile.
                    </p>
                </div>

                <!-- Quick Help -->
                <div class="p-4 bg-white/5 border border-white/10 rounded-2xl space-y-2">
                    <div class="flex items-center space-x-2 text-xs font-bold text-orange-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Need Booking Assistance?</span>
                    </div>
                    <p class="text-[11px] text-slate-300">Call or WhatsApp support: <a href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" class="text-white font-bold underline">+977 9840002796</a></p>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-700/60 mt-8 z-10">
                <p class="text-[11px] text-slate-400 font-medium">© {{ date('Y') }} Journey Begins Car Rental. All rights reserved.</p>
            </div>
        </div>

        <!-- Right Side Form Column -->
        <div class="lg:col-span-7 p-8 sm:p-12 space-y-6">
            <div class="space-y-1">
                <h2 class="font-outfit font-extrabold text-3xl text-slate-900">Sign In</h2>
                <p class="text-xs text-slate-500">Enter your credentials to access your account.</p>
            </div>

            <form wire:submit.prevent="login" class="space-y-5">
                <!-- Email -->
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-slate-700 uppercase tracking-wider block">Email Address <span class="text-orange-500">*</span></label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <input type="email" wire:model="email" placeholder="roshan@example.com"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                    </div>
                    @error('email') <span class="text-xs text-red-500 block">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label class="text-[11px] font-bold text-slate-700 uppercase tracking-wider block">Password <span class="text-orange-500">*</span></label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input type="password" wire:model="password" placeholder="••••••••"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-white transition duration-200">
                    </div>
                    @error('password') <span class="text-xs text-red-500 block">{{ $message }}</span> @enderror
                </div>

                <!-- Remember me -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center space-x-2 text-slate-600 cursor-pointer">
                        <input type="checkbox" wire:model="remember" class="w-4 h-4 rounded border-slate-300 text-orange-500 focus:ring-orange-500">
                        <span>Remember me</span>
                    </label>
                    <a href="{{ route('contact') }}" class="text-orange-600 hover:text-orange-700 font-extrabold transition">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-sm rounded-xl transition duration-200 shadow-lg shadow-orange-500/20 transform hover:-translate-y-0.5">
                    Sign In
                </button>
            </form>

            <div class="border-t border-slate-100 pt-6 text-center text-xs text-slate-500">
                <span>Don't have an account? </span>
                <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700 font-extrabold transition">Create an Account</a>
            </div>
        </div>
    </div>
</div>
