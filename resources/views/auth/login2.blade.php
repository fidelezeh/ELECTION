<x-guest-layout >
    <a href="{{ route('portail') }}" class="flex justify-center items-center">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
    </a>
    <p class="flex flex-wrap justify-center">SE CONNECTER</p>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    {{--    formulaire--}}
    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf
        <!-- Email Address -->
        <div class="mt-6">
            <x-input-label for="email" />
            <x-text-input type="email" name="email" id="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password"/>
            <x-text-input type="password" name="password" id="password" required placeholder="password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        {{--button--}}
        <div class="mt-8">
            <x-primary-button class="w-full">
                {{ __('Connexion') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
