<?php

namespace App\Filament\Resources\Skills\Schemas;

use App\Models\SkillGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category')
                    ->label('Skill section')
                    ->options(fn (): array => SkillGroup::query()->orderBy('sort_order')->pluck('title', 'key')->all())
                    ->searchable()
                    ->preload()
                    ->required()
                    ->default('development'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('percentage')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('icon'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
