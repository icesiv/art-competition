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

        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl p-6 shadow hover:scale-[1.02] transition">
            <p class="text-sm opacity-80 uppercase">আজকের রেজিস্ট্রেশন</p>
            <h2 class="text-4xl font-bold my-2">
                {{ $registrations->where('created_at', '>=', today())->count() }}
            </h2>
            <p class="text-xs opacity-80">{{ now()->format('d F Y') }}</p>
        </div>

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
