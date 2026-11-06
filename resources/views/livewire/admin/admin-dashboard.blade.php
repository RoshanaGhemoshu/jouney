<div class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header Banner & Navigation Tabs -->
        <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm flex flex-col space-y-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-600 font-extrabold text-xs uppercase tracking-wider">
                        Administrative Control Center
                    </span>
                    <h1 class="font-outfit font-extrabold text-3xl text-slate-900 mt-2">
                        Admin Dashboard
                    </h1>
                    <p class="text-slate-500 text-sm mt-0.5">Manage vehicles, rates, availability, customer inquiries, and reviews.</p>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-extrabold text-xs rounded-xl transition flex items-center space-x-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>View Website</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-extrabold text-xs rounded-xl transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="flex items-center flex-wrap gap-2 bg-slate-100/80 p-1.5 rounded-2xl border border-slate-200/60 self-start">
                <button wire:click="$set('active_tab', 'overview')"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition duration-200 {{ $active_tab === 'overview' ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20' : 'text-slate-600 hover:text-slate-900' }}">
                    Overview
                </button>
                <button wire:click="$set('active_tab', 'cars')"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition duration-200 {{ $active_tab === 'cars' ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20' : 'text-slate-600 hover:text-slate-900' }}">
                    Vehicles ({{ $kpis['total_cars'] }})
                </button>
                <button wire:click="$set('active_tab', 'testimonials')"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition duration-200 {{ $active_tab === 'testimonials' ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20' : 'text-slate-600 hover:text-slate-900' }}">
                    Testimonials ({{ $kpis['total_testimonials'] }})
                </button>
                <button wire:click="$set('active_tab', 'inquiries')"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition duration-200 {{ $active_tab === 'inquiries' ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20' : 'text-slate-600 hover:text-slate-900' }}">
                    Messages ({{ $kpis['total_inquiries'] }})
                </button>
                <button wire:click="$set('active_tab', 'bookings')"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition duration-200 {{ $active_tab === 'bookings' ? 'bg-orange-500 text-white shadow-md shadow-orange-500/20' : 'text-slate-600 hover:text-slate-900' }}">
                    Bookings ({{ $kpis['pending_bookings'] }} pending)
                </button>
            </div>
        </div>

        <!-- Session Alert Message -->
        @if(session()->has('message'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-emerald-800 text-sm font-bold flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('message') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 text-xs uppercase font-extrabold">Dismiss</button>
            </div>
        @endif

        <!-- TAB 1: OVERVIEW -->
        @if($active_tab === 'overview')
            <!-- Stats KPI Grid (Light Clean Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- KPI 1 -->
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Total Vehicles</span>
                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center font-bold">🚘</div>
                    </div>
                    <div class="mt-4">
                        <span class="font-outfit font-extrabold text-3xl text-slate-900">{{ $kpis['total_cars'] }}</span>
                        <span class="text-xs text-slate-500 ml-2">in fleet</span>
                    </div>
                </div>

                <!-- KPI 2 -->
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Available Ready</span>
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">✅</div>
                    </div>
                    <div class="mt-4">
                        <span class="font-outfit font-extrabold text-3xl text-emerald-600">{{ $kpis['available_cars'] }}</span>
                        <span class="text-xs text-slate-500 ml-2">ready to rent</span>
                    </div>
                </div>

                <!-- KPI 3 -->
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Contact Messages</span>
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold">📩</div>
                    </div>
                    <div class="mt-4">
                        <span class="font-outfit font-extrabold text-3xl text-slate-900">{{ $kpis['total_inquiries'] }}</span>
                        <span class="text-xs text-slate-500 ml-2">submitted</span>
                    </div>
                </div>

                <!-- KPI 4 -->
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Total Revenue</span>
                        <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center font-bold">💰</div>
                    </div>
                    <div class="mt-4">
                        <span class="font-outfit font-extrabold text-2xl text-slate-900">Rs. {{ number_format($kpis['total_earnings']) }}</span>
                        <span class="text-xs text-slate-500 ml-1">confirmed</span>
                    </div>
                </div>
            </div>

            <!-- Recent Summary Tables (Light Clean Design) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Inquiries -->
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-outfit font-bold text-xl text-slate-900">Recent Customer Messages</h3>
                        <button wire:click="$set('active_tab', 'inquiries')" class="text-xs font-bold text-orange-600 hover:underline">View All</button>
                    </div>

                    @if(count($inquiries) === 0)
                        <p class="text-xs text-slate-400 py-6 text-center italic">No customer messages received yet.</p>
                    @else
                        <div class="divide-y divide-slate-100 space-y-3">
                            @foreach($inquiries->take(4) as $inquiry)
                                <div class="pt-3 flex items-start justify-between">
                                    <div class="space-y-0.5">
                                        <h4 class="font-bold text-sm text-slate-900">{{ $inquiry->name }}</h4>
                                        <p class="text-xs text-slate-500">{{ $inquiry->email }} | {{ $inquiry->phone }}</p>
                                        <p class="text-xs text-slate-700 line-clamp-1 mt-1">"{{ $inquiry->message }}"</p>
                                    </div>
                                    <button wire:click="viewInquiry({{ $inquiry->id }})" class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-[11px] rounded-lg transition">
                                        Read
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Recent Vehicles Quick View -->
                <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-outfit font-bold text-xl text-slate-900">Fleet Availability Quick Status</h3>
                        <button wire:click="$set('active_tab', 'cars')" class="text-xs font-bold text-orange-600 hover:underline">Manage Cars</button>
                    </div>

                    <div class="divide-y divide-slate-100 space-y-3">
                        @foreach($cars->take(5) as $car)
                            <div class="pt-3 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-slate-100 overflow-hidden border border-slate-200 flex-shrink-0">
                                        <img src="{{ Str::startsWith($car->image_path, 'http') || Str::startsWith($car->image_path, '/') ? asset($car->image_path) : asset('storage/cars/' . $car->image_path) }}" class="w-full h-full object-cover" alt="{{ $car->name }}">
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-sm text-slate-900">{{ $car->name }}</h4>
                                        <p class="text-xs text-slate-400">Rs. {{ number_format($car->pricingTier->daily_rate ?? 0) }}/day</p>
                                    </div>
                                </div>

                                <button wire:click="toggleCarAvailability({{ $car->id }})"
                                        class="px-3 py-1.5 rounded-xl font-extrabold text-[11px] transition {{ $car->status === 'available' ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' : 'bg-rose-100 text-rose-700 hover:bg-rose-200' }}">
                                    {{ $car->status === 'available' ? 'Available' : 'Booked / Unavailable' }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- TAB 2: VEHICLES MANAGEMENT -->
        @if($active_tab === 'cars')
            <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Vehicle Fleet & Pricing Management</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Add cars, update daily/weekly rates, change availability, or delete cars.</p>
                    </div>

                    <button wire:click="openAddCarModal" class="px-5 py-3 bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-xs rounded-xl shadow-md transition flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span>Add New Vehicle</span>
                    </button>
                </div>

                <!-- Vehicles Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50/80 text-xs font-extrabold text-slate-500 uppercase tracking-wider">
                                <th class="py-4 px-4">Vehicle</th>
                                <th class="py-4 px-4">Category</th>
                                <th class="py-4 px-4">Daily Rate</th>
                                <th class="py-4 px-4">Weekly Rate</th>
                                <th class="py-4 px-4">Availability</th>
                                <th class="py-4 px-4">Featured</th>
                                <th class="py-4 px-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($cars as $car)
                                <tr class="hover:bg-slate-50/60 transition">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden border border-slate-200 flex-shrink-0">
                                                <img src="{{ Str::startsWith($car->image_path, 'http') || Str::startsWith($car->image_path, '/') ? asset($car->image_path) : asset('storage/cars/' . $car->image_path) }}" class="w-full h-full object-cover" alt="{{ $car->name }}">
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-sm">{{ $car->name }}</h4>
                                                <p class="text-xs text-slate-400">{{ $car->transmission }} | {{ $car->seats }} Seats</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-700">
                                            {{ $car->category }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 font-bold text-slate-900">
                                        Rs. {{ number_format($car->pricingTier->daily_rate ?? 0) }}
                                    </td>
                                    <td class="py-4 px-4 text-slate-600 font-semibold">
                                        Rs. {{ number_format($car->pricingTier->weekly_rate ?? 0) }}
                                    </td>
                                    <td class="py-4 px-4">
                                        <button wire:click="toggleCarAvailability({{ $car->id }})"
                                                class="px-3 py-1 rounded-xl text-xs font-extrabold transition {{ $car->status === 'available' ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' : 'bg-rose-100 text-rose-700 hover:bg-rose-200' }}">
                                            {{ $car->status === 'available' ? 'Available' : 'Unavailable' }}
                                        </button>
                                    </td>
                                    <td class="py-4 px-4">
                                        <button wire:click="toggleCarFeatured({{ $car->id }})"
                                                class="px-3 py-1 rounded-xl text-xs font-extrabold transition {{ $car->is_featured ? 'bg-orange-100 text-orange-700 hover:bg-orange-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                            {{ $car->is_featured ? 'Featured ★' : 'Standard' }}
                                        </button>
                                    </td>
                                    <td class="py-4 px-4 text-right space-x-2">
                                        <button wire:click="editCar({{ $car->id }})" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs rounded-xl transition">
                                            Edit / Rates
                                        </button>
                                        <button wire:click="deleteCar({{ $car->id }})" onclick="return confirm('Are you sure you want to delete this vehicle?')" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs rounded-xl transition">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- TAB 3: TESTIMONIALS MANAGEMENT -->
        @if($active_tab === 'testimonials')
            <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Customer Testimonials & Reviews</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Hide or show customer reviews from the public site, or delete unwanted testimonials.</p>
                    </div>

                    <button wire:click="openAddTestimonialModal" class="px-5 py-3 bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-xs rounded-xl shadow-md transition flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span>Add New Testimonial</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($testimonials as $testi)
                        <div class="border border-slate-200 rounded-2xl p-6 space-y-4 relative bg-slate-50/50 hover:bg-white transition">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 font-bold flex items-center justify-center text-sm">
                                        {{ substr($testi->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">{{ $testi->name }}</h4>
                                        <p class="text-xs text-slate-400">{{ $testi->role ?: 'Verified Customer' }} • {{ $testi->car_model }}</p>
                                    </div>
                                </div>

                                <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase {{ $testi->is_hidden ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700' }}">
                                    {{ $testi->is_hidden ? 'Hidden' : 'Visible' }}
                                </span>
                            </div>

                            <p class="text-xs text-slate-700 leading-relaxed italic">"{{ $testi->review }}"</p>

                            <div class="pt-3 border-t border-slate-200/60 flex items-center justify-end space-x-3">
                                <button wire:click="toggleHideTestimonial({{ $testi->id }})"
                                        class="text-xs font-bold transition px-3 py-1.5 rounded-lg {{ $testi->is_hidden ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' : 'bg-slate-200 text-slate-700 hover:bg-slate-300' }}">
                                    {{ $testi->is_hidden ? 'Make Visible' : 'Hide Review' }}
                                </button>
                                <button wire:click="deleteTestimonial({{ $testi->id }})" onclick="return confirm('Delete this testimonial?')"
                                        class="text-xs font-bold text-rose-600 hover:underline px-2 py-1">
                                    Delete
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- TAB 4: CONTACT MESSAGES -->
        @if($active_tab === 'inquiries')
            <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm space-y-6">
                <div>
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Stored Contact Form Messages</h3>
                    <p class="text-xs text-slate-500 mt-0.5">View full details of messages submitted through your website's contact form.</p>
                </div>

                @if(count($inquiries) === 0)
                    <div class="text-center py-12 text-slate-400">
                        <p class="text-sm font-semibold">No messages in inbox.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 bg-slate-50/80 text-xs font-extrabold text-slate-500 uppercase tracking-wider">
                                    <th class="py-4 px-4">Date</th>
                                    <th class="py-4 px-4">Name</th>
                                    <th class="py-4 px-4">Email</th>
                                    <th class="py-4 px-4">Phone</th>
                                    <th class="py-4 px-4">Message Snippet</th>
                                    <th class="py-4 px-4 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($inquiries as $inquiry)
                                    <tr class="hover:bg-slate-50/60 transition">
                                        <td class="py-4 px-4 text-xs font-bold text-slate-500">
                                            {{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y H:i') : 'Recent' }}
                                        </td>
                                        <td class="py-4 px-4 font-bold text-slate-900">{{ $inquiry->name }}</td>
                                        <td class="py-4 px-4 text-slate-600">{{ $inquiry->email }}</td>
                                        <td class="py-4 px-4 font-semibold text-slate-700">{{ $inquiry->phone }}</td>
                                        <td class="py-4 px-4 text-xs text-slate-600 line-clamp-1 max-w-xs">
                                            {{ $inquiry->message }}
                                        </td>
                                        <td class="py-4 px-4 text-right space-x-2">
                                            <button wire:click="viewInquiry({{ $inquiry->id }})" class="px-3 py-1.5 bg-orange-50 hover:bg-orange-100 text-orange-600 font-bold text-xs rounded-xl transition">
                                                View Full Message
                                            </button>
                                            <button wire:click="deleteInquiry({{ $inquiry->id }})" onclick="return confirm('Delete message?')" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs rounded-xl transition">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif

        <!-- TAB 5: BOOKINGS MANAGEMENT -->
        @if($active_tab === 'bookings')
            <div class="bg-white border border-slate-200 rounded-[2rem] p-6 sm:p-8 shadow-sm space-y-6">
                <div>
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Customer Bookings</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Confirm or manage car rental reservations.</p>
                </div>

                <div class="space-y-4">
                    <h4 class="font-outfit font-bold text-xl text-slate-900">Vehicle Availability Calendar</h4>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                        @foreach($cars as $car)
                            @php $calendarData = $car->getAvailabilityCalendarData(); @endphp
                            <div class="border border-slate-200 rounded-2xl p-4 bg-slate-50/60">
                                <div class="flex items-center justify-between gap-3 mb-4">
                                    <div>
                                        <p class="font-extrabold text-slate-900 text-sm">{{ $car->name }}</p>
                                        <p class="text-[11px] text-slate-500">{{ $car->category }} • {{ $car->transmission }}</p>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase {{ $car->status === 'available' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                        {{ $car->status }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-7 gap-1 text-center text-[10px] font-bold">
                                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $dayLabel)
                                        <div class="py-1 text-slate-500">{{ $dayLabel }}</div>
                                    @endforeach

                                    @foreach($calendarData as $day)
                                        <div class="h-9 flex items-center justify-center rounded-md border text-[10px] font-bold {{ $day['is_current_month'] ? ($day['is_available'] ? 'bg-emerald-50 text-emerald-700 border-emerald-100' : 'bg-rose-50 text-rose-700 border-rose-200') : 'bg-slate-100 text-slate-300 border-slate-100' }} {{ $day['is_today'] ? 'ring-1 ring-orange-300' : '' }}">
                                            {{ $day['day'] }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if(count($bookings) === 0)
                    <div class="text-center py-12 text-slate-400">
                        <p class="text-sm font-semibold">No booking requests submitted yet.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 bg-slate-50/80 text-xs font-extrabold text-slate-500 uppercase tracking-wider">
                                    <th class="py-4 px-4">Booking Ref</th>
                                    <th class="py-4 px-4">Customer</th>
                                    <th class="py-4 px-4">Vehicle</th>
                                    <th class="py-4 px-4">Dates</th>
                                    <th class="py-4 px-4">Total Price</th>
                                    <th class="py-4 px-4">Status</th>
                                    <th class="py-4 px-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($bookings as $b)
                                    <tr class="hover:bg-slate-50/60 transition">
                                        <td class="py-4 px-4 font-mono text-xs font-bold text-slate-700">#{{ $b->id }}</td>
                                        <td class="py-4 px-4">
                                            <p class="font-bold text-slate-900">{{ $b->customer_name }}</p>
                                            <p class="text-xs text-slate-400">{{ $b->customer_email }}</p>
                                        </td>
                                        <td class="py-4 px-4 font-semibold text-slate-800">{{ $b->car->name ?? 'Car Deleted' }}</td>
                                        <td class="py-4 px-4 text-xs text-slate-600">
                                            {{ $b->start_date }} to {{ $b->end_date }}
                                        </td>
                                        <td class="py-4 px-4 font-extrabold text-slate-900">Rs. {{ number_format($b->total_price) }}</td>
                                        <td class="py-4 px-4">
                                            <span class="px-2.5 py-1 rounded-full text-xs font-extrabold uppercase {{ $b->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : ($b->status === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-600') }}">
                                                {{ $b->status }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-4 text-right space-x-2">
                                            <button wire:click="updateBookingStatus({{ $b->id }}, 'confirmed')" class="px-3 py-1 bg-emerald-100 hover:bg-emerald-200 text-emerald-800 font-bold text-xs rounded-lg">Confirm</button>
                                            <button wire:click="updateBookingStatus({{ $b->id }}, 'cancelled')" class="px-3 py-1 bg-rose-100 hover:bg-rose-200 text-rose-800 font-bold text-xs rounded-lg">Cancel</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif

    </div>

    <!-- MODAL: ADD / EDIT CAR MODAL -->
    @if($show_car_modal)
        <div class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-[2.5rem] shadow-2xl max-w-2xl w-full p-6 sm:p-8 space-y-6 border border-slate-200">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">
                        {{ $car_id ? 'Edit Vehicle & Rates' : 'Add New Vehicle' }}
                    </h3>
                    <button wire:click="$set('show_car_modal', false)" class="text-slate-400 hover:text-slate-600">✕</button>
                </div>

                <form wire:submit.prevent="saveCar" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Vehicle Name *</label>
                            <input type="text" wire:model="car_name" placeholder="e.g. BYD Atto 3 EV" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                            @error('car_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Category *</label>
                            <select wire:model="car_category" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="EV">EV (Electric)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Transmission</label>
                            <select wire:model="car_transmission" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Seats</label>
                            <input type="number" wire:model="car_seats" min="1" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Model Year</label>
                            <input type="text" wire:model="car_year" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Mileage / Range</label>
                            <input type="text" wire:model="car_mileage" placeholder="e.g. 420 km range" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Color</label>
                            <input type="text" wire:model="car_color" placeholder="e.g. Pearl White" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        </div>
                    </div>

                    <!-- Pricing Tier Rates -->
                    <div class="p-4 bg-orange-50/50 border border-orange-200 rounded-2xl space-y-3">
                        <h4 class="font-extrabold text-sm text-orange-900 uppercase tracking-wider">Dynamic Tiered Rental Rates (NPR)</h4>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div>
                                <label class="text-[10px] font-bold text-slate-600">Daily Rate *</label>
                                <input type="number" wire:model="rate_daily" class="w-full bg-white border border-slate-300 rounded-lg py-2 px-2.5 text-xs text-slate-900 font-bold">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-slate-600">Weekly Rate *</label>
                                <input type="number" wire:model="rate_weekly" class="w-full bg-white border border-slate-300 rounded-lg py-2 px-2.5 text-xs text-slate-900 font-bold">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-slate-600">Bi-Weekly Rate *</label>
                                <input type="number" wire:model="rate_biweekly" class="w-full bg-white border border-slate-300 rounded-lg py-2 px-2.5 text-xs text-slate-900 font-bold">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-slate-600">Monthly Rate *</label>
                                <input type="number" wire:model="rate_monthly" class="w-full bg-white border border-slate-300 rounded-lg py-2 px-2.5 text-xs text-slate-900 font-bold">
                            </div>
                        </div>
                    </div>

                    <!-- Status & Image -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Availability Status</label>
                            <select wire:model="car_status" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                                <option value="available">Available</option>
                                <option value="booked">Booked / Unavailable</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Featured Vehicle</label>
                            <div class="flex items-center space-x-2 pt-2">
                                <input type="checkbox" wire:model="car_is_featured" id="feat" class="w-4 h-4 text-orange-500 rounded border-slate-300">
                                <label for="feat" class="text-xs font-bold text-slate-700">Display on Home Page</label>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="text-xs font-bold text-slate-700 uppercase">Manually Set Unavailable Dates</label>
                            <p class="text-[10px] text-slate-500 mb-1">Select dates when this car should not be available for booking.</p>
                            <div x-data x-init="flatpickr($refs.dates, {mode: 'multiple', dateFormat: 'Y-m-d'})" wire:ignore>
                                <input x-ref="dates" type="text" wire:model="car_unavailable_dates" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800" placeholder="Click to select dates...">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
                        <button type="button" wire:click="$set('show_car_modal', false)" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-bold text-xs rounded-xl">Cancel</button>
                        <button type="submit" class="px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-xs rounded-xl shadow-md">Save Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- MODAL: ADD TESTIMONIAL MODAL -->
    @if($show_testi_modal)
        <div class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-[2.5rem] shadow-2xl max-w-lg w-full p-6 sm:p-8 space-y-6 border border-slate-200">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Add Customer Testimonial</h3>
                    <button wire:click="$set('show_testi_modal', false)" class="text-slate-400 hover:text-slate-600">✕</button>
                </div>

                <form wire:submit.prevent="saveTestimonial" class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-slate-700 uppercase">Customer Name *</label>
                        <input type="text" wire:model="testi_name" placeholder="e.g. Suman Thapa" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        @error('testi_name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Role / City</label>
                            <input type="text" wire:model="testi_role" placeholder="e.g. Software Engineer, Kathmandu" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-700 uppercase">Rented Car</label>
                            <input type="text" wire:model="testi_car_model" placeholder="e.g. BYD Atto 3 EV" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800">
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-slate-700 uppercase">Review Text *</label>
                        <textarea wire:model="testi_review" rows="4" placeholder="Enter customer feedback..." class="w-full bg-slate-50 border border-slate-200 rounded-xl py-2.5 px-3.5 text-sm text-slate-800 resize-none"></textarea>
                        @error('testi_review') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
                        <button type="button" wire:click="$set('show_testi_modal', false)" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-bold text-xs rounded-xl">Cancel</button>
                        <button type="submit" class="px-6 py-2.5 bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-xs rounded-xl shadow-md">Add Review</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- MODAL: VIEW INQUIRY MESSAGE MODAL -->
    @if($show_inquiry_modal && $selected_inquiry)
        <div class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-[2.5rem] shadow-2xl max-w-lg w-full p-6 sm:p-8 space-y-6 border border-slate-200">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="font-outfit font-extrabold text-2xl text-slate-900">Contact Message Details</h3>
                    <button wire:click="$set('show_inquiry_modal', false)" class="text-slate-400 hover:text-slate-600">✕</button>
                </div>

                <div class="space-y-4">
                    <div class="p-4 bg-slate-50 rounded-2xl space-y-1">
                        <h4 class="font-bold text-slate-900 text-lg">{{ $selected_inquiry->name }}</h4>
                        <p class="text-xs text-slate-500"><strong>Email:</strong> {{ $selected_inquiry->email }}</p>
                        <p class="text-xs text-slate-500"><strong>Phone:</strong> {{ $selected_inquiry->phone }}</p>
                        <p class="text-xs text-slate-400"><strong>Received:</strong> {{ $selected_inquiry->created_at ? $selected_inquiry->created_at->format('M d, Y h:i A') : 'Recent' }}</p>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-extrabold text-slate-400 uppercase tracking-wider block">Message Content</label>
                        <div class="p-4 bg-white border border-slate-200 rounded-2xl text-sm text-slate-800 leading-relaxed whitespace-pre-line">
                            {{ $selected_inquiry->message }}
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $selected_inquiry->phone) }}" target="_blank" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold text-xs rounded-xl transition">
                        Reply via WhatsApp
                    </a>
                    <button wire:click="deleteInquiry({{ $selected_inquiry->id }})" class="px-4 py-2 bg-rose-100 hover:bg-rose-200 text-rose-800 font-extrabold text-xs rounded-xl transition">
                        Delete Message
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
