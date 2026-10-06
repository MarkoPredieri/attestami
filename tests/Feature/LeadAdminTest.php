<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_lists_leads_with_site_fields(): void
    {
        // Finché User non implementa FilamentUser, Filament apre il pannello solo in ambiente local.
        config(['app.env' => 'local']);

        Lead::create([
            'email' => 'rspp@example.it',
            'organization' => 'Metalli Srl',
            'source' => 'contatti',
            'trainees_per_year' => '100-500',
        ]);

        $this->actingAs(User::factory()->create())
            ->get('/admin/leads')
            ->assertOk()
            ->assertSee('rspp@example.it')
            ->assertSee('Metalli Srl')
            ->assertSee('Contatti');
    }
}
