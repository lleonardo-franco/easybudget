@extends('layouts.guest')

@section('title', 'Entrar • EasyBudget')

@section('content')
    <div class="relative isolate overflow-hidden bg-surface-100/90">
        <div class="pointer-events-none absolute inset-0 -z-10 blur-3xl">
            <div class="absolute -left-32 top-24 h-72 w-72 rounded-full bg-primary-200/40"></div>
            <div class="absolute right-32 top-1/3 h-96 w-96 rounded-full bg-secondary-200/40"></div>
            <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-primary-100/40"></div>
        </div>

        <div class="mx-auto flex min-h-screen w-full max-w-6xl flex-col justify-center gap-12 px-6 py-16 lg:flex-row lg:items-center lg:px-12">
            <section class="hidden w-full max-w-xl flex-1 lg:block">
                <div class="surface-card relative overflow-hidden px-12 py-14 text-white">
                    <div class="absolute inset-0 -z-10 opacity-90">
                        <div class="h-full w-full gradient-primary"></div>
                        <div class="absolute -right-12 top-12 h-48 w-48 rounded-full bg-secondary-300/30 blur-3xl"></div>
                        <div class="absolute -bottom-10 left-16 h-56 w-56 rounded-full bg-white/20 blur-3xl"></div>
                    </div>

                    <span class="badge-soft bg-white/10 text-white/90 ring-1 ring-white/20">
                        Plataforma inteligente de investimento pessoal
                    </span>

                    <h2 class="mt-8 text-4xl font-semibold text-white sm:text-5xl">
                        Controle financeiro com clareza e estratégia
                    </h2>

                    <p class="mt-6 max-w-md text-base text-white/80 text-balance">
                        Centralize contas, investimentos e objetivos em um único painel.
                        Insights inteligentes ajudam você a investir com confiança e enxergar o próximo passo.
                    </p>

                    <ul class="mt-8 space-y-5 text-sm text-white/85">
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-secondary-200"></span>
                            Consolide bancos, cartões e corretoras com sincronização automática.
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-secondary-200"></span>
                            Simule cenários de investimento de acordo com o seu perfil e metas.
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 h-2 w-2 rounded-full bg-secondary-200"></span>
                            Acompanhe indicadores e alertas em tempo real para manter-se no plano.
                        </li>
                    </ul>

                    <div class="mt-10 grid gap-3 text-sm text-white/80">
                        <div class="flex items-center justify-between border-b border-white/10 pb-3">
                            <span>Meta de reserva de emergência</span>
                            <span class="text-right text-lg font-semibold text-white">82% atingido</span>
                        </div>
                        <div class="flex items-center justify-between border-b border-white/10 pb-3">
                            <span>Rentabilidade média dos últimos 12 meses</span>
                            <span class="text-right text-lg font-semibold text-secondary-100">+12,4%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Nível de risco atual</span>
                            <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-[0.24em] text-white">Balanceado</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="w-full max-w-xl flex-1">
                <div class="glass-card mx-auto max-w-md px-10 py-12 shadow-[0_28px_80px_-45px_rgba(15,23,42,0.55)]">
                    <div class="flex flex-col gap-6">
                        <x-ui.logo />

                        <header>
                            <p class="text-sm font-medium uppercase tracking-[0.32em] text-neutral-400">Boas-vindas</p>
                            <h1 class="mt-3 text-3xl font-semibold text-neutral-900 sm:text-4xl">Entre na sua conta</h1>
                            <p class="mt-4 text-base text-neutral-500">
                                Acesse seu painel para conduzir investimentos, acompanhar planos e tomar decisões estratégicas.
                            </p>
                        </header>
                    </div>

                    @if (session('status'))
                        <div class="mt-6">
                            <x-ui.alert variant="info">
                                {{ session('status') }}
                            </x-ui.alert>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}" class="mt-8 space-y-6" novalidate>
                        @csrf

                        <div class="space-y-2">
                            <x-ui.label for="email" value="E-mail" />
                            <x-ui.input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" :invalid="$errors->has('email')" />
                            <x-ui.input-error :value="$errors->first('email')" />
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <x-ui.label for="password" value="Senha" />
                                <a href="#" class="text-sm font-semibold text-primary-600 hover:text-primary-500">Esqueci minha senha</a>
                            </div>
                            <x-ui.input id="password" type="password" name="password" required autocomplete="current-password" :invalid="$errors->has('password')" />
                            <x-ui.input-error :value="$errors->first('password')" />
                        </div>

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <label class="inline-flex items-center gap-3 text-sm font-medium text-neutral-600">
                                <input type="checkbox" name="remember" class="h-4 w-4 rounded-md border-surface-300/80 text-primary-600 focus:ring-primary-400" {{ old('remember') ? 'checked' : '' }}>
                                Manter sessão ativa neste dispositivo
                            </label>
                            <span class="text-sm text-neutral-500">Acesso seguro com autenticação multi-dispositivo.</span>
                        </div>

                        <x-ui.button type="submit" size="lg" class="w-full">Entrar agora</x-ui.button>

                        <div class="text-center text-sm text-neutral-500">
                            Ainda não tem conta?
                            <a href="#" class="font-semibold text-primary-600 hover:text-primary-500">Crie sua conta para começar</a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
