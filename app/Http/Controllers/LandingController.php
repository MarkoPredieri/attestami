<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /** Teaser pubblico (sito di presentazione). */
    public function index()
    {
        return view('teaser');
    }

    /** Landing commerciale completa (per quando si apre alle vendite). */
    public function platform()
    {
        return view('landing');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'organization' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'interest' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:2000'],
            'source' => ['nullable', 'string', 'in:teaser,landing'],
            // honeypot anti-spam: deve restare vuoto
            'website' => ['nullable', 'size:0'],
        ]);

        unset($data['website']);
        $data['source'] = $data['source'] ?? 'landing';

        Lead::create($data);

        return back()->with('lead_ok', true);
    }
}
