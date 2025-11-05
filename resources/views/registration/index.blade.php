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
                            <a href="{{ route('registration.download.direct', ['registrationId' => session('registration_id'), 'phone' => session('parents_phone')]) }}"
                                class="inline-block bg-gradient-to-r from-green-500 to-teal-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all font-semibold">
                                এখনই প্রবেশপত্র ডাউনলোড করুন
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

    <!-- Registration Form Card -->
    <div class="bg-white rounded-2xl shadow-2xl p-8 mb-8">
        <div
            class="w-full flex flex-col md:flex-row items-center justify-between mb-4 gap-4 md:gap-0 border-b-2 border-primary pb-3">

            <!-- Mobile: Logos together -->
            <div class="flex md:hidden w-full justify-between">
                <img src="assets/art-logo.png" class="w-18 h-auto" alt="Art Logo">
                <img src="assets/bpsc-logo.png" class="w-20 h-auto" alt="BPSC Logo">
            </div>

            <!-- Desktop: Left Logo -->
            <img src="assets/art-logo.png" class="hidden md:block w-24 h-auto" alt="Art Logo">

            <!-- Title -->
            <div class="text-center md:mx-4">
                <h1 class="text-2xl md:text-4xl font-bold text-primary leading-snug md:leading-[2.8rem]">
                    বসুন্ধরা পাবলিক স্কুল এন্ড কলেজ<br />ছবি আঁকা প্রতিযোগিতা
                </h1>
                <p class="text-gray-600 text-lg md:text-2xl mt-1">
                    মুক্তিযুদ্ধ ও জুলাই গণ-অভ্যুত্থান
                </p>
            </div>

            <!-- Desktop: Right Logo -->
            <img src="assets/bpsc-logo.png" class="hidden md:block w-20 h-auto" alt="BPSC Logo">
        </div>



        <h2 class="text-xl text-center rounded-lg  bg-gray-100 font-semibold text-primary mb-2 p-2">রেজিস্ট্রেশন ফর্ম</h2>

        <form method="POST" action="{{ route('registration.store') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    নাম <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors @error('name') border-red-500 @enderror"
                    placeholder="শিক্ষার্থীর পূর্ণ নাম লিখুন" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Grade -->
            <div>
                <label for="grade" class="block text-gray-700 font-semibold mb-2">
                    শ্রেণী/ক্লাস <span class="text-red-500">*</span>
                </label>
                <input type="text" id="grade" name="grade" value="{{ old('grade') }}"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors @error('grade') border-red-500 @enderror"
                    placeholder="যেমন: ৫ম শ্রেণী, ৮ম শ্রেণী" required>
                @error('grade')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Parents Name -->
            <div>
                <label for="parents_name" class="block text-gray-700 font-semibold mb-2">
                    অভিভাবকের নাম <span class="text-red-500">*</span>
                </label>
                <input type="text" id="parents_name" name="parents_name" value="{{ old('parents_name') }}"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors @error('parents_name') border-red-500 @enderror"
                    placeholder="বাবা/মা এর নাম লিখুন" required>
                @error('parents_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Numbers Row -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="parents_phone" class="block text-gray-700 font-semibold mb-2">
                        অভিভাবকের ফোন নম্বর <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" id="parents_phone" name="parents_phone" pattern="[0-9]{11}"
                        value="{{ old('parents_phone') }}"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors @error('parents_phone') border-red-500 @enderror"
                        placeholder="01xxxxxxxxx" required
                        oninvalid="this.setCustomValidity('সঠিক ১১ সংখ্যার ফোন নম্বর লিখুন (০১XXXXXXXXX)')"
                        oninput="this.setCustomValidity('')">
                    @error('parents_phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="another_phone" class="block text-gray-700 font-semibold mb-2">
                        অন্য ফোন নম্বর <span class="text-gray-500 font-normal text-sm">(ঐচ্ছিক)</span>
                    </label>
                    <input type="tel" id="another_phone" name="another_phone" pattern="[0-9]{11}"
                        value="{{ old('another_phone') }}"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors"
                        placeholder="01xxxxxxxxx"
                        oninvalid="this.setCustomValidity('সঠিক ১১ সংখ্যার ফোন নম্বর লিখুন (০১XXXXXXXXX)')"
                        oninput="this.setCustomValidity('')">
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">
                    ইমেইল <span class="text-gray-500 font-normal text-sm">(ঐচ্ছিক)</span>
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors"
                    placeholder="example@email.com">
            </div>

            <!-- School -->
            <div>
                <label for="school" class="block text-gray-700 font-semibold mb-2">
                    স্কুল / প্রতিষ্ঠানের নাম <span class="text-red-500">*</span>
                </label>
                <input type="text" id="school" name="school" value="{{ old('school') }}"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors @error('school') border-red-500 @enderror"
                    placeholder="শিক্ষা প্রতিষ্ঠানের পূর্ণ নাম লিখুন" required>
                @error('school')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="home_address" class="block text-gray-700 font-semibold mb-2">
                    বাসার ঠিকানা <span class="text-red-500">*</span>
                </label>
                <textarea id="home_address" name="home_address" rows="3"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors resize-none @error('home_address') border-red-500 @enderror"
                    placeholder="সম্পূর্ণ ঠিকানা লিখুন (বাড়ি/গ্রাম, রোড, থানা, জেলা)" required>{{ old('home_address') }}</textarea>
                @error('home_address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-green-800 from-primary to-secondary text-white py-4 rounded-lg hover:shadow-xl transform hover:-translate-y-1 transition-all font-bold text-lg">
                রেজিস্ট্রেশন করুন
            </button>
        </form>
    </div>

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
