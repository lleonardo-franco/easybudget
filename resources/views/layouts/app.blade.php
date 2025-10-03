<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-surface-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="@yield('meta-description', 'Painel financeiro inteligente do EasyBudget.')">
        @unless (app()->environment('testing'))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endunless
        @stack('head')
    </head>
    <body class="h-full min-h-screen text-neutral-900 antialiased">
        <div class="min-h-screen">
            <header class="border-b border-surface-200/60 bg-white/80 backdrop-blur-xl">
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-6 px-6 py-5 lg:px-10">
                    <x-ui.logo />

                    <nav class="flex items-center gap-6 text-sm font-semibold text-neutral-600">
                        <a href="#" class="transition-colors hover:text-primary-600">Resumo</a>
                        <a href="#" class="transition-colors hover:text-primary-600">Patrimônio</a>
                        <a href="#" class="transition-colors hover:text-primary-600">Investimentos</a>
                        <a href="#" class="transition-colors hover:text-primary-600">Objetivos</a>
                    </nav>

                    <div class="flex items-center gap-4">
                        <div class="flex flex-col text-right text-sm">
                            <span class="font-semibold text-neutral-700">{{ auth()->user()->name }}</span>
                            <span class="text-xs text-neutral-400">{{ auth()->user()->email }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-ui.button type="submit" variant="ghost" size="sm">Sair</x-ui.button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="px-6 py-10 lg:px-10">
                @yield('content')
            </main>
        </div>

        @stack('scripts')
    </body>
</html>
