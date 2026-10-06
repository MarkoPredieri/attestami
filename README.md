# Attestami

SaaS per **erogare corsi di formazione obbligatoria e rilasciare attestati a norma** — verticale iniziale: **Sicurezza sul lavoro (D.Lgs 81/08) + HACCP**.

Prodotto **nuovo e di proprietà** (clean-room): stesso know-how del dominio corsi/esami/attestati, ma codice e brand indipendenti. Nessun asset di terzi.

> "Attestami" è un **nome di lavoro** (placeholder). È isolato e facile da cambiare.

## Stato attuale (MVP fase 0 — "bandiera piantata")

Obiettivo di questa fase: **mettere online una landing credibile + raccolta lead** per validare il mercato 81/08/HACCP *prima* di costruire il SaaS multi-tenant.

- ✅ Landing page conversion-oriented (`/`) — pitch, funzioni, per-chi, come-funziona, form "Richiedi una demo"
- ✅ Raccolta lead: modello `Lead` + form con validazione + honeypot anti-spam → salva in DB
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

- Landing: http://127.0.0.1:8000/
- Admin: http://127.0.0.1:8000/admin — `marco@attestami.it` / `password`

## Struttura chiave

- `routes/web.php` — landing (`/`) + POST lead (`/richiedi-demo`)
- `app/Http/Controllers/LandingController.php` — view + salvataggio lead
- `app/Models/Lead.php` — modello lead (con stati: new/contacted/qualified/won/lost)
- `resources/views/landing.blade.php` — la landing
- `app/Filament/Resources/Leads/` — gestione lead nell'admin
