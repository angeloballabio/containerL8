<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endif
            </div>
        @endif

        <div class="py-1">
            <img class="object-contain h-screen w-full" src="/immagini/container4.jpeg" alt="Container 4">
            <p style="color: white; font-size: 40px; position: absolute; left: 50%; transform: translatex(-50%); top: 100px; font-weight: bold;">Gestore del servizio di sdoganamento container</p>
            <p style="color: white; font-size: 40px; position: absolute; left: 50%; transform: translatex(-50%); top: 140px; font-weight: bold;">Raggruppo delle voci fattura per sdoganamento</p>
            <p style="color: white; font-size: 40px; position: absolute; left: 50%; transform: translatex(-50%); top: 180px; font-weight: bold;">Preparazione bollettini di presa in carico/consegna</p>
            <p style="color: white; font-size: 40px; position: absolute; left: 50%; transform: translatex(-50%); top: 220px; font-weight: bold;">Preparazione richieste certificati sanitari</p>
            <p style="color: white; font-size: 40px; position: absolute; left: 50%; transform: translatex(-50%); top: 260px; font-weight: bold;">e certificati di conformita</p>
        </div>
    </div>
</x-guest-layout>
