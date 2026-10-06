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
        'message',
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
}
