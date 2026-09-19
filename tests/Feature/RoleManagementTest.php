<?php

namespace Tests\Feature;

use App\Filament\Resources\Roles\RoleResource;
use App\Filament\Resources\Services\ServiceResource;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_manage_roles_and_all_resources(): void
    {
        $user = User::factory()->create(['email' => 'admin@portfolio.test']);
        $this->seed(RolePermissionSeeder::class);
        $this->actingAs($user->refresh());
        Filament::setCurrentPanel(Filament::getPanel('admin'));

        $this->assertTrue($user->refresh()->hasRole('super_admin'));
        $this->assertTrue(RoleResource::canViewAny());
        $this->assertTrue(ServiceResource::canViewAny());
        $this->assertTrue(ServiceResource::canCreate());
    }

    public function test_editor_cannot_manage_roles_or_create_content(): void
    {
        $user = User::factory()->create(['email' => 'editor@example.com']);
        $this->seed(RolePermissionSeeder::class);
        $user->assignRole('editor');
        $this->actingAs($user);
        Filament::setCurrentPanel(Filament::getPanel('admin'));

        $this->assertFalse(RoleResource::canViewAny());
        $this->assertTrue(ServiceResource::canViewAny());
        $this->assertFalse(ServiceResource::canCreate());
    }
}
