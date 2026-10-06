<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'organization',
        'role',
        'interest',
        'trainees_per_year',
        'message',
        'privacy_accepted_at',
        'source',
        'status',
    ];

    public const STATUSES = [
        'new' => 'Nuovo',
        'contacted' => 'Contattato',
        'qualified' => 'Qualificato',
        'won' => 'Acquisito',
        'lost' => 'Perso',
    ];

    /**
     * Pagine del sito da cui può arrivare un lead.
     *
     * @var array<string, string>
     */
    public const SOURCES = [
        'home' => 'Home',
        'contatti' => 'Contatti',
        'teaser' => 'Teaser',
        'landing' => 'Landing',
    ];

    /**
     * Aree di interesse proposte nel form contatti.
     *
     * @var array<string, string>
     */
    public const INTERESTS = [
        '81/08' => 'Sicurezza 81/08',
        'HACCP' => 'HACCP',
        'Entrambi' => 'Entrambi',
        'Altro' => 'Altro',
    ];

    /**
     * Fasce di corsisti formati all'anno.
     *
     * @var array<string, string>
     */
    public const TRAINEES_PER_YEAR = [
        'fino-100' => 'Fino a 100',
        '100-500' => '100–500',
        '500-2000' => '500–2.000',
        'oltre-2000' => 'Oltre 2.000',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'privacy_accepted_at' => 'datetime',
        ];
    }
}
