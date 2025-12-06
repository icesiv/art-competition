@extends('layouts.app')

@section('title', 'রেজিস্ট্রেশন')

@section('content')
    <!-- Success Message -->
    @if (session('success'))
        <div class="bg-green-50 border-2 border-green-200 rounded-xl p-6 mb-6 shadow-lg animate-slideDown">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <h3 class="text-lg font-semibold text-green-800">{{ session('success') }}</h3>
                    <p class="mt-2 text-green-700">
                        আপনার রেজিস্ট্রেশন আইডি: <span class="font-bold text-xl">{{ session('registration_id') }}</span>
                    </p>

                    @if (session('registration_id') && session('parents_phone'))
                        <div class="mt-4">
                            <a class="inline-block bg-gradient-to-r from-green-500 to-teal-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all font-semibold"
                                href="{{ route('admit-card.view', ['registrationId' => session('registration_id'), 'phone' => session('parents_phone')]) }}"
                                target="_blank" class="btn btn-primary">
                                প্রবেশপত্র দেখুন
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 mb-6 shadow-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-red-800 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6 mb-6 shadow-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <ul class="list-disc list-inside text-red-800">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Registration Closed Message -->
    <div class="bg-white rounded-2xl shadow-2xl p-8 mb-8 text-center">
        <div class="mb-6">
            <svg class="w-20 h-20 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">রেজিস্ট্রেশন সময় শেষ</h2>
            <p class="text-gray-600 text-lg">দুঃখিত, এই প্রতিযোগিতার জন্য রেজিস্ট্রেশন প্রক্রিয়া বর্তমানে বন্ধ রয়েছে।</p>
        </div>

        <!-- Check Registration Form -->
        <div class="mt-8 border-t-2 border-gray-100 pt-8">
            <h3 class="text-xl font-bold text-primary mb-6">আপনার রেজিস্ট্রেশন যাচাই করুন</h3>
            
            <form method="GET" action="{{ route('registration.check') }}" class="max-w-xl mx-auto">
                <div class="mb-4">
                    <label for="check_phone" class="block text-gray-700 font-semibold mb-2 text-left">
                        অভিভাবকের মোবাইল নম্বর
                    </label>
                    <div class="flex gap-2">
                        <input type="tel" id="check_phone" name="phone" pattern="[0-9]{11}"
                            value="{{ request('phone') }}"
                            class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors"
                            placeholder="01xxxxxxxxx" required>
                        <button type="submit"
                            class="bg-primary hover:bg-green-700 text-white px-8 py-3 rounded-lg font-bold transition-colors shadow-lg">
                            খুঁজুন
                        </button>
                    </div>
                </div>
            </form>

            <!-- Search Results -->
            @if(isset($registrations) && count($registrations) > 0)
                <div class="mt-8">
                    <h4 class="text-lg font-semibold text-gray-700 mb-4">রেজিস্ট্রেশন তালিকা</h4>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="px-4 py-3 text-gray-600 font-medium">নাম</th>
                                    <th class="px-4 py-3 text-gray-600 font-medium">শ্রেণী</th>
                                    <th class="px-4 py-3 text-gray-600 font-medium">রেজিস্ট্রেশন আইডি</th>
                                    <th class="px-4 py-3 text-gray-600 font-medium text-right">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registrations as $reg)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="px-4 py-3 font-medium text-gray-800">{{ $reg->name }}</td>
                                        <td class="px-4 py-3 text-gray-600">{{ $reg->grade }}</td>
                                        <td class="px-4 py-3 text-gray-600 font-mono">{{ $reg->registration_id }}</td>
                                        <td class="px-4 py-3 text-right">
                                            <a href="{{ route('admit-card.view', ['registrationId' => $reg->registration_id, 'phone' => $reg->parents_phone]) }}" 
                                               target="_blank"
                                               class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors text-sm font-semibold">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                                ডাউনলোড
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @elseif(request('phone'))
                <div class="mt-6 p-4 bg-yellow-50 text-yellow-800 rounded-lg">
                    কোন রেজিস্ট্রেশন পাওয়া যায়নি। অনুগ্রহ করে সঠিক মোবাইল নম্বর দিন।
                </div>
            @endif
        </div>
    </div>

    <!-- Script -->
    <script>
        document.getElementById('grade').addEventListener('change', function() {
            const value = this.value;
            const categoryField = document.getElementById('grade_category');

            const cat1 = ["তৃতীয় শ্রেণি", "চতুর্থ শ্রেণি", "পঞ্চম শ্রেণি", "ষষ্ঠ শ্রেণি"];

            if (cat1.includes(value)) {
                categoryField.value = "ক্যাটাগরী-১";
            } else if (value !== "") {
                categoryField.value = "ক্যাটাগরী-২";
            } else {
                categoryField.value = "";
            }
        });
    </script>

    <style>
        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slideDown {
            animation: slideDown 0.5s ease-out;
        }
    </style>
@endsection
