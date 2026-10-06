@php
    /** Icone a tratto (viewBox 24×24): solo il contenuto interno dell'SVG. */
    $icons = [
        'badge' => '<circle cx="12" cy="9" r="5.5"></circle><path d="M8.8 13.5L7.5 21l4.5-2.2 4.5 2.2-1.3-7.5"></path>',
        'arrow-right' => '<path d="M5 12h14M13 6l6 6-6 6"></path>',
        'qr' => '<rect x="4" y="4" width="6" height="6" rx="1"></rect><rect x="14" y="4" width="6" height="6" rx="1"></rect><rect x="4" y="14" width="6" height="6" rx="1"></rect><path d="M14 14h2.5v2.5M20 14v.01M14 20h.01M17 20h3v-3"></path>',
        'info' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 11v5M12 8h.01"></path>',
        'check' => '<path d="M5.5 12.5l4 4L18.5 7.5"></path>',
        'download' => '<path d="M12 4v11"></path><path d="M7 10.5l5 5 5-5"></path><path d="M5 20h14"></path>',
        'file' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5"></path>',
        'hash' => '<path d="M5 9h14M5 15h14M10 4L8 20M16 4l-2 16"></path>',
        'register' => '<path d="M4 19.5V5a2 2 0 0 1 2-2h13v15H6a2 2 0 0 0-2 2 2 2 0 0 0 2 2h13"></path><path d="M8 7.5h7M8 11h5"></path>',
        'unlock' => '<rect x="5" y="11" width="14" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 7.6-1.7"></path>',
        'status-valid' => '<circle cx="12" cy="12" r="8.5"></circle><path d="M8.5 12.2l2.4 2.4 4.6-4.8"></path>',
        'status-expired' => '<circle cx="12" cy="12" r="8.5"></circle><path d="M12 7.8V12l2.8 1.8"></path>',
        'status-revoked' => '<circle cx="12" cy="12" r="8.5"></circle><path d="M9.5 9.5l5 5M14.5 9.5l-5 5"></path>',
    ];

    /** Disegna un'icona decorativa: {{ $icon('check', 18) }}. */
    $icon = fn (string $name, int $size = 18, string $strokeWidth = '1.75', string $class = '') => new \Illuminate\Support\HtmlString(sprintf(
        '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="%2$s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"%3$s>%4$s</svg>',
        $size,
        $strokeWidth,
        $class !== '' ? ' class="'.$class.'"' : '',
        $icons[$name],
    ));

    /** QR dimostrativo (griglia 21×21) e firma dell'anteprima dell'attestato. */
    $qrPath = 'M0 0h7v7h-7zM1 1v5h5v-5zM2 2h3v3h-3zM14 0h7v7h-7zM15 1v5h5v-5zM16 2h3v3h-3zM0 14h7v7h-7zM1 15v5h5v-5zM2 16h3v3h-3zM8 0h3v1h-3zM12 0h1v1h-1zM8 1h3v1h-3zM10 2h3v1h-3zM8 3h1v1h-1zM8 4h1v1h-1zM11 4h1v1h-1zM11 5h2v1h-2zM8 6h1v1h-1zM10 6h1v1h-1zM12 6h1v1h-1zM8 7h2v1h-2zM11 7h2v1h-2zM0 8h2v1h-2zM4 8h3v1h-3zM12 8h1v1h-1zM14 8h5v1h-5zM0 9h1v1h-1zM2 9h1v1h-1zM5 9h1v1h-1zM7 9h3v1h-3zM12 9h1v1h-1zM14 9h4v1h-4zM19 9h1v1h-1zM1 10h6v1h-6zM10 10h1v1h-1zM13 10h2v1h-2zM16 10h1v1h-1zM18 10h1v1h-1zM20 10h1v1h-1zM1 11h1v1h-1zM3 11h1v1h-1zM5 11h1v1h-1zM8 11h2v1h-2zM14 11h3v1h-3zM18 11h3v1h-3zM1 12h3v1h-3zM6 12h3v1h-3zM10 12h2v1h-2zM13 12h4v1h-4zM18 12h1v1h-1zM9 13h2v1h-2zM12 13h1v1h-1zM14 13h1v1h-1zM19 13h1v1h-1zM8 14h2v1h-2zM12 14h3v1h-3zM16 14h1v1h-1zM19 14h1v1h-1zM9 15h1v1h-1zM16 15h2v1h-2zM19 15h2v1h-2zM8 16h1v1h-1zM10 16h1v1h-1zM14 16h1v1h-1zM16 16h2v1h-2zM20 16h1v1h-1zM10 17h2v1h-2zM17 17h1v1h-1zM20 17h1v1h-1zM10 18h1v1h-1zM13 18h1v1h-1zM17 18h1v1h-1zM19 18h2v1h-2zM8 19h1v1h-1zM10 19h3v1h-3zM14 19h2v1h-2zM18 19h1v1h-1zM20 19h1v1h-1zM9 20h5v1h-5zM16 20h1v1h-1zM20 20h1v1h-1z';
    $signaturePath = 'M2 22c8-14 14-18 16-12s-6 14-2 12 10-16 14-14-4 12 0 11 8-8 12-8 4 6 8 5 10-4 16-6';

    /* Risultato della verifica (esempio): [etichetta, valore, cifre tabellari] */
    $details = [
        ['Titolare', 'Anna Neri', false],
        ['Corso', 'Formazione Generale Lavoratori · 4 ore', false],
        ['Riferimento', 'art. 37 D.Lgs 81/08', false],
        ['Rilasciato il', '18 aprile 2026', true],
        ['Validità', 'Permanente', false],
        ['Ente', 'Ente Demo Formazione', false],
    ];

    /* Cosa vedi in questa pagina */
    $explainers = [
        ['hash', 'Codice univoco', 'Ogni attestato ha un codice che non si ripete, stampato sul PDF accanto al QR. Il codice apre sempre e solo questa scheda.'],
        ['register', "Dati dal registro dell'ente", "Le informazioni arrivano dal registro di chi ha erogato il corso, non dal file: se lo stato cambia, qui lo leggi aggiornato. Solo i dati che servono a riconoscere l'attestato."],
        ['unlock', 'Nessuna registrazione richiesta', 'Chi controlla, che sia un datore di lavoro, un committente o un ispettore, non deve creare un account né installare nulla.'],
    ];

    /* Stati possibili */
    $states = [
        [
            'badge' => 'Valido',
            'icon' => 'status-valid',
            'tone' => 'bg-success-soft text-[#0F8A63]',
            'title' => 'Attestato in regola',
            'text' => "È registrato dall'ente e in corso di validità. Il PDF che scarichi è quello originale.",
            'code' => 'ATT-2026-0418-7Q',
            'note' => 'Permanente',
        ],
        [
            'badge' => 'Scaduto',
            'icon' => 'status-expired',
            'tone' => 'bg-warning-soft text-warning',
            'title' => 'Il corso va rinnovato',
            'text' => "La validità è terminata. La scheda indica la data di scadenza e l'aggiornamento da frequentare.",
            'code' => 'ATT-2021-0312-4B',
            'note' => 'Scaduto il 12/03/2026',
        ],
        [
            'badge' => 'Revocato',
            'icon' => 'status-revoked',
            'tone' => 'bg-danger-soft text-danger',
            'title' => "Annullato dall'ente",
            'text' => "L'ente ha annullato l'attestato, ad esempio per un errore nei dati. Il PDF in circolazione non vale più.",
            'code' => 'ATT-2026-0611-2M',
            'note' => 'Revocato il 02/09/2026',
        ],
    ];

    /* Stili ricorrenti */
    $eyebrow = 'text-[14px] leading-[1.5] font-medium text-cobalt-text';
    $sectionTitle = 'font-display text-[clamp(36px,4.6vw,60px)] leading-[1.06]';
    $cardTitle = "text-[22px] leading-[1.25] font-[560] [font-variation-settings:'FLAR'_60]";
    $focusRing = 'focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt';
    $buttonBase = 'inline-flex min-h-12 items-center gap-2 rounded-full px-6 text-[16px] font-medium no-underline transition-colors '.$focusRing;
    $buttonPrimary = $buttonBase.' bg-cobalt text-white hover:bg-cobalt-hover hover:text-white';
    $buttonSecondary = $buttonBase.' border border-[#D9D9E3] bg-white text-ink hover:border-[#B9B9C9] hover:text-ink';
