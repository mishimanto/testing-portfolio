<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->required()
                    ->default('Portfolio'),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                TextInput::make('logo'),
                TextInput::make('dark_logo'),
                TextInput::make('favicon'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('address'),
                Textarea::make('sidebar_title')
                    ->columnSpanFull(),
                Textarea::make('sidebar_description')
                    ->columnSpanFull(),
                Textarea::make('footer_text')
                    ->columnSpanFull(),
            ]);
    }
}
