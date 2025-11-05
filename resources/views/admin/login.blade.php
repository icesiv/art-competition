@extends('layouts.app')

@section('title', 'অ্যাডমিন লগইন')

@section('content')
    <div class="min-h-[calc(100vh-200px)] flex items-center justify-center px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 w-full max-w-md transform hover:scale-[1.02] transition-transform duration-300">
            <!-- Icon Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-green-500 to-teal-500 rounded-full mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">অ্যাডমিন লগইন</h2>
                <p class="text-gray-600 text-lg">আপনার পিন কোড দিয়ে প্রবেশ করুন</p>
            </div>
            
            <!-- Error Alert -->
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg animate-shake">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-red-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <p class="text-red-800 font-semibold">{{ session('error') }}</p>
                            <p class="text-red-600 text-sm mt-1">অনুগ্রহ করে সঠিক পিন দিন</p>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="pin" class="block text-gray-700 font-semibold mb-3 text-center text-lg">
                        পিন কোড <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="pin" 
                            name="pin" 
                            class="w-full px-6 py-4 text-3xl text-center tracking-widest border-2 border-gray-300 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/20 focus:outline-none transition-all font-mono bg-gray-50 hover:bg-white" 
                            maxlength="10" 
                            required 
                            autofocus
                            placeholder="••••"
                        >
                        <div class="absolute inset-y-0 right-4 flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 text-center mt-2">সর্বোচ্চ ১০ সংখ্যার পিন</p>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-4 rounded-xl hover:shadow-xl transform hover:-translate-y-1 active:translate-y-0 transition-all font-bold text-lg">
                    <span class="flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        লগইন করুন
                    </span>
                </button>
            </form>
            
            <!-- Back Link -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('registration.index') }}" class="flex items-center justify-center text-primary hover:text-secondary transition-colors font-semibold group">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    রেজিস্ট্রেশন পেজে ফিরে যান
                </a>
            </div>

            <!-- Security Notice -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-sm text-blue-800 font-medium">সুরক্ষা নোটিশ</p>
                        <p class="text-xs text-blue-600 mt-1">এই পেজটি শুধুমাত্র অনুমোদিত অ্যাডমিনিস্ট্রেটরদের জন্য</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-8px); }
            20%, 40%, 60%, 80% { transform: translateX(8px); }
        }
        
        .animate-shake {
            animation: shake 0.6s ease-in-out;
        }
        
        /* Custom focus ring */
        input[type="password"]:focus {
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }
        
        /* Pulse animation for icon */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
        
        .inline-flex:hover {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
@endsection