@endphp

<x-site.layout title="Verifica attestato" active="verify">

    {{-- ===== 1 · Hero con modulo di verifica ===== --}}
    <section class="relative overflow-clip bg-linear-to-b from-[#DCE2F3] to-mist pt-[112px] max-[860px]:pt-[72px]">
        <div class="site-wrap relative z-2 text-center">
            <div class="parallax-text">
                <p class="{{ $eyebrow }}">Verifica pubblica</p>
                <h1 class="mx-auto mt-5 max-w-[1080px] font-display text-[clamp(48px,7vw,96px)] leading-[1.02] min-[860px]:text-balance">Verifica un attestato in un secondo.</h1>
                <p class="mx-auto mt-7 max-w-[560px] text-[19px] leading-[1.6] text-ink-soft">Inserisci il codice stampato sull'attestato o inquadra il QR con la fotocamera del telefono.</p>
            </div>

            <form
                method="GET"
                action="{{ route('verify') }}"
                role="search"
                aria-label="Verifica un attestato"
                class="mx-auto mt-10 flex max-w-[600px] items-center gap-3 rounded-full border border-[#D9D9E3] bg-white py-2 pr-2 pl-[22px] text-left shadow-[0_24px_48px_-24px_rgba(23,23,33,0.22),0_2px_6px_rgba(23,23,33,0.04)] focus-within:border-cobalt focus-within:shadow-[0_0_0_4px_#E8EBFD,0_24px_48px_-24px_rgba(23,23,33,0.22)] max-[480px]:flex-wrap max-[480px]:rounded-[24px] max-[480px]:p-2"
            >
                {{ $icon('badge', 20, '1.75', 'flex-none text-muted max-[480px]:hidden') }}
                <label for="codice-attestato" class="sr-only">Codice dell'attestato</label>
                <input
                    id="codice-attestato"
                    name="codice"
                    type="text"
                    value="{{ $code }}"
                    placeholder="ATT-2026-0418-7Q"
                    required
                    maxlength="40"
                    autocomplete="off"
                    autocapitalize="characters"
                    spellcheck="false"
                    @if ($code) aria-describedby="verifica-avviso" @endif
                    class="min-w-0 flex-auto border-0 bg-transparent py-3 font-brand text-[18px] leading-[normal] font-medium tracking-[0.04em] text-ink tabular-nums placeholder:text-muted focus:outline-none max-[480px]:flex-[1_1_100%] max-[480px]:px-3 max-[480px]:py-2.5 max-[480px]:text-[17px]"
                >
                <button type="submit" class="{{ $buttonPrimary }} flex-none cursor-pointer border-0 font-brand leading-[normal] max-[480px]:flex-[1_1_100%] max-[480px]:justify-center">Verifica{{ $icon('arrow-right') }}</button>
            </form>

            @if ($code)
                <div id="verifica-avviso" role="status" class="mx-auto mt-4 flex max-w-[600px] items-start gap-3 rounded-[16px] bg-cobalt-soft px-5 py-4 text-left text-[15px] leading-[1.5] text-ink-soft">
                    {{ $icon('info', 20, '1.75', 'mt-px flex-none text-cobalt-text') }}
                    <p class="min-w-0">La verifica online sarà attiva con il lancio della piattaforma. Il codice <span class="inline-block max-w-full font-medium tracking-[0.04em] wrap-anywhere text-ink tabular-nums">{{ $code }}</span> non può ancora essere controllato.</p>
                </div>
            @endif

            <p class="mt-5 inline-flex flex-wrap items-center justify-center gap-x-2 gap-y-1 text-[15px] leading-[1.5] text-ink-soft">
                {{ $icon('qr', 18, '1.75', 'text-cobalt-text') }}<span><span class="font-medium text-cobalt-text">Hai un QR?</span> Inquadralo: si apre questa pagina già compilata.</span>
            </p>
        </div>

        {{-- Dolomiti lontane e nebbia --}}
        <div aria-hidden="true" class="relative mt-2 h-[210px]">
            <div class="parallax-far absolute inset-x-0 bottom-0 h-full">
                <svg class="absolute bottom-0 left-0 block size-full" viewBox="0 0 1440 220" preserveAspectRatio="none"><polygon fill="#D6DCEF" points="0,220 0,150 60,138 110,146 170,120 205,124 240,96 262,102 290,70 304,78 322,58 340,92 372,104 420,96 470,118 520,110 560,84 584,90 606,52 620,60 634,40 650,66 676,74 720,108 780,100 830,122 880,112 930,80 952,86 972,56 988,62 1004,44 1022,72 1060,90 1110,104 1160,96 1210,118 1260,100 1300,72 1318,78 1336,58 1356,84 1400,98 1440,92 1440,220"></polygon><polygon fill="#C9D1EA" points="0,220 0,178 50,172 100,180 150,162 190,166 228,142 246,148 266,120 278,126 292,106 306,130 340,144 400,152 460,140 500,148 540,126 560,130 578,102 590,108 602,90 616,114 640,128 700,152 760,158 820,148 870,156 920,132 948,136 968,114 980,120 994,98 1008,106 1020,84 1036,110 1060,124 1110,142 1170,152 1230,138 1280,146 1320,128 1350,132 1376,112 1400,130 1440,136 1440,220"></polygon></svg>
            </div>
            <div class="absolute inset-x-0 bottom-0 h-[72%] bg-linear-to-b from-mist/0 via-mist/55 via-45% to-mist"></div>
        </div>
    </section>

    {{-- ===== 2 · Risultato (esempio) ===== --}}
    <section id="risultato" aria-labelledby="esempio esito" class="pt-6">
        <div class="site-wrap">
            <p id="esempio" class="reveal mb-3 flex w-fit items-center rounded-full bg-surface-alt px-3 py-1 text-[13px] leading-[1.5] font-medium text-ink-soft">Esempio di attestato verificato</p>

            <div class="reveal mb-5 flex flex-wrap items-baseline justify-between gap-x-6 gap-y-1 text-[14px] leading-[1.5]">
                <p class="font-medium text-cobalt-text">Risultato della verifica</p>
                <p class="text-muted tabular-nums">Controllato il 6 ottobre 2026 alle 10:24 · dati dal registro dell'ente</p>
            </div>

            <div class="reveal-scale flex flex-wrap items-stretch gap-6">

                {{-- Scheda dell'esito --}}
                <article class="flex min-w-0 flex-[1_1_440px] flex-col rounded-[20px] border border-line bg-white px-10 pt-10 pb-9 max-[860px]:px-5 max-[860px]:py-7">
                    <div class="flex flex-wrap items-center gap-x-5 gap-y-4">
                        <span class="inline-flex size-14 flex-none items-center justify-center rounded-full bg-success-soft text-[#0F8A63]">{{ $icon('check', 28, '2') }}</span>
                        <div class="min-w-0">
                            <h2 id="esito" class="font-display text-[34px] leading-[1.1]">Attestato valido</h2>
                            <p class="mt-1.5 text-[15px] leading-[1.5] text-muted">Codice <span class="font-medium tracking-[0.04em] text-ink tabular-nums">ATT-2026-0418-7Q</span></p>
                        </div>
                    </div>

                    <dl class="mt-8 grid grid-cols-[minmax(104px,168px)_minmax(0,1fr)] text-[15px] leading-[1.5]">
                        @foreach ($details as [$label, $value, $tabular])
                            <dt @class(['border-t border-line py-3.5 pr-4 text-muted', 'border-b' => $loop->last])>{{ $label }}</dt>
                            <dd @class(['border-t border-line py-3.5 font-medium', 'tabular-nums' => $tabular, 'border-b' => $loop->last])>{{ $value }}</dd>
                        @endforeach
                    </dl>

                    <div class="mt-auto flex flex-wrap gap-3 pt-8">
                        <a href="#scarica" class="{{ $buttonPrimary }}">{{ $icon('download') }}Scarica il PDF</a>
                        <a href="#segnala" class="{{ $buttonSecondary }}">Segnala un problema</a>
                    </div>
                </article>

                {{-- Anteprima dell'attestato --}}
                <div role="img" aria-label="Anteprima dell'attestato PDF di Anna Neri per il corso Formazione Generale Lavoratori, codice ATT-2026-0418-7Q, con QR di verifica" class="relative flex min-w-0 flex-[1_1_440px] flex-col justify-center overflow-hidden rounded-[18px] bg-linear-to-b from-onyx via-onyx via-52% to-[#23263E] px-11 pt-8 pb-[52px] shadow-[0_50px_100px_-30px_rgba(23,23,33,0.45),0_0_0_1px_rgba(23,23,33,0.08)] max-[860px]:px-4 max-[860px]:pt-7 max-[860px]:pb-9">
                    <svg class="absolute bottom-0 left-0 block h-[34%] w-full" viewBox="0 0 1440 300" preserveAspectRatio="none" aria-hidden="true"><polygon fill="#2A2F4A" points="0,300 0,190 90,170 170,186 250,140 300,150 360,96 392,112 430,70 456,84 486,58 520,118 590,140 680,128 760,158 840,146 920,104 960,116 1000,74 1030,88 1062,50 1096,100 1160,126 1240,112 1320,140 1440,128 1440,300"></polygon><polygon fill="#1E1F2C" points="0,300 0,236 120,226 220,240 320,214 400,222 470,196 520,206 580,180 640,212 760,232 880,220 980,234 1080,206 1150,214 1210,192 1270,220 1360,232 1440,224 1440,300"></polygon></svg>

                    <div class="relative mb-7 flex justify-between gap-3 text-[13px] leading-[1.4] text-muted-dark">
                        <span class="inline-flex items-center gap-2">{{ $icon('file', 16, '1.75', 'text-periwinkle') }}Anteprima dell'attestato</span>
                        <span class="tabular-nums">PDF · A4</span>
                    </div>

                    <div class="relative rotate-[1.5deg] rounded-md bg-[#FBFAF7] p-3 text-ink shadow-[0_60px_100px_-40px_rgba(0,0,0,0.75),0_24px_48px_-24px_rgba(0,0,0,0.5)]">
                        <div class="rounded-[3px] border border-[#E6E2D6] px-7 pt-7 pb-6">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="inline-flex size-7 items-center justify-center rounded-[7px] bg-onyx text-[10.5px] font-bold tracking-[0.02em] text-[#FBFAF7]">ED</span>
                                    <span class="text-[13.5px] font-[560]">Ente Demo Formazione</span>
                                </div>
                                <span class="text-[11.5px] tracking-[0.03em] text-muted tabular-nums">N. ATT-2026-0418-7Q</span>
                            </div>
                            <div class="mt-7 font-display text-[28px] leading-[1.1]">Attestato di formazione</div>
                            <div class="mt-[18px] text-[13px] text-muted">Si attesta che</div>
                            <div class="mt-0.5 text-[24px] leading-[1.2] font-[520] [font-variation-settings:'FLAR'_100]">Anna Neri</div>
                            <p class="mt-2.5 text-[13px] leading-[1.6] text-ink-soft">ha frequentato con verifica finale dell'apprendimento il corso <span class="font-[560] text-ink">Formazione Generale Lavoratori (4 ore)</span>, ai sensi dell'art. 37 del D.Lgs 81/08 e dell'Accordo Stato-Regioni.</p>
                            <div class="mt-7 flex flex-wrap items-end justify-between gap-5">
                                <div class="flex-[1_1_160px]">
                                    <div class="text-[12.5px] text-ink-soft tabular-nums">Brescia, 18/04/2026</div>
                                    <svg class="mt-2 block" width="130" height="28" viewBox="0 0 140 30" fill="none" aria-hidden="true"><path d="{{ $signaturePath }}" stroke="#171721" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    <div class="mt-1 h-px max-w-[190px] bg-[#B9B6AC]"></div>
                                    <div class="mt-1.5 text-[11.5px] text-muted">Il responsabile del corso</div>
                                </div>
                                <div class="flex flex-col items-center gap-1.5">
                                    <svg class="block" width="76" height="76" viewBox="-1 -1 23 23" shape-rendering="crispEdges" aria-hidden="true"><path fill="#171721" d="{{ $qrPath }}"></path></svg>
                                    <span class="text-[10.5px] text-muted">Verifica con il QR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== 3 · Cosa vedi ===== --}}
    <section aria-labelledby="cosa-vedi" class="pt-32 max-[860px]:pt-20">
        <div class="site-wrap">
            <div class="reveal max-w-[900px]">
                <p class="{{ $eyebrow }}">Come leggere la verifica</p>
                <h2 id="cosa-vedi" class="{{ $sectionTitle }} mt-4">Cosa vedi in questa pagina</h2>
            </div>

            <div class="mt-16 grid grid-cols-[repeat(auto-fit,minmax(260px,1fr))] gap-x-8 gap-y-10">
                @foreach ($explainers as [$iconName, $title, $text])
                    <div class="reveal border-t border-[#D9D9E3] pt-7">
                        <span class="inline-flex size-10 items-center justify-center rounded-lg bg-cobalt-soft text-cobalt-text">{{ $icon($iconName, 20) }}</span>
                        <h3 class="{{ $cardTitle }} mt-5">{{ $title }}</h3>
                        <p class="mt-2.5 text-ink-soft">{{ $text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 4 · Stati possibili ===== --}}
    <section aria-labelledby="stati" class="pt-32 pb-[120px] max-[860px]:pt-20 max-[860px]:pb-20">
        <div class="site-wrap">
            <div class="reveal flex flex-wrap items-end justify-between gap-x-12 gap-y-5">
                <div class="max-w-[640px]">
                    <p class="{{ $eyebrow }}">Stati possibili</p>
                    <h2 id="stati" class="{{ $sectionTitle }} mt-4">Una risposta chiara, sempre.</h2>
                </div>
                <p class="max-w-[400px] text-ink-soft">Lo stato segue il registro dell'ente: se un attestato scade o viene annullato, la verifica lo mostra subito.</p>
            </div>

            <div class="mt-14 grid grid-cols-[repeat(auto-fit,minmax(280px,1fr))] gap-6">
                @foreach ($states as $state)
                    <article class="reveal flex flex-col rounded-2xl border border-line bg-white px-7 pt-7 pb-6">
                        <span class="{{ $state['tone'] }} inline-flex items-center gap-1.5 self-start rounded-full py-1 pr-3 pl-2 text-[14px] leading-[1.5] font-semibold">{{ $icon($state['icon'], 16, '2') }}{{ $state['badge'] }}</span>
                        <h3 class="{{ $cardTitle }} mt-5">{{ $state['title'] }}</h3>
                        <p class="mt-2.5 text-[16px] leading-[1.6] text-ink-soft">{{ $state['text'] }}</p>
                        <div class="mt-auto pt-6">
                            <div class="flex justify-between gap-3 border-t border-surface-alt pt-4 text-[13px] leading-[1.5] text-muted tabular-nums">
                                <span>{{ $state['code'] }}</span>
                                <span>{{ $state['note'] }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="reveal mt-[72px] flex flex-wrap items-center justify-between gap-x-8 gap-y-5 rounded-2xl border border-line bg-white px-8 py-7 max-[860px]:px-5 max-[860px]:py-6">
                <div class="max-w-[640px] flex-[1_1_360px]">
                    <h3 class="{{ $cardTitle }}">Rilasci attestati per il tuo ente?</h3>
                    <p class="mt-1.5 text-[16px] leading-[1.6] text-ink-soft">Con Attestami ogni attestato nasce con codice e QR, verificabile da qui.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('platform') }}" class="{{ $buttonSecondary }}">Scopri la piattaforma</a>
                    <a href="{{ route('contact') }}" class="{{ $buttonPrimary }}">Richiedi una demo{{ $icon('arrow-right') }}</a>
                </div>
            </div>
        </div>
    </section>

</x-site.layout>
