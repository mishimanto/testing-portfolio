<?php

namespace App\Filament\Resources\NavigationItems\Schemas;

use App\Models\NavigationItem;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class NavigationItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parent_id')
                    ->label('Parent menu')
                    ->options(fn (?NavigationItem $record): array => NavigationItem::query()
                        ->whereNull('parent_id')
                        ->when($record, fn ($query) => $query->whereKeyNot($record->getKey()))
                        ->orderBy('sort_order')
                        ->pluck('label', 'id')->all())
                    ->searchable()
                    ->preload(),
                TextInput::make('label')->required()->maxLength(255),
                TextInput::make('url')->required()->default('#')->helperText('Example: #about, /blog, or https://example.com'),
                Select::make('target')->options(['_self' => 'Same tab', '_blank' => 'New tab'])->default('_self')->required(),
                TextInput::make('sort_order')->numeric()->default(0)->required(),
                Toggle::make('is_active')->default(true)->required(),
            ]);
    }
}
