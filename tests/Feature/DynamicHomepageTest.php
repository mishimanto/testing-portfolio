<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\HeroSection;
use App\Models\NavigationItem;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\SocialLink;
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

    public function test_homepage_branding_navigation_social_links_and_seo_are_dynamic(): void
    {
        SiteSetting::query()->create([
            'site_name' => 'Dynamic Brand',
            'meta_title' => 'SEO Portfolio Title',
            'meta_description' => 'SEO portfolio description.',
            'meta_keywords' => 'portfolio, laravel',
            'logo' => 'assets/images/logo/custom-logo.png',
            'favicon' => 'assets/images/custom-favicon.svg',
            'email' => 'hello@dynamic.test',
            'phone' => '+880 1700-111222',
            'address' => 'Dhaka, Bangladesh',
        ]);
        NavigationItem::query()->create(['label' => 'Custom Menu', 'url' => '#custom', 'is_active' => true]);
        SocialLink::query()->create([
            'platform' => 'LinkedIn',
            'url' => 'https://linkedin.com/in/example',
            'icon' => 'fab fa-linkedin-in',
            'is_active' => true,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('SEO Portfolio Title')
            ->assertSee('SEO portfolio description.')
            ->assertSee('portfolio, laravel')
            ->assertSee('custom-logo.png')
            ->assertSee('custom-favicon.svg')
            ->assertSee('Custom Menu')
            ->assertSee('https://linkedin.com/in/example')
            ->assertSee('hello@dynamic.test')
            ->assertSee('rel="canonical"', false)
            ->assertSee('property="og:title"', false);
    }
}
