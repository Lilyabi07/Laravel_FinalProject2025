@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex flex-col items-center justify-start bg-[#091225] relative overflow-hidden">
    <!-- Fullscreen Animated Wave Background -->
    <div class="pointer-events-none select-none fixed inset-0 w-full h-full z-0 overflow-hidden flex flex-col justify-end">
        <div class="flex animate-wave will-change-transform w-[400vw] h-[550px] md:h-[1920px]">
            <img src="{{ asset('images/layered-waves-haikei-final.svg') }}"
                alt="Waves"
                class="w-[200vw] h-full object-cover"
                draggable="false" />
            <img src="{{ asset('images/layered-waves-haikei-final.svg') }}"
                alt="Waves"
                class="w-[200vw] h-full object-cover"
                draggable="false" />
        </div>
    </div>

    <!-- Glassmorphic Register Card -->
    <div class="relative z-10 bg-white/30 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-sm border border-white/40 mt-32">
        <h2 class="text-3xl font-bold mb-6 text-center text-white drop-shadow">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 text-white/80 font-medium" for="name">Name</label>
                <input class="w-full px-4 py-2 rounded-lg bg-white/40 border border-white/50 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       type="text" name="name" id="name" placeholder="Your Name" required autofocus>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-white/80 font-medium" for="email">Email</label>
                <input class="w-full px-4 py-2 rounded-lg bg-white/40 border border-white/50 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 text-white/80 font-medium" for="password">Password</label>
                <input class="w-full px-4 py-2 rounded-lg bg-white/40 border border-white/50 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="mb-6">
                <label class="block mb-1 text-white/80 font-medium" for="password_confirmation">Confirm Password</label>
                <input class="w-full px-4 py-2 rounded-lg bg-white/40 border border-white/50 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="w-full py-2 bg-yellow-400 text-black font-semibold rounded-full hover:bg-yellow-500 transition text-lg mb-4 shadow">
                Register
            </button>
        </form>
        <div class="text-center mt-2">
            <span class="text-white/80 text-sm">Already have an account?</span>
            <a href="{{ route('login') }}" class="text-blue-100 underline ml-1 hover:text-white">Login</a>
        </div>
    </div>
</div>
@endsection
