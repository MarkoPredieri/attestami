<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LandingController extends Controller
{
    /** Home del sito di presentazione. */
    public function index(): View
    {
        return view('site.home');
    }

    /** Pagina "Piattaforma": funzioni del gestionale. */
    public function platform(): View
    {
        return view('site.platform');
    }

    /** Verifica pubblica di un attestato tramite codice o QR. */
    public function verify(Request $request): View
    {
        $code = trim((string) $request->query('codice', ''));

        return view('site.verify', [
            'code' => $code !== '' ? mb_strtoupper(mb_substr($code, 0, 40)) : null,
        ]);
    }

    /** Contatti e richiesta demo. */
    public function contact(): View
    {
        return view('site.contact');
    }

    /** Vecchio teaser "in arrivo", mantenuto a un indirizzo dedicato. */
    public function teaser(): View
    {
        return view('teaser');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'organization' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'interest' => ['nullable', 'string', 'max:255'],
            'trainees_per_year' => ['nullable', Rule::in(array_keys(Lead::TRAINEES_PER_YEAR))],
            'message' => ['nullable', 'string', 'max:2000'],
            'source' => ['nullable', Rule::in(array_keys(Lead::SOURCES))],
            'privacy' => ['exclude_unless:source,contatti', 'accepted'],
            // honeypot anti-spam: deve restare vuoto
            'website' => ['nullable', 'size:0'],
        ]);

        if (isset($data['privacy'])) {
            $data['privacy_accepted_at'] = now();
        }

        unset($data['website'], $data['privacy']);
        $data['source'] = $data['source'] ?? 'landing';

        Lead::create($data);

        return back()->with('lead_ok', true);
    }
}
