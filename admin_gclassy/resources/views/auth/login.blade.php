<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Selamat Datang</h2>
        <p class="text-white text-opacity-70">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-6 p-4 bg-emerald-400 bg-opacity-15 border border-emerald-300 border-opacity-30 rounded-xl backdrop-blur-sm">
            <p class="text-emerald-100 text-sm">{{ session('status') }}</p>
        </div>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-400 bg-opacity-15 border border-rose-300 border-opacity-30 rounded-xl backdrop-blur-sm">
            @foreach ($errors->all() as $error)
                <p class="text-rose-100 text-sm">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

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
                    autofocus 
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
                    autocomplete="current-password"
                    class="form-input block w-full pl-10 pr-3 py-3 bg-white bg-opacity-15 border border-white border-opacity-30 rounded-xl text-white placeholder-white placeholder-opacity-60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40 focus:border-transparent backdrop-blur-lg shadow-lg"
                    placeholder="Masukkan password Anda"
                />
            </div>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember"
                    class="h-4 w-4 bg-white bg-opacity-15 border border-white border-opacity-30 rounded focus:ring-white focus:ring-opacity-40 text-white backdrop-blur-lg"
                >
                <span class="ml-2 text-sm text-white text-opacity-70">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-white text-opacity-70 hover:text-white transition-colors duration-200" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <button 
            type="submit"
            class="w-full py-3 px-4 bg-white bg-opacity-85 hover:bg-opacity-95 text-gray-800 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-40"
        >
            <span class="flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                Masuk ke Akun
            </span>
        </button>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-white text-opacity-70 text-sm">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-white hover:text-opacity-95 font-semibold transition-colors duration-200">
                    Daftar Sekarang
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
