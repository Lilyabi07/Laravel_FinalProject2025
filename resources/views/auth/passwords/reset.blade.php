
@extends('layouts.app')

@section('content')

<div class="min-h-screen w-full flex items-center justify-center bg-[#091225] relative overflow-hidden overscroll-none">
    <!-- Animated wave background -->
    <div class="pointer-events-none select-none fixed inset-0 w-full h-full z-0 overflow-hidden">
        <div class="flex animate-wave will-change-transform min-w-full h-full absolute bottom-0 left-0">
            <img src="{{ asset('images/layered-waves-haikei-final.svg') }}"
                alt="Waves"
                class="min-w-full h-full object-cover"
                draggable="false"
            />
            <img src="{{ asset('images/layered-waves-haikei-final.svg') }}"
                alt="Waves"
                class="min-w-full h-full object-cover"
                draggable="false"
            />
        </div>
    </div>

    <!-- Glassmorphic Reset Card -->
    <div class="relative z-10 bg-white/30 backdrop-blur-md rounded-2xl shadow-2xl px-12 py-10 w-full max-w-lg border border-white/40 flex flex-col items-center">
        <h2 class="text-4xl font-bold mb-8 text-center text-white drop-shadow">Reset Password</h2>
        @if (session('status'))
            <div class="w-full mb-4 bg-green-500/80 text-white text-center py-2 rounded">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf
            <div class="mb-8">
                <label for="email" class="block mb-1 text-white/80 font-medium text-lg">Email Address</label>
                <input id="email"
                       type="email"
                       class="w-full px-4 py-3 rounded-lg bg-white/40 border border-white/50 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400 text-lg"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus
                       placeholder="Your email">
                @error('email')
                    <div class="mt-2 text-yellow-200 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit"
                    class="w-full py-3 bg-yellow-400 text-black font-semibold rounded-full hover:bg-yellow-500 transition text-lg mb-4 shadow">
                Send Password Reset Link
            </button>
        </form>
        <a href="{{ route('login') }}"
           class="w-full text-center mt-2 py-2 rounded-full bg-white/20 text-white hover:text-yellow-300 hover:bg-white/40 font-semibold transition block">
           ← Return to Login
        </a>
    </div>
</div>
@endsection