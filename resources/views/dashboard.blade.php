@extends('layouts.app')

@section('title', 'Dashboard • EasyBudget')

@section('content')
    <div class="mx-auto flex max-w-6xl flex-col gap-10">
        <section class="grid gap-6 lg:grid-cols-3">
            <article class="surface-card p-6">
                <p class="text-sm font-semibold uppercase tracking-[0.32em] text-neutral-400">Patrimônio total</p>
                <h3 class="mt-4 text-4xl font-semibold text-neutral-900">R$ 284.930,27</h3>
                <p class="mt-3 flex items-center gap-2 text-sm text-success-600">
                    <span class="inline-flex h-2 w-2 rounded-full bg-success-500"></span>
                    +3,8% nos últimos 30 dias
                </p>
            </article>

            <article class="surface-card p-6">
                <p class="text-sm font-semibold uppercase tracking-[0.32em] text-neutral-400">Fluxo mensal</p>
                <h3 class="mt-4 text-4xl font-semibold text-neutral-900">R$ 12.487,55</h3>
                <p class="mt-3 text-sm text-neutral-500">Receitas recorrentes menos despesas essenciais.</p>
            </article>

            <article class="surface-card p-6">
                <p class="text-sm font-semibold uppercase tracking-[0.32em] text-neutral-400">Progresso de metas</p>
                <div class="mt-4 flex items-end justify-between gap-4">
                    <h3 class="text-4xl font-semibold text-neutral-900">68%</h3>
                    <x-ui.button variant="primary" size="sm">Planejar próximos passos</x-ui.button>
                </div>
                <p class="mt-3 text-sm text-neutral-500">Mantenha seus objetivos alinhados com o perfil de risco.</p>
            </article>
        </section>

        <section class="grid gap-6 lg:grid-cols-[2fr,1fr]">
            <article class="surface-card p-8">
                <header class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold text-neutral-900">Visão 360º</h2>
                        <p class="mt-2 max-w-lg text-sm text-neutral-500">Resumo consolidado de contas, investimentos, reservas e oportunidades identificadas pelo motor inteligente.</p>
                    </div>
                    <x-ui.button variant="ghost" size="sm">Exportar relatório</x-ui.button>
                </header>

                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <div class="rounded-3xl border border-white/40 bg-white/90 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-neutral-500">Liquidez imediata</h3>
                            <span class="inline-flex items-center gap-1 rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold text-primary-600">+9,2%</span>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-neutral-900">R$ 54.200,00</p>
                        <p class="mt-3 text-xs uppercase tracking-[0.3em] text-neutral-400">Inclui contas corrente e reservas</p>
                    </div>

                    <div class="rounded-3xl border border-white/40 bg-white/90 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-neutral-500">Reserva estratégica</h3>
                            <span class="inline-flex items-center gap-1 rounded-full bg-secondary-50 px-3 py-1 text-xs font-semibold text-secondary-700">+12 meses</span>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-neutral-900">R$ 38.750,00</p>
                        <p class="mt-3 text-xs uppercase tracking-[0.3em] text-neutral-400">Cobertura de imprevistos garantida</p>
                    </div>

                    <div class="rounded-3xl border border-white/40 bg-white/90 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-neutral-500">Carteira ativa</h3>
                            <span class="inline-flex items-center gap-1 rounded-full bg-success-50 px-3 py-1 text-xs font-semibold text-success-600">+15,6%</span>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-neutral-900">R$ 148.500,00</p>
                        <p class="mt-3 text-xs uppercase tracking-[0.3em] text-neutral-400">Ações, FIIs e renda fixa híbrida</p>
                    </div>

                    <div class="rounded-3xl border border-white/40 bg-white/90 p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-semibold text-neutral-500">Score de riscos</h3>
                            <span class="inline-flex items-center gap-1 rounded-full bg-danger-50 px-3 py-1 text-xs font-semibold text-danger-500">Moderado</span>
                        </div>
                        <p class="mt-4 text-3xl font-semibold text-neutral-900">61/100</p>
                        <p class="mt-3 text-xs uppercase tracking-[0.3em] text-neutral-400">Rebalanceamento sugerido em 4 dias</p>
                    </div>
                </div>
            </article>

            <aside class="glass-card flex h-full flex-col justify-between p-8">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.32em] text-neutral-400">Alertas inteligentes</p>
                    <h2 class="mt-4 text-2xl font-semibold text-neutral-900">Próximas ações</h2>
                    <ul class="mt-6 space-y-4 text-sm text-neutral-600">
                        <li class="flex gap-3">
                            <span class="mt-0.5 h-2 w-2 rounded-full bg-primary-500"></span>
                            Rebalancear a carteira de ações reduzindo exposição ao setor de tecnologia em 5%.
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-0.5 h-2 w-2 rounded-full bg-secondary-500"></span>
                            Agendar aporte na reserva estratégica para atingir 100% da meta de emergência.
                        </li>
                        <li class="flex gap-3">
                            <span class="mt-0.5 h-2 w-2 rounded-full bg-danger-500"></span>
                            Revisar orçamento de despesas variáveis: aumento acima da média nos últimos 3 meses.
                        </li>
                    </ul>
                </div>

                <x-ui.button variant="primary" size="md" class="mt-8 w-full">Ver plano detalhado</x-ui.button>
            </aside>
        </section>
    </div>
@endsection
