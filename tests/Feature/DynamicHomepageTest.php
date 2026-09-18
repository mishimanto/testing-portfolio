<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\HeroSection;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DynamicHomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_reads_content_from_the_database(): void
    {
        HeroSection::query()->create([
            'name' => 'Dynamic Portfolio Owner',
            'roles' => ['Laravel Developer'],
            'description' => 'Dynamic hero description',
            'is_active' => true,
        ]);
        Service::query()->create(['title' => 'Dynamic Service', 'is_active' => true]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Dynamic Portfolio Owner')
            ->assertSee('Dynamic Service');
    }

    public function test_contact_form_stores_a_message(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Client Name',
            'email' => 'client@example.com',
            'phone' => '01700000000',
            'subject' => 'New project',
            'message' => 'I would like to discuss a project.',
        ])->assertRedirect()->assertSessionHas('contact_success');

        $this->assertDatabaseHas(ContactMessage::class, ['email' => 'client@example.com']);
    }
}
