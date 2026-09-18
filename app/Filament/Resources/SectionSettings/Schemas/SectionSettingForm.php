<?php

namespace App\Filament\Resources\SectionSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SectionSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section_key')
                    ->required(),
                TextInput::make('subtitle'),
                Textarea::make('title')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                Toggle::make('is_visible')
                    ->required(),
            ]);
    }
}
