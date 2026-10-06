<x-site.layout title="Piattaforma" active="platform">
    @php
        // Icone dell'interfaccia (contenuto interno degli SVG 24×24, tratto a currentColor).
        $icons = [
            'grid' => '<rect x="4" y="4" width="7" height="7" rx="1.5"></rect><rect x="13" y="4" width="7" height="7" rx="1.5"></rect><rect x="4" y="13" width="7" height="7" rx="1.5"></rect><rect x="13" y="13" width="7" height="7" rx="1.5"></rect>',
            'book' => '<path d="M4 5.5A1.5 1.5 0 0 1 5.5 4H11v16H5.5A1.5 1.5 0 0 1 4 18.5z"></path><path d="M20 5.5A1.5 1.5 0 0 0 18.5 4H13v16h5.5a1.5 1.5 0 0 0 1.5-1.5z"></path>',
            'layers' => '<path d="M12 4l8 4-8 4-8-4z"></path><path d="M4 12l8 4 8-4"></path><path d="M4 16l8 4 8-4"></path>',
            'calendar' => '<rect x="3.5" y="5" width="17" height="15" rx="2"></rect><path d="M3.5 10h17M8 3v4M16 3v4"></path>',
            'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"></rect><path d="M9 4V3h6v1"></path><path d="M9 13l2 2 4-4"></path>',
            'users' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M3 20a6 6 0 0 1 12 0"></path><path d="M16 4.5a3.5 3.5 0 0 1 0 7"></path><path d="M18 14.5a6 6 0 0 1 3 5.5"></path>',
            'building' => '<path d="M4 20V5a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v15"></path><path d="M15 9h4a1 1 0 0 1 1 1v10"></path><path d="M3 20h18"></path><path d="M8 8h3M8 12h3M8 16h3"></path>',
            'teacher' => '<circle cx="10" cy="8" r="3.5"></circle><path d="M4 20a6 6 0 0 1 12 0"></path><path d="M16 11l2 2 4-4"></path>',
            'award' => '<circle cx="12" cy="9" r="5.5"></circle><path d="M8.5 13.5L7 21l5-2.5 5 2.5-1.5-7.5"></path>',
            'clock' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path>',
            'file' => '<path d="M14 3H6.5A1.5 1.5 0 0 0 5 4.5v15A1.5 1.5 0 0 0 6.5 21h11a1.5 1.5 0 0 0 1.5-1.5V8z"></path><path d="M14 3v5h5"></path><path d="M8.5 13h7M8.5 17h5"></path>',
            'menu' => '<path d="M4 6h16M4 12h16M4 18h16"></path>',
            'search' => '<circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3.5-3.5"></path>',
            'bell' => '<path d="M6 16v-5a6 6 0 0 1 12 0v5l1.5 2h-15z"></path><path d="M10 20.5a2 2 0 0 0 4 0"></path>',
            'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.6.3-1 .9-1 1.6v.6"></path><path d="M12 17h.01"></path>',
            'download' => '<path d="M12 4v11M7 10l5 5 5-5"></path><path d="M5 20h14"></path>',
            'plus' => '<path d="M12 5v14M5 12h14"></path>',
            'helmet' => '<path d="M4 17h16v2.5H4z"></path><path d="M6 17v-3a6 6 0 0 1 12 0v3"></path><path d="M10 8.5V6h4v2.5"></path>',
            'flame' => '<path d="M12 3c.5 3.5 5 5.5 5 10.5a5 5 0 0 1-10 0c0-2.5 1.5-4 2.5-5 .3 1.6 1 2.6 2 3 0-3.3-.3-5.8.5-8.5z"></path>',
            'first-aid' => '<rect x="4" y="4" width="16" height="16" rx="3"></rect><path d="M12 8.5v7M8.5 12h7"></path>',
            'utensils' => '<path d="M7 3v8M5 3v5a2 2 0 0 0 4 0V3M7 11v10"></path><path d="M17 3c-1.7 1-2.5 3-2.5 6v3H17v9"></path>',
            'shield' => '<path d="M12 3l7.5 3v5.5c0 4.5-3.2 8.2-7.5 9.5-4.3-1.3-7.5-5-7.5-9.5V6z"></path>',
            'alert' => '<path d="M12 4L2.5 20h19z"></path><path d="M12 10v4.5M12 17.5h.01"></path>',
            'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3.5 6.5l8.5 6 8.5-6"></path>',
            'check' => '<path d="M5 12.5l4.5 4.5L19 7.5"></path>',
            'chevron-left' => '<path d="M15 6l-6 6 6 6"></path>',
            'chevron-right' => '<path d="M9 6l6 6-6 6"></path>',
            'list' => '<path d="M9 6h11M9 12h11M9 18h11M4.5 6h.01M4.5 12h.01M4.5 18h.01"></path>',
            'shuffle' => '<path d="M4 7h3.5c2 0 3 1 4.5 3.5S14.5 17 16.5 17H20M4 17h3.5c1.2 0 2-.4 2.8-1.2M13.7 8.2c.8-.8 1.6-1.2 2.8-1.2H20M17 4l3 3-3 3M17 14l3 3-3 3"></path>',
            'timer' => '<circle cx="12" cy="13" r="8"></circle><path d="M12 9v4l2.5 1.5M9.5 2.5h5"></path>',
            'target' => '<circle cx="12" cy="12" r="8.5"></circle><circle cx="12" cy="12" r="4.5"></circle><circle cx="12" cy="12" r="0.8"></circle>',
            'user-plus' => '<circle cx="10" cy="8" r="3.5"></circle><path d="M4 20a6 6 0 0 1 12 0"></path><path d="M19 8v6M16 11h6"></path>',
            'letter' => '<path d="M14 3H6.5A1.5 1.5 0 0 0 5 4.5v15A1.5 1.5 0 0 0 6.5 21H11"></path><path d="M14 3l5 5v3"></path><path d="M14 3v5h5"></path><path d="M8.5 12h5M8.5 16h2.5"></path><path d="M14 21l.6-2.4 4.6-4.6a1.4 1.4 0 0 1 2 2l-4.6 4.6z"></path>',
            'palette' => '<path d="M12 3a9 9 0 1 0 0 18c1.1 0 1.8-.9 1.5-1.9-.3-1 .4-2.1 1.5-2.1H17a4 4 0 0 0 4-4c0-5.5-4-10-9-10z"></path><circle cx="7.5" cy="11.5" r="1"></circle><circle cx="10.5" cy="7.5" r="1"></circle><circle cx="15.5" cy="8.5" r="1"></circle>',
            'table' => '<rect x="4" y="4" width="16" height="16" rx="2"></rect><path d="M4 9.5h16M4 15h16M10 4v16"></path>',
            'key' => '<circle cx="8" cy="15" r="4"></circle><path d="M10.8 12.2L19 4M16 7l2.5 2.5M14 9l2 2"></path>',
            'globe' => '<circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a14 14 0 0 1 0 18a14 14 0 0 1 0-18z"></path>',
            'database' => '<ellipse cx="12" cy="6" rx="7" ry="3"></ellipse><path d="M5 6v12c0 1.7 3.1 3 7 3s7-1.3 7-3V6"></path><path d="M5 12c0 1.7 3.1 3 7 3s7-1.3 7-3"></path>',
            'lock' => '<rect x="5" y="10.5" width="14" height="10" rx="2"></rect><path d="M8 10.5V8a4 4 0 0 1 8 0v2.5"></path>',
            'arrow-right' => '<path d="M5 12h14M13 6l6 6-6 6"></path>',
        ];

        // SVG decorativo di un'icona: {{ $icon('calendar', 18) }}
        $icon = fn (string $name, int $size = 16, float $stroke = 1.75) => new \Illuminate\Support\HtmlString(
            '<svg width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="'.$stroke.'" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.$icons[$name].'</svg>'
        );

        // Marchio Attestami (cerchio con spunta) usato dentro le schermate finte.
        $mark = fn (int $size, float $ring, float $tick, string $class = '') => new \Illuminate\Support\HtmlString(
            '<svg width="'.$size.'" height="'.$size.'" viewBox="0 0 26 26" fill="none" aria-hidden="true"'.($class ? ' class="'.$class.'"' : '').'><circle cx="13" cy="13" r="11.25" stroke="currentColor" stroke-width="'.$ring.'"></circle><path d="M8.5 13.4l3 3 6-6.4" stroke="currentColor" stroke-width="'.$tick.'" stroke-linecap="round" stroke-linejoin="round"></path></svg>'
        );

        // Toni di stato (badge, avatar, tessere icona).
        $tones = [
            'cobalt' => 'bg-cobalt-soft text-cobalt-text',
            'success' => 'bg-success-soft text-[#0F8A63]',
            'warning' => 'bg-warning-soft text-warning',
            'danger' => 'bg-danger-soft text-danger',
            'neutral' => 'bg-surface-alt text-ink-soft',
        ];

        // Classi ricorrenti delle schermate finte.
        $mockFrame = 'rounded-[18px] bg-onyx p-3.5 shadow-[0_50px_100px_-30px_rgba(23,23,33,0.45),0_0_0_1px_rgba(23,23,33,0.08)]';
        $mockCard = 'rounded-lg border border-[#E9E9F0] bg-white shadow-[0_4px_24px_rgba(23,23,33,0.05)]';
        $mockScreen = 'overflow-clip rounded-[10px] bg-[#F3F4F8] text-left text-[12px] leading-[1.45] text-ink';
        $mockTopbar = 'flex h-[41px] items-center gap-2 border-b border-[#E9E9F0] bg-white px-3.5';
        $mockAvatar = 'ml-auto inline-flex size-6 items-center justify-center rounded-full bg-cobalt-soft text-[10px] font-semibold text-cobalt-text';
        $panel = 'relative flex min-h-[640px] scroll-mt-[104px] flex-col justify-center overflow-clip rounded-3xl bg-linear-to-b/srgb from-[#E3E8F6] via-[#ECEEF7] via-58% to-[#F1F2F8] px-10 py-14 max-[860px]:min-h-0 max-[860px]:rounded-[18px] max-[860px]:px-3 max-[860px]:pt-6 max-[860px]:pb-8';
        $panelCaption = 'relative mb-4 hidden text-[14px] font-medium text-cobalt-text max-[1080px]:block';
        $floatCard = 'reveal absolute rounded-[14px] bg-white p-4 text-left text-[12px] leading-[1.45] text-ink shadow-[0_40px_80px_-24px_rgba(23,23,33,0.38),0_0_0_1px_rgba(23,23,33,0.06)] max-[860px]:static max-[860px]:mt-4 max-[860px]:w-auto';
        $sectionTitle = 'font-display text-[clamp(36px,4.6vw,60px)] leading-[1.06] text-balance';
        $eyebrow = 'text-[14px] font-medium leading-[1.4] text-cobalt';
    @endphp

    {{-- 1. Hero --}}
    <section class="relative pt-[88px] pb-[120px] max-[860px]:pt-20">
        <div class="site-wrap">
            <div class="parallax-text">
                <p class="mb-5 {{ $eyebrow }}">La piattaforma</p>
                <h1 class="max-w-[1000px] font-display text-[clamp(48px,7vw,96px)] leading-[1.02] text-ink text-balance">Ogni passaggio del corso, tracciato.</h1>

                @php
                    $chips = [
                        'scadenze' => 'Scadenze',
                        'calendario' => 'Calendario',
                        'esami' => 'Esami',
                        'attestati' => 'Attestati',
                        'iscrizioni' => 'Iscrizioni',
                        'brand' => 'Brand',
                    ];
                @endphp
                <div class="mt-9 flex flex-wrap items-end justify-between gap-x-12 gap-y-7">
                    <p class="max-w-[480px] text-[19px] leading-[1.6] text-ink-soft">Dal catalogo all'attestato firmato: niente da ricopiare, niente da ricordare a memoria.</p>
                    <nav aria-label="Vai alla funzione" class="flex flex-wrap gap-2">
                        @foreach ($chips as $anchor => $label)
                            <a href="#{{ $anchor }}" class="inline-flex items-center rounded-full border border-line bg-white px-4 py-2 text-[14px] leading-[1.4] text-ink-soft no-underline transition-colors hover:border-[#B9B9C9] hover:text-ink focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt">{{ $label }}</a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>

        <div class="relative mt-16">
            {{-- Crinale atmosferico dietro la schermata --}}
            <div aria-hidden="true" class="platform-hero-sky pointer-events-none absolute inset-x-0 top-[160px] -bottom-[120px] overflow-clip">
                <svg class="parallax-far absolute top-0 left-0 block h-[300px] w-full" viewBox="0 0 1440 300" preserveAspectRatio="none"><polygon fill="#CCD3EB" points="0,300 0,150 60,128 110,140 160,92 190,104 228,52 252,78 290,64 330,112 390,96 446,128 512,88 548,40 572,66 610,24 640,70 676,58 728,116 796,96 858,130 920,82 952,46 978,74 1016,62 1070,114 1132,100 1196,132 1246,90 1288,104 1336,66 1388,96 1440,84 1440,300"></polygon></svg>
                <svg class="parallax-mid absolute top-[70px] left-0 block h-[300px] w-full" viewBox="0 0 1440 300" preserveAspectRatio="none"><polygon fill="#B9C2E1" fill-opacity="0.9" points="0,300 0,196 70,176 128,188 196,148 236,160 300,120 330,136 382,112 444,166 520,150 600,178 676,154 744,112 772,128 812,96 852,140 914,156 994,140 1056,164 1124,132 1184,104 1222,132 1284,150 1350,138 1440,154 1440,300"></polygon></svg>
                <div class="absolute inset-x-0 top-[150px] h-[200px] bg-linear-to-b/srgb from-mist/0 to-mist/55"></div>
                <svg class="absolute top-[170px] left-0 block h-[300px] w-full" viewBox="0 0 1440 300" preserveAspectRatio="none"><polygon fill="#A9B3D7" fill-opacity="0.75" points="0,300 0,240 90,224 170,236 250,206 320,222 400,200 470,230 560,214 650,236 740,210 820,228 900,204 980,226 1070,212 1150,232 1240,208 1320,224 1440,214 1440,300"></polygon></svg>
                <div class="absolute inset-x-0 top-[300px] bottom-0 bg-linear-to-b/srgb from-mist/0 from-0% via-mist/55 via-30% to-mist to-75%"></div>
            </div>

            <div class="site-wrap relative">
                <div class="reveal-scale {{ $mockFrame }}" role="img" aria-label="Schermata del gestionale Attestami: elenco delle edizioni dei corsi di ottobre con date, sede, posti occupati, docente e stato">
                    <div class="flex overflow-clip rounded-[10px] bg-[#F3F4F8] text-left text-[13px] leading-[1.45] text-ink">

                        {{-- Barra laterale --}}
                        @php
                            $sidebar = [
                                'Principale' => [
                                    ['label' => 'Dashboard', 'icon' => 'grid'],
                                ],
                                'Formazione' => [
                                    ['label' => 'Corsi', 'icon' => 'book'],
                                    ['label' => 'Edizioni', 'icon' => 'layers', 'active' => true],
                                    ['label' => 'Calendario', 'icon' => 'calendar'],
                                    ['label' => 'Esami', 'icon' => 'clipboard'],
                                ],
                                'Persone' => [
                                    ['label' => 'Corsisti', 'icon' => 'users'],
                                    ['label' => 'Aziende', 'icon' => 'building'],
                                    ['label' => 'Docenti', 'icon' => 'teacher'],
                                ],
                                'Documenti' => [
                                    ['label' => 'Attestati', 'icon' => 'award'],
                                    ['label' => 'Scadenze', 'icon' => 'clock', 'badge' => '9'],
                                    ['label' => 'Registro', 'icon' => 'file'],
                                ],
                            ];
                        @endphp
                        <div class="flex-[0_0_193px] border-r border-[#E9E9F0] bg-white pb-4 max-[1100px]:hidden">
                            <div class="flex h-[57px] items-center gap-2 border-b border-[#E9E9F0] px-5 text-cobalt">
                                {{ $mark(20, 1.6, 1.8) }}
                                <span class="text-[16px] font-[520] tracking-[0.01em] text-ink [font-variation-settings:'FLAR'_100]">Attestami</span>
                            </div>
                            @foreach ($sidebar as $group => $items)
                                <div class="px-5 pt-4 pb-1.5 text-[10px] font-semibold tracking-[0.08em] text-[#737389] uppercase">{{ $group }}</div>
                                @foreach ($items as $item)
                                    <div @class([
                                        'mx-2 flex items-center gap-2.5 rounded-lg px-3 py-[7px]',
                                        'bg-cobalt-soft font-[560] text-cobalt-text' => $item['active'] ?? false,
                                        'text-ink-soft' => ! ($item['active'] ?? false),
                                    ])>
                                        {{ $icon($item['icon']) }}{{ $item['label'] }}
                                        @isset($item['badge'])
                                            <span class="ml-auto rounded-full px-[7px] py-px text-[11px] font-semibold leading-[1.4] {{ $tones['warning'] }}">{{ $item['badge'] }}</span>
                                        @endisset
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                        {{-- Area principale --}}
                        <div class="min-w-0 flex-auto">
                            <div class="flex h-[57px] items-center gap-3 border-b border-[#E9E9F0] bg-white px-5">
                                <span class="inline-flex size-8 items-center justify-center rounded-lg text-ink-soft">{{ $icon('menu', 18) }}</span>
                                <span class="flex h-9 min-w-0 flex-[0_1_366px] items-center gap-2 overflow-clip rounded-lg border border-[#E9E9F0] bg-[#F3F4F8] px-3 whitespace-nowrap text-muted">{{ $icon('search') }}Cerca corsisti, corsi, attestati…</span>
                                <span class="flex-auto"></span>
                                <span class="inline-flex size-8 items-center justify-center rounded-lg text-ink-soft max-[860px]:hidden">{{ $icon('calendar', 18) }}</span>
                                <span class="relative inline-flex size-8 items-center justify-center rounded-lg text-ink-soft max-[860px]:hidden">{{ $icon('bell', 18) }}<span class="absolute top-1.5 right-[7px] size-[10px] rounded-full border-[1.5px] border-white bg-cobalt"></span></span>
                                <span class="inline-flex size-8 items-center justify-center rounded-lg text-ink-soft max-[860px]:hidden">{{ $icon('help', 18) }}</span>
                                <span class="flex items-center gap-2.5 pl-2">
                                    <span class="inline-flex size-8 items-center justify-center rounded-full bg-cobalt-soft text-[12px] font-semibold text-cobalt-text">MP</span>
                                    <span class="flex flex-col leading-[1.25] max-[860px]:hidden"><span class="font-[560]">Marco Predieri</span><span class="text-[11.5px] text-muted">Amministratore</span></span>
                                </span>
                            </div>

                            <div class="p-5">
                                <div class="flex flex-wrap items-center justify-between gap-x-4 gap-y-2">
                                    <span class="text-[20px] font-[560] leading-[1.25] [font-variation-settings:'FLAR'_60]">Edizioni</span>
                                    <span class="text-[12px] text-muted">Home <span class="text-[#B4B4C4]">/</span> Formazione <span class="text-[#B4B4C4]">/</span> <span class="text-ink">Edizioni</span></span>
                                </div>

                                @php
                                    $heroStats = [
                                        ['label' => 'Edizioni in programma', 'value' => '24', 'line' => '0,22 10,19 20,20 30,14 40,16 50,10 60,11 72,5', 'fill' => '#E8EBFD', 'stroke' => '#5266EB', 'highlight' => '▲ 12%', 'highlightClass' => 'text-[#0F8A63]', 'note' => 'sul mese scorso'],
                                        ['label' => 'Iscritti questo mese', 'value' => '312', 'line' => '0,20 10,21 20,15 30,17 40,12 50,13 60,8 72,6', 'fill' => '#E8EBFD', 'stroke' => '#5266EB', 'highlight' => '▲ 5%', 'highlightClass' => 'text-[#0F8A63]', 'note' => 'ultima settimana'],
                                        ['label' => 'Posti disponibili', 'value' => '41', 'line' => '0,8 10,10 20,9 30,13 40,12 50,16 60,18 72,20', 'fill' => '#EDEDF3', 'stroke' => '#62627A', 'highlight' => null, 'highlightClass' => null, 'note' => 'su 386 posti in calendario'],
                                        ['label' => "In lista d'attesa", 'value' => '7', 'line' => '0,18 10,16 20,17 30,12 40,14 50,15 60,11 72,12', 'fill' => '#FDF0DC', 'stroke' => '#A15C07', 'highlight' => '3', 'highlightClass' => 'text-warning', 'note' => 'su Antincendio liv. 2'],
                                    ];
                                @endphp
                                {{-- "▲" non è in Commissioner: come nel design ripiega sul sans-serif generico, non su system-ui. --}}
                                <div class="mt-4 grid grid-cols-[repeat(auto-fit,minmax(170px,1fr))] gap-3.5">
                                    @foreach ($heroStats as $stat)
                                        <div class="{{ $mockCard }} px-4 py-3.5">
                                            <div class="text-[12px] text-muted">{{ $stat['label'] }}</div>
                                            <div class="mt-1 flex items-end justify-between gap-2">
                                                <span class="text-[24px] font-[560] leading-[1.15] tabular-nums">{{ $stat['value'] }}</span>
                                                <svg width="72" height="28" viewBox="0 0 72 28" fill="none" aria-hidden="true"><polygon points="{{ $stat['line'] }} 72,28 0,28" fill="{{ $stat['fill'] }}"></polygon><polyline points="{{ $stat['line'] }}" stroke="{{ $stat['stroke'] }}" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"></polyline></svg>
                                            </div>
                                            <div class="mt-1.5 text-[11.5px] text-muted">@if ($stat['highlight'])<span class="font-semibold [font-family:Commissioner,sans-serif] {{ $stat['highlightClass'] }}">{{ $stat['highlight'] }}</span> @endif{{ $stat['note'] }}</div>
                                        </div>
                                    @endforeach
                                </div>

                                @php
                                    $editions = [
                                        ['course' => 'Sicurezza generale lavoratori', 'meta' => '4 ore · Accordo Stato-Regioni', 'icon' => 'helmet', 'tone' => 'cobalt', 'edition' => '14/26', 'dates' => '12 ott', 'place' => 'Bergamo · Aula 2', 'seats' => '18/20', 'fill' => 'w-[90%]', 'teacher' => 'Ing. Conti', 'status' => 'Iscrizioni aperte', 'statusTone' => 'cobalt'],
                                        ['course' => 'Antincendio livello 2', 'meta' => '8 ore · DM 02/09/2021', 'icon' => 'flame', 'tone' => 'danger', 'edition' => '09/26', 'dates' => '15 ott', 'place' => 'Brescia · Sala 3', 'seats' => '20/20', 'fill' => 'w-full', 'teacher' => 'Geom. Russo', 'status' => "Lista d'attesa", 'statusTone' => 'warning'],
                                        ['course' => 'Primo soccorso gruppo B', 'meta' => '12 ore · DM 388/2003', 'icon' => 'first-aid', 'tone' => 'success', 'edition' => '06/26', 'dates' => '16–20 ott', 'place' => 'Bergamo · Aula 1', 'seats' => '11/16', 'fill' => 'w-[69%]', 'teacher' => 'Dott.ssa Mari', 'status' => 'Iscrizioni aperte', 'statusTone' => 'cobalt'],
                                        ['course' => 'HACCP addetti alimentari', 'meta' => 'Reg. CE 852/2004', 'icon' => 'utensils', 'tone' => 'warning', 'edition' => '11/26', 'dates' => '14 ott', 'place' => 'Online sincrono', 'seats' => '24/30', 'fill' => 'w-[80%]', 'teacher' => 'Dott. Bassi', 'status' => 'Confermata', 'statusTone' => 'success'],
                                        ['course' => 'Aggiornamento RSPP / ASPP', 'meta' => 'Accordo Stato-Regioni', 'icon' => 'shield', 'tone' => 'cobalt', 'edition' => '03/26', 'dates' => '22 ott – 19 nov', 'place' => 'Milano · Sala B', 'seats' => '9/25', 'fill' => 'w-[36%]', 'teacher' => 'Ing. Conti', 'status' => 'Bozza', 'statusTone' => 'neutral'],
                                        ['course' => 'Formazione preposti', 'meta' => 'Accordo Stato-Regioni', 'icon' => 'users', 'tone' => 'neutral', 'edition' => '05/26', 'dates' => '1–2 ott', 'place' => 'Bergamo · Aula 2', 'seats' => '14/14', 'fill' => 'w-full', 'teacher' => 'Geom. Russo', 'status' => 'Attestati emessi', 'statusTone' => 'success'],
                                    ];
                                @endphp
                                <div class="mt-4 {{ $mockCard }}">
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2.5 border-b border-[#EFEFF4] px-[18px] py-3.5">
                                        <span class="text-[14.5px] font-[560]">Edizioni di ottobre</span>
                                        <span class="rounded-full bg-surface-alt px-2 py-px text-[11px] font-semibold text-ink-soft">24</span>
                                        <span class="flex-auto"></span>
                                        <span class="inline-flex rounded-lg bg-[#F3F4F8] p-[3px] text-[12px] text-muted max-[860px]:hidden">
                                            <span class="rounded-md bg-white px-2.5 py-1 font-[560] text-ink shadow-[0_1px_2px_rgba(23,23,33,0.08)]">Tutte</span><span class="px-2.5 py-1">In programma</span><span class="px-2.5 py-1">In corso</span><span class="px-2.5 py-1">Concluse</span>
                                        </span>
                                        <span class="inline-flex h-[34px] items-center gap-1.5 rounded-lg border border-line bg-white px-3 text-[12.5px] font-medium text-ink-soft max-[860px]:hidden">{{ $icon('download', 14) }}Esporta</span>
                                        <span class="inline-flex h-8 items-center gap-1.5 rounded-lg bg-cobalt px-3 text-[12.5px] font-medium text-white">{{ $icon('plus', 14, 2) }}Nuova edizione</span>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="w-full min-w-[780px] border-collapse text-[13px]">
                                            <thead>
                                                <tr>
                                                    @foreach (['Corso', 'Edizione', 'Date', 'Sede', 'Posti', 'Docente', 'Stato'] as $heading)
                                                        <th class="border-b border-[#EFEFF4] bg-[#FAFAFC] px-[9px] py-[9px] text-left text-[10.5px] font-semibold tracking-[0.06em] whitespace-nowrap text-[#737389] uppercase first:pl-4 last:pr-4">{{ $heading }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($editions as $row)
                                                    <tr class="border-b border-[#F1F1F5] last:border-b-0 [&>td]:px-[9px] [&>td]:py-2.5 [&>td]:whitespace-nowrap [&>td:first-child]:pl-4 [&>td:last-child]:pr-4">
                                                        <td>
                                                            <span class="flex items-center gap-2.5">
                                                                <span class="inline-flex h-8 flex-[0_0_32px] items-center justify-center rounded-lg {{ $tones[$row['tone']] }}">{{ $icon($row['icon']) }}</span>
                                                                <span class="leading-[1.35]"><span class="block font-[560]">{{ $row['course'] }}</span><span class="block text-[11.5px] text-muted">{{ $row['meta'] }}</span></span>
                                                            </span>
                                                        </td>
                                                        <td class="tabular-nums">{{ $row['edition'] }}</td>
                                                        <td class="tabular-nums">{{ $row['dates'] }}</td>
                                                        <td>{{ $row['place'] }}</td>
                                                        <td>
                                                            <span class="flex items-center gap-2">
                                                                <span class="min-w-9 tabular-nums">{{ $row['seats'] }}</span>
                                                                <span class="block h-[5px] w-11 overflow-clip rounded-full bg-surface-alt"><span class="block h-full rounded-full bg-cobalt {{ $row['fill'] }}"></span></span>
                                                            </span>
                                                        </td>
                                                        <td>{{ $row['teacher'] }}</td>
                                                        <td><span class="inline-flex h-[22px] items-center rounded-full px-[9px] text-[11.5px] font-semibold {{ $tones[$row['statusTone']] }}">{{ $row['status'] }}</span></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Scrollytelling --}}
    <section class="pt-10 max-[860px]:pt-20">
        <div class="site-wrap">
            <div class="reveal max-w-[760px]">
                <p class="mb-4 {{ $eyebrow }}">Come funziona</p>
                <h2 class="{{ $sectionTitle }} text-ink">Quattro lavori che smetti di fare a mano.</h2>
                <p class="mt-6 max-w-[600px] text-[19px] leading-[1.6] text-ink-soft">Scadenze, aule, esami e attestati parlano tra loro: un dato si inserisce una volta e arriva dove serve.</p>
            </div>

            @php
                $chapters = [
                    ['anchor' => 'scadenze', 'title' => 'Scadenzario', 'text' => "La validità si imposta sul corso, la scadenza si calcola su ogni attestato. I promemoria partono da soli, verso il corsista e verso l'azienda."],
                    ['anchor' => 'calendario', 'title' => 'Calendario e docenti', 'text' => "Aule, docenti e orari in un solo calendario. Se qualcuno è già impegnato, lo vedi prima di confermare l'edizione."],
                    ['anchor' => 'esami', 'title' => 'Esami online', 'text' => "Domande pescate dall'archivio in ordine casuale, con tempo e soglia. La correzione è immediata e l'esito finisce nel registro."],
                    ['anchor' => 'attestati', 'title' => 'Attestati e verifica', 'text' => 'A fine corso il PDF è pronto, con codice univoco e QR. Chi lo riceve lo verifica online, senza chiamare la segreteria.'],
                ];
            @endphp
            <div class="platform-story mt-[72px] flex flex-wrap gap-x-[72px] gap-y-12">

                {{-- Capitoli (fissi durante lo scorrimento) --}}
                <div class="sticky top-[120px] flex-[1_1_360px] self-start max-[1080px]:static">
                    <ol class="flex flex-col gap-2">
                        @foreach ($chapters as $chapter)
                            <li class="platform-chapter-{{ $loop->iteration }} relative py-4 pl-7">
                                <span aria-hidden="true" class="absolute top-[18px] bottom-[18px] left-0 w-0.5 overflow-clip rounded-[2px] bg-line"><span class="platform-chapter-bar platform-chapter-bar-{{ $loop->iteration }} block size-full bg-cobalt"></span></span>
                                <h3 class="text-[22px] font-[560] leading-[1.25] [font-variation-settings:'FLAR'_60]">
                                    <a href="#{{ $chapter['anchor'] }}" class="inline-flex items-baseline gap-3.5 text-ink no-underline transition-colors hover:text-cobalt-text focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt"><span class="text-[14px] font-medium text-cobalt tabular-nums">{{ sprintf('%02d', $loop->iteration) }}</span>{{ $chapter['title'] }}</a>
                                </h3>
                                <p class="mt-2 ml-[30px] max-w-[380px] text-[16px] leading-[1.6] text-muted">{{ $chapter['text'] }}</p>
                            </li>
                        @endforeach
                    </ol>
                </div>

                {{-- Pannelli --}}
                <div class="flex min-w-0 flex-[1.4_1_560px] flex-col gap-12">

                    {{-- Pannello 01 · Scadenzario --}}
                    @php
                        $deadlineStats = [
                            ['value' => '4', 'label' => 'Scaduti', 'icon' => 'alert', 'tone' => 'danger'],
                            ['value' => '9', 'label' => 'Entro 30 giorni', 'icon' => 'clock', 'tone' => 'warning'],
                            ['value' => '27', 'label' => 'Entro 90 giorni', 'icon' => 'calendar', 'tone' => 'cobalt'],
                        ];
                        $deadlines = [
                            ['initials' => 'BL', 'tone' => 'success', 'name' => 'Bianchi Laura', 'company' => 'Forno Aurora', 'course' => 'HACCP addetti', 'date' => '02/10/2026', 'status' => 'Scaduto', 'statusTone' => 'danger'],
                            ['initials' => 'RM', 'tone' => 'cobalt', 'name' => 'Rossi Mario', 'company' => 'Metalli Srl', 'course' => 'Antincendio liv. 2', 'date' => '14/10/2026', 'status' => 'Tra 8 giorni', 'statusTone' => 'warning'],
                            ['initials' => 'VP', 'tone' => 'warning', 'name' => 'Verdi Paolo', 'company' => 'Logistica Nord', 'course' => 'Carrelli elevatori', 'date' => '29/10/2026', 'status' => 'Tra 23 giorni', 'statusTone' => 'warning'],
                            ['initials' => 'NA', 'tone' => 'neutral', 'name' => 'Neri Anna', 'company' => 'Studio Ferri', 'course' => 'Primo soccorso B', 'date' => '18/12/2026', 'status' => 'Tra 73 giorni', 'statusTone' => 'cobalt'],
                        ];
                    @endphp
                    <div id="scadenze" class="platform-panel-1 {{ $panel }}">
                        <svg aria-hidden="true" class="absolute bottom-0 left-0 block h-[160px] w-full" viewBox="0 0 640 160" preserveAspectRatio="none"><polygon fill="#DADFF1" points="0,160 0,92 40,80 72,88 104,58 124,66 150,34 168,50 196,42 224,72 262,62 300,82 344,56 368,30 386,46 410,22 430,52 452,44 488,80 532,68 572,90 612,64 640,70 640,160"></polygon><polygon fill="#CED5EC" points="0,160 0,124 50,112 96,120 150,100 196,110 246,94 290,116 344,104 400,120 452,100 500,114 552,96 600,112 640,104 640,160"></polygon></svg>
                        <p class="{{ $panelCaption }}">01 · Scadenzario</p>
                        <div class="reveal-scale relative {{ $mockFrame }}" role="img" aria-label="Scadenzario: quattro attestati scaduti, nove in scadenza entro 30 giorni, elenco dei corsisti con data di scadenza e promemoria automatici">
                            <div class="{{ $mockScreen }}">
                                <div class="{{ $mockTopbar }}">
                                    {{ $mark(16, 1.8, 2, 'text-cobalt') }}
                                    <span class="text-muted">Documenti</span><span class="text-[#B4B4C4]">/</span><span class="font-[560]">Scadenze</span>
                                    <span class="{{ $mockAvatar }}">MP</span>
                                </div>
                                <div class="flex flex-col gap-3 p-4">
                                    <div class="flex flex-wrap gap-2.5">
                                        @foreach ($deadlineStats as $stat)
                                            <div class="flex flex-[1_1_110px] items-center gap-3 px-3.5 py-3 {{ $mockCard }}">
                                                <span class="inline-flex h-[34px] flex-[0_0_34px] items-center justify-center rounded-lg {{ $tones[$stat['tone']] }}">{{ $icon($stat['icon']) }}</span>
                                                <span><span class="block text-[20px] font-[560] leading-[1.15] tabular-nums">{{ $stat['value'] }}</span><span class="block text-muted">{{ $stat['label'] }}</span></span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="{{ $mockCard }}">
                                        <div class="flex items-center justify-between gap-3 border-b border-[#EFEFF4] px-4 py-[11px]">
                                            <span class="text-[13.5px] font-[560]">Prossime scadenze</span>
                                            <span class="inline-flex h-7 items-center gap-1.5 rounded-[7px] bg-cobalt px-2.5 font-medium text-white">{{ $icon('mail', 14) }}Invia promemoria</span>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="w-full min-w-[470px] border-collapse text-[12px]">
                                                <thead>
                                                    <tr>
                                                        @foreach (['Corsista', 'Corso', 'Scadenza', 'Stato'] as $heading)
                                                            <th class="border-b border-[#EFEFF4] bg-[#FAFAFC] px-2.5 py-2 text-left text-[10px] font-semibold tracking-[0.06em] text-[#737389] uppercase first:px-4 last:pr-4">{{ $heading }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($deadlines as $row)
                                                        <tr class="border-b border-[#F1F1F5] last:border-b-0 [&>td]:px-2.5 [&>td]:py-[9px] [&>td]:whitespace-nowrap [&>td:first-child]:px-4 [&>td:last-child]:pr-4">
                                                            <td>
                                                                <span class="flex items-center gap-[9px]">
                                                                    <span class="inline-flex h-7 flex-[0_0_28px] items-center justify-center rounded-full text-[10.5px] font-semibold {{ $tones[$row['tone']] }}">{{ $row['initials'] }}</span>
                                                                    <span class="leading-[1.3]"><span class="block font-[560]">{{ $row['name'] }}</span><span class="block text-[11px] text-muted">{{ $row['company'] }}</span></span>
                                                                </span>
                                                            </td>
                                                            <td>{{ $row['course'] }}</td>
                                                            <td class="tabular-nums">{{ $row['date'] }}</td>
                                                            <td><span class="inline-flex h-[21px] items-center rounded-full px-2 text-[11px] font-semibold {{ $tones[$row['statusTone']] }}">{{ $row['status'] }}</span></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="flex items-center gap-2 border-t border-[#EFEFF4] px-4 py-2.5 text-[11.5px] text-muted"><span class="inline-flex text-[#0F8A63]">{{ $icon('check', 14, 2) }}</span>Promemoria automatici a 60 e 30 giorni · ultimo invio 05/10/2026</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pannello 02 · Calendario e docenti --}}
                    @php
                        $calendarHours = [
                            '9:00' => '-top-[7px]',
                            '11:00' => 'top-[57px]',
                            '13:00' => 'top-[121px]',
                            '15:00' => 'top-[185px]',
                            '17:00' => 'top-[249px]',
                        ];
                        $eventStyles = [
                            'cobalt' => ['box' => 'inset-x-[3px] border-l-[3px] border-cobalt bg-cobalt-soft', 'title' => 'text-cobalt-text', 'room' => 'text-muted'],
                            'success' => ['box' => 'inset-x-[3px] border-l-[3px] border-[#0F8A63] bg-success-soft', 'title' => 'text-[#0F8A63]', 'room' => 'text-muted'],
                            'warning' => ['box' => 'inset-x-[3px] border-l-[3px] border-warning bg-warning-soft', 'title' => 'text-warning', 'room' => 'text-muted'],
                            'neutral' => ['box' => 'inset-x-[3px] border-l-[3px] border-muted bg-surface-alt', 'title' => 'text-ink', 'room' => 'text-muted'],
                            'conflict' => ['box' => 'right-[3px] left-[30%] border border-dashed border-danger bg-danger-soft shadow-[0_8px_18px_-8px_rgba(23,23,33,0.35)]', 'title' => 'text-danger', 'room' => 'text-danger'],
                        ];
                        $calendarDays = [
                            ['day' => 'Lun', 'date' => '12', 'events' => [
                                ['title' => 'Sicurezza generale', 'teacher' => 'Ing. Conti', 'room' => 'Aula 2', 'style' => 'cobalt', 'slot' => 'top-0.5 h-[124px]'],
                            ]],
                            ['day' => 'Mar', 'date' => '13', 'events' => [
                                ['title' => 'Sicurezza specifica', 'teacher' => 'Ing. Conti', 'room' => 'Aula 2', 'style' => 'cobalt', 'slot' => 'top-0.5 h-[124px]'],
                            ]],
                            ['day' => 'Mer', 'date' => '14', 'events' => [
                                ['title' => 'HACCP addetti', 'teacher' => 'Dott. Bassi', 'room' => 'Online', 'style' => 'success', 'slot' => 'top-[162px] h-[92px]'],
                            ]],
                            ['day' => 'Gio', 'date' => '15', 'events' => [
                                ['title' => 'Antincendio', 'teacher' => 'Geom. Russo', 'room' => 'Brescia', 'style' => 'warning', 'slot' => 'top-0.5 h-[252px]'],
                                ['title' => 'Preposti', 'teacher' => 'Geom. Russo', 'room' => 'Conflitto', 'style' => 'conflict', 'slot' => 'top-[154px] h-[92px]'],
                            ]],
                            ['day' => 'Ven', 'date' => '16', 'events' => [
                                ['title' => 'Primo soccorso B', 'teacher' => 'Dott.ssa Mari', 'room' => 'Aula 1', 'style' => 'neutral', 'slot' => 'top-0.5 h-[92px]'],
                            ]],
                        ];
                    @endphp
                    <div id="calendario" class="platform-panel-2 {{ $panel }}">
                        <svg aria-hidden="true" class="absolute bottom-0 left-0 block h-[160px] w-full" viewBox="0 0 640 160" preserveAspectRatio="none"><polygon fill="#DADFF1" points="0,160 0,78 34,64 70,74 98,40 120,52 146,30 176,60 214,50 250,76 290,58 322,70 352,36 374,48 404,18 428,44 460,38 500,72 546,60 590,84 640,62 640,160"></polygon><polygon fill="#CED5EC" points="0,160 0,118 60,106 110,116 170,96 222,108 270,92 318,112 372,100 426,118 480,98 530,110 586,94 640,108 640,160"></polygon></svg>
                        <p class="{{ $panelCaption }}">02 · Calendario e docenti</p>
                        <div class="reveal-scale relative {{ $mockFrame }}" role="img" aria-label="Calendario della settimana dal 12 al 16 ottobre con le lezioni per aula e docente, e un avviso di conflitto: Geom. Russo è già impegnato a Brescia giovedì 15">
                            <div class="{{ $mockScreen }}">
                                <div class="{{ $mockTopbar }}">
                                    {{ $mark(16, 1.8, 2, 'text-cobalt') }}
                                    <span class="text-muted">Formazione</span><span class="text-[#B4B4C4]">/</span><span class="font-[560]">Calendario</span>
                                    <span class="{{ $mockAvatar }}">MP</span>
                                </div>
                                <div class="p-4">
                                    <div class="{{ $mockCard }}">
                                        <div class="flex flex-wrap items-center gap-x-2.5 gap-y-2 border-b border-[#EFEFF4] px-3.5 py-2.5">
                                            <span class="inline-flex size-7 items-center justify-center rounded-md border border-line text-ink-soft">{{ $icon('chevron-left', 14) }}</span>
                                            <span class="inline-flex size-7 items-center justify-center rounded-md border border-line text-ink-soft">{{ $icon('chevron-right', 14) }}</span>
                                            <span class="text-[13.5px] font-[560] tabular-nums">12 – 16 ottobre 2026</span>
                                            <span class="ml-auto inline-flex rounded-lg bg-[#F3F4F8] p-[3px] text-[11.5px] text-muted"><span class="px-[9px] py-[3px]">Mese</span><span class="rounded-md bg-white px-[9px] py-[3px] font-[560] text-ink shadow-[0_1px_2px_rgba(23,23,33,0.08)]">Settimana</span><span class="px-[9px] py-[3px]">Giorno</span></span>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <div class="min-w-[480px] pr-2.5 pb-2.5">
                                                <div class="grid grid-cols-[40px_repeat(5,1fr)] border-b border-[#EFEFF4]">
                                                    <span></span>
                                                    @foreach ($calendarDays as $day)
                                                        <span class="px-1.5 py-2 text-center text-muted">{{ $day['day'] }} <span class="font-[560] text-ink tabular-nums">{{ $day['date'] }}</span></span>
                                                    @endforeach
                                                </div>
                                                <div class="grid grid-cols-[40px_repeat(5,1fr)] pt-2">
                                                    <div class="relative h-64 text-[10px] text-[#737389] tabular-nums">
                                                        @foreach ($calendarHours as $hour => $position)
                                                            <span class="absolute right-1.5 {{ $position }}">{{ $hour }}</span>
                                                        @endforeach
                                                    </div>
                                                    @foreach ($calendarDays as $day)
                                                        <div class="platform-calendar-day relative h-64 border-l border-[#EFEFF4]">
                                                            @foreach ($day['events'] as $event)
                                                                <div class="absolute rounded-md px-[7px] py-1.5 text-[10.5px] leading-[1.3] {{ $event['slot'] }} {{ $eventStyles[$event['style']]['box'] }}"><span class="block font-semibold {{ $eventStyles[$event['style']]['title'] }}">{{ $event['title'] }}</span><span class="mt-0.5 block text-ink-soft">{{ $event['teacher'] }}</span><span class="block {{ $eventStyles[$event['style']]['room'] }}">{{ $event['room'] }}</span></div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mx-3 mb-3 flex flex-wrap items-center gap-x-3 gap-y-2.5 rounded-lg bg-danger-soft px-3 py-2.5 text-ink">
                                            <span class="inline-flex text-danger">{{ $icon('alert') }}</span>
                                            <span class="flex-[1_1_220px]">Geom. Russo è già a Brescia giovedì 15, dalle 9:00 alle 17:00.</span>
                                            <span class="inline-flex h-7 items-center rounded-[7px] border border-line bg-white px-2.5 font-medium text-ink-soft">Sposta</span>
                                            <span class="inline-flex h-[26px] items-center rounded-[7px] bg-cobalt px-2.5 font-medium text-white">Assegna Ing. Conti</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pannello 03 · Esami online --}}
                    @php
                        $examRules = [
                            ['icon' => 'list', 'label' => '20 domande su 60'],
                            ['icon' => 'shuffle', 'label' => 'Ordine casuale'],
                            ['icon' => 'timer', 'label' => '30 minuti'],
                            ['icon' => 'target', 'label' => 'Soglia 70%'],
                        ];
                        $examResults = [
                            ['name' => 'Rossi Mario', 'fill' => 'w-[90%] bg-cobalt', 'score' => '18/20', 'status' => 'Superato', 'tone' => 'success'],
                            ['name' => 'Conti Elisa', 'fill' => 'w-[80%] bg-cobalt', 'score' => '16/20', 'status' => 'Superato', 'tone' => 'success'],
                            ['name' => 'Gallo Stefano', 'fill' => 'w-[65%] bg-danger', 'score' => '13/20', 'status' => 'Non superato', 'tone' => 'danger'],
                        ];
                        $examAnswers = [
                            ['label' => 'A polvere', 'selected' => false],
                            ['label' => 'A CO₂', 'selected' => false],
                            ['label' => 'Ad acqua, a getto pieno', 'selected' => true],
                            ['label' => 'A schiuma', 'selected' => false],
                        ];
                    @endphp
                    <div id="esami" class="platform-panel-3 {{ $panel }}">
                        <svg aria-hidden="true" class="absolute bottom-0 left-0 block h-[160px] w-full" viewBox="0 0 640 160" preserveAspectRatio="none"><polygon fill="#DADFF1" points="0,160 0,86 36,70 66,80 100,46 122,58 156,24 178,48 210,40 244,70 282,56 316,74 350,48 372,58 400,28 424,50 456,42 494,76 536,64 580,88 640,66 640,160"></polygon><polygon fill="#CED5EC" points="0,160 0,120 56,108 104,118 158,98 210,112 262,96 312,114 366,102 420,120 474,100 526,112 580,96 640,110 640,160"></polygon></svg>
                        <p class="{{ $panelCaption }}">03 · Esami online</p>
                        <div class="relative mb-[212px] max-[860px]:m-0">
                            <div class="reveal-scale relative {{ $mockFrame }}" role="img" aria-label="Esame finale del corso Antincendio livello 2: 20 domande su 60 in ordine casuale, 30 minuti, soglia 70 per cento, con gli esiti dei corsisti">
                                <div class="{{ $mockScreen }}">
                                    <div class="{{ $mockTopbar }}">
                                        {{ $mark(16, 1.8, 2, 'text-cobalt') }}
                                        <span class="text-muted max-[860px]:hidden">Formazione</span><span class="text-[#B4B4C4] max-[860px]:hidden">/</span><span class="text-muted">Esami</span><span class="text-[#B4B4C4]">/</span><span class="font-[560]">Antincendio liv. 2</span>
                                        <span class="{{ $mockAvatar }}">MP</span>
                                    </div>
                                    <div class="p-4">
                                        <div class="{{ $mockCard }}">
                                            <div class="flex items-center justify-between gap-3 border-b border-[#EFEFF4] px-4 py-[11px]">
                                                <span class="text-[13.5px] font-[560]">Esame finale · Ed. 09/26</span>
                                                <span class="inline-flex h-[21px] items-center gap-1.5 rounded-full px-2 text-[11px] font-semibold {{ $tones['cobalt'] }}"><span class="size-1.5 rounded-full bg-cobalt"></span>In corso</span>
                                            </div>
                                            <div class="flex flex-wrap gap-1.5 border-b border-[#EFEFF4] px-4 py-3">
                                                @foreach ($examRules as $rule)
                                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-line px-[9px] py-1 text-ink-soft">{{ $icon($rule['icon'], 13) }}{{ $rule['label'] }}</span>
                                                @endforeach
                                            </div>
                                            <div class="overflow-x-auto">
                                                <div class="min-w-[472px] px-4 pt-1 pb-1.5">
                                                    @foreach ($examResults as $result)
                                                        <div class="flex items-center gap-3 border-b border-[#F1F1F5] py-2">
                                                            <span class="flex-[0_0_120px] font-[560]">{{ $result['name'] }}</span>
                                                            <span class="relative h-1.5 flex-auto rounded-full bg-surface-alt"><span class="absolute inset-y-0 left-0 rounded-full {{ $result['fill'] }}"></span><span class="absolute -top-1 -bottom-1 left-[70%] w-[1.5px] bg-muted"></span></span>
                                                            <span class="flex-[0_0_40px] text-right tabular-nums">{{ $result['score'] }}</span>
                                                            <span class="flex-[0_0_86px] text-right"><span class="inline-flex h-[21px] items-center rounded-full px-2 text-[11px] font-semibold {{ $tones[$result['tone']] }}">{{ $result['status'] }}</span></span>
                                                        </div>
                                                    @endforeach
                                                    <div class="flex items-center gap-3 py-2">
                                                        <span class="flex-[0_0_120px] font-[560]">Verdi Paolo</span>
                                                        <span class="flex-auto text-muted">Domanda 7 di 20</span>
                                                        <span class="flex-[0_0_40px] text-right text-muted tabular-nums">—</span>
                                                        <span class="flex-[0_0_86px] text-right"><span class="inline-flex h-[21px] items-center rounded-full px-2 text-[11px] font-semibold tabular-nums {{ $tones['cobalt'] }}">12:41</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-t border-[#EFEFF4] px-4 py-2.5 text-[11.5px] text-muted">Correzione automatica, esiti nel registro</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Vista del candidato --}}
                            <div class="{{ $floatCard }} -right-2 -bottom-[212px] w-[272px]" aria-hidden="true">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-muted">Domanda <span class="font-[560] text-ink tabular-nums">7</span> di 20</span>
                                    <span class="inline-flex h-[22px] items-center gap-[5px] rounded-full px-2 font-semibold tabular-nums {{ $tones['cobalt'] }}">{{ $icon('timer', 12, 2) }}12:41</span>
                                </div>
                                <div class="mt-2.5 h-1 rounded-full bg-surface-alt"><div class="h-full w-[35%] rounded-full bg-cobalt"></div></div>
                                <div class="mt-3 text-[13px] font-[560] leading-[1.4]">Quale estintore non va usato su un incendio di liquidi infiammabili?</div>
                                <div class="mt-2.5 flex flex-col gap-1.5">
                                    @foreach ($examAnswers as $answer)
                                        <span @class([
                                            'flex items-center gap-2 rounded-lg border px-2.5 py-[7px]',
                                            'border-cobalt bg-cobalt-soft font-[560] text-cobalt-text' => $answer['selected'],
                                            'border-line' => ! $answer['selected'],
                                        ])><span @class([
                                            'h-3 flex-[0_0_12px] rounded-full',
                                            'border-[3.5px] border-cobalt bg-white' => $answer['selected'],
                                            'border-[1.5px] border-[#B4B4C4]' => ! $answer['selected'],
                                        ])></span>{{ $answer['label'] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pannello 04 · Attestati e verifica --}}
                    @php
                        $verification = [
                            ['label' => 'Codice', 'value' => 'ATT-2026-0418-7Q', 'numeric' => true],
                            ['label' => 'Intestatario', 'value' => 'Rossi Mario', 'numeric' => false],
                            ['label' => 'Corso', 'value' => 'Antincendio liv. 2', 'numeric' => false],
                            ['label' => 'Rilasciato', 'value' => '15/10/2026', 'numeric' => true],
                            ['label' => 'Valido fino al', 'value' => '15/10/2031', 'numeric' => true],
                        ];
                    @endphp
                    <div id="attestati" class="platform-panel-4 {{ $panel }}">
                        <svg aria-hidden="true" class="absolute bottom-0 left-0 block h-[160px] w-full" viewBox="0 0 640 160" preserveAspectRatio="none"><polygon fill="#DADFF1" points="0,160 0,72 30,60 62,70 94,44 118,54 144,26 166,48 198,38 230,66 268,52 306,74 340,50 364,24 384,42 408,16 430,46 458,40 492,70 534,58 578,82 616,58 640,64 640,160"></polygon><polygon fill="#CED5EC" points="0,160 0,116 48,104 100,114 152,96 204,106 256,90 304,110 360,98 414,116 466,96 520,108 572,92 640,104 640,160"></polygon></svg>
                        <p class="{{ $panelCaption }}">04 · Attestati e verifica</p>
                        <div class="relative mb-[190px] max-[860px]:m-0">
                            <div class="reveal-scale relative {{ $mockFrame }}" role="img" aria-label="Anteprima dell'attestato PDF di Rossi Mario per il corso Antincendio livello 2, con codice ATT-2026-0418-7Q e QR di verifica">
                                <div class="{{ $mockScreen }}">
                                    <div class="{{ $mockTopbar }} overflow-clip whitespace-nowrap">
                                        {{ $mark(16, 1.8, 2, 'flex-none text-cobalt') }}
                                        <span class="text-muted">Attestati</span><span class="text-[#B4B4C4]">/</span><span class="font-[560] tabular-nums">ATT-2026-0418-7Q</span>
                                        <span class="ml-auto inline-flex h-7 items-center gap-1.5 rounded-[7px] border border-line bg-white px-2.5 font-medium text-ink-soft">{{ $icon('mail', 13) }}Invia</span>
                                        <span class="inline-flex h-[26px] items-center gap-1.5 rounded-[7px] bg-cobalt px-2.5 font-medium text-white">{{ $icon('download', 13) }}PDF</span>
                                    </div>
                                    <div class="p-[18px]">
                                        <div class="rounded-[4px] bg-white p-2.5 shadow-[0_1px_2px_rgba(23,23,33,0.06),0_12px_28px_-12px_rgba(23,23,33,0.18)]">
                                            <div class="rounded-[2px] border border-[#E9E9F0] px-[22px] pt-5 pb-[18px]">
                                                <div class="flex items-center justify-between gap-3">
                                                    <span class="inline-flex items-center gap-[7px] text-cobalt">{{ $mark(18, 1.6, 1.8) }}<span class="text-[11.5px] font-[560] text-ink">Ente Demo Formazione</span></span>
                                                    <span class="text-[10px] text-muted tabular-nums">N. ATT-2026-0418-7Q</span>
                                                </div>
                                                <div class="pt-[18px] pb-4 text-center">
                                                    <div class="text-[10.5px] font-medium text-cobalt-text">Attestato di formazione</div>
                                                    <div class="mt-1.5 font-display text-[26px] leading-[1.1]">Rossi Mario</div>
                                                    <div class="mt-2 text-[11px] text-muted">ha frequentato con verifica finale positiva il corso</div>
                                                    <div class="mt-1 text-[14px] font-[560] [font-variation-settings:'FLAR'_60]">Formazione antincendio — livello 2</div>
                                                    <div class="mt-1 text-[11px] text-muted">DM 02/09/2021 · 8 ore · Brescia, 15 ottobre 2026</div>
                                                </div>
                                                <div class="flex items-end justify-between gap-4 border-t border-[#EFEFF4] pt-3">
                                                    <span class="flex flex-col gap-0.5"><svg width="112" height="26" viewBox="0 0 112 26" fill="none" aria-hidden="true"><path d="M3 19c5-9 9-12 11-8s-4 10 0 9 8-12 12-11-2 9 2 9 6-7 9-8 3 5 7 4 6-6 9-6 2 5 6 4 8-3 12-3 7 2 11 1" stroke="#3B3B4F" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path></svg><span class="text-[10px] text-muted">Il responsabile del progetto formativo</span></span>
                                                    <span class="flex items-center gap-2.5"><span class="text-right text-[10px] leading-[1.35] text-muted">Verifica<br>con il QR</span><svg width="58" height="58" viewBox="-1 -1 23 23" aria-hidden="true"><rect x="-1" y="-1" width="23" height="23" fill="#FFFFFF"></rect><path fill="#171721" d="M0 0h7v1h-7zM8 0h3v1h-3zM12 0h1v1h-1zM14 0h7v1h-7zM0 1h1v1h-1zM6 1h1v1h-1zM9 1h2v1h-2zM14 1h1v1h-1zM20 1h1v1h-1zM0 2h1v1h-1zM2 2h3v1h-3zM6 2h1v1h-1zM8 2h1v1h-1zM12 2h1v1h-1zM14 2h1v1h-1zM16 2h3v1h-3zM20 2h1v1h-1zM0 3h1v1h-1zM2 3h3v1h-3zM6 3h1v1h-1zM8 3h1v1h-1zM11 3h1v1h-1zM14 3h1v1h-1zM16 3h3v1h-3zM20 3h1v1h-1zM0 4h1v1h-1zM2 4h3v1h-3zM6 4h1v1h-1zM8 4h3v1h-3zM14 4h1v1h-1zM16 4h3v1h-3zM20 4h1v1h-1zM0 5h1v1h-1zM6 5h1v1h-1zM9 5h2v1h-2zM12 5h1v1h-1zM14 5h1v1h-1zM20 5h1v1h-1zM0 6h7v1h-7zM8 6h1v1h-1zM10 6h1v1h-1zM12 6h1v1h-1zM14 6h7v1h-7zM10 7h2v1h-2zM0 8h1v1h-1zM4 8h3v1h-3zM8 8h1v1h-1zM10 8h1v1h-1zM12 8h1v1h-1zM15 8h2v1h-2zM18 8h2v1h-2zM0 9h1v1h-1zM2 9h2v1h-2zM7 9h1v1h-1zM9 9h2v1h-2zM12 9h4v1h-4zM17 9h2v1h-2zM20 9h1v1h-1zM0 10h2v1h-2zM3 10h2v1h-2zM6 10h4v1h-4zM14 10h1v1h-1zM16 10h1v1h-1zM18 10h1v1h-1zM20 10h1v1h-1zM1 11h1v1h-1zM4 11h2v1h-2zM9 11h3v1h-3zM13 11h2v1h-2zM18 11h1v1h-1zM20 11h1v1h-1zM0 12h5v1h-5zM6 12h2v1h-2zM9 12h1v1h-1zM12 12h1v1h-1zM15 12h6v1h-6zM9 13h3v1h-3zM19 13h2v1h-2zM0 14h7v1h-7zM9 14h2v1h-2zM14 14h1v1h-1zM17 14h1v1h-1zM0 15h1v1h-1zM6 15h1v1h-1zM9 15h1v1h-1zM11 15h1v1h-1zM14 15h1v1h-1zM16 15h2v1h-2zM19 15h1v1h-1zM0 16h1v1h-1zM2 16h3v1h-3zM6 16h1v1h-1zM10 16h2v1h-2zM14 16h3v1h-3zM20 16h1v1h-1zM0 17h1v1h-1zM2 17h3v1h-3zM6 17h1v1h-1zM8 17h3v1h-3zM13 17h1v1h-1zM19 17h2v1h-2zM0 18h1v1h-1zM2 18h3v1h-3zM6 18h1v1h-1zM10 18h3v1h-3zM15 18h1v1h-1zM17 18h4v1h-4zM0 19h1v1h-1zM6 19h1v1h-1zM8 19h1v1h-1zM11 19h2v1h-2zM15 19h2v1h-2zM19 19h2v1h-2zM0 20h7v1h-7zM8 20h1v1h-1zM11 20h2v1h-2zM19 20h2v1h-2z"></path></svg></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Verifica pubblica --}}
                            <div class="{{ $floatCard }} -bottom-[190px] -left-2 w-[264px]" aria-hidden="true">
                                <div class="flex items-center gap-2.5">
                                    <span class="inline-flex h-[34px] flex-[0_0_34px] items-center justify-center rounded-lg {{ $tones['success'] }}">{{ $icon('check', 18, 2) }}</span>
                                    <span class="leading-[1.3]"><span class="block text-[14px] font-[560]">Attestato valido</span><span class="block text-[11px] text-muted">Verificato oggi alle 10:42</span></span>
                                </div>
                                <div class="mt-3 border-t border-[#EFEFF4]">
                                    @foreach ($verification as $field)
                                        <div class="flex justify-between gap-3 border-b border-[#F1F1F5] py-[7px] last:border-b-0 last:pb-0"><span class="text-muted">{{ $field['label'] }}</span><span @class(['font-[560]', 'tabular-nums' => $field['numeric']])>{{ $field['value'] }}</span></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- 3. E inoltre --}}
    @php
        $features = [
            ['id' => 'iscrizioni', 'icon' => 'user-plus', 'title' => "Iscrizioni online e lista d'attesa", 'text' => "Un modulo per ogni edizione. A posti esauriti gli iscritti entrano in lista d'attesa e ricevono un avviso quando si libera un posto."],
            ['id' => null, 'icon' => 'letter', 'title' => "Docenti e lettere d'incarico", 'text' => "Anagrafica con requisiti e materie. La lettera d'incarico si genera dall'edizione, con date, ore e compenso già compilati."],
            ['id' => 'brand', 'icon' => 'palette', 'title' => 'White-label', 'text' => 'Logo, colori e intestazioni del tuo ente su attestati, email e pagine di iscrizione. Attestami resta dietro le quinte.'],
            ['id' => null, 'icon' => 'table', 'title' => 'Import da Excel', 'text' => 'Porta corsisti, aziende e storico dal tuo file. Le colonne si abbinano una volta, i duplicati vengono segnalati prima di salvare.'],
            ['id' => null, 'icon' => 'file', 'title' => 'Registro per i controlli', 'text' => 'Presenze, ore, esiti e firme di ogni edizione in un registro esportabile in PDF, pronto da consegnare in caso di ispezione.'],
            ['id' => null, 'icon' => 'key', 'title' => 'Ruoli e permessi', 'text' => 'Segreteria, docenti e aziende clienti accedono con il proprio profilo e vedono soltanto ciò che li riguarda.'],
        ];
    @endphp
    <section class="pt-40 max-[860px]:pt-20">
        <div class="site-wrap">
            <div class="flex flex-wrap items-end justify-between gap-x-12 gap-y-6">
                <div class="reveal max-w-[640px]">
                    <p class="mb-4 {{ $eyebrow }}">E inoltre</p>
                    <h2 class="{{ $sectionTitle }} text-ink">Il resto della segreteria, già pronto.</h2>
                </div>
                <p class="reveal max-w-[400px] text-[17px] leading-[1.625] text-muted">Le parti meno visibili del lavoro, quelle che di solito finiscono su un foglio Excel o in una cartella condivisa.</p>
            </div>

            <div class="mt-14 grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-5">
                @foreach ($features as $feature)
                    <article @if ($feature['id']) id="{{ $feature['id'] }}" @endif class="reveal scroll-mt-[104px] rounded-2xl border border-line bg-white p-7">
                        <span class="inline-flex size-11 items-center justify-center rounded-xl bg-cobalt-soft text-cobalt-text">{{ $icon($feature['icon'], 20) }}</span>
                        <h3 class="mt-6 text-[22px] font-[560] leading-[1.25] [font-variation-settings:'FLAR'_60]">{{ $feature['title'] }}</h3>
                        <p class="mt-2.5 text-[16px] leading-[1.6] text-muted">{{ $feature['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. Garanzie + 5. Invito alla demo --}}
    @php
        $assurances = [
            ['icon' => 'globe', 'title' => 'I tuoi dati restano in Europa', 'text' => "Server e copie su infrastruttura nell'Unione europea."],
            ['icon' => 'database', 'title' => 'Backup giornalieri', 'text' => 'Una copia completa ogni notte, conservata separatamente.'],
            ['icon' => 'lock', 'title' => 'Accesso con ruoli', 'text' => 'Ogni utente ha le sue credenziali e i suoi permessi.'],
        ];
    @endphp
    <section class="py-[120px] max-[860px]:py-20">
        <div class="site-wrap">
            <div class="reveal flex flex-wrap gap-x-8 border-y border-line">
                @foreach ($assurances as $item)
                    <div class="flex flex-[1_1_280px] items-start gap-3.5 py-7">
                        <span class="mt-[3px] inline-flex flex-none text-cobalt">{{ $icon($item['icon'], 20) }}</span>
                        <span><span class="block text-[16px] font-medium leading-[1.5]">{{ $item['title'] }}</span><span class="mt-0.5 block text-[15px] leading-[1.55] text-muted">{{ $item['text'] }}</span></span>
                    </div>
                @endforeach
            </div>

            <div class="reveal relative mt-24 overflow-clip rounded-[28px] bg-linear-to-b/srgb from-onyx via-[#1B1C2A] via-52% to-[#262A44] px-16 pt-24 pb-[184px] text-center text-ivory max-[860px]:rounded-[22px] max-[860px]:px-5 max-[860px]:pt-14 max-[860px]:pb-[132px]">
                <svg aria-hidden="true" class="absolute bottom-0 left-0 block h-[160px] w-full" viewBox="0 0 1200 160" preserveAspectRatio="none"><polygon fill="#3A4166" fill-opacity="0.75" points="0,160 0,96 60,84 110,92 170,58 200,70 240,30 268,54 300,44 350,80 420,66 480,92 540,62 572,26 596,50 630,16 660,56 690,46 750,88 820,72 880,98 940,64 972,34 1000,58 1040,48 1100,86 1150,76 1200,90 1200,160"></polygon><polygon fill="#171721" points="0,160 0,126 80,114 150,122 230,100 300,112 380,96 450,118 530,106 610,124 690,102 760,116 840,98 920,118 1000,104 1080,120 1150,108 1200,114 1200,160"></polygon></svg>
                <div class="relative">
                    <p class="mb-4 text-[14px] font-medium leading-[1.4] text-periwinkle">Prossimo passo</p>
                    <h2 class="mx-auto max-w-[760px] {{ $sectionTitle }} text-ivory">Vuoi vederla con i tuoi corsi?</h2>
                    <p class="mx-auto mt-5 max-w-[520px] text-[19px] leading-[1.6] text-muted-dark">Una demo guidata su un'edizione vera: dal catalogo all'attestato, con le tue scadenze.</p>
                    <div class="mt-9 flex flex-wrap justify-center gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex min-h-12 items-center gap-2 rounded-full bg-cobalt px-6 text-[16px] font-medium text-white no-underline transition-colors hover:bg-cobalt-hover hover:text-white focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle">Richiedi una demo{{ $icon('arrow-right', 18) }}</a>
                        <a href="{{ route('verify') }}" class="inline-flex min-h-12 items-center gap-2 rounded-full border border-ivory/22 bg-ivory/10 px-6 text-[16px] font-medium text-ivory no-underline transition-colors hover:bg-ivory/16 hover:text-ivory focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle">Verifica un attestato</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-site.layout>
