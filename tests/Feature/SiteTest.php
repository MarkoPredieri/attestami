<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function sitePages(): array
    {
        return [
            'home' => ['home', 'La formazione obbligatoria, sempre a norma.'],
            'piattaforma' => ['platform', 'Ogni passaggio del corso, tracciato.'],
            'verifica' => ['verify', 'Verifica un attestato in un secondo.'],
            'contatti' => ['contact', 'Vedila in azione sul'],
        ];
    }

    #[DataProvider('sitePages')]
    public function test_site_pages_render(string $routeName, string $headline): void
    {
        $this->get(route($routeName))
            ->assertOk()
            ->assertSee($headline)
            ->assertSee(route('contact'), false);
    }

    public function test_old_teaser_is_still_reachable(): void
    {
        $this->get(route('teaser'))->assertOk();
    }

    public function test_verify_page_echoes_the_requested_code_without_claiming_validity(): void
    {
        $this->get(route('verify', ['codice' => 'att-2026-0001-xy']))
            ->assertOk()
            ->assertSee('ATT-2026-0001-XY')
            ->assertSee('La verifica online sarà attiva con il lancio della piattaforma.');
    }

    public function test_home_email_form_stores_a_lead_without_a_name(): void
    {
        $this->from(route('home'))
            ->post(route('lead.store'), [
                'email' => 'rspp@example.it',
                'source' => 'home',
            ])
            ->assertRedirect(route('home'))
            ->assertSessionHas('lead_ok', true);

        $this->assertDatabaseHas('leads', [
            'email' => 'rspp@example.it',
            'name' => null,
            'source' => 'home',
            'status' => 'new',
        ]);
    }

    public function test_contact_form_stores_a_complete_lead_with_privacy_consent(): void
    {
        $this->from(route('contact'))
            ->post(route('lead.store'), [
                'name' => 'Laura Bianchi',
                'email' => 'laura@entedemo.it',
                'phone' => '+39 333 000 0000',
                'organization' => 'Ente Demo Formazione',
                'interest' => '81/08',
                'trainees_per_year' => '100-500',
                'message' => 'Vorremmo vedere la gestione delle scadenze.',
                'privacy' => '1',
                'source' => 'contatti',
            ])
            ->assertRedirect(route('contact'))
            ->assertSessionHas('lead_ok', true);

        $lead = Lead::query()->sole();

        $this->assertSame('100-500', $lead->trainees_per_year);
        $this->assertNotNull($lead->privacy_accepted_at);
    }

    public function test_contact_form_requires_privacy_consent(): void
    {
        $this->from(route('contact'))
            ->post(route('lead.store'), [
                'name' => 'Laura Bianchi',
                'email' => 'laura@entedemo.it',
                'source' => 'contatti',
            ])
            ->assertRedirect(route('contact'))
            ->assertSessionHasErrors('privacy');

        $this->assertDatabaseCount('leads', 0);
    }

    public function test_honeypot_blocks_bots(): void
    {
        $this->from(route('home'))
            ->post(route('lead.store'), [
                'email' => 'bot@example.com',
                'source' => 'home',
                'website' => 'https://spam.example',
            ])
            ->assertSessionHasErrors('website');

        $this->assertDatabaseCount('leads', 0);
    }

    public function test_unknown_trainee_range_is_rejected(): void
    {
        $this->from(route('contact'))
            ->post(route('lead.store'), [
                'email' => 'laura@entedemo.it',
                'trainees_per_year' => '1-milione',
                'privacy' => '1',
                'source' => 'contatti',
            ])
            ->assertSessionHasErrors('trainees_per_year');
    }
}
