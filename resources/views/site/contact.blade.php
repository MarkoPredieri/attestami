@php
    use App\Models\Lead;
    use Illuminate\Support\HtmlString;
    use Illuminate\Support\Str;

    /** "Cosa succede dopo": i tre passi dopo l'invio della richiesta. */
    $steps = [
        ['Ci scrivi qui a fianco', 'Bastano nome, email e due righe sul tuo ente.'],
        ['Ti chiamiamo entro 24 ore', 'Per fissare la demo nel giorno e nell’orario che preferisci.'],
        ['Prepariamo la demo con i tuoi corsi', 'Mezz’ora in videochiamata, sul tuo catalogo e sulle tue scadenze.'],
    ];

    /** Recapiti diretti (icone a tratto, viewBox 24×24). */
    $contacts = [
        [
            'label' => 'Email',
            'icon' => '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3.5 7l8.5 6 8.5-6"></path>',
            'value' => '[info@dominio.it]',
            'href' => 'mailto:info@dominio.it',
        ],
        [
            'label' => 'Telefono',
            'icon' => '<path d="M5 4h3.5l1.8 4.6-2.3 1.4a11 11 0 0 0 6 6l1.4-2.3 4.6 1.8V19a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"></path>',
            'value' => '[—]',
            'href' => null,
        ],
        [
            'label' => 'Sede',
            'icon' => '<path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"></path><circle cx="12" cy="9.5" r="2.5"></circle>',
            'value' => '[Città]',
            'href' => null,
        ],
    ];

    /** Campi di testo del modulo: nome ed email uno sotto l'altro, telefono ed ente affiancati quando c'è spazio. */
    $inputGroups = [
        [
            'class' => 'grid gap-5',
            'inputs' => [
                ['name' => 'name', 'id' => 'f-nome', 'label' => 'Nome e cognome', 'type' => 'text', 'autocomplete' => 'name', 'required' => true, 'placeholder' => 'Mario Rossi'],
                ['name' => 'email', 'id' => 'f-email', 'label' => 'Email di lavoro', 'type' => 'email', 'autocomplete' => 'email', 'required' => true, 'placeholder' => 'nome@ente.it'],
            ],
        ],
        [
            'class' => 'grid grid-cols-[repeat(auto-fit,minmax(180px,1fr))] gap-x-4 gap-y-5',
            'inputs' => [
                ['name' => 'phone', 'id' => 'f-tel', 'label' => 'Telefono', 'type' => 'tel', 'autocomplete' => 'tel', 'required' => false, 'placeholder' => '+39 …'],
                ['name' => 'organization', 'id' => 'f-ente', 'label' => 'Ente / Azienda', 'type' => 'text', 'autocomplete' => 'organization', 'required' => false, 'placeholder' => null],
            ],
        ],
    ];

    /** Messaggi di errore in italiano, con l'id del campo a cui rimandano dal riepilogo. */
    $fieldErrors = [
        'name' => ['f-nome', 'Inserisci nome e cognome (al massimo 255 caratteri).'],
        'email' => ['f-email', 'Inserisci un indirizzo email valido, ad esempio nome@ente.it.'],
        'phone' => ['f-tel', 'Il numero di telefono può avere al massimo 50 caratteri.'],
        'organization' => ['f-ente', 'Il nome dell’ente può avere al massimo 255 caratteri.'],
        'interest' => ['int-8108', 'Scegli una delle opzioni proposte.'],
        'trainees_per_year' => ['f-volume', 'Scegli un intervallo dall’elenco.'],
        'message' => ['f-msg', 'Il messaggio può avere al massimo 2.000 caratteri.'],
        'privacy' => ['f-privacy', 'Per inviare la richiesta conferma di aver letto l’informativa privacy.'],
        'source' => ['richiesta', 'Non siamo riusciti a inviare la richiesta: ricarica la pagina e riprova.'],
        'website' => ['richiesta', 'Non siamo riusciti a inviare la richiesta: ricarica la pagina e riprova.'],
    ];

    /** Riepilogo in cima al modulo: un rimando per ogni campo con errori, senza doppioni. */
    $errorSummary = collect($fieldErrors)
        ->filter(fn (array $entry, string $field) => $errors->has($field))
        ->unique(fn (array $entry) => $entry[1]);

    $linkClass = 'text-cobalt-text underline underline-offset-3 hover:text-cobalt-hover focus-visible:rounded-xs focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt';

    $faqs = [
        [
            'question' => 'Quanto costa?',
            'answer' => new HtmlString('Il prezzo dipende dal numero di corsisti e di sedi: te lo mostriamo in demo, sul tuo caso. <span class="text-muted">[Listino in arrivo]</span>'),
        ],
        [
            'question' => 'Posso importare i corsisti che ho già?',
            'answer' => 'Sì, da un file Excel o CSV: anagrafiche dei corsisti e aziende di appartenenza. Se vuoi, in demo proviamo l’importazione con un tuo file di esempio.',
        ],
        [
            'question' => 'Gli attestati sono validi?',
            'answer' => new HtmlString('Attestami genera l’attestato sul modello del tuo ente, con i riferimenti normativi del corso (D.Lgs 81/08, Accordo Stato-Regioni, DM 388/2003…). La validità la dà l’ente erogatore con il suo accreditamento: noi ci occupiamo che ogni attestato riporti i dati previsti e un codice <a href="'.e(route('verify')).'" class="'.$linkClass.'">verificabile online</a>.'),
        ],
        [
            'question' => 'Serve installare qualcosa?',
            'answer' => 'No. Attestami funziona nel browser, da computer e tablet. I corsisti svolgono l’esame anche dal telefono, senza app da scaricare.',
        ],
        [
            'question' => 'Posso usare il mio logo?',
            'answer' => 'Sì. Logo, colori e intestazione del tuo ente compaiono su attestati, email e area corsisti: Attestami resta dietro le quinte.',
        ],
    ];

    /** Classi condivise. */
    $eyebrowClass = 'mb-5 text-sm font-medium leading-[1.4] text-cobalt-text';
    $labelClass = 'mb-2 block text-sm font-medium leading-[1.4] text-ink-soft';
    $fieldClass = 'block w-full rounded-xl border bg-white text-base text-ink placeholder:text-[#75758C] focus:border-cobalt focus:ring-3 focus:ring-cobalt-soft focus:outline-none';
    $fieldStateClass = fn (string $field) => $errors->has($field) ? 'border-danger' : 'border-[#D9D9E3] hover:border-[#B9B9C9]';
    $cardClass = 'reveal-scale scroll-mt-[104px] max-[600px]:scroll-mt-[152px] rounded-3xl bg-white p-10 shadow-[0_30px_80px_-30px_rgba(23,23,33,0.25),0_0_0_1px_rgba(23,23,33,0.06)] max-[860px]:rounded-[20px] max-[860px]:px-5 max-[860px]:py-7';
    $buttonFocusClass = 'focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt';
