<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="Application Gestion Gabonaise Election CGE"/>
        <meta name="Fidele ZEH" content="Clean Election"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
{{--        app title--}}
        <title>{{ config('app.name', 'Laravel') }}</title>
{{--        favicon--}}
        <link rel="shortcut icon" href="{{asset('logos/favicon.png')}}"/>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"/>
{{--        css et js--}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body x-data="main" class="antialiased relative font-inter bg-white dark:bg-black text-black dark:text-white text-sm font-normal overflow-x-hidden vertical" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.rightsidebar ? 'right-sidebar' : '', $store.app.menu, $store.app.layout]">
        <div x-cloak class="fixed inset-0 bg-[black]/60 z-40 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>
        <div class="main-container navbar-sticky flex" :class="[$store.app.navbar]">
            @include('components.partials.sidebar')
            <div class="main-content flex-1">
                @include('components.partials.header')
                <div class="h-[calc(93vh-73px)] overflow-y-auto overflow-x-hidden">
                    <div class="container px-6 py-4 mx-auto">
                        @yield('content')
                    </div>
                </div>
                @include('components.partials.footer')
            </div>
        </div>
        @include('sweetalert::alert')

        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{asset('assets/js/alpine-collaspe.min.js')}}"></script>
        <script src="{{asset('assets/js/alpine-persist.min.js')}}"></script>
        <script src="{{asset('assets/js/alpine.min.js')}}" defer></script>

        <script src="{{asset('assets/js/apexcharts.js')}}"></script>
        <script src="{{asset('assets/js/apexcharts-main.js')}}"></script>

        <script src="{{asset('assets/js/custom.js')}}"></script>

{{--        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
    </body>
</html>
