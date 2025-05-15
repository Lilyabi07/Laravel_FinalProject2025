@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex flex-col items-center justify-center bg-[#091225] relative overflow-hidden">
    <!-- Animated wave background -->
    <div class="pointer-events-none select-none fixed inset-0 w-full h-full z-0 overflow-hidden">
        <div class="flex animate-wave will-change-transform min-w-full h-full absolute bottom-0 left-0">
            <img src="{{ asset('images/layered-waves-haikei-final.svg') }}"
                alt="Waves"
                class="min-w-[200vw] h-full object-cover"
                draggable="false"
            />
            <img src="{{ asset('images/layered-waves-haikei-final.svg') }}"
                alt="Waves"
                class="min-w-[200vw] h-full object-cover"
                draggable="false"
            />
        </div>
    </div>

    <div class="relative z-10 bg-white/30 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/40 mt-24">
        <h2 class="text-2xl font-bold mb-6 text-center text-white drop-shadow">
            {{ __('Verify Your Email Address') }}
        </h2>
        @if (session('resent'))
            <div class="mb-4 font-medium text-sm text-green-400 text-center">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <div class="text-white/90 mb-4 text-center">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </div>
        <div class="text-white/90 mb-4 text-center">
            {{ __('If you did not receive the email') }},
        </div>

        <form class="flex flex-col items-center" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="px-4 py-2 rounded-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold shadow transition mb-2">
                {{ __('Click here to request another') }}
            </button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.body.style.overflow = 'hidden';
    window.addEventListener('beforeunload', function () {
        document.body.style.overflow = '';
    });
</script>
@endsection