@extends('layouts.app')

@section('title', 'অ্যাডমিন ড্যাশবোর্ড')

@section('content')
   <!-- Header -->
    <div class="bg-amber-950 flex flex-col md:flex-row justify-between items-center rounded-2xl shadow-xl p-6 md:p-8 mb-8 gap-4">
        <h1 class="text-3xl md:text-4xl font-bold text-white flex items-center">
            <span class="text-4xl mr-3">📊</span> অ্যাডমিন ড্যাশবোর্ড
        </h1>

        <a href="{{ route('admin.logout') }}"
           class="bg-white/20 hover:bg-white/40 transition-all text-white px-6 py-3 rounded-xl font-semibold flex items-center gap-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            লগআউট
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl p-6 shadow hover:scale-[1.02] transition">
            <p class="text-sm opacity-80 uppercase">মোট রেজিস্ট্রেশন</p>
            <h2 class="text-4xl font-bold my-2">{{ $totalRegistrations }}</h2>
            <p class="text-xs opacity-80">সর্বমোট অংশগ্রহণকারী</p>
        </div>

        <button onclick="openRegistrationModal()" class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl p-6 shadow hover:scale-[1.02] transition flex flex-col items-center justify-center group w-full text-left">
            <svg class="w-12 h-12 mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
            <h2 class="text-2xl font-bold my-2">নতুন রেজিস্ট্রেশন</h2>
            <p class="text-xs opacity-80">নতুন শিক্ষার্থী নিবন্ধন করুন</p>
        </button>

        <a href="{{ route('admin.export.csv') }}"
           class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-xl p-6 shadow hover:scale-[1.02] flex flex-col justify-center items-center transition">
            <svg class="w-10 h-10 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 16v-8m0 0l-3 3m3-3l3 3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span class="text-lg font-semibold">ডাউনলোড</span>
        </a>

    </div>

    <!-- Registrations Table -->
    @if ($registrations->count() > 0)
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="px-6 md:px-8 py-6 bg-gradient-to-r from-primary/5 to-secondary/5 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h2 class="text-2xl font-bold text-primary flex items-center">
                        <svg class="w-7 h-7 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        রেজিস্ট্রেশন
                    </h2>
                    <span class="px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-semibold">
                        {{ $registrations->total() }} টি এন্ট্রি
                    </span>
                </div>

                <!-- Search Form -->
                <form method="GET" action="{{ route('admin.dashboard') }}" class="mt-4 flex gap-2">
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm"
                            placeholder="আইডি বা ফোন নম্বর বা নাম দিয়ে খুঁজুন">
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-primary/10 to-secondary/10">
                        <tr>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider whitespace-nowrap">
                                রেজিস্ট্রেশন আইডি</th>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider">
                                নাম</th>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider hidden md:table-cell">
                                শ্রেণী</th>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider">
                                ফোন</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($registrations as $reg)
                            <tr class="hover:bg-primary/5 transition-colors">
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admit-card.view', ['registrationId' => $reg->registration_id, 'phone' => $reg->parents_phone]) }}" 
                                       target="_blank"
                                       class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-primary/10 text-primary border border-primary/20 hover:bg-primary hover:text-white transition-colors">
                                        {{ $reg->registration_id }}
                                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 md:px-6 py-4">
                                    <div class="font-medium text-gray-900 text-sm md:text-base">{{ $reg->name }}</div>
                                    <div class="text-xs text-gray-500 md:hidden">
                                        {{ $reg->grade }}
                                        @if (in_array($reg->grade, ['ষষ্ঠ শ্রেণি', 'পঞ্চম শ্রেণি', 'চতুর্থ শ্রেণি', 'তৃতীয় শ্রেণি']))
                                            [ ক্যাটাগরী - ১ ]
                                        @else
                                            [ ক্যাটাগরী - ২ ]
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 md:px-6 py-4 text-gray-600 text-sm hidden md:table-cell">
                                    {{ $reg->grade }}
                                    @if (in_array($reg->grade, ['ষষ্ঠ শ্রেণি', 'পঞ্চম শ্রেণি', 'চতুর্থ শ্রেণি', 'তৃতীয় শ্রেণি']))
                                        [ ক্যাটাগরী - ১ ]
                                    @else
                                        [ ক্যাটাগরী - ২ ]
                                    @endif
                                </td>

                                <td class="px-4 md:px-6 py-4 text-gray-600 text-sm">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                        <span>{{ $reg->parents_phone }}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 md:px-8 py-6 bg-gray-50 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600 text-center sm:text-left">
                        দেখাচ্ছে <span class="font-semibold text-primary">{{ $registrations->firstItem() }}</span> থেকে
                        <span class="font-semibold text-primary">{{ $registrations->lastItem() }}</span> এর মধ্যে
                        <span class="font-semibold text-primary">{{ $registrations->total() }}</span> টি
                    </div>

                    <div class="flex space-x-2">
                        @if ($registrations->onFirstPage())
                            <span
                                class="px-4 py-2 bg-gray-200 text-gray-500 rounded-lg cursor-not-allowed text-sm font-medium">পূর্ববর্তী</span>
                        @else
                            <a href="{{ $registrations->previousPageUrl() }}"
                                class="px-4 py-2 bg-white border-2 border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition-all font-semibold text-sm">পূর্ববর্তী</a>
                        @endif

                        @if ($registrations->hasMorePages())
                            <a href="{{ $registrations->nextPageUrl() }}"
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-secondary transition-all font-semibold text-sm">পরবর্তী</a>
                        @else
                            <span
                                class="px-4 py-2 bg-gray-200 text-gray-500 rounded-lg cursor-not-allowed text-sm font-medium">পরবর্তী</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow-2xl p-12 md:p-16 text-center">
            <div class="inline-block p-6 bg-gray-100 rounded-full mb-6">
                <svg class="w-20 h-20 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                    </path>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-400 mb-3">কোনো রেজিস্ট্রেশন নেই</h3>
            <p class="text-gray-500 text-lg mb-6">এখনো কোনো রেজিস্ট্রেশন জমা হয়নি</p>
            <button onclick="openRegistrationModal()"
                class="inline-flex items-center space-x-2 bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                <span>প্রথম রেজিস্ট্রেশন করুন</span>
            </button>
        </div>
    @endif

    <!-- Registration Modal -->
    <div id="registrationModal" class="hidden fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all">
            <div class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center rounded-t-2xl z-10">
                <h2 class="text-2xl font-bold text-primary">নতুন রেজিস্ট্রেশন ফর্ম</h2>
                <button onclick="closeRegistrationModal()" class="text-gray-400 hover:text-gray-600 text-3xl leading-none transition-colors">&times;</button>
            </div>

            <form id="adminRegistrationForm" onsubmit="submitRegistrationForm(event)" class="p-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Participant Name -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="name">অংশগ্রহণকারীর নাম <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" required>
                    </div>

                    <!-- Grade Selection -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="grade">শ্রেণী <span class="text-red-500">*</span></label>
                        <select id="grade" name="grade" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" required>
                            <option value="">নির্বাচন করুন</option>
                            <option value="তৃতীয় শ্রেণি">তৃতীয় শ্রেণি</option>
                            <option value="চতুর্থ শ্রেণি">চতুর্থ শ্রেণি</option>
                            <option value="পঞ্চম শ্রেণি">পঞ্চম শ্রেণি</option>
                            <option value="ষষ্ঠ শ্রেণি">ষষ্ঠ শ্রেণি</option>
                            <option value="সপ্তম শ্রেণি">সপ্তম শ্রেণি</option>
                            <option value="অষ্টম শ্রেণি">অষ্টম শ্রেণি</option>
                            <option value="নবম শ্রেণি">নবম শ্রেণি</option>
                            <option value="দশম শ্রেণি">দশম শ্রেণি</option>
                        </select>
                    </div>

                    <!-- Parents Name -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="parents_name">পিতা/মাতার নাম <span class="text-red-500">*</span></label>
                        <input type="text" id="parents_name" name="parents_name" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" required>
                    </div>
                     <!-- Parents Phone -->
                     <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="parents_phone">অভিভাবকের মোবাইল <span class="text-red-500">*</span></label>
                        <input type="tel" id="parents_phone" name="parents_phone" pattern="[0-9]{11}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" placeholder="01xxxxxxxxx" required>
                    </div>

                    <!-- School Name -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-semibold mb-2" for="school">প্রতিষ্ঠানের নাম <span class="text-red-500">*</span></label>
                        <input type="text" id="school" name="school" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" required>
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-semibold mb-2" for="home_address">ঠিকানা <span class="text-red-500">*</span></label>
                        <textarea id="home_address" name="home_address" rows="2" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" required></textarea>
                    </div>
                    
                     <!-- Email (Optional) -->
                     <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="email">ইমেইল (ঐচ্ছিক)</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors">
                    </div>

                    <!-- Another Phone (Optional) -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="another_phone">বিকল্প মোবাইল (ঐচ্ছিক)</label>
                        <input type="tel" id="another_phone" name="another_phone" pattern="[0-9]{11}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors" placeholder="01xxxxxxxxx">
                    </div>

                     <!-- Special Needs -->
                     <div class="md:col-span-2">
                        <label class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="checkbox" name="special_needs" value="1" class="w-5 h-5 text-primary rounded focus:ring-primary border-gray-300">
                            <span class="text-gray-700 font-medium">বিশেষ চাহিদা সম্পন্ন (Special Needs)</span>
                        </label>
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" onclick="closeRegistrationModal()" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-semibold">বাতিল</button>
                    <button type="submit" class="px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-red-700 shadow-lg font-semibold flex items-center">
                        <span id="submitText">জমা দিন</span>
                        <svg id="loadingSpinner" class="hidden w-5 h-5 ml-2 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for Modal & AJAX -->
    <script>
        function openRegistrationModal() {
            document.getElementById('registrationModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeRegistrationModal() {
            document.getElementById('registrationModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementById('adminRegistrationForm').reset();
        }

        async function submitRegistrationForm(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Disable button & show spinner
            submitBtn.disabled = true;
            submitText.textContent = 'প্রসেসিং...';
            loadingSpinner.classList.remove('hidden');

            try {
                const response = await fetch("{{ route('registration.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    alert('রেজিস্ট্রেশন সফল হয়েছে! আইডি: ' + data.registration_id);
                    closeRegistrationModal();
                    // Optional: Reload page to update stats
                    window.location.reload(); 
                } else {
                    alert('ত্রুটি: ' + (data.message || 'কিছু ভুল হয়েছে'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('সার্ভার এরর! দয়া করে আবার চেষ্টা করুন।');
            } finally {
                // Reset button
                submitBtn.disabled = false;
                submitText.textContent = 'জমা দিন';
                loadingSpinner.classList.add('hidden');
            }
        }
    </script>
@endsection
