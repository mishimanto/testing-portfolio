<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $resources = [
            'blog_post', 'career_entry', 'contact_message', 'counter',
            'hero_section', 'partner', 'project', 'section_setting',
            'service', 'site_setting', 'skill', 'social_link', 'testimonial',
            'role', 'user', 'navigation_item',
        ];

        $permissions = collect($resources)->flatMap(fn (string $resource): array => [
            "view_any_{$resource}", "create_{$resource}",
            "update_{$resource}", "delete_{$resource}",
        ]);

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        $superAdmin = Role::findOrCreate('super_admin', 'web');
        $admin = Role::findOrCreate('admin', 'web');
        $editor = Role::findOrCreate('editor', 'web');

        $superAdmin->syncPermissions($permissions);
        $contentPermissions = $permissions->reject(
            fn (string $permission): bool => str_ends_with($permission, '_role') || str_ends_with($permission, '_user'),
        );
        $admin->syncPermissions($contentPermissions);
        $editor->syncPermissions($contentPermissions->filter(
            fn (string $permission): bool => str_starts_with($permission, 'view_any_') || str_starts_with($permission, 'update_'),
        ));

        User::query()->where('email', 'admin@portfolio.test')->first()?->syncRoles([$superAdmin]);
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
