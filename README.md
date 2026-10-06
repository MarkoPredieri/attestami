# Attestami

SaaS per **erogare corsi di formazione obbligatoria e rilasciare attestati a norma** — verticale iniziale: **Sicurezza sul lavoro (D.Lgs 81/08) + HACCP**.

Prodotto **nuovo e di proprietà** (clean-room): stesso know-how del dominio corsi/esami/attestati, ma codice e brand indipendenti. Nessun asset di terzi.

> "Attestami" è un **nome di lavoro** (placeholder). È isolato e facile da cambiare.

## Stato attuale (MVP fase 0 — "bandiera piantata")

Obiettivo di questa fase: **mettere online una landing credibile + raccolta lead** per validare il mercato 81/08/HACCP *prima* di costruire il SaaS multi-tenant.

- ✅ Sito di presentazione multi-pagina con effetti di scroll: Home (`/`), Piattaforma (`/piattaforma`), Verifica attestato (`/verifica`), Contatti / demo (`/contatti`)
- ✅ Raccolta lead: modello `Lead` + form (email in Home, richiesta demo completa in Contatti con consenso privacy) + honeypot anti-spam → salva in DB
- ✅ Vecchio teaser "in arrivo" mantenuto su `/in-arrivo`
- ✅ Admin Filament (`/admin`) con gestione Lead (lista, filtri, stato)
- ⬜ Prossimo: deploy online (landing pubblica) + invio notifica email sui nuovi lead
- ⬜ Poi: architettura multi-tenant (corsi, edizioni, esami, attestati) sul serio

## Stack

- Laravel 13 + Filament 4 (PHP 8.3)
- Blade + Tailwind 4 (Vite) per la landing pubblica
- SQLite in locale (zero-config); passare a MySQL in produzione

## Avvio locale

```sh
composer install
npm install && npm run build
php artisan migrate
php artisan serve
```

- Sito: http://127.0.0.1:8000/ (in sviluppo `npm run dev` per ricaricare stili e viste al volo)
- Admin: http://127.0.0.1:8000/admin — `marco@attestami.it` / `password`

## Struttura chiave

- `routes/web.php` — pagine del sito (`home`, `platform`, `verify`, `contact`, `teaser`) + POST lead (`lead.store`)
- `app/Http/Controllers/LandingController.php` — view + salvataggio lead
- `app/Models/Lead.php` — modello lead (stati, provenienze, interessi, fasce corsisti/anno)
- `resources/views/components/site/` — layout, header, footer e logo condivisi dal sito
- `resources/views/site/` — le 4 pagine del sito
- `resources/css/app.css` — token di design (`@theme`), utility `font-display` / `site-wrap`, effetti di scroll; `resources/css/site/*.css` — stili specifici per pagina
- `resources/design/gestionale/` — schermate HTML statiche del gestionale (Dashboard, Scadenze, Calendario, Esami, Dettaglio attestato) da usare come riferimento per il tema Filament
- `app/Filament/Resources/Leads/` — gestione lead nell'admin
