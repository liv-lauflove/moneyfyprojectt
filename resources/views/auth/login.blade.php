<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="bg-[#F7F2EB] min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-black text-[#112250] mb-2">Welcome back!</h1>
            <p class="text-lg text-gray-600">
                Log in to access your dashboard and continue where you left off.
            </p>
        </div>

        <div class="bg-[#112250] text-white rounded-3xl shadow-2xl border border-blue-100 p-8">
            <h2 class="text-2xl font-semibold mb-6 text-center">Sign In</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full p-3 rounded-2xl bg-white/10 border border-white/30
                               text-white placeholder-white/60 focus:outline-none
                               focus:ring-2 focus:ring-blue-300 focus:border-blue-200"
                        placeholder="hello@example.com">
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
                        placeholder="********">
                    @error('password')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full py-3 mt-2 rounded-2xl bg-[#b9cdee]
                           text-[#112250] font-bold shadow-lg
                           hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    Sign In Securely
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-white/80">
                Don’t have an account?
                <a href="{{ route('register') }}"
                   class="font-semibold text-blue-200 hover:underline">
                    Create one
                </a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
