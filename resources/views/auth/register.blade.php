<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F7F2EB] min-h-screen flex items-center justify-center p-6">
<div class="w-full max-w-xl mx-auto">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-black text-[#112250] mb-2">
            Get Started With Us!
        </h1>
        <p class="text-lg text-gray-600">
            Sign up to start managing your data and unlock all available features.
        </p>
    </div>

    <div class="bg-[#112250] text-white rounded-3xl shadow-2xl border border-blue-100 p-8">
        <h2 class="text-2xl font-semibold mb-6 text-center">Sign Up</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- Name (gabung first + last) --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Full Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full p-3 rounded-2xl bg-white/10 border border-white/30
                           text-white placeholder-white/60 focus:outline-none
                           focus:ring-2 focus:ring-blue-300 focus:border-blue-200"
                    placeholder="John Doe">
                @error('name')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full p-3 rounded-2xl bg-white/10 border border-white/30
                           text-white placeholder-white/60 focus:outline-none
                           focus:ring-2 focus:ring-blue-300 focus:border-blue-200"
                    placeholder="john@example.com">
                @error('email')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full p-3 rounded-2xl bg-white/10 border border-white/30
                           text-white placeholder-white/60 focus:outline-none
                           focus:ring-2 focus:ring-blue-300 focus:border-blue-200"
                    placeholder="Create password">
                @error('password')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-semibold mb-1">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="w-full p-3 rounded-2xl bg-white/10 border border-white/30
                           text-white placeholder-white/60 focus:outline-none
                           focus:ring-2 focus:ring-blue-300 focus:border-blue-200"
                    placeholder="Repeat password">
            </div>

            <button
                type="submit"
                class="w-full py-3 mt-2 bg-[#b9cdee] text-[#112250]
                       font-bold text-lg shadow-lg rounded-2xl
                       hover:shadow-xl hover:-translate-y-1
                       transition-all duration-300">
                Create Account
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-white/80">
            Already have an account?
            <a href="{{ route('login') }}"
               class="font-semibold text-blue-200 hover:underline">
                Login
            </a>
        </p>
    </div>
</div>
</body>
</html>
