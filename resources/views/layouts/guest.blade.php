<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{asset('logos/favicon.png')}}" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
{{--        <div class="flex justify-center items-center h-screen bg-gray-200 px-6">--}}
        <div class="flex items-center min-h-screen p-6 bg-gray-50">
{{--            <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">--}}
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
