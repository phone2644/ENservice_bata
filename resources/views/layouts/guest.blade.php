<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('Register', 'Register') }}</title>

        <!-- Fonts -->
        <link rel="icon" href="../image/icon/npu.png" sizes="192x192">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        
          <style>
           body {
            min-height: 100vh;
            background: url(../image/background-1.jpg) no-repeat;
            backdrop-filter: blur(5px);
            background-size: cover;
            background-position: center;
          
          }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