@endphp

<x-site.layout title="Richiedi una demo" active="contact">

    {{-- 1. Hero + modulo --}}
    <section class="relative pt-24 pb-30 max-[860px]:pt-16 max-[860px]:pb-20">

        {{-- Crinale delle Dolomiti, decorativo --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 z-0 h-[260px] overflow-hidden">
            <svg class="parallax-far absolute bottom-0 left-0 block h-[240px] w-full" viewBox="0 0 1440 240" preserveAspectRatio="none" fill="none"><polygon points="0,240 0,168 48,160 96,146 132,128 150,134 168,104 178,110 190,84 200,92 210,70 222,96 236,106 262,124 310,138 362,128 398,106 414,112 428,86 438,92 446,64 456,74 464,52 476,80 490,98 528,118 584,130 640,120 676,100 690,106 704,82 716,88 726,60 738,70 748,46 760,72 772,62 786,94 812,112 872,132 936,124 980,104 996,110 1010,86 1020,90 1032,58 1044,68 1054,42 1066,64 1078,56 1092,90 1118,108 1176,126 1232,118 1268,98 1282,104 1296,76 1308,84 1320,62 1334,90 1360,110 1404,124 1440,128 1440,240" fill="#E3E6F1"></polygon></svg>
            <div class="absolute inset-x-0 bottom-[60px] h-[110px] bg-linear-to-b from-mist/0 to-mist/55"></div>
            <svg class="parallax-mid absolute bottom-0 left-0 block h-[240px] w-full opacity-90" viewBox="0 0 1440 240" preserveAspectRatio="none" fill="none"><polygon points="0,240 0,204 70,196 140,184 186,170 204,176 222,154 236,162 252,140 266,158 300,176 380,190 470,194 560,182 620,168 640,172 656,150 668,156 682,134 696,152 714,148 740,168 820,186 920,192 1010,180 1066,164 1084,170 1100,146 1112,152 1126,128 1140,148 1158,144 1180,164 1250,182 1340,190 1440,186 1440,240" fill="#D9DDEC"></polygon></svg>
            <div class="absolute inset-x-0 bottom-0 h-[120px] bg-linear-to-b from-mist/0 via-mist/55 via-45% to-mist"></div>
        </div>

        <div class="site-wrap relative z-1">
            <div class="flex flex-wrap items-start gap-x-16 gap-y-14">

                {{-- Colonna sinistra --}}
                <div class="sticky top-[120px] min-w-0 flex-[1_1_440px] max-[1080px]:static max-[1080px]:basis-full [@media(max-height:860px)]:static">
                    <p class="{{ $eyebrowClass }}">Richiedi una demo</p>
                    <h1 class="font-display text-[clamp(44px,5vw,72px)] leading-[1.04] text-balance text-ink">Vedila in azione sul tuo catalogo.</h1>
                    <p class="mt-6 max-w-[30em] text-[19px] leading-[1.6] text-ink-soft">In 30 minuti ti mostriamo Attestami con i tuoi corsi reali.</p>

                    <div class="mt-14">
                        <h2 class="mb-6 font-brand text-[17px] font-[560] leading-[1.3] text-ink [font-variation-settings:'FLAR'_60]">Cosa succede dopo</h2>
                        <div class="relative">
                            <div aria-hidden="true" class="absolute top-4 bottom-10 left-[15px] w-0.5 overflow-hidden rounded-xs bg-line">
                                <div class="contact-timeline-fill size-full bg-cobalt"></div>
                            </div>
                            <ol class="relative">
                                @foreach ($steps as [$title, $description])
                                    <li class="relative flex gap-4 pb-6 last:pb-0">
                                        <span class="inline-flex size-8 flex-none items-center justify-center rounded-full border-[1.5px] border-cobalt bg-mist text-sm leading-none font-semibold text-cobalt-text tabular-nums">{{ $loop->iteration }}</span>
                                        <div class="pt-[3px]">
                                            <p class="text-[17px] leading-[1.5] font-medium text-ink">{{ $title }}</p>
                                            <p class="mt-0.5 text-[15px] leading-[1.55] text-muted">{{ $description }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    <div class="mt-12 border-t border-line pt-6">
                        <p class="mb-4 text-[15px] leading-[1.5] text-muted">Preferisci scriverci direttamente?</p>
                        <div class="grid grid-cols-[repeat(auto-fit,minmax(150px,1fr))] gap-x-6 gap-y-4">
                            @foreach ($contacts as $contact)
                                <div>
                                    <p class="mb-1 flex items-center gap-2 text-sm leading-[1.4] text-muted">
                                        <svg class="text-cobalt" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $contact['icon'] !!}</svg>{{ $contact['label'] }}
                                    </p>
                                    @if ($contact['href'])
                                        <a href="{{ $contact['href'] }}" class="text-base leading-[1.5] wrap-anywhere text-cobalt-text no-underline hover:text-ink focus-visible:rounded-xs focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt">{{ $contact['value'] }}</a>
                                    @else
                                        <p class="text-base leading-[1.5] text-ink">{{ $contact['value'] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Colonna destra: modulo --}}
                <div class="min-w-0 flex-[0_1_512px] max-[1080px]:max-w-[640px] max-[1080px]:basis-full">
                    @if (session('lead_ok'))
                        <div id="richiesta" class="{{ $cardClass }}" role="status">
                            <span class="inline-flex size-14 items-center justify-center rounded-full bg-success-soft text-success">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"></path></svg>
                            </span>
                            <h2 class="mt-6 font-display text-[28px] leading-[1.2] text-ink">Richiesta ricevuta</h2>
                            <p class="mt-3 text-[17px] leading-[1.625] text-ink-soft">Grazie, ti ricontattiamo entro 24 ore per fissare la demo.</p>
                            <a href="{{ route('home') }}" class="mt-8 inline-flex min-h-[52px] items-center justify-center gap-2 rounded-full bg-cobalt px-6 text-base leading-none font-medium text-white no-underline transition-colors hover:bg-cobalt-hover hover:text-white {{ $buttonFocusClass }}">
                                Torna alla home
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="M13 6l6 6-6 6"></path></svg>
                            </a>
                        </div>
                    @else
                        <form id="richiesta" class="{{ $cardClass }}" action="{{ route('lead.store') }}#richiesta" method="POST" aria-labelledby="form-title">
                            @csrf
                            <input type="hidden" name="source" value="contatti">
                            {{-- Honeypot anti-spam: deve restare vuoto --}}
                            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                            <h2 id="form-title" class="font-display text-[28px] leading-[1.2] text-ink">I tuoi dati</h2>
                            <p class="mt-2 text-[15px] leading-[1.5] text-muted">I campi contrassegnati da <span class="text-danger">*</span> sono obbligatori.</p>

                            @if ($errors->any())
                                <div role="alert" class="mt-6 rounded-xl border border-danger/25 bg-danger-soft px-4 py-3.5 text-[15px] leading-[1.5] text-danger">
                                    <p class="font-medium">Controlla i campi evidenziati e riprova.</p>
                                    <ul class="mt-1.5 list-disc pl-5">
                                        @foreach ($errorSummary as [$targetId, $message])
                                            <li><a href="#{{ $targetId }}" class="text-danger underline underline-offset-3 hover:text-ink focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger">{{ $message }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mt-8 grid gap-5">

                                @foreach ($inputGroups as $group)
                                    <div class="{{ $group['class'] }}">
                                        @foreach ($group['inputs'] as $input)
                                            <div>
                                                <label for="{{ $input['id'] }}" class="{{ $labelClass }}">{{ $input['label'] }}@if ($input['required']) <span aria-hidden="true" class="text-danger">*</span>@endif</label>
                                                <input
                                                    id="{{ $input['id'] }}"
                                                    name="{{ $input['name'] }}"
                                                    type="{{ $input['type'] }}"
                                                    value="{{ old($input['name']) }}"
                                                    autocomplete="{{ $input['autocomplete'] }}"
                                                    @if ($input['placeholder']) placeholder="{{ $input['placeholder'] }}" @endif
                                                    @required($input['required'])
                                                    @error($input['name']) aria-invalid="true" aria-describedby="{{ $input['id'] }}-error" @enderror
                                                    class="{{ $fieldClass }} {{ $fieldStateClass($input['name']) }} min-h-12 px-3.5 leading-[1.4]"
                                                >
                                                @error($input['name'])
                                                    <p id="{{ $input['id'] }}-error" class="mt-2 text-sm leading-[1.4] text-danger">{{ $fieldErrors[$input['name']][1] }}</p>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach

                                <fieldset class="min-w-0" @error('interest') aria-describedby="interest-error" @enderror>
                                    <legend class="mb-2.5 text-sm font-medium leading-[1.4] text-ink-soft">Cosa ti interessa</legend>
                                    <div class="grid grid-cols-[repeat(auto-fit,minmax(148px,1fr))] gap-2">
                                        @foreach (Lead::INTERESTS as $value => $label)
                                            <span class="group relative flex">
                                                <input type="radio" id="int-{{ Str::slug($value) }}" name="interest" value="{{ $value }}" class="peer absolute m-0 size-px opacity-0" @checked(old('interest', '81/08') === $value)>
                                                <label for="int-{{ Str::slug($value) }}" class="flex min-h-11 w-full cursor-pointer items-center gap-2 rounded-full border border-line bg-white pr-3.5 pl-3 text-sm leading-none font-medium whitespace-nowrap text-ink-soft hover:border-[#B9B9C9] hover:text-ink peer-checked:border-[#BCC5F7]! peer-checked:bg-cobalt-soft peer-checked:text-cobalt-text! peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-cobalt">
                                                    <span aria-hidden="true" class="size-3.5 flex-none rounded-full border-[1.5px] border-[#B9B9C9] bg-white group-has-checked:border-[4.5px] group-has-checked:border-cobalt"></span>{{ $label }}
                                                </label>
                                            </span>
                                        @endforeach
                                    </div>
                                    @error('interest')
                                        <p id="interest-error" class="mt-2 text-sm leading-[1.4] text-danger">{{ $fieldErrors['interest'][1] }}</p>
                                    @enderror
                                </fieldset>

                                <div>
                                    <label for="f-volume" class="{{ $labelClass }}">Numero di corsisti all’anno</label>
                                    <div class="relative">
                                        <select
                                            id="f-volume"
                                            name="trainees_per_year"
                                            @error('trainees_per_year') aria-invalid="true" aria-describedby="f-volume-error" @enderror
                                            class="{{ $fieldClass }} {{ $fieldStateClass('trainees_per_year') }} min-h-12 cursor-pointer appearance-none pr-11 pl-3.5 leading-[1.4]"
                                        >
                                            <option value="" disabled @selected(blank(old('trainees_per_year')))>Seleziona un intervallo</option>
                                            {{-- Le fasce del modello, in minuscolo come nel design --}}
                                            @foreach (Lead::TRAINEES_PER_YEAR as $value => $label)
                                                <option value="{{ $value }}" @selected(old('trainees_per_year') === $value)>{{ Str::lcfirst($label) }}</option>
                                            @endforeach
                                        </select>
                                        <svg class="pointer-events-none absolute top-1/2 right-4 -translate-y-1/2 text-muted" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"></path></svg>
                                    </div>
                                    @error('trainees_per_year')
                                        <p id="f-volume-error" class="mt-2 text-sm leading-[1.4] text-danger">{{ $fieldErrors['trainees_per_year'][1] }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="f-msg" class="{{ $labelClass }}">Messaggio</label>
                                    <textarea
                                        id="f-msg"
                                        name="message"
                                        rows="4"
                                        placeholder="Es. i corsi che eroghi, quante sedi avete, come gestite oggi attestati e scadenze."
                                        @error('message') aria-invalid="true" aria-describedby="f-msg-error" @enderror
                                        class="{{ $fieldClass }} {{ $fieldStateClass('message') }} min-h-32 resize-y px-3.5 py-3 leading-[1.5]"
                                    >{{ old('message') }}</textarea>
                                    @error('message')
                                        <p id="f-msg-error" class="mt-2 text-sm leading-[1.4] text-danger">{{ $fieldErrors['message'][1] }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <div class="flex items-start gap-3">
                                        <input
                                            type="checkbox"
                                            id="f-privacy"
                                            name="privacy"
                                            value="1"
                                            required
                                            @checked(old('privacy'))
                                            @error('privacy') aria-invalid="true" aria-describedby="f-privacy-error" @enderror
                                            class="mt-px size-5 flex-none cursor-pointer accent-cobalt focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cobalt"
                                        >
                                        <label for="f-privacy" class="cursor-pointer text-[15px] leading-[1.5] text-ink-soft">Ho letto l’<a href="#privacy" class="{{ $linkClass }}">informativa privacy</a> <span aria-hidden="true" class="text-danger">*</span></label>
                                    </div>
                                    @error('privacy')
                                        <p id="f-privacy-error" class="mt-2 text-sm leading-[1.4] text-danger">{{ $fieldErrors['privacy'][1] }}</p>
                                    @enderror
                                </div>

                                <div class="mt-1">
                                    <button type="submit" class="flex min-h-[52px] w-full cursor-pointer items-center justify-center gap-2 rounded-full bg-cobalt px-6 text-base leading-none font-medium text-white transition-colors hover:bg-cobalt-hover {{ $buttonFocusClass }}">
                                        Invia la richiesta
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="M13 6l6 6-6 6"></path></svg>
                                    </button>
                                    <p class="mt-3 text-center text-sm leading-[1.5] text-muted">Ti ricontattiamo entro 24 ore. Nessuno spam.</p>
                                </div>

                            </div>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- 2. Domande frequenti --}}
    <section class="pt-28 pb-34 max-[860px]:pt-16 max-[860px]:pb-20">
        <div class="site-wrap">
            <div class="flex flex-wrap items-start gap-x-16 gap-y-10">

                <div class="reveal sticky top-[120px] min-w-0 flex-[1_1_320px] max-[860px]:static">
                    <p class="{{ $eyebrowClass }}">Prima di scriverci</p>
                    <h2 class="font-display text-[clamp(36px,4.6vw,60px)] leading-[1.06] text-ink">Domande frequenti.</h2>
                    <p class="mt-6 max-w-[22em] text-[17px] leading-[1.625] text-ink-soft">Non trovi la tua? Scrivila nel messaggio: ti rispondiamo in demo.</p>
                    <a href="#richiesta" class="mt-5 inline-flex items-center gap-2 text-base leading-[1.625] font-medium text-cobalt-text no-underline hover:text-ink focus-visible:rounded-xs focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-cobalt">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5"></path><path d="M6 11l6-6 6 6"></path></svg>Torna al modulo
                    </a>
                </div>

                <div class="flex min-w-0 flex-[1_1_560px] flex-col gap-3">
                    @foreach ($faqs as $faq)
                        <details class="group/faq reveal rounded-[14px] border border-line bg-white open:border-[#D9D9E3]" @if ($loop->first) open @endif>
                            <summary class="group/question flex cursor-pointer list-none items-center justify-between gap-4 px-6 py-[22px] text-lg leading-[1.4] font-medium text-ink focus-visible:rounded-[14px] focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-cobalt max-[860px]:p-[18px] max-[860px]:text-[17px] [&::-webkit-details-marker]:hidden">
                                {{ $faq['question'] }}
                                <span aria-hidden="true" class="inline-flex size-8 flex-none items-center justify-center rounded-full bg-surface-alt text-ink-soft group-open/faq:rotate-180 group-hover/question:bg-line group-hover/question:text-ink motion-safe:transition-[rotate,background-color] motion-safe:duration-200 motion-safe:ease-[ease]">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"></path></svg>
                                </span>
                            </summary>
                            <div class="max-w-[668px] px-6 pb-6 max-[860px]:max-w-[656px] max-[860px]:px-[18px] max-[860px]:pb-5">
                                <p class="text-base leading-[1.625] text-ink-soft">{{ $faq['answer'] }}</p>
                            </div>
                        </details>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

</x-site.layout>
