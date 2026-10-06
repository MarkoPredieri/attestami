@props([
    'title' => null,
    'description' => 'Attestami gestisce corsi, edizioni, esami e attestati per la formazione obbligatoria (D.Lgs 81/08, HACCP, antincendio, primo soccorso). Scadenze sotto controllo e attestati verificabili con QR.',
    'active' => null,
    'overHero' => false,
])

<!DOCTYPE html>
<html lang="it" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' — Attestami' : 'Attestami — La formazione obbligatoria, sempre a norma' }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="theme-color" content="#171721">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght,FLAR,VOLM@300..800,0..100,0..100&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-mist font-brand text-[17px] leading-[1.625] text-ink antialiased">
    <div class="overflow-x-clip">
        <x-site.header :active="$active" :over-hero="$overHero" />

        <main>
            {{ $slot }}
        </main>

        <x-site.footer />
    </div>
</body>
</html>
