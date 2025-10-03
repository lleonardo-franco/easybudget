<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-surface-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="@yield('meta-description', 'Gerencie suas finanças pessoais com o EasyBudget.')">
        @unless (app()->environment('testing'))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endunless
        @stack('head')
    </head>
    <body class="h-full min-h-screen text-neutral-900 antialiased">
        <main class="min-h-screen">
            @yield('content')
        </main>
        @stack('scripts')
    </body>
</html>
