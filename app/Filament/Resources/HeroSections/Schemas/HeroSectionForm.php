<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
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
                TextInput::make('heading_prefix')
                    ->label('Heading prefix')
                    ->default("I'm")
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('heading_connector')
                    ->label('Text before role')
                    ->default('a')
                    ->required(),
                TagsInput::make('roles')
                    ->placeholder('Add a role')
                    ->helperText('Type a role and press Enter. The first role is also used as the background title.')
                    ->reorderable()
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->disk('site_assets')
                    ->directory('assets/images/hero')
                    ->visibility('public'),
                TextInput::make('primary_button_label'),
                TextInput::make('primary_button_url')
                    ->helperText('Use a section anchor such as #portfolio, a relative path, or a full URL.'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
