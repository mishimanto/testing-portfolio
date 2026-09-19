<?php

namespace App\Filament\Resources\SkillGroups\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SkillGroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('key')
                    ->required()
                    ->alphaDash()
                    ->unique(ignoreRecord: true)
                    ->helperText('Use lowercase text such as design or development. Do not change it after assigning skills.'),
                TextInput::make('sort_order')->numeric()->default(0)->required(),
                Toggle::make('is_active')
                    ->label('Show this skill section')
                    ->default(true)
                    ->required(),
            ]);
    }
}
