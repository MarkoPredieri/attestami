@php
    /** Icone a tratto (viewBox 24×24): solo il contenuto interno dell'SVG. */
    $icons = [
        'dashboard' => '<rect x="3" y="3" width="7" height="9" rx="1.5"></rect><rect x="14" y="3" width="7" height="5" rx="1.5"></rect><rect x="14" y="12" width="7" height="9" rx="1.5"></rect><rect x="3" y="16" width="7" height="5" rx="1.5"></rect>',
        'book' => '<path d="M4 19.5v-14A2.5 2.5 0 0 1 6.5 3H20v14H6.5A2.5 2.5 0 0 0 4 19.5zM4 19.5A2.5 2.5 0 0 0 6.5 22H20"></path>',
        'layers' => '<path d="M12 3l9 5-9 5-9-5 9-5z"></path><path d="M3 13l9 5 9-5"></path>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M3 10h18M8 3v4M16 3v4"></path>',
        'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"></rect><path d="M9 4V3h6v1M9 11h6M9 15h4"></path>',
        'users' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M2.5 20a6.5 6.5 0 0 1 13 0"></path><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"></path>',
        'building' => '<path d="M4 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16M16 9h2a2 2 0 0 1 2 2v10M3 21h18M8 7h4M8 11h4M8 15h4"></path>',
        'user-check' => '<circle cx="9" cy="8" r="3.5"></circle><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 11l2 2 4-4"></path>',
        'award' => '<circle cx="12" cy="9" r="6"></circle><path d="M8.5 14l-1.5 7 5-3 5 3-1.5-7"></path>',
        'clock' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path>',
        'file' => '<path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"></path><path d="M14 3v5h5M9 13h6M9 17h6"></path>',
        'menu' => '<path d="M4 7h16M4 12h16M4 17h16"></path>',
        'search' => '<circle cx="11" cy="11" r="7"></circle><path d="M20 20l-3.5-3.5"></path>',
        'bell' => '<path d="M6 16v-5a6 6 0 0 1 12 0v5l1.5 2h-15z"></path><path d="M10 21h4"></path>',
        'help' => '<circle cx="12" cy="12" r="9"></circle><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.6.3-1 .8-1 1.5v.4M12 17h.01"></path>',
        'check' => '<path d="M5 12.5l4.5 4.5L19 7.5"></path>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3.5 6.5l8.5 6 8.5-6"></path>',
        'chevron-down' => '<path d="M6 9l6 6 6-6"></path>',
        'chevron-left' => '<path d="M15 6l-6 6 6 6"></path>',
        'chevron-right' => '<path d="M9 6l6 6-6 6"></path>',
        'download' => '<path d="M12 4v11M7 10l5 5 5-5M5 20h14"></path>',
        'warning' => '<path d="M12 4l9 16H3z"></path><path d="M12 10v4M12 17h.01"></path>',
        'arrow-right' => '<path d="M5 12h14M13 6l6 6-6 6"></path>',
        'shield' => '<path d="M12 3l7 3v5c0 4.5-3 8.5-7 10-4-1.5-7-5.5-7-10V6z"></path><path d="M9 12l2 2 4-4"></path>',
    ];

    /** Disegna un'icona decorativa: {{ $icon('bell', 18) }}. */
    $icon = fn (string $name, int $size = 16, string $strokeWidth = '1.75', string $class = '') => new \Illuminate\Support\HtmlString(sprintf(
        '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="%2$s" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"%3$s>%4$s</svg>',
        $size,
        $strokeWidth,
        $class !== '' ? ' class="'.$class.'"' : '',
        $icons[$name],
    ));

    /** QR dimostrativo (griglia 21×21) e firma usati nelle anteprime degli attestati. */
    $qrPath = 'M0 0h7v7h-7zM1 1v5h5v-5zM2 2h3v3h-3zM14 0h7v7h-7zM15 1v5h5v-5zM16 2h3v3h-3zM0 14h7v7h-7zM1 15v5h5v-5zM2 16h3v3h-3zM8 0h3v1h-3zM12 0h1v1h-1zM8 1h3v1h-3zM10 2h3v1h-3zM8 3h1v1h-1zM8 4h1v1h-1zM11 4h1v1h-1zM11 5h2v1h-2zM8 6h1v1h-1zM10 6h1v1h-1zM12 6h1v1h-1zM8 7h2v1h-2zM11 7h2v1h-2zM0 8h2v1h-2zM4 8h3v1h-3zM12 8h1v1h-1zM14 8h5v1h-5zM0 9h1v1h-1zM2 9h1v1h-1zM5 9h1v1h-1zM7 9h3v1h-3zM12 9h1v1h-1zM14 9h4v1h-4zM19 9h1v1h-1zM1 10h6v1h-6zM10 10h1v1h-1zM13 10h2v1h-2zM16 10h1v1h-1zM18 10h1v1h-1zM20 10h1v1h-1zM1 11h1v1h-1zM3 11h1v1h-1zM5 11h1v1h-1zM8 11h2v1h-2zM14 11h3v1h-3zM18 11h3v1h-3zM1 12h3v1h-3zM6 12h3v1h-3zM10 12h2v1h-2zM13 12h4v1h-4zM18 12h1v1h-1zM9 13h2v1h-2zM12 13h1v1h-1zM14 13h1v1h-1zM19 13h1v1h-1zM8 14h2v1h-2zM12 14h3v1h-3zM16 14h1v1h-1zM19 14h1v1h-1zM9 15h1v1h-1zM16 15h2v1h-2zM19 15h2v1h-2zM8 16h1v1h-1zM10 16h1v1h-1zM14 16h1v1h-1zM16 16h2v1h-2zM20 16h1v1h-1zM10 17h2v1h-2zM17 17h1v1h-1zM20 17h1v1h-1zM10 18h1v1h-1zM13 18h1v1h-1zM17 18h1v1h-1zM19 18h2v1h-2zM8 19h1v1h-1zM10 19h3v1h-3zM14 19h2v1h-2zM18 19h1v1h-1zM20 19h1v1h-1zM9 20h5v1h-5zM16 20h1v1h-1zM20 20h1v1h-1z';
    $signaturePath = 'M2 22c8-14 14-18 16-12s-6 14-2 12 10-16 14-14-4 12 0 11 8-8 12-8 4 6 8 5 10-4 16-6';

    /** Profili delle Dolomiti (viewBox 1440×420), riusati specchiati nella CTA finale. */
    $farRidge = '0,262 40,232 70,238 96,182 112,188 128,142 140,152 152,120 166,152 180,146 200,198 236,208 262,172 280,178 300,216 340,238 380,230 420,252 470,264 520,272 560,260 600,270 650,278 700,266 740,274 790,264 840,272 880,256 920,264 960,242 1000,250 1040,218 1070,224 1096,172 1110,180 1124,134 1134,142 1146,106 1158,136 1172,130 1186,100 1198,132 1212,152 1240,178 1270,170 1300,202 1340,214 1380,198 1410,212 1440,202 1440,420 0,420';
    $midRidge = '0,250 30,262 64,214 84,222 104,176 118,186 130,160 146,196 170,204 196,240 230,252 268,236 300,262 352,290 400,300 460,312 520,318 580,310 640,322 700,316 760,326 820,314 880,320 940,306 1000,296 1040,276 1080,284 1120,250 1146,256 1172,214 1190,222 1206,196 1220,232 1250,246 1286,226 1310,234 1340,198 1356,204 1372,170 1388,206 1410,220 1440,212 1440,420 0,420';

    /** Toni di stato condivisi da avatar, badge ed eventi delle anteprime. */
    $tones = [
        'danger' => 'bg-danger-soft text-danger',
        'warning' => 'bg-warning-soft text-warning',
        'cobalt' => 'bg-cobalt-soft text-cobalt-text',
        'success' => 'bg-success-soft text-[#0F8A63]',
        'neutral' => 'bg-ivory text-ink-soft',
    ];
    $eventTones = [
        'cobalt' => 'border-cobalt bg-cobalt-soft text-cobalt-text',
        'success' => 'border-[#0F8A63] bg-success-soft text-[#0F8A63]',
        'neutral' => 'border-muted bg-ivory text-ink',
        'warning' => 'border-warning bg-warning-soft text-warning',
    ];

    /* Anteprima dashboard */
    $sidebar = [
        'Principale' => [['Dashboard', 'dashboard', null, true]],
        'Formazione' => [['Corsi', 'book', null, false], ['Edizioni', 'layers', null, false], ['Calendario', 'calendar', null, false], ['Esami', 'clipboard', null, false]],
        'Persone' => [['Corsisti', 'users', null, false], ['Aziende', 'building', null, false], ['Docenti', 'user-check', null, false]],
        'Documenti' => [['Attestati', 'award', null, false], ['Scadenze', 'clock', '9', false], ['Registro', 'file', null, false]],
    ];
    $kpis = [
        ['label' => 'Corsisti a norma', 'value' => '142', 'line' => 'M2 22L10 20L18 21L26 16L34 17L42 12L50 13L58 8L66 9L70 5', 'color' => '#0F8A63', 'dot' => [70, 5], 'delta' => '4%', 'deltaClass' => 'text-[#0F8A63]', 'up' => true, 'note' => 'ultima settimana'],
        ['label' => 'In scadenza 30 gg', 'value' => '9', 'line' => 'M2 18L10 14L18 16L26 11L34 13L42 9L50 12L58 10L66 14L70 12', 'color' => '#A15C07', 'dot' => [70, 12], 'delta' => '3', 'deltaClass' => 'text-warning', 'up' => false, 'note' => 'entro 7 giorni'],
        ['label' => 'Attestati 2026', 'value' => '318', 'line' => 'M2 24L10 21L18 22L26 18L34 14L42 15L50 10L58 11L66 6L70 4', 'color' => '#5266EB', 'dot' => [70, 4], 'delta' => '12%', 'deltaClass' => 'text-[#0F8A63]', 'up' => true, 'note' => 'ultimo mese'],
        ['label' => 'Conformità', 'value' => '94%', 'line' => 'M2 15L10 14L18 16L26 12L34 12L42 10L50 11L58 9L66 8L70 6', 'color' => '#0F8A63', 'dot' => [70, 6], 'delta' => '2 punti', 'deltaClass' => 'text-[#0F8A63]', 'up' => true, 'note' => 'da settembre'],
    ];
    $upcoming = [
        ['initials' => 'BL', 'name' => 'Bianchi Laura', 'company' => 'Forno Aurora', 'course' => 'HACCP · Addetti', 'date' => '14/10/2026', 'status' => 'Tra 8 giorni', 'tone' => 'danger'],
        ['initials' => 'VP', 'name' => 'Verdi Paolo', 'company' => 'Logistica Nord', 'course' => 'Carrelli · Aggiornamento', 'date' => '22/10/2026', 'status' => 'Tra 16 giorni', 'tone' => 'warning'],
        ['initials' => 'NA', 'name' => 'Neri Anna', 'company' => 'Studio Ferri', 'course' => 'Primo soccorso · Gruppo B', 'date' => '29/10/2026', 'status' => 'Promemoria inviato', 'tone' => 'cobalt'],
        ['initials' => 'GS', 'name' => 'Gallo Stefano', 'company' => 'Metalli Srl', 'course' => 'Antincendio · Livello 2', 'date' => '04/11/2026', 'status' => 'Iscritto al rinnovo', 'tone' => 'success'],
    ];
    $activities = [
        ['title' => 'Attestato rilasciato', 'time' => '10:24', 'detail' => 'Rossi Mario · ATT-2026-0418-7Q', 'dot' => 'bg-cobalt shadow-[0_0_0_3px_#E8EBFD]'],
        ['title' => 'Esame superato', 'time' => '09:51', 'detail' => 'Conti Elisa · 18/20', 'dot' => 'bg-[#0F8A63] shadow-[0_0_0_3px_#E3F4EC]'],
        ['title' => 'Iscrizione confermata', 'time' => '09:12', 'detail' => 'Neri Anna · Primo soccorso', 'dot' => 'bg-warning shadow-[0_0_0_3px_#FDF0DC]'],
        ['title' => 'Edizione pubblicata', 'time' => 'Ieri', 'detail' => 'Antincendio L2 · 21 ottobre', 'dot' => 'bg-muted shadow-[0_0_0_3px_#EDEDF3]'],
    ];

    /* Pensata per */
    $audiences = [
        ['Enti di formazione', 'Catalogo, edizioni e docenti, anche su più sedi.'],
        ['Consulenti e RSPP', 'Le scadenze di tutte le aziende che segui, in una vista.'],
        ['Aziende con formazione interna', 'Il personale formato e il registro pronto per i controlli.'],
    ];
    $regulations = [
        ['Sicurezza lavoratori', 'D.Lgs 81/08 art. 37'],
        ['HACCP', 'Reg. CE 852/2004'],
        ['Antincendio', 'DM 02/09/2021'],
        ['Primo soccorso', 'DM 388/2003'],
        ['RSPP-ASPP', 'Accordo Stato-Regioni'],
    ];

    /* Perché Attestami: ogni frammento si accende durante lo scroll */
    $statement = ['Attestami tiene insieme', 'corsi, docenti,', 'esami e attestati.', 'Così, quando arriva', 'un controllo,', 'hai già tutto in ordine', '— e nessuno deve', 'rincorrere una firma.'];

    /* La piattaforma: card impilate */
    $features = [
        [
            'number' => '01',
            'label' => 'Scadenzario',
            'title' => 'Sai chi scade, prima che scada.',
            'text' => 'Ogni attestato ha la sua validità. Attestami calcola le scadenze per corsista, azienda e sede, e avvisa in automatico chi deve rinnovare.',
            'points' => ['Promemoria automatici via email', 'Vista per azienda, corso e sede', 'Elenco esportabile per il datore di lavoro'],
            'dark' => false,
            'mock' => 'deadlines',
        ],
        [
            'number' => '02',
            'label' => 'Calendario',
            'title' => 'Un calendario che non si sovrappone.',
            'text' => 'Edizioni, aule e docenti nello stesso calendario. Se un docente è già impegnato te lo segnala prima della conferma, e ti propone chi è libero.',
            'points' => ['Controllo conflitti su docenti e aule', "Lettere d'incarico generate in automatico", "Iscrizioni con lista d'attesa"],
            'dark' => true,
            'mock' => 'calendar',
        ],
        [
            'number' => '03',
            'label' => 'Esami online',
            'title' => "Esami online, corretti all'istante.",
            'text' => "Le domande arrivano dall'archivio del corso, in ordine casuale e con il tempo contato. Alla consegna il corsista vede subito l'esito.",
            'points' => ['Archivio domande per ogni corso', 'Timer e soglia di superamento', 'Esito registrato nella scheda del corsista'],
            'dark' => false,
            'mock' => 'exam',
        ],
        [
            'number' => '04',
            'label' => 'Attestati',
            'title' => 'Attestati con QR, verificabili da chiunque.',
            'text' => "Superato l'esame, l'attestato in PDF è pronto: con il marchio del tuo ente, un codice univoco e un QR che porta alla verifica pubblica.",
            'points' => ["PDF generato al superamento dell'esame", 'Codice univoco e QR su ogni attestato', 'Registro esportabile per le ispezioni'],
            'dark' => true,
            'mock' => 'certificates',
        ],
    ];
    $deadlineStats = [['In regola', '142', 'bg-[#0F8A63]'], ['In scadenza', '9', 'bg-warning'], ['Scaduti', '2', 'bg-danger']];
    $deadlineRows = [
        ['initials' => 'BL', 'avatar' => 'danger', 'name' => 'Bianchi Laura', 'course' => 'HACCP · Addetti', 'date' => '14/10/2026', 'status' => 'Tra 8 giorni', 'tone' => 'danger'],
        ['initials' => 'VP', 'avatar' => 'warning', 'name' => 'Verdi Paolo', 'course' => 'Carrelli elevatori', 'date' => '22/10/2026', 'status' => 'Tra 16 giorni', 'tone' => 'warning'],
        ['initials' => 'NA', 'avatar' => 'warning', 'name' => 'Neri Anna', 'course' => 'Primo soccorso · B', 'date' => '29/10/2026', 'status' => 'Tra 23 giorni', 'tone' => 'warning'],
        ['initials' => 'GS', 'avatar' => 'success', 'name' => 'Gallo Stefano', 'course' => 'Antincendio · Livello 2', 'date' => '04/11/2026', 'status' => 'Iscritto', 'tone' => 'success'],
    ];
    $calendarDays = [['Lun 12', false], ['Mar 13', false], ['Mer 14', false], ['Gio 15', true], ['Ven 16', false]];
    $calendarRows = [
        ['time' => '09:00', 'height' => 'min-h-[78px]', 'cells' => [['Antincendio L2', 'Ing. Conti', 'cobalt'], null, ['HACCP addetti', 'Dott.ssa Mari', 'success'], 'conflict', null]],
        ['time' => '11:00', 'height' => 'min-h-[54px]', 'cells' => [null, ['RSPP Mod. A', 'Geom. Russo', 'neutral'], null, null, ['Primo soccorso', 'Dott. Bassi', 'warning']]],
        ['time' => '14:00', 'height' => 'min-h-[54px]', 'cells' => [['HACCP titolari', 'Dott.ssa Mari', 'success'], null, ['Rischio basso', 'Ing. Conti', 'cobalt'], null, null]],
    ];
    $examOptions = [
        ['A', 'Il medico competente', false],
        ['B', 'Il preposto', true],
        ['C', 'Il rappresentante dei lavoratori per la sicurezza', false],
        ['D', 'Il consulente esterno', false],
    ];
    $certificates = [
        ['initials' => 'RM', 'avatar' => 'cobalt', 'name' => 'Rossi Mario', 'code' => 'ATT-2026-0418-7Q', 'status' => 'Emesso', 'tone' => 'success', 'selected' => true],
        ['initials' => 'GS', 'avatar' => 'success', 'name' => 'Gallo Stefano', 'code' => 'ATT-2026-0418-3K', 'status' => 'Emesso', 'tone' => 'success', 'selected' => false],
        ['initials' => 'CE', 'avatar' => 'warning', 'name' => 'Conti Elisa', 'code' => 'ATT-2026-0418-9D', 'status' => 'Inviato', 'tone' => 'cobalt', 'selected' => false],
        ['initials' => 'VP', 'avatar' => 'neutral', 'name' => 'Verdi Paolo', 'code' => 'Esame da sostenere', 'status' => 'In attesa', 'tone' => 'warning', 'selected' => false],
    ];

    /* Verifica pubblica e Come funziona */
    $verifyPoints = ['Senza registrazione', 'Solo i dati essenziali', 'Stato sempre aggiornato'];
    $steps = [
        ['1', 'Configura i corsi', 'Catalogo, edizioni, docenti e archivio domande: li imposti una volta sola.'],
        ['2', 'Iscrizioni ed esami', "I corsisti si iscrivono, frequentano e sostengono l'esame online, con esito immediato."],
        ['3', 'Rilascia gli attestati', 'PDF con codice e QR generati in automatico, e la prossima scadenza già in calendario.'],
    ];

    /* Card flottanti e pannelli delle anteprime */
    $panel = 'rounded-lg border border-[#E9E9F0] bg-white shadow-[0_4px_24px_rgba(23,23,33,0.05)]';
    $floatCard = 'rounded-[14px] bg-white shadow-[0_30px_60px_-20px_rgba(23,23,33,0.35),0_0_0_1px_rgba(23,23,33,0.06)]';
    $eyebrow = 'text-[14px] font-medium';
    $sectionTitle = 'font-display text-[clamp(36px,4.6vw,60px)] leading-[1.06]';
