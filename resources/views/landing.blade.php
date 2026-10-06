<!DOCTYPE html>
<html lang="it" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attestami — La piattaforma per erogare corsi di formazione obbligatoria</title>
    <meta name="description" content="Gestisci corsi, edizioni, esami e attestati per la formazione obbligatoria (Sicurezza sul lavoro D.Lgs 81/08, HACCP). Iscrizioni, docenti, calendario e attestati PDF a norma, tutto in un'unica piattaforma.">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white text-slate-800 antialiased">

    {{-- ===== Nav ===== --}}
    <header class="sticky top-0 z-40 border-b border-slate-100 bg-white/80 backdrop-blur">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a href="#" class="flex items-center gap-2 font-bold text-slate-900">
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-indigo-600 text-white">A</span>
                <span class="text-lg tracking-tight">Attestami</span>
            </a>
            <div class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
                <a href="#funzioni" class="hover:text-slate-900">Funzioni</a>
                <a href="#perchi" class="hover:text-slate-900">Per chi</a>
                <a href="#come" class="hover:text-slate-900">Come funziona</a>
            </div>
            <a href="#demo" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                Richiedi una demo
            </a>
        </nav>
    </header>

    {{-- ===== Hero ===== --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-gradient-to-b from-indigo-50/60 to-white"></div>
        <div class="mx-auto grid max-w-6xl items-center gap-12 px-6 py-20 lg:grid-cols-2 lg:py-28">
            <div>
                <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    Sicurezza sul lavoro · 81/08 · HACCP
                </span>
                <h1 class="mt-5 text-4xl font-black leading-[1.05] tracking-tight text-slate-900 sm:text-5xl">
                    Eroga corsi obbligatori e rilascia attestati <span class="text-indigo-600">a norma</span>, senza fogli Excel.
                </h1>
                <p class="mt-5 max-w-lg text-lg text-slate-600">
                    Attestami gestisce corsi, edizioni, iscrizioni, esami e attestati in un'unica piattaforma.
                    Pensata per enti di formazione, consulenti sicurezza e RSPP che devono erogare e certificare formazione obbligatoria.
                </p>
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#demo" class="rounded-lg bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                        Richiedi una demo gratuita
                    </a>
                    <a href="#funzioni" class="rounded-lg px-6 py-3 text-sm font-semibold text-slate-700 ring-1 ring-slate-200 transition hover:bg-slate-50">
                        Scopri le funzioni
                    </a>
                </div>
                <p class="mt-4 text-sm text-slate-500">Nessuna carta di credito · Ti ricontattiamo entro 24h</p>
            </div>

            {{-- mock card --}}
            <div class="relative">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-xl shadow-indigo-100">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <span class="text-sm font-semibold text-slate-900">Edizione · Sicurezza Generale</span>
                        <span class="rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-semibold text-green-700">In corso</span>
                    </div>
                    <div class="grid grid-cols-3 gap-3 py-4 text-center">
                        <div class="rounded-lg bg-slate-50 p-3">
                            <div class="text-2xl font-bold text-slate-900">24</div>
                            <div class="text-xs text-slate-500">Iscritti</div>
                        </div>
                        <div class="rounded-lg bg-slate-50 p-3">
                            <div class="text-2xl font-bold text-slate-900">18</div>
                            <div class="text-xs text-slate-500">Esami ok</div>
                        </div>
                        <div class="rounded-lg bg-slate-50 p-3">
                            <div class="text-2xl font-bold text-indigo-600">18</div>
                            <div class="text-xs text-slate-500">Attestati</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between rounded-lg border border-slate-100 px-3 py-2 text-sm">
                            <span>Rossi Mario</span>
                            <span class="rounded bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700">Attestato pronto</span>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border border-slate-100 px-3 py-2 text-sm">
                            <span>Bianchi Luca</span>
                            <span class="rounded bg-amber-50 px-2 py-0.5 text-xs font-medium text-amber-700">Esame da sostenere</span>
                        </div>
                        <div class="flex items-center justify-between rounded-lg border border-slate-100 px-3 py-2 text-sm">
                            <span>Verdi Anna</span>
                            <span class="rounded bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700">Attestato pronto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Problem ===== --}}
    <section class="border-y border-slate-100 bg-slate-50">
        <div class="mx-auto max-w-5xl px-6 py-16 text-center">
            <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600">Il problema</h2>
            <p class="mx-auto mt-4 max-w-3xl text-2xl font-semibold text-slate-900 sm:text-3xl">
                Gestire la formazione obbligatoria tra Excel, email e PDF compilati a mano è lento e rischioso.
            </p>
            <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                Scadenze dimenticate, attestati sbagliati, esami da correggere a mano, nessuna traccia in caso di controllo.
                Attestami mette ordine e automatizza tutto il ciclo.
            </p>
        </div>
    </section>

    {{-- ===== Features ===== --}}
    <section id="funzioni" class="mx-auto max-w-6xl px-6 py-20">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600">Funzioni</h2>
            <p class="mt-3 text-3xl font-black tracking-tight text-slate-900">Tutto il ciclo del corso, in un posto solo</p>
        </div>
        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $features = [
                    ['Corsi & edizioni', 'Definisci i corsi (81/08, HACCP, antincendio…) e apri edizioni con date, sede, posti e docenti.'],
                    ['Iscrizioni & lista d\'attesa', 'Gli iscritti si registrano online, con tetto posti e lista d\'attesa automatica quando l\'edizione è piena.'],
                    ['Esami con pool di domande', 'Crea un archivio domande per materia e docente; l\'esame si compone in automatico con punteggio a correzione immediata.'],
                    ['Attestati PDF automatici', 'Al superamento dell\'esame l\'attestato a norma viene generato in PDF con i dati del corsista e del corso.'],
                    ['Calendario & docenti', 'Pianifica le giornate, assegna docenti e materie, invia le lettere d\'incarico e gestisci le conferme.'],
                    ['White-label', 'Logo, colori e intestazioni personalizzabili: la piattaforma parla con il tuo brand, non con il nostro.'],
                ];
            @endphp
            @foreach ($features as [$title, $desc])
                <div class="rounded-2xl border border-slate-200 p-6 transition hover:border-indigo-200 hover:shadow-md hover:shadow-indigo-50">
                    <div class="grid h-10 w-10 place-items-center rounded-lg bg-indigo-50 text-indigo-600 font-bold">✓</div>
                    <h3 class="mt-4 font-semibold text-slate-900">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ===== Per chi ===== --}}
    <section id="perchi" class="border-y border-slate-100 bg-slate-50">
        <div class="mx-auto max-w-6xl px-6 py-20">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600">Per chi</h2>
                <p class="mt-3 text-3xl font-black tracking-tight text-slate-900">Fatto per chi eroga formazione a norma</p>
            </div>
            <div class="mt-14 grid gap-6 md:grid-cols-3">
                @php
                    $targets = [
                        ['Enti di formazione', 'Organismi accreditati che erogano corsi obbligatori a persone e aziende.'],
                        ['Consulenti & RSPP', 'Professionisti della sicurezza che formano e certificano i lavoratori dei propri clienti.'],
                        ['Aziende con formazione interna', 'Realtà che gestiscono in casa la formazione obbligatoria del personale.'],
                    ];
                @endphp
                @foreach ($targets as [$title, $desc])
                    <div class="rounded-2xl border border-slate-200 bg-white p-6">
                        <h3 class="font-semibold text-slate-900">{{ $title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Come funziona ===== --}}
    <section id="come" class="mx-auto max-w-6xl px-6 py-20">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-sm font-bold uppercase tracking-widest text-indigo-600">Come funziona</h2>
            <p class="mt-3 text-3xl font-black tracking-tight text-slate-900">Dalla configurazione all'attestato in 3 passi</p>
        </div>
        <div class="mt-14 grid gap-8 md:grid-cols-3">
            @php
                $steps = [
                    ['1', 'Configura i corsi', 'Imposti catalogo corsi, edizioni, docenti e modello di attestato. Tutto personalizzabile sul tuo ente.'],
                    ['2', 'Gestisci iscrizioni ed esami', 'I corsisti si iscrivono, seguono il corso e sostengono l\'esame online con correzione automatica.'],
                    ['3', 'Rilascia gli attestati', 'Al superamento, l\'attestato PDF è pronto. Tutto tracciato e pronto in caso di controllo.'],
                ];
            @endphp
            @foreach ($steps as [$n, $title, $desc])
                <div class="relative">
                    <div class="grid h-12 w-12 place-items-center rounded-full bg-indigo-600 text-lg font-bold text-white">{{ $n }}</div>
                    <h3 class="mt-5 font-semibold text-slate-900">{{ $title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ===== Lead form ===== --}}
    <section id="demo" class="border-t border-slate-100 bg-gradient-to-b from-white to-indigo-50/60">
        <div class="mx-auto max-w-2xl px-6 py-20">
            <div class="rounded-2xl border border-slate-200 bg-white p-8 shadow-xl shadow-indigo-100 sm:p-10">
                @if (session('lead_ok'))
                    <div class="text-center">
                        <div class="mx-auto grid h-14 w-14 place-items-center rounded-full bg-green-100 text-2xl text-green-600">✓</div>
                        <h2 class="mt-5 text-2xl font-black text-slate-900">Richiesta ricevuta!</h2>
                        <p class="mt-3 text-slate-600">Grazie. Ti ricontattiamo entro 24 ore per organizzare la demo.</p>
                        <a href="#" class="mt-6 inline-block text-sm font-semibold text-indigo-600 hover:text-indigo-700">Torna su ↑</a>
                    </div>
                @else
                    <div class="text-center">
                        <h2 class="text-3xl font-black tracking-tight text-slate-900">Richiedi una demo</h2>
                        <p class="mt-3 text-slate-600">Raccontaci della tua realtà: ti mostriamo Attestami in azione.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mt-6 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">
                            Controlla i campi evidenziati e riprova.
                        </div>
                    @endif

                    <form action="{{ route('lead.store') }}" method="POST" class="mt-8 space-y-4">
                        @csrf
                        {{-- honeypot --}}
                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700">Nome e cognome *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700">Telefono</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                            <div>
                                <label class="mb-1 block text-sm font-medium text-slate-700">Ente / Azienda</label>
                                <input type="text" name="organization" value="{{ old('organization') }}"
                                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            </div>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Cosa ti interessa</label>
                            <select name="interest"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                <option value="">Seleziona…</option>
                                <option value="81/08" @selected(old('interest') === '81/08')>Sicurezza sul lavoro (81/08)</option>
                                <option value="HACCP" @selected(old('interest') === 'HACCP')>HACCP / Alimentaristi</option>
                                <option value="Entrambi" @selected(old('interest') === 'Entrambi')>Entrambi</option>
                                <option value="Altro" @selected(old('interest') === 'Altro')>Altra formazione obbligatoria</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-slate-700">Messaggio</label>
                            <textarea name="message" rows="3"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                            Invia la richiesta
                        </button>
                        <p class="text-center text-xs text-slate-400">
                            Inviando accetti di essere ricontattato. Nessuno spam.
                        </p>
                    </form>
                @endif
            </div>
        </div>
    </section>

    {{-- ===== Footer ===== --}}
    <footer class="border-t border-slate-100 bg-white">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 text-sm text-slate-500 sm:flex-row">
            <div class="flex items-center gap-2 font-bold text-slate-900">
                <span class="grid h-7 w-7 place-items-center rounded-md bg-indigo-600 text-xs text-white">A</span>
                Attestami
            </div>
            <p>© {{ date('Y') }} Attestami. Tutti i diritti riservati.</p>
        </div>
    </footer>

</body>
</html>
