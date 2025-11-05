<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'শিল্প প্রতিযোগিতা ২০২৫')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Tiro Bangla", serif;

            background-image: url("assets/bg.png")
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF0000',
                        secondary: '#00FF00',
                    }
                }
            }
        }
    </script>
</head>

<body class="from-primary to-secondary min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <a href="{{ route('registration.index') }}"
                    class="flex items-center space-x-2 text-primary hover:text-secondary transition-colors">
                    <span class="text-3xl"><img height="30px" width="30px" src="assets/art-logo.png"></span>
                    <span class="text-xl font-bold hidden sm:block">মুক্তিযুদ্ধ ও জুলাই গণ-অভ্যুত্থান</span>
                    <span class="text-xl font-bold sm:hidden">Home</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-4">
                    <button onclick="openDownloadModal()"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all font-semibold">
                        প্রবেশপত্র
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden text-primary p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-3 space-y-2">
                <button onclick="openDownloadModal()"
                    class="w-full text-left bg-gradient-to-r from-green-500 to-teal-500 text-white px-4 py-2 rounded-lg hover:shadow-lg transition-all font-semibold">
                    প্রবেশপত্র
                </button>
            </div>
        </div>
    </nav>

    <!-- Download Modal -->
    <div id="downloadModal"
        class="hidden fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4 animate-fadeIn">
        <div
            class="bg-white rounded-2xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto transform transition-all animate-slideUp">
            <div class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center rounded-t-2xl">
                <h2 class="text-2xl font-bold text-primary">প্রবেশপত্র</h2>
                <button onclick="closeDownloadModal()"
                    class="text-gray-400 hover:text-gray-600 text-3xl leading-none transition-colors">
                    &times;
                </button>
            </div>

            <form method="POST" action="{{ route('registration.download') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label for="modal_reg_id" class="block text-gray-700 font-semibold mb-2">
                        রেজিস্ট্রেশন আইডি <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="modal_reg_id" name="registration_id"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors"
                        placeholder="BG-12345678" required>
                </div>

                <div>
                    <label for="modal_phone" class="block text-gray-700 font-semibold mb-2">
                        অভিভাবকের ফোন নম্বর <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" id="modal_phone" name="parents_phone"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-primary focus:outline-none transition-colors"
                        pattern="[0-9]{11}" placeholder="০১XXXXXXXXX" required
                        oninvalid="this.setCustomValidity('সঠিক ১১ সংখ্যার ফোন নম্বর লিখুন (০১XXXXXXXXX)')"
                        oninput="this.setCustomValidity('')">
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-500 to-teal-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:-translate-y-0.5 transition-all font-semibold text-lg">
                    প্রবেশপত্র দেখুন
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        @yield('content')
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function openDownloadModal() {
            document.getElementById('downloadModal').classList.remove('hidden');
            document.getElementById('mobileMenu').classList.add('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeDownloadModal() {
            document.getElementById('downloadModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('downloadModal');
            if (event.target === modal) {
                closeDownloadModal();
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDownloadModal();
            }
        });

        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = event.target.closest('button[onclick="toggleMobileMenu()"]');
            if (!menu.contains(event.target) && !button) {
                menu.classList.add('hidden');
            }
        });
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }

        .animate-slideUp {
            animation: slideUp 0.3s ease-out;
        }
    </style>
</body>

</html>
