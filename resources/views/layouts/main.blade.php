<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetaCamp</title>
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9fafb;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #16a34a !important;
        }

        .card:hover {
            transform: translateY(-3px);
            transition: 0.2s ease;
        }

        .camp-image {
            height: 180px;
            object-fit: cover;
        }

        .map-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
        }

        footer {
            background: #111827;
            color: #9ca3af;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- ✅ Navbar kekal di semua page --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a href="/" class="navbar-brand">🏕️ PetaCamp</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 📍 Center: Navigation Menu -->
            <nav class="hidden md:flex  gap-6 text-sm font-medium text-gray-700 dark:text-gray-300">
                <a href="{{ route('about') }}">About</a>


                <!-- Dropdown for States -->
                {{-- <div class="relative group">
                    <button class="hover:text-green-600 transition-all flex items-center gap-1">
                        States
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-[1px]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute hidden group-hover:block bg-white dark:bg-[#1a1a1a] border border-gray-200 dark:border-[#333] shadow-md mt-2 rounded-md w-40">
                        <a href="#"
                            class="block px-4 py-2 text-sm hover:bg-green-50 dark:hover:bg-[#222]">Selangor</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm hover:bg-green-50 dark:hover:bg-[#222]">Pahang</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm hover:bg-green-50 dark:hover:bg-[#222]">Johor</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm hover:bg-green-50 dark:hover:bg-[#222]">Perak</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm hover:bg-green-50 dark:hover:bg-[#222]">Sabah</a>
                    </div>
                </div> --}}

               <a href="{{ route('camps.submit') }}" class="nav-link text-dark fw-medium">Submit Tempat Camp</a>
            </nav>


           @if (Route::has('login'))
    <nav class="d-flex align-items-center justify-content-end gap-3">
        @auth
            {{-- ✅ Bila user dah login --}}
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=16a34a&color=fff') }}"
                         alt="Profile"
                         class="rounded-circle me-2"
                         width="36" height="36">
                    <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                    @if (Auth::user()->id == 1)
                        <li><a class="dropdown-item" href="{{ route('admin.camps') }}">🛠 Admin Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                    @endif
                    <li><a class="dropdown-item" href="#">📄 Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">🚪 Log Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            {{-- 🚪 Bila user belum login --}}
            <a href="{{ route('login') }}" 
               class="px-4 py-2 border border-success text-success rounded-2 text-decoration-none fw-semibold hover:bg-success hover:text-white transition-all">
               Log Masuk
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" 
                   class="px-4 py-2 bg-success text-white rounded-2 text-decoration-none fw-semibold hover:bg-green-700 shadow-sm transition-all">
                   Daftar
                </a>
            @endif
        @endauth
    </nav>
@endif


        </div>
    </nav>

    {{-- ✅ Page content masuk di sini --}}
    <main class="py-5">
        @yield('content')
    </main>

    <footer class="bg-dark text-light text-center py-3 mt-auto">
        © {{ date('Y') }} PetaCamp.my — Dibina dengan ❤️ menggunakan Laravel.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
