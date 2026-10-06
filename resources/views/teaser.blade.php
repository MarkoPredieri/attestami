<!DOCTYPE html>
<html lang="it" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attestami — Sta arrivando</title>
    <meta name="description" content="La nuova piattaforma per erogare corsi di formazione obbligatoria, gestire esami e rilasciare attestati a norma. In arrivo.">
    <meta name="theme-color" content="#07070e">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <style>
        :root {
            --bg: #07070e;
            --ink: #eef0ff;
            --muted: #9aa0c4;
            --violet: #7c5cff;
            --indigo: #4f46e5;
            --cyan: #22d3ee;
            --amber: #fbbf24;
            --font-display: 'Space Grotesk', ui-sans-serif, system-ui, sans-serif;
            --font-body: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }

        html { background: var(--bg); }
        body {
            background: var(--bg);
            color: var(--ink);
            font-family: var(--font-body);
            overflow-x: hidden;
        }
        .font-display { font-family: var(--font-display); }

        /* ===== Animated aurora background ===== */
        .aurora {
            position: fixed;
            inset: -20%;
            z-index: 0;
            pointer-events: none;
            filter: blur(90px);
            opacity: 0.6;
        }
        .aurora span {
            position: absolute;
            display: block;
            border-radius: 50%;
            mix-blend-mode: screen;
            will-change: transform;
        }
        .aurora .b1 { width: 48vw; height: 48vw; left: -6vw; top: -8vw;
            background: radial-gradient(circle at 30% 30%, #5b3cff, transparent 60%);
            animation: drift1 22s ease-in-out infinite; }
        .aurora .b2 { width: 42vw; height: 42vw; right: -8vw; top: 4vw;
            background: radial-gradient(circle at 70% 30%, #22d3ee, transparent 60%);
            animation: drift2 26s ease-in-out infinite; }
        .aurora .b3 { width: 50vw; height: 50vw; left: 20vw; bottom: -20vw;
            background: radial-gradient(circle at 50% 50%, #c026d3, transparent 60%);
            animation: drift3 30s ease-in-out infinite; }
        @keyframes drift1 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(8vw,6vw) scale(1.15)} }
        @keyframes drift2 { 0%,100%{transform:translate(0,0) scale(1.05)} 50%{transform:translate(-6vw,8vw) scale(0.9)} }
        @keyframes drift3 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(-8vw,-6vw) scale(1.2)} }

        #bg-canvas { position: fixed; inset: 0; z-index: 1; pointer-events: none; }

        /* grain */
        body::after {
            content: "";
            position: fixed; inset: 0; z-index: 2; pointer-events: none;
            opacity: 0.045;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        }

        .stage { position: relative; z-index: 3; }

        /* custom glow cursor */
        #glow {
            position: fixed; top: 0; left: 0; width: 460px; height: 460px;
            margin: -230px 0 0 -230px; border-radius: 50%; z-index: 2;
            pointer-events: none; transition: opacity .4s;
            background: radial-gradient(circle, rgba(124,92,255,.18), transparent 60%);
            will-change: transform;
        }

        /* gradient animated text */
        .grad-text {
            background: linear-gradient(100deg, #fff 10%, #a78bfa 35%, #22d3ee 60%, #fff 90%);
            background-size: 220% auto;
            -webkit-background-clip: text; background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 7s linear infinite;
        }
        @keyframes shimmer { to { background-position: 220% center; } }

        /* word reveal */
        .word { display: inline-block; opacity: 0; transform: translateY(0.5em) rotate(2deg);
            filter: blur(6px); animation: wordIn .9s cubic-bezier(.2,.7,.2,1) forwards; }
        @keyframes wordIn { to { opacity:1; transform:none; filter:blur(0); } }

        /* scroll reveal */
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity .9s cubic-bezier(.2,.7,.2,1), transform .9s cubic-bezier(.2,.7,.2,1); }
        .reveal.in { opacity: 1; transform: none; }

        /* glass */
        .glass {
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
            border: 1px solid rgba(255,255,255,.09);
            backdrop-filter: blur(12px);
        }
        .card-glow { position: relative; transition: transform .25s ease, border-color .3s; }
        .card-glow::before {
            content:""; position:absolute; inset:0; border-radius:inherit; padding:1px;
            background: linear-gradient(130deg, rgba(124,92,255,.6), rgba(34,211,238,.3), transparent 60%);
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor; mask-composite: exclude;
            opacity: 0; transition: opacity .3s;
        }
        .card-glow:hover::before { opacity: 1; }

        /* marquee */
        .marquee { display: flex; gap: 3rem; width: max-content; animation: marquee 32s linear infinite; }
        @keyframes marquee { to { transform: translateX(-50%); } }
        .marquee-mask { -webkit-mask-image: linear-gradient(90deg, transparent, #000 12%, #000 88%, transparent); mask-image: linear-gradient(90deg, transparent, #000 12%, #000 88%, transparent); }

        /* pipeline pulse */
        .flow-line { position: relative; overflow: hidden; }
        .flow-line::after { content:""; position:absolute; inset:0;
            background: linear-gradient(90deg, transparent, rgba(124,92,255,.9), transparent);
            width: 40%; animation: flow 2.6s linear infinite; }
        @keyframes flow { 0%{transform:translateX(-120%)} 100%{transform:translateX(320%)} }

        .btn-primary { position: relative; overflow: hidden; }
        .btn-primary::after { content:""; position:absolute; inset:0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.35), transparent);
            transform: translateX(-120%); transition: transform .6s; }
        .btn-primary:hover::after { transform: translateX(120%); }

        .magnetic { transition: transform .2s cubic-bezier(.2,.7,.2,1); }

        .dot-pulse { position: relative; }
        .dot-pulse::before { content:""; position:absolute; inset:0; border-radius:50%;
            background: inherit; animation: ping 1.8s cubic-bezier(0,0,.2,1) infinite; }
        @keyframes ping { 75%,100% { transform: scale(2.6); opacity: 0; } }

        /* ===== Product showcase ===== */
        .shot-tab { color: var(--muted); border-radius: 9999px; transition: color .25s, background .25s; }
        .shot-tab.active { background: linear-gradient(135deg,var(--violet),var(--indigo)); color: #fff; }
        .browser-frame { box-shadow: 0 50px 140px -30px rgba(90,60,230,.55); }
        .browser-bar { background: rgba(255,255,255,.05); border-bottom: 1px solid rgba(255,255,255,.08); }
        .shot-stage { background: #eef1f8; }
        .shot { display: none; animation: shotIn .55s cubic-bezier(.2,.7,.2,1); }
        .shot.is-active { display: flex; }
        @keyframes shotIn { from { opacity: 0; transform: translateY(10px) scale(.995); } to { opacity: 1; transform: none; } }
        /* light app mockup */
        .app { color: #222742; font-family: var(--font-body); font-size: 13px; }
        .app-side { background: #0f1226; }
        .app-nav { color: #8c93c0; border-radius: 10px; }
        .app-nav.on { background: rgba(124,92,255,.18); color: #fff; }
        .app-card { background: #fff; border: 1px solid #e6e9f4; border-radius: 14px; }
        .qr rect { fill: #11142b; }

        @media (prefers-reduced-motion: reduce) {
            .aurora span, .grad-text, .flow-line::after, .marquee, .dot-pulse::before { animation: none !important; }
            .word { opacity:1; transform:none; filter:none; animation:none; }
            .reveal { opacity:1; transform:none; }
            #glow { display:none; }
        }
        @media (hover: none) { #glow { display:none; } }

        ::selection { background: rgba(124,92,255,.35); color:#fff; }
    </style>
</head>
<body>

    <div id="glow"></div>
    <div class="aurora" aria-hidden="true"><span class="b1"></span><span class="b2"></span><span class="b3"></span></div>
    <canvas id="bg-canvas" aria-hidden="true"></canvas>

    <div class="stage">

        {{-- ===== Nav ===== --}}
        <header class="mx-auto flex max-w-6xl items-center justify-between px-6 py-6">
            <a href="#" class="flex items-center gap-2.5">
                <span class="grid h-9 w-9 place-items-center rounded-xl font-display font-bold text-white" style="background:linear-gradient(135deg,var(--violet),var(--indigo))">A</span>
                <span class="font-display text-lg font-semibold tracking-tight">Attestami</span>
            </a>
            <span class="glass rounded-full px-3.5 py-1.5 text-xs font-medium text-[var(--muted)]">In arrivo · 2026</span>
        </header>

        {{-- ===== Hero ===== --}}
        <section class="mx-auto flex max-w-5xl flex-col items-center px-6 pt-16 pb-24 text-center sm:pt-24">
            <div class="glass mb-8 inline-flex items-center gap-2.5 rounded-full px-4 py-2 text-xs font-medium tracking-wide text-[var(--muted)]">
                <span class="dot-pulse h-2 w-2 rounded-full" style="background:var(--cyan)"></span>
                Formazione obbligatoria · 81/08 · HACCP
            </div>

            <h1 class="font-display text-5xl font-bold leading-[1.02] tracking-tight sm:text-7xl" id="headline">
                <span class="word" style="animation-delay:.05s">Il</span>
                <span class="word" style="animation-delay:.12s">futuro</span>
                <span class="word" style="animation-delay:.19s">della</span>
                <br class="hidden sm:block">
                <span class="word grad-text" style="animation-delay:.28s">formazione</span>
                <span class="word grad-text" style="animation-delay:.36s">a&nbsp;norma</span>
            </h1>

            <p class="reveal mt-7 max-w-xl text-lg leading-relaxed text-[var(--muted)]" style="transition-delay:.5s">
                Corsi, edizioni, esami e attestati — in un'unica piattaforma, elegante e senza attrito.
                Qualcosa di grande sta per arrivare.
            </p>

            {{-- email capture --}}
            <div class="reveal mt-10 w-full max-w-md" style="transition-delay:.62s">
                @if (session('lead_ok'))
                    <div class="glass flex items-center justify-center gap-3 rounded-2xl px-5 py-4 text-sm">
                        <span class="grid h-7 w-7 place-items-center rounded-full text-[var(--bg)]" style="background:var(--cyan)">✓</span>
                        Sei in lista. Ti avviseremo per primo al lancio.
                    </div>
                @else
                    <form action="{{ route('lead.store') }}" method="POST" class="glass flex flex-col gap-2 rounded-2xl p-2 sm:flex-row">
                        @csrf
                        <input type="hidden" name="source" value="teaser">
                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">
                        <input type="email" name="email" required placeholder="La tua email"
                            class="w-full flex-1 rounded-xl bg-transparent px-4 py-3 text-sm text-white placeholder-[var(--muted)] outline-none">
                        <button type="submit"
                            class="btn-primary magnetic rounded-xl px-6 py-3 text-sm font-semibold text-white"
                            style="background:linear-gradient(135deg,var(--violet),var(--indigo))">
                            Avvisami al lancio
                        </button>
                    </form>
                    @error('email')<p class="mt-2 text-xs text-rose-300">Inserisci un'email valida.</p>@enderror
                    <p class="mt-3 text-xs text-[var(--muted)]/70">Niente spam. Solo l'annuncio del lancio.</p>
                @endif
            </div>

            {{-- scroll cue --}}
            <div class="reveal mt-20 flex flex-col items-center gap-2 text-[var(--muted)]" style="transition-delay:.8s">
                <span class="text-[11px] uppercase tracking-[0.3em]">Scopri</span>
                <span class="flex h-9 w-5 justify-center rounded-full border border-white/20 pt-1.5">
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-white/70"></span>
                </span>
            </div>
        </section>

        {{-- ===== Marquee ===== --}}
        <div class="marquee-mask overflow-hidden border-y border-white/5 py-6">
            <div class="marquee font-display text-2xl font-medium text-white/25 sm:text-3xl">
                @php $tags = ['Sicurezza sul lavoro','HACCP','Antincendio','Primo soccorso','Attestati a norma','Esami online','RSPP','Formazione obbligatoria']; @endphp
                @foreach (array_merge($tags, $tags) as $t)
                    <span class="flex items-center gap-3">{{ $t }} <span style="color:var(--violet)">✦</span></span>
                @endforeach
            </div>
        </div>

        {{-- ===== Showcase: dentro la piattaforma ===== --}}
        <section id="dentro" class="mx-auto max-w-6xl px-6 pt-28 pb-10">
            <div class="reveal mx-auto max-w-2xl text-center">
                <p class="font-display text-sm font-semibold uppercase tracking-[0.25em]" style="color:var(--cyan)">Dentro la piattaforma</p>
                <h2 class="mt-4 font-display text-4xl font-bold tracking-tight sm:text-5xl">Guardala in azione</h2>
                <p class="mt-4 text-[var(--muted)]">Un assaggio di come lavorerai ogni giorno. (Anteprima dell'interfaccia.)</p>
            </div>

            {{-- tabs --}}
            <div class="reveal mt-10 flex justify-center">
                <div class="glass inline-flex gap-1 rounded-full p-1 text-sm font-medium" role="tablist">
                    <button class="shot-tab active px-4 py-2" data-shot="dash" data-caption="Scadenzario conformità a colpo d'occhio: chi è a norma e chi sta per scadere, con avvisi automatici di rinnovo.">Dashboard</button>
                    <button class="shot-tab px-4 py-2" data-shot="cal" data-caption="Pianifichi edizioni e giornate. Attestami rileva da solo i conflitti di docenti e aule e suggerisce gli slot liberi.">Calendario</button>
                    <button class="shot-tab px-4 py-2" data-shot="exam" data-caption="L'esame si compone da solo dal pool di domande, in ordine casuale, con correzione immediata e punteggio.">Esami</button>
                    <button class="shot-tab px-4 py-2" data-shot="cert" data-caption="Attestato PDF a norma generato in automatico, con QR verificabile pubblicamente in un secondo.">Attestati</button>
                </div>
            </div>

            {{-- browser frame --}}
            <div class="reveal mt-8">
                <div class="browser-frame overflow-hidden rounded-2xl border border-white/10">
                    <div class="browser-bar flex items-center gap-2 px-4 py-3">
                        <span class="h-3 w-3 rounded-full bg-rose-400/70"></span>
                        <span class="h-3 w-3 rounded-full bg-amber-400/70"></span>
                        <span class="h-3 w-3 rounded-full bg-green-400/70"></span>
                        <span class="ml-3 rounded-md bg-white/5 px-3 py-1 text-xs text-[var(--muted)]">app.attestami.it</span>
                    </div>
                    <div class="shot-stage relative">

                        {{-- ===== DASHBOARD ===== --}}
                        <div class="shot app is-active min-h-[470px]" data-panel="dash">
                            <aside class="app-side hidden w-52 shrink-0 flex-col p-3 md:flex">
                                <div class="flex items-center gap-2 px-2 py-2 text-white">
                                    <span class="grid h-7 w-7 place-items-center rounded-lg text-xs font-bold" style="background:linear-gradient(135deg,var(--violet),var(--indigo))">A</span>
                                    <span class="font-display font-semibold">Attestami</span>
                                </div>
                                <nav class="mt-4 space-y-1 text-[13px]">
                                    <div class="app-nav on px-3 py-2">Dashboard</div>
                                    <div class="app-nav px-3 py-2">Corsi</div>
                                    <div class="app-nav px-3 py-2">Edizioni</div>
                                    <div class="app-nav px-3 py-2">Corsisti</div>
                                    <div class="app-nav px-3 py-2">Esami</div>
                                    <div class="app-nav px-3 py-2">Attestati</div>
                                    <div class="app-nav px-3 py-2">Scadenze</div>
                                    <div class="app-nav px-3 py-2">Statistiche</div>
                                </nav>
                            </aside>
                            <main class="flex-1 p-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-display text-lg font-bold text-[#222742]">Dashboard</h3>
                                        <p class="text-xs text-slate-500">Ente Demo Formazione · ott 2026</p>
                                    </div>
                                    <span class="grid h-8 w-8 place-items-center rounded-full bg-indigo-100 text-xs font-semibold text-indigo-700">ED</span>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-3 lg:grid-cols-4">
                                    <div class="app-card p-3">
                                        <p class="text-[11px] text-slate-500">Corsisti a norma</p>
                                        <p class="mt-1 text-2xl font-bold text-[#222742]">142</p>
                                        <p class="text-[11px] font-medium text-green-600">▲ +12 nel mese</p>
                                    </div>
                                    <div class="app-card p-3">
                                        <p class="text-[11px] text-slate-500">In scadenza (30gg)</p>
                                        <p class="mt-1 text-2xl font-bold text-amber-600">9</p>
                                        <p class="text-[11px] text-slate-400">da rinnovare</p>
                                    </div>
                                    <div class="app-card p-3">
                                        <p class="text-[11px] text-slate-500">Attestati 2026</p>
                                        <p class="mt-1 text-2xl font-bold text-[#222742]">318</p>
                                        <p class="text-[11px] text-slate-400">rilasciati</p>
                                    </div>
                                    <div class="app-card p-3">
                                        <p class="text-[11px] text-slate-500">Edizioni attive</p>
                                        <p class="mt-1 text-2xl font-bold text-[#222742]">7</p>
                                        <p class="text-[11px] text-slate-400">in corso</p>
                                    </div>
                                </div>

                                <div class="mt-4 grid gap-3 lg:grid-cols-5">
                                    <div class="app-card p-4 lg:col-span-3">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-semibold text-[#222742]">Scadenze imminenti</p>
                                            <span class="rounded-full bg-indigo-50 px-2 py-0.5 text-[11px] font-medium text-indigo-600">Avvisi automatici attivi</span>
                                        </div>
                                        <div class="mt-3 space-y-2 text-[12px]">
                                            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                                                <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-rose-500"></span> Rossi Mario · <span class="text-slate-500">Antincendio rischio medio</span></span>
                                                <span class="font-medium text-rose-600">scade 12 ott</span>
                                            </div>
                                            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                                                <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-500"></span> Bianchi Laura · <span class="text-slate-500">81/08 Aggiornamento</span></span>
                                                <span class="font-medium text-amber-600">scade 28 ott</span>
                                            </div>
                                            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                                                <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-500"></span> Verdi Paolo · <span class="text-slate-500">HACCP alimentaristi</span></span>
                                                <span class="font-medium text-amber-600">scade 03 nov</span>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <span class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-green-500"></span> Neri Anna · <span class="text-slate-500">Primo soccorso</span></span>
                                                <span class="font-medium text-green-600">scade 14 gen</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-card p-4 lg:col-span-2">
                                        <p class="text-sm font-semibold text-[#222742]">Prossime lezioni</p>
                                        <div class="mt-3 space-y-2 text-[12px]">
                                            <div class="rounded-lg bg-slate-50 p-2">
                                                <p class="font-medium text-[#222742]">Lun 06 · 81/08 Generale</p>
                                                <p class="text-slate-500">Aula A · Ing. Conti</p>
                                            </div>
                                            <div class="rounded-lg bg-slate-50 p-2">
                                                <p class="font-medium text-[#222742]">Mer 08 · HACCP Base</p>
                                                <p class="text-slate-500">Aula B · Dott.ssa Mari</p>
                                            </div>
                                            <div class="rounded-lg bg-slate-50 p-2">
                                                <p class="font-medium text-[#222742]">Ven 10 · Antincendio</p>
                                                <p class="text-slate-500">Aula A · Geom. Russo</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>

                        {{-- ===== CALENDARIO + CONFLITTI ===== --}}
                        <div class="shot app min-h-[470px] flex-col p-5" data-panel="cal">
                            <div class="flex items-center justify-between">
                                <h3 class="font-display text-lg font-bold text-[#222742]">Calendario didattico</h3>
                                <span class="rounded-lg bg-indigo-600 px-3 py-1.5 text-xs font-semibold text-white">+ Nuova edizione</span>
                            </div>

                            <div class="mt-3 flex items-center justify-between rounded-xl border border-rose-200 bg-rose-50 px-4 py-3">
                                <p class="text-[12px] text-rose-700"><span class="font-bold">⚠ Conflitto rilevato</span> — Ing. Conti è assegnato a 2 corsi sovrapposti · martedì 14:00–16:00</p>
                                <span class="rounded-lg bg-rose-600 px-3 py-1 text-[11px] font-semibold text-white">Risolvi</span>
                            </div>

                            <div class="mt-4 grid flex-1 grid-cols-5 gap-2 text-[11px]">
                                @php
                                    $days = [
                                        ['Lun 06', [['81/08 Generale','bg-indigo-100 text-indigo-700','09:00 · Aula A'],['HACCP','bg-cyan-100 text-cyan-700','14:00 · Aula B']]],
                                        ['Mar 07', [['Antincendio','bg-emerald-100 text-emerald-700','09:00 · Aula A'],['81/08 Specifico ⚠','bg-rose-100 text-rose-700 ring-1 ring-rose-300','14:00 · Conti'],['Agg. 81/08 ⚠','bg-rose-100 text-rose-700 ring-1 ring-rose-300','14:00 · Conti']]],
                                        ['Mer 08', [['HACCP Base','bg-cyan-100 text-cyan-700','09:00 · Aula B']]],
                                        ['Gio 09', [['Primo soccorso','bg-amber-100 text-amber-700','09:00 · Aula A'],['RSPP Modulo B','bg-violet-100 text-violet-700','15:00 · Aula C']]],
                                        ['Ven 10', [['Antincendio','bg-emerald-100 text-emerald-700','09:00 · Aula A']]],
                                    ];
                                @endphp
                                @foreach ($days as [$d, $events])
                                    <div class="rounded-xl bg-slate-50 p-2">
                                        <p class="mb-2 font-semibold text-slate-600">{{ $d }}</p>
                                        <div class="space-y-1.5">
                                            @foreach ($events as [$t, $cls, $sub])
                                                <div class="rounded-lg {{ $cls }} px-2 py-1.5">
                                                    <p class="font-medium leading-tight">{{ $t }}</p>
                                                    <p class="opacity-70">{{ $sub }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <p class="mt-3 text-[11px] text-slate-400">💡 Suggerimento: Geom. Russo è libero martedì 14:00 — riassegna con un clic.</p>
                        </div>

                        {{-- ===== ESAME ===== --}}
                        <div class="shot app min-h-[470px] gap-4 p-5" data-panel="exam">
                            <div class="hidden w-56 shrink-0 space-y-3 lg:block">
                                <div class="app-card p-4">
                                    <p class="text-[11px] text-slate-500">Banca domande</p>
                                    <p class="text-2xl font-bold text-[#222742]">128</p>
                                    <p class="text-[11px] text-slate-400">per 6 materie</p>
                                </div>
                                <div class="app-card p-4 text-[12px]">
                                    <p class="font-semibold text-[#222742]">Configurazione</p>
                                    <p class="mt-2 text-slate-500">Materia: Rischi specifici</p>
                                    <p class="text-slate-500">Domande: 20 (casuali)</p>
                                    <p class="text-slate-500">Soglia: 60%</p>
                                    <p class="text-slate-500">Tempo: 30 min</p>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="app-card p-5">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-[#222742]">Esame · Formazione Lavoratori</p>
                                        <div class="flex items-center gap-2">
                                            <span class="rounded-md bg-slate-100 px-2 py-1 text-[11px] font-medium text-slate-600">🔀 Domande casuali</span>
                                            <span class="rounded-md bg-rose-50 px-2 py-1 text-[11px] font-semibold text-rose-600">⏱ 18:42</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                                        <div class="h-full w-[15%] rounded-full bg-indigo-500"></div>
                                    </div>
                                    <p class="mt-2 text-[11px] text-slate-400">Domanda 3 di 20</p>

                                    <p class="mt-4 font-medium text-[#222742]">Qual è la durata minima della formazione generale dei lavoratori (D.Lgs 81/08)?</p>
                                    <div class="mt-3 space-y-2 text-[13px]">
                                        <div class="rounded-lg border border-slate-200 px-3 py-2 text-slate-600">A · 2 ore</div>
                                        <div class="flex items-center justify-between rounded-lg border border-green-300 bg-green-50 px-3 py-2 font-medium text-green-700">B · 4 ore <span>✓</span></div>
                                        <div class="rounded-lg border border-slate-200 px-3 py-2 text-slate-600">C · 8 ore</div>
                                        <div class="rounded-lg border border-slate-200 px-3 py-2 text-slate-600">D · 16 ore</div>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-[11px] text-slate-400">Correzione automatica a fine esame</span>
                                        <span class="rounded-lg bg-indigo-600 px-4 py-2 text-[12px] font-semibold text-white">Prossima →</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ===== ATTESTATO + QR ===== --}}
                        <div class="shot app min-h-[470px] items-center justify-center p-6" data-panel="cert" style="background:#e9edf7">
                            <div class="relative w-full max-w-lg">
                                <span class="absolute -top-3 right-2 z-10 rounded-full bg-green-600 px-3 py-1.5 text-[11px] font-semibold text-white shadow-lg">✓ Attestato verificato · attestami.it/v/8F3K2</span>
                                <div class="rounded-xl border border-slate-200 bg-white p-8 shadow-2xl" style="aspect-ratio:1.414/1">
                                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                        <div class="flex items-center gap-2">
                                            <span class="grid h-7 w-7 place-items-center rounded-lg text-xs font-bold text-white" style="background:linear-gradient(135deg,var(--violet),var(--indigo))">A</span>
                                            <span class="font-display text-sm font-semibold text-[#222742]">Ente Demo Formazione</span>
                                        </div>
                                        <span class="text-[10px] uppercase tracking-widest text-slate-400">Attestato n. 2026/0318</span>
                                    </div>
                                    <p class="mt-6 text-center text-[11px] uppercase tracking-[0.3em] text-indigo-500">Attestato di formazione</p>
                                    <p class="mt-3 text-center text-[12px] text-slate-500">Si attesta che</p>
                                    <p class="text-center font-display text-2xl font-bold text-[#222742]">Mario Rossi</p>
                                    <p class="mt-1 text-center text-[12px] text-slate-500">ha superato con profitto il corso</p>
                                    <p class="mt-1 text-center text-sm font-semibold text-[#222742]">Formazione Lavoratori — Rischio Medio (D.Lgs 81/08)</p>
                                    <div class="mt-6 flex items-end justify-between">
                                        <div class="text-[11px] text-slate-500">
                                            <p>Durata: 12 ore</p>
                                            <p>Esito: 28/30</p>
                                            <p>Data: 03 ott 2026</p>
                                        </div>
                                        <div class="text-center">
                                            <svg class="qr h-20 w-20" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0" y="0" width="7" height="1"/><rect x="0" y="6" width="7" height="1"/><rect x="0" y="0" width="1" height="7"/><rect x="6" y="0" width="1" height="7"/><rect x="2" y="2" width="3" height="3"/>
                                                <rect x="18" y="0" width="7" height="1"/><rect x="18" y="6" width="7" height="1"/><rect x="18" y="0" width="1" height="7"/><rect x="24" y="0" width="1" height="7"/><rect x="20" y="2" width="3" height="3"/>
                                                <rect x="0" y="18" width="7" height="1"/><rect x="0" y="24" width="7" height="1"/><rect x="0" y="18" width="1" height="7"/><rect x="6" y="18" width="1" height="7"/><rect x="2" y="20" width="3" height="3"/>
                                                <rect x="9" y="1" width="1" height="1"/><rect x="11" y="2" width="1" height="1"/><rect x="13" y="1" width="1" height="1"/><rect x="10" y="3" width="1" height="1"/><rect x="12" y="4" width="1" height="1"/><rect x="14" y="3" width="1" height="1"/><rect x="16" y="2" width="1" height="1"/><rect x="9" y="5" width="1" height="1"/><rect x="11" y="6" width="1" height="1"/><rect x="13" y="5" width="1" height="1"/>
                                                <rect x="1" y="9" width="1" height="1"/><rect x="3" y="10" width="1" height="1"/><rect x="5" y="9" width="1" height="1"/><rect x="2" y="11" width="1" height="1"/><rect x="4" y="12" width="1" height="1"/><rect x="8" y="10" width="1" height="1"/><rect x="10" y="9" width="1" height="1"/><rect x="12" y="10" width="1" height="1"/><rect x="14" y="11" width="1" height="1"/><rect x="16" y="9" width="1" height="1"/><rect x="18" y="10" width="1" height="1"/><rect x="20" y="9" width="1" height="1"/><rect x="22" y="11" width="1" height="1"/><rect x="24" y="10" width="1" height="1"/>
                                                <rect x="9" y="13" width="1" height="1"/><rect x="11" y="14" width="1" height="1"/><rect x="13" y="13" width="1" height="1"/><rect x="15" y="14" width="1" height="1"/><rect x="17" y="13" width="1" height="1"/><rect x="19" y="12" width="1" height="1"/><rect x="21" y="14" width="1" height="1"/><rect x="23" y="13" width="1" height="1"/>
                                                <rect x="10" y="17" width="1" height="1"/><rect x="12" y="18" width="1" height="1"/><rect x="14" y="16" width="1" height="1"/><rect x="16" y="18" width="1" height="1"/><rect x="18" y="17" width="1" height="1"/><rect x="20" y="16" width="1" height="1"/><rect x="22" y="18" width="1" height="1"/><rect x="24" y="17" width="1" height="1"/>
                                                <rect x="9" y="20" width="1" height="1"/><rect x="11" y="22" width="1" height="1"/><rect x="13" y="20" width="1" height="1"/><rect x="15" y="22" width="1" height="1"/><rect x="9" y="24" width="1" height="1"/><rect x="11" y="23" width="1" height="1"/><rect x="13" y="24" width="1" height="1"/><rect x="15" y="23" width="1" height="1"/><rect x="17" y="22" width="1" height="1"/><rect x="19" y="24" width="1" height="1"/><rect x="21" y="23" width="1" height="1"/><rect x="23" y="24" width="1" height="1"/>
                                            </svg>
                                            <p class="mt-1 text-[9px] text-slate-400">Verifica autenticità</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- caption --}}
                <p id="shot-caption" class="mx-auto mt-5 max-w-xl text-center text-sm text-[var(--muted)]">
                    Scadenzario conformità a colpo d'occhio: chi è a norma e chi sta per scadere, con avvisi automatici di rinnovo.
                </p>

                {{-- extra features strip --}}
                <div class="reveal mt-8 flex flex-wrap items-center justify-center gap-2 text-xs text-[var(--muted)]">
                    @foreach (['Avvisi di rinnovo','Export calendario .ics','Statistiche esami','Import CSV corsisti','Registro modifiche','Convocazioni pronte da inviare','QR verificabile'] as $chip)
                        <span class="glass rounded-full px-3 py-1.5">{{ $chip }}</span>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== Cosa sarà ===== --}}
        <section class="mx-auto max-w-6xl px-6 py-28">
            <div class="reveal mx-auto max-w-2xl text-center">
                <p class="font-display text-sm font-semibold uppercase tracking-[0.25em]" style="color:var(--violet)">Cosa sarà</p>
                <h2 class="mt-4 font-display text-4xl font-bold tracking-tight sm:text-5xl">Un solo posto. Tutto il ciclo.</h2>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-3">
                @php
                    $cards = [
                        ['◆','Corsi & edizioni','Catalogo corsi e edizioni con date, sedi, posti e docenti. Ordine, finalmente.'],
                        ['◈','Esami intelligenti','Archivio domande per materia e docente; l\'esame si compone da solo, correzione immediata.'],
                        ['✦','Attestati a norma','Al superamento, l\'attestato PDF è pronto. Tracciato, pronto per ogni controllo.'],
                    ];
                @endphp
                @foreach ($cards as $i => [$icon, $title, $desc])
                    <div class="reveal tilt card-glow glass rounded-3xl p-8" style="transition-delay:{{ $i * 0.1 }}s">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl text-xl" style="background:rgba(124,92,255,.15);color:var(--cyan)">{{ $icon }}</div>
                        <h3 class="mt-6 font-display text-xl font-semibold">{{ $title }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-[var(--muted)]">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ===== Flow ===== --}}
        <section class="mx-auto max-w-5xl px-6 pb-28">
            <div class="reveal glass rounded-[2rem] p-10 sm:p-14">
                <p class="text-center font-display text-sm font-semibold uppercase tracking-[0.25em]" style="color:var(--cyan)">Il flusso</p>
                <h2 class="mt-4 text-center font-display text-3xl font-bold tracking-tight sm:text-4xl">Dall'iscrizione all'attestato</h2>

                <div class="mt-12 flex flex-col items-center gap-4 sm:flex-row sm:justify-between">
                    @php $flow = ['Iscrizione','Corso','Esame','Attestato']; @endphp
                    @foreach ($flow as $i => $step)
                        <div class="flex flex-col items-center gap-3">
                            <div class="grid h-16 w-16 place-items-center rounded-2xl font-display text-xl font-bold glass" style="color:var(--violet)">{{ $i + 1 }}</div>
                            <span class="font-display text-sm font-medium">{{ $step }}</span>
                        </div>
                        @if (!$loop->last)
                            <div class="flow-line hidden h-px flex-1 bg-white/10 sm:block"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== Stats ===== --}}
        <section class="mx-auto max-w-5xl px-6 pb-28">
            <div class="grid gap-8 text-center sm:grid-cols-3">
                @php
                    $stats = [
                        ['100','%','Digitale, zero carta'],
                        ['3','×','Più veloce della gestione manuale'],
                        ['24','/7','Esami e attestati, sempre online'],
                    ];
                @endphp
                @foreach ($stats as $i => [$num, $suffix, $label])
                    <div class="reveal" style="transition-delay:{{ $i * 0.1 }}s">
                        <div class="font-display text-6xl font-bold grad-text">
                            <span data-count="{{ $num }}">0</span>{{ $suffix }}
                        </div>
                        <p class="mt-3 text-sm text-[var(--muted)]">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ===== Closing CTA ===== --}}
        <section class="mx-auto max-w-3xl px-6 pb-32 text-center">
            <div class="reveal">
                <h2 class="font-display text-4xl font-bold leading-tight tracking-tight sm:text-6xl">
                    Vuoi essere<br><span class="grad-text">tra i primi?</span>
                </h2>
                <p class="mx-auto mt-6 max-w-md text-lg text-[var(--muted)]">
                    Lascia la tua email: ti avvisiamo appena Attestami apre le porte.
                </p>

                @unless (session('lead_ok'))
                    <form action="{{ route('lead.store') }}" method="POST" class="glass mx-auto mt-8 flex max-w-md flex-col gap-2 rounded-2xl p-2 sm:flex-row">
                        @csrf
                        <input type="hidden" name="source" value="teaser">
                        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">
                        <input type="email" name="email" required placeholder="La tua email"
                            class="w-full flex-1 rounded-xl bg-transparent px-4 py-3 text-sm text-white placeholder-[var(--muted)] outline-none">
                        <button type="submit"
                            class="btn-primary magnetic rounded-xl px-6 py-3 text-sm font-semibold text-white"
                            style="background:linear-gradient(135deg,var(--violet),var(--indigo))">
                            Avvisami
                        </button>
                    </form>
                @endunless
            </div>
        </section>

        {{-- ===== Footer ===== --}}
        <footer class="border-t border-white/5">
            <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 text-sm text-[var(--muted)] sm:flex-row">
                <div class="flex items-center gap-2 font-display font-semibold text-white">
                    <span class="grid h-7 w-7 place-items-center rounded-lg text-xs text-white" style="background:linear-gradient(135deg,var(--violet),var(--indigo))">A</span>
                    Attestami
                </div>
                <p>© {{ date('Y') }} Attestami · In arrivo</p>
            </div>
        </footer>

    </div>

    <script>
    (function () {
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        /* ---------- Canvas constellation ---------- */
        var canvas = document.getElementById('bg-canvas');
        if (canvas && !reduce) {
            var ctx = canvas.getContext('2d');
            var dpr = Math.min(window.devicePixelRatio || 1, 2);
            var W = 0, H = 0, pts = [], mx = -9999, my = -9999;

            function resize() {
                W = window.innerWidth; H = window.innerHeight;
                canvas.width = W * dpr; canvas.height = H * dpr;
                canvas.style.width = W + 'px'; canvas.style.height = H + 'px';
                ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
                var target = Math.min(110, Math.floor(W * H / 14000));
                pts = [];
                for (var i = 0; i < target; i++) {
                    pts.push({
                        x: Math.random() * W, y: Math.random() * H,
                        vx: (Math.random() - 0.5) * 0.35, vy: (Math.random() - 0.5) * 0.35,
                        r: Math.random() * 1.6 + 0.6
                    });
                }
            }

            function tick() {
                ctx.clearRect(0, 0, W, H);
                for (var i = 0; i < pts.length; i++) {
                    var p = pts[i];
                    p.x += p.vx; p.y += p.vy;
                    if (p.x < 0 || p.x > W) p.vx *= -1;
                    if (p.y < 0 || p.y > H) p.vy *= -1;

                    var dxm = p.x - mx, dym = p.y - my, dm = Math.sqrt(dxm * dxm + dym * dym);
                    if (dm < 140) { p.x += dxm / dm * 0.6; p.y += dym / dm * 0.6; }

                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(180,170,255,0.55)';
                    ctx.fill();

                    for (var j = i + 1; j < pts.length; j++) {
                        var q = pts[j], dx = p.x - q.x, dy = p.y - q.y, d = Math.sqrt(dx * dx + dy * dy);
                        if (d < 130) {
                            ctx.beginPath();
                            ctx.moveTo(p.x, p.y); ctx.lineTo(q.x, q.y);
                            ctx.strokeStyle = 'rgba(124,92,255,' + (0.14 * (1 - d / 130)) + ')';
                            ctx.lineWidth = 1;
                            ctx.stroke();
                        }
                    }
                }
                requestAnimationFrame(tick);
            }

            window.addEventListener('resize', resize, { passive: true });
            window.addEventListener('mousemove', function (e) { mx = e.clientX; my = e.clientY; }, { passive: true });
            window.addEventListener('mouseout', function () { mx = -9999; my = -9999; });
            resize(); tick();
        }

        /* ---------- Glow cursor ---------- */
        var glow = document.getElementById('glow');
        if (glow && window.matchMedia('(hover: hover)').matches) {
            var gx = window.innerWidth / 2, gy = window.innerHeight / 2, cx = gx, cy = gy;
            window.addEventListener('mousemove', function (e) { gx = e.clientX; gy = e.clientY; }, { passive: true });
            (function loop() {
                cx += (gx - cx) * 0.12; cy += (gy - cy) * 0.12;
                glow.style.transform = 'translate(' + cx + 'px,' + cy + 'px)';
                requestAnimationFrame(loop);
            })();
        }

        /* ---------- Scroll reveals ---------- */
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

        /* ---------- Count up ---------- */
        var co = new IntersectionObserver(function (entries) {
            entries.forEach(function (en) {
                if (!en.isIntersecting) return;
                var el = en.target, target = parseInt(el.getAttribute('data-count'), 10), start = null;
                function step(ts) {
                    if (!start) start = ts;
                    var prog = Math.min((ts - start) / 1100, 1);
                    el.textContent = Math.floor(prog * target);
                    if (prog < 1) requestAnimationFrame(step); else el.textContent = target;
                }
                requestAnimationFrame(step);
                co.unobserve(el);
            });
        }, { threshold: 0.6 });
        document.querySelectorAll('[data-count]').forEach(function (el) { co.observe(el); });

        /* ---------- Tilt cards ---------- */
        if (window.matchMedia('(hover: hover)').matches && !reduce) {
            document.querySelectorAll('.tilt').forEach(function (card) {
                card.addEventListener('mousemove', function (e) {
                    var r = card.getBoundingClientRect();
                    var px = (e.clientX - r.left) / r.width - 0.5;
                    var py = (e.clientY - r.top) / r.height - 0.5;
                    card.style.transform = 'perspective(800px) rotateY(' + (px * 7) + 'deg) rotateX(' + (-py * 7) + 'deg) translateY(-4px)';
                });
                card.addEventListener('mouseleave', function () { card.style.transform = ''; });
            });

            /* ---------- Magnetic buttons ---------- */
            document.querySelectorAll('.magnetic').forEach(function (btn) {
                btn.addEventListener('mousemove', function (e) {
                    var r = btn.getBoundingClientRect();
                    btn.style.transform = 'translate(' + ((e.clientX - r.left - r.width / 2) * 0.25) + 'px,' + ((e.clientY - r.top - r.height / 2) * 0.35) + 'px)';
                });
                btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
            });
        }
        /* ---------- Showcase tabs ---------- */
        var shotTabs = document.querySelectorAll('.shot-tab');
        var shotPanels = document.querySelectorAll('[data-panel]');
        var shotCaption = document.getElementById('shot-caption');
        shotTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                shotTabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                var key = tab.getAttribute('data-shot');
                shotPanels.forEach(function (p) {
                    p.classList.toggle('is-active', p.getAttribute('data-panel') === key);
                });
                if (shotCaption) shotCaption.textContent = tab.getAttribute('data-caption');
            });
        });
    })();
    </script>

</body>
</html>