@endphp

<x-site.layout active="home" :over-hero="true">

    {{-- ===== 1 · Hero ===== --}}
    <section class="home-hero-sky relative z-1 -mt-[75px] min-h-[1100px] overflow-clip pt-[176px] max-[860px]:pt-[148px]">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0">
            <svg class="parallax-far absolute bottom-[150px] left-0 block h-[420px] w-full" viewBox="0 0 1440 420" preserveAspectRatio="none"><polygon fill="#6F7BAA" points="{{ $farRidge }}"></polygon></svg>
            <div class="absolute inset-x-0 bottom-[150px] h-[200px] bg-linear-to-b from-mist/0 to-mist/55"></div>
            <svg class="parallax-mid absolute bottom-16 left-0 block h-[420px] w-full opacity-90" viewBox="0 0 1440 420" preserveAspectRatio="none"><polygon fill="#4B5583" points="{{ $midRidge }}"></polygon></svg>
            <div class="absolute inset-x-0 bottom-16 h-[180px] bg-linear-to-b from-mist/0 to-mist/55"></div>
            <svg class="absolute bottom-0 left-0 block h-[300px] w-full" viewBox="0 0 1440 300" preserveAspectRatio="none"><polygon fill="#2A2F4A" points="0,96 40,104 80,70 104,78 128,118 170,140 220,164 280,186 340,200 420,214 520,224 620,228 720,232 820,228 920,222 1020,214 1100,198 1160,180 1220,150 1262,128 1300,90 1326,98 1352,64 1380,84 1410,110 1440,104 1440,300 0,300"></polygon></svg>
            <div class="absolute inset-x-0 bottom-0 h-[280px] bg-linear-to-b from-mist/0 via-mist/72 via-58% to-mist"></div>
        </div>

        <div class="parallax-text relative mx-auto max-w-[1300px] px-8 text-center text-ivory max-[860px]:px-4">
            <p class="{{ $eyebrow }} text-periwinkle">Formazione obbligatoria · D.Lgs 81/08 · HACCP</p>
            <h1 class="mt-6 font-display text-[clamp(48px,7vw,96px)] leading-[1.02] text-balance text-ivory">La formazione obbligatoria, sempre a norma.</h1>
            <p class="mx-auto mt-7 max-w-[640px] text-[19px] leading-[1.6] text-balance text-[#C9CCDA]">Corsi, esami e attestati in un'unica piattaforma. Scadenze sotto controllo e attestati verificabili con QR — senza fogli Excel.</p>

            @if (session('lead_ok'))
                <div role="status" class="mx-auto mt-9 flex min-h-[62px] max-w-[500px] items-center gap-3 rounded-full border border-ivory/22 bg-ivory/10 p-1.5 pr-6 text-left text-[16px] leading-[1.4] text-ivory max-[860px]:rounded-[24px]">
                    <span class="inline-flex size-12 flex-none items-center justify-center rounded-full bg-cobalt text-white">{{ $icon('check', 20, '2.25') }}</span>
                    <span>Grazie! Ti ricontattiamo entro 24 ore per fissare la demo.</span>
                </div>
            @else
                <form method="POST" action="{{ route('lead.store') }}" @class([
                    'mx-auto mt-9 flex max-w-[500px] items-center gap-2 rounded-full border bg-ivory/10 p-1.5 text-left focus-within:border-periwinkle max-[860px]:flex-wrap max-[860px]:rounded-[24px]',
                    'border-ivory/22' => ! $errors->has('email'),
                    'border-[#F4A9B1]' => $errors->has('email'),
                ])>
                    @csrf
                    <input type="hidden" name="source" value="home">
                    {{-- honeypot anti-spam --}}
                    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">

                    <label for="hero-email" class="sr-only">Email di lavoro</label>
                    <input
                        id="hero-email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="La tua email di lavoro"
                        @error('email') aria-invalid="true" aria-describedby="hero-email-error" @enderror
                        class="h-12 min-w-0 flex-[1_1_236px] border-0 bg-transparent px-[18px] text-[16px] text-ivory placeholder:text-[#D4D7E3] focus:outline-none"
                    >
                    <button type="submit" class="inline-flex min-h-12 flex-none cursor-pointer items-center gap-2 rounded-full bg-cobalt px-6 text-[16px] font-medium text-white transition-colors hover:bg-cobalt-hover focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle max-[860px]:w-full max-[860px]:justify-center">Richiedi una demo</button>
                </form>
                @error('email')
                    <p id="hero-email-error" class="mt-3 text-[14px] font-medium text-[#FFC9CF]">Inserisci un indirizzo email valido per ricevere la demo.</p>
                @enderror
            @endif

            <p class="mt-4 text-[14px] text-[#D4D7E3]">Nessuna carta di credito · Ti ricontattiamo entro 24 ore</p>
        </div>
    </section>

    {{-- ===== 2 · Scena prodotto ===== --}}
    <section class="relative z-2 -mt-[320px]">
        <div class="site-wrap">
            <div class="relative">
                <div class="rounded-[18px] bg-onyx p-3.5 shadow-[0_50px_100px_-30px_rgba(23,23,33,0.45),0_0_0_1px_rgba(23,23,33,0.08)]">
                    <div role="img" aria-label="Anteprima della dashboard di Attestami: corsisti a norma, scadenze imminenti e attività recenti" class="flex items-stretch overflow-hidden rounded-[10px] bg-[#F3F4F8] text-left text-[13px] leading-[1.45] text-ink">

                        {{-- Barra laterale --}}
                        <div class="flex-[0_0_209px] border-r border-[#E9E9F0] bg-white pb-4 max-[860px]:hidden">
                            <div class="flex h-[57px] items-center gap-2 border-b border-[#E9E9F0] px-5 text-cobalt">
                                <svg width="22" height="22" viewBox="0 0 26 26" fill="none" aria-hidden="true"><circle cx="13" cy="13" r="11.25" stroke="currentColor" stroke-width="1.5"></circle><path d="M8.5 13.4l3 3 6-6.4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                <span class="text-[17px] font-[520] tracking-[0.01em] text-ink [font-variation-settings:'FLAR'_100]">Attestami</span>
                            </div>
                            @foreach ($sidebar as $group => $items)
                                <div class="px-5 pt-4 pb-1.5 text-[10px] font-semibold tracking-[0.08em] text-[#6E6E86] uppercase">{{ $group }}</div>
                                @foreach ($items as [$label, $iconName, $badge, $isActive])
                                    <div @class([
                                        'mx-2 flex items-center gap-2.5 px-3 py-[7px]',
                                        'rounded-lg bg-cobalt-soft font-[560] text-cobalt-text' => $isActive,
                                        'text-ink-soft' => ! $isActive,
                                    ])>
                                        {{ $icon($iconName) }}{{ $label }}
                                        @if ($badge)
                                            <span class="ml-auto rounded-full bg-warning-soft px-2 text-[11px] leading-[18px] font-semibold text-warning">{{ $badge }}</span>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                        <div class="flex min-w-0 flex-auto flex-col">
                            {{-- Barra superiore --}}
                            <div class="flex h-[57px] flex-none items-center gap-3 border-b border-[#E9E9F0] bg-white px-5">
                                <span class="inline-flex size-[34px] items-center justify-center rounded-lg text-muted">{{ $icon('menu', 18) }}</span>
                                <div class="flex h-[34px] min-w-0 flex-[0_1_340px] items-center gap-2 overflow-hidden rounded-lg border border-[#E9E9F0] bg-[#F3F4F8] px-3 text-[12.5px] whitespace-nowrap text-muted">{{ $icon('search', 15, '1.75', 'flex-none') }}Cerca corsisti, corsi, attestati…</div>
                                <div class="flex-auto"></div>
                                <span class="inline-flex size-[34px] items-center justify-center text-muted max-[860px]:hidden">{{ $icon('calendar', 18) }}</span>
                                <span class="relative inline-flex size-[34px] items-center justify-center text-muted">{{ $icon('bell', 18) }}<span class="absolute top-[7px] right-2 size-[7px] rounded-full bg-cobalt shadow-[0_0_0_2px_#FFFFFF]"></span></span>
                                <span class="inline-flex size-[34px] items-center justify-center text-muted max-[860px]:hidden">{{ $icon('help', 18) }}</span>
                                <div class="flex items-center gap-2.5 border-l border-[#E9E9F0] pl-3.5">
                                    <span class="inline-flex size-8 items-center justify-center rounded-full bg-cobalt-soft text-[12px] font-semibold text-cobalt-text">MP</span>
                                    <div class="leading-[1.25] max-[860px]:hidden">
                                        <div class="text-[12.5px] font-[560]">Marco Predieri</div>
                                        <div class="text-[11px] text-muted">Amministratore</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-4 px-[22px] pt-5 pb-[22px]">
                                <div class="flex flex-wrap items-center justify-between gap-2">
                                    <div class="text-[19px] font-[560] [font-variation-settings:'FLAR'_60]">Dashboard</div>
                                    <div class="text-[12px] text-muted">Home<span class="mx-2">/</span><span class="text-ink">Dashboard</span></div>
                                </div>

                                {{-- Indicatori --}}
                                <div class="grid grid-cols-[repeat(auto-fit,minmax(128px,1fr))] gap-3.5">
                                    @foreach ($kpis as $kpi)
                                        <div class="{{ $panel }} px-4 py-3.5">
                                            <div class="text-[12px] text-muted">{{ $kpi['label'] }}</div>
                                            <div class="mt-1 flex flex-wrap items-end justify-between gap-x-2 gap-y-1">
                                                <div class="text-[26px] leading-[1.1] font-[560] tabular-nums">{{ $kpi['value'] }}</div>
                                                <svg width="72" height="28" viewBox="0 0 72 28" fill="none" aria-hidden="true"><path d="{{ $kpi['line'] }}" stroke="{{ $kpi['color'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><circle cx="{{ $kpi['dot'][0] }}" cy="{{ $kpi['dot'][1] }}" r="2.5" fill="{{ $kpi['color'] }}"></circle></svg>
                                            </div>
                                            <div class="mt-2 text-[11.5px] text-muted"><span class="{{ $kpi['deltaClass'] }} font-semibold">@if ($kpi['up'])<svg width="8" height="8" viewBox="0 0 8 8" aria-hidden="true" class="inline align-baseline"><path d="M4 1l3 5H1z" fill="currentColor"></path></svg> @endif{{ $kpi['delta'] }}</span> {{ $kpi['note'] }}</div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="flex flex-wrap items-stretch gap-3.5">
                                    {{-- Scadenze imminenti --}}
                                    <div class="{{ $panel }} min-w-0 flex-[2.4_1_542px] overflow-hidden">
                                        <div class="flex items-center justify-between border-b border-[#EFEFF4] px-4 py-3">
                                            <div class="text-[14px] font-[560]">Scadenze imminenti</div>
                                            <div class="text-[12px] font-medium text-cobalt-text">Vedi tutte</div>
                                        </div>
                                        <div class="overflow-x-auto">
                                            <table class="w-full min-w-[540px] border-collapse text-[12.5px]">
                                                <thead>
                                                    <tr>
                                                        @foreach (['Corsista', 'Corso', 'Scadenza', 'Stato'] as $heading)
                                                            <th class="border-b border-[#EFEFF4] bg-[#FAFAFC] px-3.5 py-2 text-left text-[10.5px] font-semibold tracking-[0.06em] text-[#6E6E86] uppercase">{{ $heading }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($upcoming as $row)
                                                        @php($cell = 'px-3.5 py-2.5 whitespace-nowrap'.($loop->last ? '' : ' border-b border-[#F1F1F5]'))
                                                        <tr>
                                                            <td class="{{ $cell }}">
                                                                <div class="flex items-center gap-2.5">
                                                                    <span class="{{ $tones[$row['tone']] }} inline-flex size-[30px] flex-none items-center justify-center rounded-full text-[11px] font-semibold">{{ $row['initials'] }}</span>
                                                                    <div class="leading-[1.3]">
                                                                        <div class="font-[560]">{{ $row['name'] }}</div>
                                                                        <div class="text-[11.5px] text-muted">{{ $row['company'] }}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="{{ $cell }} text-ink-soft">{{ $row['course'] }}</td>
                                                            <td class="{{ $cell }} tabular-nums">{{ $row['date'] }}</td>
                                                            <td class="{{ $cell }}">
                                                                <span class="{{ $tones[$row['tone']] }} inline-flex items-center gap-1.5 rounded-full px-2.5 py-[3px] text-[11.5px] font-semibold whitespace-nowrap"><span class="size-1.5 rounded-full bg-current"></span>{{ $row['status'] }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- Attività recenti --}}
                                    <div class="{{ $panel }} min-w-0 flex-[1_1_242px]">
                                        <div class="border-b border-[#EFEFF4] px-4 py-3 text-[14px] font-[560]">Attività recenti</div>
                                        <div class="px-4 pt-4 pb-1">
                                            @foreach ($activities as $activity)
                                                <div class="flex gap-3">
                                                    <div class="flex flex-[0_0_10px] flex-col items-center">
                                                        <span class="{{ $activity['dot'] }} mt-[5px] size-2 rounded-full"></span>
                                                        @unless ($loop->last)
                                                            <span class="mt-1.5 mb-0.5 w-px flex-auto bg-[#E9E9F0]"></span>
                                                        @endunless
                                                    </div>
                                                    <div class="min-w-0 flex-auto pb-3.5">
                                                        <div class="flex justify-between gap-2">
                                                            <span class="font-[560]">{{ $activity['title'] }}</span>
                                                            <span class="text-[11.5px] text-muted tabular-nums">{{ $activity['time'] }}</span>
                                                        </div>
                                                        <div class="text-[12px] text-muted">{{ $activity['detail'] }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Attestato verificato --}}
                <div class="{{ $floatCard }} absolute -right-11 -bottom-[34px] flex w-[284px] items-center gap-3.5 p-4 leading-[1.4] text-ink max-[1280px]:-right-3 max-[860px]:static max-[860px]:mt-3 max-[860px]:w-auto">
                    <svg width="58" height="58" viewBox="-1 -1 23 23" aria-hidden="true" shape-rendering="crispEdges" class="block flex-none"><path fill="#171721" d="{{ $qrPath }}"></path></svg>
                    <div class="min-w-0">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-success-soft py-0.5 pr-2.5 pl-2 text-[12px] font-semibold text-[#0F8A63]">{{ $icon('check', 12, '2.5') }}Attestato valido</span>
                        <div class="mt-1.5 text-[14px] font-[560] tracking-[0.02em] tabular-nums">ATT-2026-0418-7Q</div>
                        <div class="text-[12.5px] text-muted">Rossi Mario · fino al 06/10/2031</div>
                    </div>
                </div>

                {{-- Promemoria inviato --}}
                <div class="{{ $floatCard }} absolute top-[332px] -left-12 flex w-[292px] items-center gap-3 p-4 leading-[1.4] text-ink max-[1280px]:-left-3 max-[1280px]:w-[236px] max-[860px]:static max-[860px]:mt-3 max-[860px]:w-auto">
                    <span class="inline-flex size-10 flex-none items-center justify-center rounded-lg bg-cobalt-soft text-cobalt-text">{{ $icon('mail', 20) }}</span>
                    <div class="min-w-0">
                        <div class="text-[14px] font-[560]">Promemoria inviato</div>
                        <div class="text-[12.5px] text-muted">3 corsisti scadono questo mese</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== 3 · Pensata per ===== --}}
    <section class="pt-[104px] max-[860px]:py-20">
        <div class="site-wrap">
            <div class="reveal border-b border-line pb-10">
                <p class="{{ $eyebrow }} text-cobalt-text">Pensata per</p>
                <div class="mt-5 grid grid-cols-[repeat(auto-fit,minmax(260px,1fr))] gap-x-10 gap-y-6">
                    @foreach ($audiences as [$audience, $description])
                        <div>
                            <p class="font-display text-[23px] leading-[1.35]">{{ $audience }}</p>
                            <p class="mt-1.5 text-[15px] leading-[1.55] text-muted">{{ $description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="reveal flex flex-wrap items-center gap-x-6 gap-y-4 pt-8">
                <p class="{{ $eyebrow }} text-cobalt-text">Per i corsi previsti da</p>
                <div class="flex flex-[0_1_760px] flex-wrap gap-2.5">
                    @foreach ($regulations as [$course, $reference])
                        <span class="inline-flex items-center gap-2 rounded-full border border-line bg-white px-4 py-2 text-[14px] leading-[1.4] text-ink-soft">{{ $course }}<span class="text-muted">{{ $reference }}</span></span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===== 4 · Perché Attestami ===== --}}
    <section class="pt-[120px] pb-[104px] max-[860px]:py-20">
        <div class="site-wrap">
            <p class="reveal {{ $eyebrow }} text-cobalt-text">Perché Attestami</p>
            <p class="mt-6 max-w-[1000px] font-display text-[clamp(32px,4.4vw,58px)] leading-[1.16] text-ink">
                @foreach ($statement as $fragment)
                    <span class="reveal-word">{{ $fragment }}</span>
                @endforeach
            </p>
        </div>
    </section>

    {{-- ===== 5 · La piattaforma (card impilate) ===== --}}
    <section class="pb-20">
        <div class="site-wrap">
            <div class="reveal mb-14 flex flex-wrap items-end justify-between gap-x-12 gap-y-6 border-t border-line pt-10">
                <div class="max-w-[700px]">
                    <p class="{{ $eyebrow }} text-cobalt-text">La piattaforma</p>
                    <h2 class="mt-4 {{ $sectionTitle }} text-balance">Tutto il ciclo del corso, in un posto solo.</h2>
                </div>
                <p class="max-w-[380px] text-muted">Dall'iscrizione al controllo dell'ispettore, ogni passaggio resta nello stesso archivio: consultabile, esportabile, in ordine.</p>
            </div>

            <div>
                @foreach ($features as $feature)
                    @php($dark = $feature['dark'])
                    <article @class([
                        'home-stack-card flex min-h-[560px] flex-wrap items-center gap-x-14 gap-y-10 rounded-3xl border p-12 max-[860px]:min-h-0 max-[860px]:px-5 max-[860px]:py-7',
                        'mb-6' => ! $loop->last,
                        'border-line bg-white text-ink shadow-[0_-16px_48px_-28px_rgba(23,23,33,0.22)]' => ! $dark,
                        'border-onyx bg-onyx text-ivory shadow-[0_-16px_48px_-28px_rgba(23,23,33,0.4)]' => $dark,
                    ])>
                        <div class="max-w-[380px] flex-[1_1_300px]">
                            <div @class(['flex items-center gap-3', $eyebrow, 'text-cobalt-text' => ! $dark, 'text-periwinkle' => $dark])>
                                <span class="tabular-nums">{{ $feature['number'] }}</span>
                                <span @class(['h-px w-6', 'bg-[#C6CDF7]' => ! $dark, 'bg-[#4B5583]' => $dark])></span>
                                <span>{{ $feature['label'] }}</span>
                            </div>
                            <h3 class="mt-5 font-display text-[34px] leading-[1.12] text-balance">{{ $feature['title'] }}</h3>
                            <p @class(['mt-4', 'text-ink-soft' => ! $dark, 'text-muted-dark' => $dark])>{{ $feature['text'] }}</p>
                            <ul @class(['mt-7 grid gap-2.5 text-[15px] leading-[1.6]', 'text-ink-soft' => ! $dark, 'text-[#C9CCDA]' => $dark])>
                                @foreach ($feature['points'] as $point)
                                    <li class="flex items-start gap-3"><span @class(['mt-[9px] h-1.5 flex-[0_0_6px] rounded-full', 'bg-cobalt' => ! $dark, 'bg-periwinkle' => $dark])></span>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="relative min-w-0 flex-[1.5_1_440px]">
                            <div @class([
                                'rounded-[18px] p-3',
                                'bg-onyx shadow-[0_50px_100px_-30px_rgba(23,23,33,0.45),0_0_0_1px_rgba(23,23,33,0.08)]' => ! $dark,
                                'bg-graphite shadow-[0_50px_100px_-30px_rgba(0,0,0,0.55),0_0_0_1px_#34344A]' => $dark,
                            ])>
                                @switch($feature['mock'])
                                    @case('deadlines')
                                        <div role="img" aria-label="Scadenzario: corsisti con attestato in scadenza nei prossimi 60 giorni, con stato e promemoria automatici attivi" class="rounded-[10px] bg-[#F3F4F8] p-[18px] text-[12.5px] leading-[1.45] text-ink">
                                            <div class="flex flex-wrap items-center justify-between gap-2.5">
                                                <div class="text-[16px] font-[560] [font-variation-settings:'FLAR'_60]">Scadenzario</div>
                                                <div class="flex gap-2">
                                                    @foreach (['Tutte le aziende', 'Prossimi 60 giorni'] as $filter)
                                                        <span class="inline-flex h-8 items-center gap-1.5 rounded-lg border border-line bg-white pr-2.5 pl-3 text-[12px] text-ink-soft">{{ $filter }}{{ $icon('chevron-down', 14) }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="mt-3.5 grid grid-cols-3 gap-2.5">
                                                @foreach ($deadlineStats as [$statLabel, $statValue, $statDot])
                                                    <div class="rounded-lg border border-[#E9E9F0] bg-white px-3.5 py-2.5">
                                                        <div class="flex items-center gap-1.5 text-[11.5px] text-muted"><span class="{{ $statDot }} size-1.5 rounded-full"></span>{{ $statLabel }}</div>
                                                        <div class="mt-0.5 text-[20px] font-[560] tabular-nums">{{ $statValue }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="{{ $panel }} mt-3 overflow-hidden">
                                                <div class="flex items-center justify-between border-b border-[#EFEFF4] px-3.5 py-[11px]">
                                                    <span class="text-[13.5px] font-[560]">Scadenze imminenti</span>
                                                    <span class="inline-flex items-center gap-1.5 text-[12px] font-medium text-cobalt-text">{{ $icon('download', 14) }}Esporta</span>
                                                </div>
                                                <div class="overflow-x-auto">
                                                    <div class="min-w-[480px]">
                                                        @foreach ($deadlineRows as $row)
                                                            <div @class(['grid grid-cols-[minmax(0,1.25fr)_minmax(0,1.35fr)_78px_104px] items-center gap-3 px-3.5 py-[9px]', 'border-b border-[#F1F1F5]' => ! $loop->last])>
                                                                <div class="flex min-w-0 items-center gap-2">
                                                                    <span class="{{ $tones[$row['avatar']] }} inline-flex size-[26px] flex-none items-center justify-center rounded-full text-[10px] font-semibold">{{ $row['initials'] }}</span>
                                                                    <span class="truncate font-[560]">{{ $row['name'] }}</span>
                                                                </div>
                                                                <span class="truncate text-ink-soft">{{ $row['course'] }}</span>
                                                                <span class="tabular-nums">{{ $row['date'] }}</span>
                                                                <span class="{{ $tones[$row['tone']] }} inline-flex items-center gap-[5px] justify-self-start rounded-full px-[9px] py-0.5 text-[11px] font-semibold whitespace-nowrap"><span class="size-[5px] rounded-full bg-current"></span>{{ $row['status'] }}</span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 flex items-center justify-between gap-3 rounded-lg border border-[#E9E9F0] bg-white px-3.5 py-2.5">
                                                <span><span class="font-[560]">Promemoria automatici</span><span class="text-muted"> · 30 giorni prima della scadenza</span></span>
                                                <span class="relative h-5 w-[34px] flex-none rounded-full bg-cobalt"><span class="absolute top-[3px] right-[3px] size-3.5 rounded-full bg-white"></span></span>
                                            </div>
                                        </div>
                                        @break

                                    @case('calendar')
                                        <div role="img" aria-label="Calendario della settimana dal 12 al 16 ottobre: conflitto segnalato per Ing. Conti giovedì alle 9 e suggerimento di assegnare Geom. Russo" class="overflow-hidden rounded-[10px] bg-white text-[12px] leading-[1.4] text-ink">
                                            <div class="flex flex-wrap items-center justify-between gap-2.5 border-b border-[#EFEFF4] px-4 py-3">
                                                <div class="flex items-center gap-2.5">
                                                    <span class="inline-flex gap-0.5 text-muted">{{ $icon('chevron-left', 18) }}{{ $icon('chevron-right', 18) }}</span>
                                                    <span class="text-[14px] font-[560]">12 – 16 ottobre 2026</span>
                                                </div>
                                                <div class="inline-flex rounded-lg bg-[#F3F4F8] p-[3px] text-[11.5px]">
                                                    <span class="px-2.5 py-1 text-muted">Giorno</span>
                                                    <span class="rounded-md bg-white px-2.5 py-1 font-[560] shadow-[0_1px_2px_rgba(23,23,33,0.08)]">Settimana</span>
                                                    <span class="px-2.5 py-1 text-muted">Mese</span>
                                                </div>
                                            </div>
                                            <div class="overflow-x-auto">
                                                <div class="grid min-w-[500px] grid-cols-[46px_repeat(5,minmax(0,1fr))] text-[11px]">
                                                    <div class="border-b border-[#EFEFF4]"></div>
                                                    @foreach ($calendarDays as [$day, $isToday])
                                                        <div @class(['border-b border-l border-[#EFEFF4] px-2.5 py-2 font-semibold', 'text-ink' => $isToday, 'text-muted' => ! $isToday])>{{ $day }}</div>
                                                    @endforeach

                                                    @foreach ($calendarRows as $calendarRow)
                                                        @php($rowBorder = $loop->last ? '' : 'border-b border-[#EFEFF4]')
                                                        <div class="{{ $rowBorder }} pt-1.5 pr-2 text-right text-[#6E6E86] tabular-nums">{{ $calendarRow['time'] }}</div>
                                                        @foreach ($calendarRow['cells'] as $event)
                                                            @if ($event === 'conflict')
                                                                <div class="{{ $calendarRow['height'] }} {{ $rowBorder }} flex flex-col gap-1 border-l border-[#EFEFF4] bg-[#FDF6F6] p-1">
                                                                    <div class="{{ $eventTones['cobalt'] }} truncate rounded-md border-l-[3px] px-[7px] py-[3px] font-semibold">Rischio alto</div>
                                                                    <div class="overflow-hidden rounded-md border-[1.5px] border-danger bg-danger-soft px-1.5 py-[3px] whitespace-nowrap text-danger">
                                                                        <div class="flex items-center gap-1 font-semibold">{{ $icon('warning', 12, '2.25', 'flex-none') }}Conflitto</div>
                                                                        <div class="truncate">Carrelli · Conti</div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="{{ $calendarRow['height'] }} {{ $rowBorder }} border-l border-[#EFEFF4] p-1">
                                                                    @if ($event)
                                                                        <div class="{{ $eventTones[$event[2]] }} overflow-hidden rounded-md border-l-[3px] px-[7px] py-[5px] whitespace-nowrap">
                                                                            <div class="truncate font-semibold">{{ $event[0] }}</div>
                                                                            <div class="truncate text-ink-soft">{{ $event[1] }}</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="mx-3.5 mb-3.5 flex flex-wrap items-center gap-x-3 gap-y-2.5 rounded-lg border border-[#D5DBFB] bg-cobalt-soft px-3.5 py-3">
                                                <span class="inline-flex size-8 flex-none items-center justify-center rounded-lg bg-white text-cobalt-text">{{ $icon('user-check', 18) }}</span>
                                                <div class="min-w-0 flex-[1_1_220px] leading-[1.35]">
                                                    <div class="text-[12.5px] font-semibold">Suggerimento: Geom. Russo è libero</div>
                                                    <div class="text-ink-soft">Giovedì 15 ottobre, 09:00–13:00 · abilitato al corso</div>
                                                </div>
                                                <span class="inline-flex h-[30px] flex-none items-center rounded-md bg-cobalt px-3.5 font-medium text-white">Assegna</span>
                                            </div>
                                        </div>
                                        @break

                                    @case('exam')
                                        <div role="img" aria-label="Esame online: domanda 3 di 20 con timer a 18 minuti e 42 secondi e una risposta selezionata" class="rounded-[10px] bg-[#F3F4F8] p-[18px] text-[12.5px] leading-[1.45] text-ink">
                                            <div class="{{ $panel }} px-5 pt-[18px] pb-5">
                                                <div class="flex flex-wrap items-center justify-between gap-2">
                                                    <span class="text-muted">Formazione generale lavoratori · Esame finale</span>
                                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-line bg-[#F3F4F8] px-2.5 py-[3px] font-semibold tabular-nums">{{ $icon('clock', 13, '2') }}18:42</span>
                                                </div>
                                                <div class="mt-3.5 flex items-center gap-3">
                                                    <span class="font-semibold whitespace-nowrap">Domanda 3 di 20</span>
                                                    <span class="h-1.5 flex-auto overflow-hidden rounded-[3px] bg-ivory"><span class="block h-full w-[15%] rounded-[3px] bg-cobalt"></span></span>
                                                </div>
                                                <div class="mt-4 text-[15.5px] leading-[1.4] font-[560]">Chi sovrintende all'attività lavorativa e controlla che i lavoratori applichino le misure di sicurezza?</div>
                                                <div class="mt-3.5 grid gap-2">
                                                    @foreach ($examOptions as [$letter, $answer, $isSelected])
                                                        @if ($isSelected)
                                                            <div class="flex items-center gap-2.5 rounded-lg border-2 border-cobalt bg-cobalt-soft px-[11px] py-2">
                                                                <span class="size-4 flex-none rounded-full border-[5px] border-cobalt bg-white"></span>
                                                                <span class="font-semibold text-cobalt-text">{{ $letter }}</span>
                                                                <span class="font-[560]">{{ $answer }}</span>
                                                            </div>
                                                        @else
                                                            <div class="flex items-center gap-2.5 rounded-lg border border-line px-3 py-[9px]">
                                                                <span class="size-4 flex-none rounded-full border-[1.5px] border-[#B9B9C9]"></span>
                                                                <span class="font-semibold text-muted">{{ $letter }}</span>{{ $answer }}
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mt-4 flex flex-wrap items-center justify-between gap-2.5">
                                                    <span class="text-[11.5px] text-muted">Ordine casuale · soglia di superamento 70%</span>
                                                    <span class="inline-flex gap-2">
                                                        <span class="inline-flex h-[34px] items-center rounded-lg border border-line bg-white px-3.5 font-medium">Indietro</span>
                                                        <span class="inline-flex h-8 items-center rounded-lg bg-cobalt px-4 font-medium text-white">Avanti</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        @break

                                    @case('certificates')
                                        <div role="img" aria-label="Attestati dell'edizione 0418: elenco dei certificati emessi e anteprima dell'attestato di Rossi Mario con QR verificato" class="flex flex-wrap gap-3.5 rounded-[10px] bg-[#F3F4F8] p-4 text-[12.5px] leading-[1.45] text-ink">
                                            <div class="{{ $panel }} flex min-w-0 flex-[1_1_252px] flex-col overflow-hidden">
                                                <div class="border-b border-[#EFEFF4] px-3.5 py-3">
                                                    <div class="text-[13.5px] font-[560]">Attestati · Edizione 0418</div>
                                                    <div class="text-[11.5px] text-muted">Formazione specifica · Rischio alto</div>
                                                </div>
                                                @foreach ($certificates as $certificate)
                                                    <div @class([
                                                        'flex items-center gap-2.5 border-b border-[#F1F1F5] px-3.5 py-2.5',
                                                        'bg-[#F7F8FE] shadow-[inset_3px_0_0_#5266EB]' => $certificate['selected'],
                                                    ])>
                                                        <span class="{{ $tones[$certificate['avatar']] }} inline-flex size-7 flex-none items-center justify-center rounded-full text-[10.5px] font-semibold">{{ $certificate['initials'] }}</span>
                                                        <div class="min-w-0 flex-auto leading-[1.3]">
                                                            <div class="font-[560]">{{ $certificate['name'] }}</div>
                                                            <div class="text-[11px] text-muted tabular-nums">{{ $certificate['code'] }}</div>
                                                        </div>
                                                        <span class="{{ $tones[$certificate['tone']] }} inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[11px] font-semibold whitespace-nowrap">{{ $certificate['status'] }}</span>
                                                    </div>
                                                @endforeach
                                                <div class="mt-auto flex items-center gap-1.5 border-t border-[#EFEFF4] px-3.5 py-2.5 font-medium text-cobalt-text">{{ $icon('download', 14) }}Esporta registro</div>
                                            </div>
                                            <div class="relative flex min-w-0 flex-[1_1_210px] items-center justify-center py-2">
                                                <div class="relative w-full max-w-[236px] rounded bg-[#FBFAF7] p-2 shadow-[0_18px_40px_-16px_rgba(23,23,33,0.35),0_0_0_1px_rgba(23,23,33,0.06)]">
                                                    <div class="rounded-[2px] border border-[#E6E2D6] px-3.5 pt-4 pb-3.5">
                                                        <div class="flex items-center gap-1.5">
                                                            <span class="inline-flex size-4 items-center justify-center rounded bg-onyx text-[7px] font-bold text-[#FBFAF7]">ED</span>
                                                            <span class="text-[9.5px] font-semibold">Ente Demo Formazione</span>
                                                        </div>
                                                        <div class="mt-3.5 text-[15px] leading-[1.15] font-[480] [font-variation-settings:'FLAR'_100]">Attestato di formazione</div>
                                                        <div class="mt-2.5 text-[9px] text-muted">Si attesta che</div>
                                                        <div class="text-[13px] font-[560] [font-variation-settings:'FLAR'_100]">Rossi Mario</div>
                                                        <div class="mt-2 grid gap-1">
                                                            <span class="h-[3px] rounded-[2px] bg-[#E6E2D6]"></span>
                                                            <span class="h-[3px] w-[88%] rounded-[2px] bg-[#E6E2D6]"></span>
                                                            <span class="h-[3px] w-[72%] rounded-[2px] bg-[#E6E2D6]"></span>
                                                        </div>
                                                        <div class="mt-4 flex items-end justify-between gap-2">
                                                            <div class="flex-auto">
                                                                <svg width="70" height="16" viewBox="0 0 140 30" fill="none" aria-hidden="true" class="block"><path d="{{ $signaturePath }}" stroke="#171721" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                                                <div class="mt-0.5 h-px bg-[#B9B6AC]"></div>
                                                                <div class="mt-[3px] text-[7.5px] text-muted">Il responsabile del corso</div>
                                                            </div>
                                                            <svg width="40" height="40" viewBox="-1 -1 23 23" aria-hidden="true" shape-rendering="crispEdges" class="block flex-none"><path fill="#171721" d="{{ $qrPath }}"></path></svg>
                                                        </div>
                                                        <div class="mt-2 text-[7.5px] tracking-[0.04em] text-muted tabular-nums">ATT-2026-0418-7Q</div>
                                                    </div>
                                                    <span class="absolute -top-3 -right-3 inline-flex items-center gap-1.5 rounded-full bg-[#0F8A63] py-[5px] pr-3 pl-[9px] text-[12px] font-semibold text-white shadow-[0_10px_24px_-10px_rgba(23,23,33,0.4)]">{{ $icon('check', 13, '2.5') }}Verificato</span>
                                                </div>
                                            </div>
                                        </div>
                                        @break
                                @endswitch
                            </div>

                            @if ($feature['mock'] === 'exam')
                                <div class="{{ $floatCard }} absolute -right-5 -bottom-6 flex w-[250px] items-center gap-3 px-4 py-3.5 leading-[1.35] max-[860px]:static max-[860px]:mt-3 max-[860px]:w-auto">
                                    <span class="inline-flex size-10 flex-none items-center justify-center rounded-lg bg-success-soft text-[#0F8A63]">{{ $icon('check', 20) }}</span>
                                    <div>
                                        <div class="text-[12.5px] text-muted">Esito immediato · Conti Elisa</div>
                                        <div class="text-[16px] font-semibold tabular-nums">Superato · 18/20</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 6 · Verifica pubblica ===== --}}
    <section class="overflow-clip bg-onyx pt-32 pb-[136px] text-ivory max-[860px]:py-20">
        <div class="site-wrap flex flex-wrap items-center justify-between gap-x-16 gap-y-[72px]">
            <div class="reveal max-w-[470px] flex-[1_1_380px]">
                <p class="{{ $eyebrow }} text-periwinkle">Verifica pubblica</p>
                <h2 class="mt-4 {{ $sectionTitle }} text-balance text-ivory">Un attestato vero si riconosce in un secondo.</h2>
                <p class="mt-6 text-muted-dark">Ogni attestato ha un codice univoco e un QR. Chi lo riceve — un datore di lavoro, un ispettore, un cliente — lo inquadra con il telefono e vede subito se è valido, per chi e fino a quando.</p>
                <div class="mt-7 flex flex-wrap gap-x-6 gap-y-2 text-[15px] text-[#C9CCDA]">
                    @foreach ($verifyPoints as $point)
                        <span class="inline-flex items-center gap-2">{{ $icon('check', 16, '1.75', 'text-periwinkle') }}{{ $point }}</span>
                    @endforeach
                </div>
                <a href="{{ route('verify') }}" class="mt-10 inline-flex min-h-12 items-center gap-2 rounded-full border border-ivory/22 bg-ivory/10 px-6 text-[16px] font-medium text-ivory no-underline transition-colors hover:bg-ivory/16 hover:text-ivory focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle">Prova la verifica{{ $icon('arrow-right', 18) }}</a>
            </div>

            <div class="reveal-scale relative max-w-[520px] flex-[1_1_420px]">
                <div class="-rotate-2 max-[860px]:rotate-none">
                    <div class="rounded-md bg-[#FBFAF7] p-3.5 text-ink shadow-[0_70px_120px_-40px_rgba(0,0,0,0.75),0_30px_60px_-30px_rgba(0,0,0,0.5)]">
                        <div class="rounded-[3px] border border-[#E6E2D6] px-8 pt-8 pb-7">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <div class="flex items-center gap-2.5">
                                    <span class="inline-flex size-[30px] items-center justify-center rounded-[7px] bg-onyx text-[11px] font-bold tracking-[0.02em] text-[#FBFAF7]">ED</span>
                                    <span class="text-[14px] font-[560]">Ente Demo Formazione</span>
                                </div>
                                <span class="text-[12px] tracking-[0.03em] text-muted tabular-nums">N. ATT-2026-0418-7Q</span>
                            </div>
                            <div class="mt-8 font-display text-[32px] leading-[1.1]">Attestato di formazione</div>
                            <div class="mt-5 text-[14px] text-muted">Si attesta che</div>
                            <div class="mt-0.5 text-[26px] leading-[1.2] font-[520] [font-variation-settings:'FLAR'_100]">Rossi Mario</div>
                            <p class="mt-3 text-[14px] leading-[1.6] text-ink-soft">ha frequentato con verifica finale dell'apprendimento il corso <span class="font-[560] text-ink">Formazione specifica dei lavoratori · Rischio alto (12 ore)</span>, ai sensi dell'art. 37 del D.Lgs 81/08 e dell'Accordo Stato-Regioni.</p>
                            <div class="mt-8 flex flex-wrap items-end justify-between gap-5">
                                <div class="flex-[1_1_180px]">
                                    <div class="text-[13px] text-ink-soft">Brescia, 06/10/2026</div>
                                    <svg width="140" height="30" viewBox="0 0 140 30" fill="none" aria-hidden="true" class="mt-2.5 block"><path d="{{ $signaturePath }}" stroke="#171721" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                    <div class="mt-1 h-px max-w-[200px] bg-[#B9B6AC]"></div>
                                    <div class="mt-1.5 text-[12px] text-muted">Il responsabile del corso</div>
                                </div>
                                <div class="flex flex-col items-center gap-1.5">
                                    <svg width="84" height="84" viewBox="-1 -1 23 23" aria-hidden="true" shape-rendering="crispEdges" class="block"><path fill="#171721" d="{{ $qrPath }}"></path></svg>
                                    <span class="text-[11px] text-muted">Verifica con il QR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-[62px] -left-10 flex w-[292px] items-center gap-3 rounded-[14px] bg-white px-4 py-3.5 leading-[1.35] text-ink shadow-[0_30px_60px_-20px_rgba(0,0,0,0.6)] max-[860px]:static max-[860px]:mt-3 max-[860px]:w-auto">
                    <span class="inline-flex size-10 flex-none items-center justify-center rounded-lg bg-success-soft text-[#0F8A63]">{{ $icon('shield', 20) }}</span>
                    <div>
                        <div class="text-[14px] font-semibold">Attestato valido</div>
                        <div class="text-[12.5px] text-muted">Verificato oggi alle 10:24</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== 7 · Come funziona ===== --}}
    <section class="pt-[120px] pb-10 max-[860px]:py-20">
        <div class="site-wrap">
            <div class="reveal max-w-[720px]">
                <p class="{{ $eyebrow }} text-cobalt-text">Come funziona</p>
                <h2 class="mt-4 {{ $sectionTitle }}">Dal catalogo all'attestato, in tre passi.</h2>
            </div>
            <ol class="mt-[72px] grid grid-cols-[repeat(auto-fit,minmax(260px,1fr))] gap-x-10 gap-y-12">
                @foreach ($steps as [$number, $stepTitle, $stepText])
                    <li class="reveal relative border-t border-[#D9D9E3] pt-8">
                        <span class="absolute -top-px left-0 h-0.5 w-14 bg-cobalt"></span>
                        <div class="font-display text-[64px] leading-none tabular-nums">{{ $number }}</div>
                        <h3 class="mt-8 text-[22px] leading-[1.25] font-[560] [font-variation-settings:'FLAR'_60]">{{ $stepTitle }}</h3>
                        <p class="mt-2.5 max-w-[330px] text-muted">{{ $stepText }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- ===== 8 · CTA finale ===== --}}
    <section class="home-cta-sky relative min-h-[700px] overflow-clip pt-28 max-[860px]:pb-[340px]">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0">
            <svg viewBox="0 0 1440 420" preserveAspectRatio="none" class="absolute bottom-[110px] left-0 block h-[300px] w-full"><g transform="translate(1440 0) scale(-1 1)"><polygon fill="#6F7BAA" points="{{ $farRidge }}"></polygon></g></svg>
            <div class="absolute inset-x-0 bottom-[110px] h-40 bg-linear-to-b from-mist/0 to-mist/30"></div>
            <svg viewBox="0 0 1440 420" preserveAspectRatio="none" class="absolute bottom-10 left-0 block h-[300px] w-full opacity-90"><g transform="translate(1440 0) scale(-1 1)"><polygon fill="#4B5583" points="{{ $midRidge }}"></polygon></g></svg>
            <svg viewBox="0 0 1440 300" preserveAspectRatio="none" class="absolute bottom-0 left-0 block h-[200px] w-full"><polygon fill="#171721" points="0,130 50,118 90,86 120,96 150,60 172,74 196,52 220,92 260,112 320,128 380,122 440,140 520,150 600,146 680,156 760,150 840,142 920,148 1000,132 1060,118 1100,92 1130,100 1160,66 1186,80 1214,54 1240,88 1290,110 1350,104 1400,120 1440,112 1440,300 0,300"></polygon></svg>
        </div>
        <div class="site-wrap reveal relative text-center">
            <h2 class="mx-auto max-w-[860px] {{ $sectionTitle }} text-balance text-ink">Formazione a norma, senza rincorrere nessuno.</h2>
            <p class="mx-auto mt-6 max-w-[560px] text-[19px] leading-[1.6] text-balance text-ink-soft">Raccontaci come lavori: ti mostriamo Attestami sui tuoi corsi.</p>
            <div class="mt-9 flex flex-wrap justify-center gap-3">
                <a href="{{ route('contact') }}" class="inline-flex min-h-12 items-center gap-2 rounded-full bg-cobalt px-6 text-[16px] font-medium text-white no-underline transition-colors hover:bg-cobalt-hover hover:text-white focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle">Richiedi una demo</a>
                <a href="{{ route('platform') }}" class="inline-flex min-h-12 items-center gap-2 rounded-full border border-[#D9D9E3] bg-white px-6 text-[16px] font-medium text-ink no-underline transition-colors hover:border-[#B9B9C9] focus-visible:outline-2 focus-visible:outline-offset-3 focus-visible:outline-periwinkle">Guarda la piattaforma{{ $icon('arrow-right', 18) }}</a>
            </div>
        </div>
    </section>

</x-site.layout>
