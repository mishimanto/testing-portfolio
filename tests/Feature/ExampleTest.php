<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_the_portfolio_design(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertViewIs('home')
            ->assertSee('Transforming Ideas into')
            ->assertSee('assets/css/style.css', escape: false);
    }
}
