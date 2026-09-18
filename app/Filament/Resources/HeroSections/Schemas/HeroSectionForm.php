<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('eyebrow'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('roles'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('primary_button_label'),
                TextInput::make('primary_button_url')
                    ->url(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
