@props([
    'active' => null,
    'overHero' => false,
])

@php
    $links = [
        'platform' => 'Piattaforma',
        'verify' => 'Verifica attestato',
        'contact' => 'Contatti',
    ];
@endphp

<header @class([
    'sticky top-0 z-50 border-b backdrop-blur-md backdrop-saturate-[1.4]',
    'nav-fade border-transparent bg-transparent text-ivory' => $overHero,
    'border-line bg-mist/95 text-ink' => ! $overHero,
])>
    <nav class="site-wrap flex min-h-[72px] flex-wrap items-center justify-between gap-x-6 gap-y-3" aria-label="Principale">
        <a href="{{ route('home') }}" class="text-inherit no-underline" aria-label="Attestami, home">
            <x-site.logo />
        </a>

        <div class="flex flex-wrap items-center gap-7 text-[15px] max-[600px]:order-3 max-[600px]:w-full max-[600px]:gap-x-5 max-[600px]:gap-y-2 max-[600px]:pb-3">
            @foreach ($links as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @class([
                        'text-inherit no-underline transition-opacity hover:opacity-100',
                        'font-medium opacity-100' => $active === $route,
                        'opacity-[0.78]' => $active !== $route,
                    ])
                    @if ($active === $route) aria-current="page" @endif
                >{{ $label }}</a>
            @endforeach
        </div>

        <div class="flex items-center gap-1.5">
            <a href="{{ url('/admin') }}" class="px-3.5 py-3 text-[15px] text-inherit no-underline max-[600px]:hidden">Accedi</a>
            <a href="{{ route('contact') }}" class="inline-flex min-h-11 items-center rounded-full bg-cobalt px-5 text-[15px] font-medium text-white no-underline transition-colors hover:bg-cobalt-hover hover:text-white focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle">Richiedi una demo</a>
        </div>
    </nav>
    <div class="scroll-progress h-0.5 bg-cobalt"></div>
</header>
