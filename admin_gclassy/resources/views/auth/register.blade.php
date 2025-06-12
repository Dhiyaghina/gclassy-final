<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Buat Akun Baru</h2>
        <p class="text-white text-opacity-70">Bergabunglah dengan platform e-learning terbaik</p>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-400 bg-opacity-15 border border-rose-300 border-opacity-30 rounded-xl backdrop-blur-sm">
            @foreach ($errors->all() as $error)
                <p class="text-rose-100 text-sm">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-white text-opacity-85">
                Nama Lengkap
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-white text-opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    value="{{ old('name') }}"
                    required 
                    autofocus 
                    autocomplete="name"
                    class="form-input block w-full pl-10 pr-3 py-3 bg-white bg-opacity-15 border border-white border-opacity-30 rounded-xl text-white placeholder-white placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40 focus:border-transparent backdrop-blur-lg shadow-lg"
                    placeholder="Masukkan nama lengkap Anda"
                />
            </div>
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-white text-opacity-85">
                Email Address
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-white text-opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ old('email') }}"
                    required 
                    autocomplete="username"
                    class="form-input block w-full pl-10 pr-3 py-3 bg-white bg-opacity-15 border border-white border-opacity-30 rounded-xl text-white placeholder-white placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40 focus:border-transparent backdrop-blur-lg shadow-lg"
                    placeholder="Masukkan email Anda"
                />
            </div>
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="block text-sm font-medium text-white text-opacity-85">
                Password
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-white text-opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    required 
                    autocomplete="new-password"
                    class="form-input block w-full pl-10 pr-3 py-3 bg-white bg-opacity-15 border border-white border-opacity-30 rounded-xl text-white placeholder-white placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40 focus:border-transparent backdrop-blur-lg shadow-lg"
                    placeholder="Buat password yang kuat"
                />
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="block text-sm font-medium text-white text-opacity-85">
                Konfirmasi Password
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-white text-opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <input 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    required 
                    autocomplete="new-password"
                    class="form-input block w-full pl-10 pr-3 py-3 bg-white bg-opacity-15 border border-white border-opacity-30 rounded-xl text-white placeholder-white placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40 focus:border-transparent backdrop-blur-lg shadow-lg"
                    placeholder="Ulangi password Anda"
                />
            </div>
        </div>

        <!-- Register Button -->
        <button 
            type="submit"
            class="w-full py-3 px-4 bg-white bg-opacity-85 hover:bg-opacity-95 text-gray-800 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40"
        >
            <span class="flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Daftar Sekarang
            </span>
        </button>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-white text-opacity-70 text-sm">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-white hover:text-opacity-95 font-semibold transition-colors duration-200">
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
