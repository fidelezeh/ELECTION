<x-guest-layout>
    <div class="">
        <a href="{{route('login')}}" class="flex justify-center items-center mb-4">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
        </a>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Mot de passe oublié ? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d’en choisir un nouveau.') }}
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- Email Address -->
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full">
                    {{ __('Réinitialiser le mot de passe') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
