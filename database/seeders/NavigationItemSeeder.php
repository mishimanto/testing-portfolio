<?php

namespace Database\Seeders;

use App\Models\NavigationItem;
use Illuminate\Database\Seeder;

class NavigationItemSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            ['Home', '#home'], ['About', '#about'], ['Services', '#services'],
            ['Blog', '#blog'], ['Project', '#portfolio'], ['Contact', '#contact'],
        ] as $i => [$label, $url]) {
            NavigationItem::query()->updateOrCreate(
                ['parent_id' => null, 'label' => $label],
                ['url' => $url, 'target' => '_self', 'sort_order' => $i, 'is_active' => true],
            );
        }
    }
}
