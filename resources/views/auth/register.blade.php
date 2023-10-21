<x-guest-layout>
{{--@extends('layouts.app')--}}
{{--@section('content')--}}
    <div class="relative isolate flex flex-col gap-2 lg:flex-row">
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <a href="{{ route('portail') }}" class="flex justify-start items-center pb-4">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
                <h1 class="mb-4 text-xl font-semibold text-gray-700">Créer votre comte</h1>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Votre nom')"/>
                        <x-text-input type="text" id="name" name="name" class="block w-full" value="{{ old('name') }}" required autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Votre e-mail')"/>
                        <x-text-input name="email" type="email" class="block w-full" value="{{ old('email') }}"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Votre mot de passe')"/>
                        <x-text-input type="password" name="password" class="block w-full" required/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label id="password_confirmation" :value="__('Confirmer votre mot de passe')"/>
                        <x-text-input type="password" name="password_confirmation" class="block w-full" required/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-primary-button class="block w-full">
                            {{ __('Enrégistrer') }}
                        </x-primary-button>
                    </div>
                </form>
                <p class="mt-4">
                    <a class="text-sm font-medium text-primary-600 hover:underline"
                       href="{{ route('login') }}">{{ __('Avez-vous déjà un compte?') }}
                    </a>
                </p>
            </div>
        </div>
        <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-2/4 lg:shrink-0">
            <img aria-hidden="true" class="absolute inset-0 h-full w-full rounded-2xl object-cover" src="{{ asset('assets/images/happy.jpg') }}" alt="Office"/>
        </div>
    </div>
{{--@endsection--}}
</x-guest-layout>
