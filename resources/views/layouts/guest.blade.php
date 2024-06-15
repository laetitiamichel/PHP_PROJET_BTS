<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        {{-- FAVICONE --}}
        <link  rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="manifest" href="/assets/favicon/site.webmanifest">
        <!-- Fonts -->
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/main.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

                <div class="img_logo_log">
                    <img src="/assets/logo_jo.png" alt="logo jeux olympique">
                </div>
          
            {{--  <div>
                <a href="/">
                  {{--   <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}
            <div class="inner-form_inscription">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
