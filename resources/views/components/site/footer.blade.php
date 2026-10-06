@php
    $columns = [
        'Prodotto' => [
            ['label' => 'Piattaforma', 'href' => route('platform')],
            ['label' => 'Verifica attestato', 'href' => route('verify')],
            ['label' => 'Richiedi una demo', 'href' => route('contact')],
        ],
        'Azienda' => [
            ['label' => 'Contatti', 'href' => route('contact')],
            ['label' => 'Accedi', 'href' => url('/admin')],
        ],
        'Legale' => [
            ['label' => 'Privacy', 'href' => '#privacy'],
            ['label' => 'Cookie', 'href' => '#cookie'],
            ['label' => 'Termini', 'href' => '#termini'],
        ],
    ];
@endphp

<footer class="bg-onyx text-ivory">
    <div class="site-wrap pt-[72px] pb-8">
        <div class="flex flex-wrap justify-between gap-12">
            <div class="max-w-[320px]">
                <a href="{{ route('home') }}" class="text-ivory no-underline hover:text-ivory" aria-label="Attestami, home">
                    <x-site.logo />
                </a>
                <p class="mt-4 text-[15px] leading-[1.6] text-muted-dark">La piattaforma per erogare formazione obbligatoria e rilasciare attestati a norma.</p>
            </div>

            <div class="flex flex-wrap gap-x-[72px] gap-y-10">
                @foreach ($columns as $title => $links)
                    <div class="flex flex-col gap-2.5">
                        <p class="mb-1 text-[14px] font-medium text-muted-dark">{{ $title }}</p>
                        @foreach ($links as $link)
                            <a href="{{ $link['href'] }}" class="text-[15px] text-ivory no-underline hover:text-periwinkle">{{ $link['label'] }}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-14 flex flex-wrap justify-between gap-x-6 gap-y-3 border-t border-line-dark pt-6 text-[14px] leading-[1.5] text-muted-dark">
            <span>© {{ date('Y') }} Attestami · [Ragione sociale] · P.IVA [—] · PEC [—]</span>
            <span>Fatto in Italia</span>
        </div>
    </div>
</footer>
