@extends('layouts.app')

@section('title', 'অ্যাডমিন ড্যাশবোর্ড')

@section('content')
    <!-- Header with Logout -->
    <div
        class="bg-amber-950 flex flex-col md:flex-row justify-between items-center md:items-center rounded-2xl shadow-2xl p-6 md:p-8 mb-8 gap-4">
        <div class="">
            <h1 class="text-3xl md:text-4xl font-bold text-white flex items-center">
                <span class="text-4xl mr-3">📊</span>
                অ্যাডমিন ড্যাশবোর্ড
            </h1>
        </div>
        <a href="{{ route('admin.logout') }}"
            class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-6 py-3 rounded-xl transition-all font-semibold flex items-center space-x-2 shadow-lg hover:shadow-xl">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>লগআউট</span>
        </a>
    </div>

    <!-- Statistics Card -->
    <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-8 mb-8">
        <h2 class="text-2xl font-bold text-primary mb-6 pb-3 border-b-4 border-primary flex items-center">
            <svg class="w-7 h-7 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            পরিসংখ্যান
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Registrations -->
            <div
                class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-blue-100 text-sm font-medium mb-2 uppercase tracking-wide">মোট রেজিস্ট্রেশন</p>
                        <h3 class="text-5xl font-bold mb-1">{{ $totalRegistrations }}</h3>
                        <p class="text-blue-200 text-xs">সর্বমোট অংশগ্রহণকারী</p>
                    </div>
                    <div class="bg-white/20 rounded-full p-4 backdrop-blur-sm">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Today's Registrations -->
            <div
                class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 hover:shadow-2xl transition-all duration-300 cursor-pointer">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-green-100 text-sm font-medium mb-2 uppercase tracking-wide">আজকের রেজিস্ট্রেশন</p>
                        <h3 class="text-5xl font-bold mb-1">
                            {{ $registrations->where('created_at', '>=', today())->count() }}</h3>
                        <p class="text-green-200 text-xs">{{ now()->format('d F Y') }}</p>
                    </div>
                    <div class="bg-white/20 rounded-full p-4 backdrop-blur-sm">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Export Section -->
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6 border-2 border-gray-200">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                রেজিস্ট্রেশন ডেটা
            </h3>
            <a href="{{ route('admin.export.excel') }}"
                class="group bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-6 py-4 rounded-xl hover:shadow-xl transform hover:-translate-y-1 transition-all font-semibold text-center flex items-center justify-center space-x-3">
                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span>ডাউনলোড</span>
            </a>
        </div>
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
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-primary/10 to-secondary/10">
                        <tr>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider whitespace-nowrap">
                                রেজিস্ট্রেশন আইডি</th>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider whitespace-nowrap">
                                নাম</th>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider whitespace-nowrap hidden md:table-cell">
                                শ্রেণী</th>
                            <th
                                class="px-4 md:px-6 py-4 text-left text-xs md:text-sm font-bold text-primary uppercase tracking-wider whitespace-nowrap">
                                ফোন</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($registrations as $reg)
                            <tr class="hover:bg-primary/5 transition-colors">
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-full text-xs md:text-sm font-semibold bg-primary/10 text-primary border border-primary/20">
                                        {{ $reg->registration_id }}
                                    </span>
                                </td>
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap">
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
                                <td class="px-4 md:px-6 py-4 whitespace-nowrap text-gray-600 text-sm hidden md:table-cell">
                                    {{ $reg->grade }}
                                    @if (in_array($reg->grade, ['ষষ্ঠ শ্রেণি', 'পঞ্চম শ্রেণি', 'চতুর্থ শ্রেণি', 'তৃতীয় শ্রেণি']))
                                        [ ক্যাটাগরী - ১ ]
                                    @else
                                        [ ক্যাটাগরী - ২ ]
                                    @endif
                                </td>

                                <td class="px-4 md:px-6 py-4 whitespace-nowrap text-gray-600 text-sm">
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
            <a href="{{ route('registration.index') }}"
                class="inline-flex items-center space-x-2 bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                <span>প্রথম রেজিস্ট্রেশন করুন</span>
            </a>
        </div>
    @endif
@endsection
